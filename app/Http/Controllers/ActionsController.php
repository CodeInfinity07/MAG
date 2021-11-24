<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\admin\Account;
use App\Models\admin\Artist;
use App\Models\admin\Label;
use wapmorgan\MediaFile\MediaFile;
use App\Models\album;
use App\Models\artwork;
use App\Models\ArtistReleases;
use App\Models\genre;
use App\Models\Languages;
use App\Models\primaryGenre;
use App\Models\release;
use App\Models\User;
use App\Models\AudioDetails;
use App\Models\TrackDetails;
use App\Models\audio;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Monarobase\CountryList\CountryListFacade;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use Importer;
use Exporter;

class ActionsController extends Controller
{
    public function addExcel($id){
      $album = album::where('id', $id)->first();
      $album->is_approved = 1;
      $album->is_pending = 0;
      $album->in_review = 0;
      $album->is_removed = 0;
      $album->need_action = 0;
      $album->save();
      $album = album::where('id', $id)->first();
      $release = release::where('id', $album->release)->first();
      $artwork = artwork::where('id', $album->artwork)->first();
      $audios = AudioDetails::where('release_id', $id)->get();
      $store = Store::where('album_id', $id)->first();
      foreach ($audios as $aud){
        $album_operation = "Add";
        $album_label = $release->record;
        $album_title = $release->title;
        $album_catalog = "ArtistName".$release->id;
        $album_upc = "";
        $album_performer = "";
        $performers = array();
        $album_performers = TrackDetails::where('track_id', $id)->where('track_genre', 'Primary')->get();
        foreach($album_performers as $a){
          $performers[] = $a->track_name;
        }
        if(isset($album_performers)){
          $album_performer = implode(",", $performers);
        }
        $album_liner_notes = "";
        $MetadataLanguage	= $release->language;
        $AlbumReleaseDate	= $release->original_release;
        $AlbumCopyrightYear	= $release->c_year;
        $AlbumDstCountriesOptIn = $store->stores;
        $AlbumDstCountriesOptOut = "";
        $AlbumDstServiceOptIn = $store->territiores;
        $AlbumDstServiceOptOut = "";
        $temp = explode('/', $artwork->image);
        $AlbumCover=$temp[1];
        if($release->content == "Explicit"){
          $ExplicitArtwork = "Y";
          $SongExplicit = "Y";
        }
        else {
          $ExplicitArtwork = "N";
          $SongExplicit = "N";
        }

        $AlbumOnly = "Y";
        $AlbumPriceCode = "S3";
        $PrimaryAlbumGenre = $release->p_genre;
        $SubAlbumGenre = $release->s_genre;
        $AlbumExclusive = "";
        $AlbumExclusiveStartDate = "";
        $StreamOnExclusive = "";
        $AlbumCLine	= $release->c_license;
        $AlbumPLine	= $release->r_license;
        $PreorderStartDate = $release->pre_order;
        if(strpos($store->stores, "spotify") or strpos($store->stores,"Spotify")){
          $PreorderStore = "Spotify";
        }
        else {
          $PreorderStore = "";
        }
        $AlbumPreorderPreviews = "";
        $disc = audio::where('album_id', $id)->get();
        $SongDiscNumber = count($disc);
        $SongTrackNumber = "1";
        $SongSampleLength  = "";
        $SongMainTitle = $aud->track_name;
        $SongMix = "";
        $spotify_url = array();
        $Lyricists = array();
        $SongWriter = array();
        $SongComposer = array();
        $SongProducer = array();
        $SongRemixer = array();
        $SongPublisher = array();
        $SongPerformer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Performer')->value('track_name');
        $lyrics = TrackDetails::where('track_record_id', $aud->id)->where('track_genre','Lyricist')->get();
        $SongPublishers = TrackDetails::where('track_record_id', $aud->id)->where('track_genre', 'Publisher')->get();
        $SongWriters = TrackDetails::where('track_record_id', $aud->id)->where('track_genre', 'Writer')->get();
        $SongComposers = TrackDetails::where('track_record_id', $aud->id)->where('track_genre', 'Composer')->get();
        $SongProducers = TrackDetails::where('track_record_id', $aud->id)->where('track_genre', 'Producer')->get();
        $SongRemixers = TrackDetails::where('track_record_id', $aud->id)->where('track_genre', 'Remixer')->get();
        $urls = TrackDetails::where('track_record_id', $aud->id)->get();
        if(isset($SongRemixers)){
          foreach($SongRemixers as $p){
            $SongRemixer[] = $p->track_name;
          }
          $SongRemixer = implode(",",$SongRemixer);
        }

        if(isset($SongProducers)){
          foreach($SongProducers as $p){
            $SongProducer[] = $p->track_name;
          }
          $SongProducer = implode(",",$SongProducer);
        }

        if(isset($SongComposers)){
          foreach($SongComposers as $p){
            $SongComposer[] = $p->track_name;
          }
          $SongComposer = implode(",",$SongComposer);
        }

        if(isset($SongWriters)){
          foreach($SongWriters as $p){
            $SongWriter[] = $p->track_name;
          }
          $SongWriter = implode(",",$SongWriter);
        }

        if(isset($lyrics)){
          foreach($lyrics as $lyric){
            $Lyricists[] = $lyric->track_name;
          }
          $Lyricists = implode(",", $Lyricists);
        }

        if(isset($SongPublishers)){
          foreach($SongPublishers as $p){
            $SongPublisher[] = $p->track_name;
          }
          $SongPublisher = implode(",", $SongPublisher);
        }

        foreach($urls as $url){
          if(isset($url->track_artist_link)){
            $spotify_url[] = $url->track_artist_link;
          }
        }
        if(isset($spotify_url)){
          $spotify_url = implode(",", $spotify_url);
        }
        else {
          $spotify_url="NULL";
        }



        $performer_apple_url = "";
        $SongPriceCode = "T1";
        $SongISRC = $aud->track_isrc;
        $SongCopyrightYear = $release->c_year;

        if ($SubAlbumGenre == "Instrumental"){
          $Instrumental = "Y";
          $VocalsLanguage = "N";
          $Lyricists = "N";
        }
        else {
          $Instrumental = "N";
          $VocalsLanguage = $MetadataLanguage;
        }

        $SongGenre = $release->p_genre;

        $CountryOfOrigin = "";
        $SongFeaturedArtist = $SongPerformer;

        $SongCLine = $release->c_license;
        $SongPLine = $release->r_license;
        $SongFileName = audio::where('id', $aud->audio_id)->value('song');
        $SongAlbumOnly = "";
        $SongWitholdMechanicals = "";
        $PreorderAccessType = "";
        $TrackLength = audio::where('id', $aud->audio_id)->value('duration');
        $TrackLength = gmdate("H:i:s", (int)$TrackLength);
        $Formats = "WAV";
        $InHouse = "";
        $excel = Importer::make('Excel');
        $excel->load('BaseExcel.xlsx');
        $collection = $excel->getCollection();
        $collection->push([$album_operation, $album_label, $album_title, $album_catalog, $album_upc, $album_performer, $album_liner_notes, $MetadataLanguage, $AlbumReleaseDate,	$AlbumCopyrightYear,	$AlbumDstCountriesOptIn,	$AlbumDstCountriesOptOut,	$AlbumDstServiceOptIn,	$AlbumDstServiceOptOut,	$AlbumCover,	$ExplicitArtwork,	$AlbumOnly,	$AlbumPriceCode,	$PrimaryAlbumGenre,	$SubAlbumGenre,	$AlbumExclusive,	$AlbumExclusiveStartDate,	$StreamOnExclusive,	$AlbumCLine, $AlbumPLine, $PreorderStartDate,	$PreorderStore,	$AlbumPreorderPreviews,	$SongDiscNumber,	$SongTrackNumber,	$SongSampleLength,	$SongMainTitle,	$SongMix,	$SongPerformer, $spotify_url, $performer_apple_url,	$SongPriceCode,	$SongISRC,	$SongCopyrightYear,	$SongExplicit,	$Instrumental,	$VocalsLanguage,	$Lyricists,	$SongGenre,	$SongWriter,	$SongComposer,	$SongProducer,	$CountryOfOrigin,	$SongFeaturedArtist,	$SongRemixer,	$SongPublisher,	$SongCLine,	$SongPLine,	$SongFileName,	$SongAlbumOnly,	$SongWitholdMechanicals,	$PreorderAccessType,	$TrackLength,	$Formats,	$InHouse]);
        $excel = Exporter::make('Excel');
        $excel->load($collection);

        $excel->save('BaseExcel.xlsx');
    }
    return redirect('/admin_dashboard');

  }

    public function removeExcel($id){
      $album = album::where('id', $id)->first();
      $album->is_approved = 0;
      $album->is_pending = 0;
      $album->in_review = 0;
      $album->is_removed = 1;
      $album->need_action = 0;
      $album->save();
      $album = album::where('id', $id)->first();
      $release = release::where('id', $album->release)->first();
      $artwork = artwork::where('id', $album->release)->first();
      $audios = AudioDetails::where('release_id', $id)->get();
      $store = Store::where('album_id', $id)->first();
      foreach ($audios as $aud){
        $album_operation = "Remove";
        $album_label = $release->record;
        $album_title = $release->title;
        $album_catalog = "ArtistName".$release->id;
        $album_upc = "";
        $album_performer = "";
        $performers = array();
        $album_performers = TrackDetails::where('track_id', $id)->where('track_genre', 'Performer')->get();
        foreach($album_performers as $a){
          $performers[] = $a->track_name;
        }
        if(count($album_performers)>1){
          $album_performer = implode(",", $album_performers);
        }
        $album_liner_notes = "";
        $MetadataLanguage	= $release->language;
        $AlbumReleaseDate	= $release->original_release;
        $AlbumCopyrightYear	= $release->c_year;
        $AlbumDstCountriesOptIn = $store->stores;
        $AlbumDstCountriesOptOut = "";
        $AlbumDstServiceOptIn = $store->territiores;
        $AlbumDstServiceOptOut = "";
        $AlbumCover = $artwork->image;
        if($release->content == "Explicit"){
          $ExplicitArtwork = "Y";
          $SongExplicit = "Y";
        }
        else {
          $ExplicitArtwork = "N";
          $SongExplicit = "N";
        }

        $AlbumOnly = "Y";
        $AlbumPriceCode = "";
        $PrimaryAlbumGenre = $release->p_genre;
        $SubAlbumGenre = $release->s_genre;
        $AlbumExclusive = "";
        $AlbumExclusiveStartDate = $release->sales;
        $StreamOnExclusive = "";
        $AlbumCLine	= $release->c_license;
        $AlbumPLine	= $release->r_license;
        $PreorderStartDate = $release->pre_order;
        if(strpos($store->stores, "spotify") or strpos($store->stores,"Spotify")){
          $PreorderStore = "Spotify";
        }
        else {
          $PreorderStore = "";
        }
        $AlbumPreorderPreviews = "";
        $disc = audio::where('album_id', $id)->get();
        $SongDiscNumber = count($disc);
        $SongTrackNumber = $aud->song_track_number;
        $SongSampleLength  = "";
        $SongMainTitle = $aud->song_name;
        $SongMix = "";
        $SongPerformer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Performer')->value('track_name');
        $spotify_url = array();
        $urls = TrackDetails::where('track_record_id', $aud->id)->get();
        foreach($urls as $url){
          if(isset($url->track_artist_link)){
            $spotify_url[] = $url->track_artist_link;
          }
        }
        if(isset($spotify_url)){
          $spotify_url = implode(",", $spotify_url);
        }
        else {
          $spotify_url="NULL";
        }

        $performer_apple_url = "";
        $SongPriceCode = "";
        $SongISRC = "";
        $SongCopyrightYear = $release->c_year;

        if ($SubAlbumGenre == "Instrumental"){
          $Instrumental = "Y";
          $VocalsLanguage = "N";
          $Lyricists = "N";
        }
        else {
          $Instrumental = "N";
          $VocalsLanguage = "";
          $Lyricists = "";
        }

        $SongGenre = $release->p_genre;
        $SongWriter = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Writer')->value('track_name');
        $SongComposer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Composer')->value('track_name');
        $SongProducer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Producer')->value('track_name');
        $CountryOfOrigin = "";
        $SongFeaturedArtist = "";
        $SongRemixer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Remixer')->value('track_name');
        $SongPublisher = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Publisher')->value('track_name');
        $SongCLine = $release->c_license;
        $SongPLine = $release->r_license;
        $SongFileName = $aud->song;
        $SongAlbumOnly = "";
        $SongWitholdMechanicals = "";
        $PreorderAccessType = "";
        $TrackLength = audio::where('id', $aud->audio_id)->value('duration');
        $Formats = "WAV";
        $InHouse = "";
        $excel = Importer::make('Excel');
        $excel->load('base_sheet.xlsx');
        $collection = $excel->getCollection();
        $collection->push([$album_operation, $album_label, $album_title, $album_catalog, $album_upc, $album_performer, $album_liner_notes, $MetadataLanguage, $AlbumReleaseDate,	$AlbumCopyrightYear,	$AlbumDstCountriesOptIn,	$AlbumDstCountriesOptOut,	$AlbumDstServiceOptIn,	$AlbumDstServiceOptOut,	$AlbumCover,	$ExplicitArtwork,	$AlbumOnly,	$AlbumPriceCode,	$PrimaryAlbumGenre,	$SubAlbumGenre,	$AlbumExclusive,	$AlbumExclusiveStartDate,	$StreamOnExclusive,	$AlbumCLine, $AlbumPLine, $PreorderStartDate,	$PreorderStore,	$AlbumPreorderPreviews,	$SongDiscNumber,	$SongTrackNumber,	$SongSampleLength,	$SongMainTitle,	$SongMix,	$SongPerformer, $spotify_url, $performer_apple_url,	$SongPriceCode,	$SongISRC,	$SongCopyrightYear,	$SongExplicit,	$Instrumental,	$VocalsLanguage,	$Lyricists,	$SongGenre,	$SongWriter,	$SongComposer,	$SongProducer,	$CountryOfOrigin,	$SongFeaturedArtist,	$SongRemixer,	$SongPublisher,	$SongCLine,	$SongPLine,	$SongFileName,	$SongAlbumOnly,	$SongWitholdMechanicals,	$PreorderAccessType,	$TrackLength,	$Formats,	$InHouse]);
        $excel = Exporter::make('Excel');
        dd($collection);
        $excel->load($collection);
        $excel->save('base_sheet.xlsx');
    }
    return redirect('/admin_dashboard');
}
    public function cause_action($id){
      $album = album::where('id', $id)->first();
      $album->is_approved = 0;
      $album->is_pending = 0;
      $album->in_review = 0;
      $album->is_removed = 0;
      $album->need_action = 1;
      $album->save();
      $album = album::where('id', $id)->first();
      $release = release::where('id', $album->release)->first();
      $artwork = artwork::where('id', $album->release)->first();
      $audios = AudioDetails::where('release_id', $id)->get();
      $store = Store::where('album_id', $id)->first();
      foreach ($audios as $aud){
        $album_operation = "Update";
        $album_label = $release->record;
        $album_title = $release->title;
        $album_catalog = "ArtistName".$release->id;
        $album_upc = "";
        $album_performer = "";
        $performers = array();
        $album_performers = TrackDetails::where('track_id', $id)->where('track_genre', 'Performer')->get();
        foreach($album_performers as $a){
          $performers[] = $a->track_name;
        }
        if(count($album_performers)>1){
          $album_performer = implode(",", $album_performers);
        }
        $album_liner_notes = "";
        $MetadataLanguage	= $release->language;
        $AlbumReleaseDate	= $release->original_release;
        $AlbumCopyrightYear	= $release->c_year;
        $AlbumDstCountriesOptIn = $store->stores;
        $AlbumDstCountriesOptOut = "";
        $AlbumDstServiceOptIn = $store->territiores;
        $AlbumDstServiceOptOut = "";
        $AlbumCover = $artwork->image;
        if($release->content == "Explicit"){
          $ExplicitArtwork = "Y";
          $SongExplicit = "Y";
        }
        else {
          $ExplicitArtwork = "N";
          $SongExplicit = "N";
        }

        $AlbumOnly = "Y";
        $AlbumPriceCode = "";
        $PrimaryAlbumGenre = $release->p_genre;
        $SubAlbumGenre = $release->s_genre;
        $AlbumExclusive = "";
        $AlbumExclusiveStartDate = $release->sales;
        $StreamOnExclusive = "";
        $AlbumCLine	= $release->c_license;
        $AlbumPLine	= $release->r_license;
        $PreorderStartDate = $release->pre_order;
        if(strpos($store->stores, "spotify") or strpos($store->stores,"Spotify")){
          $PreorderStore = "Spotify";
        }
        else {
          $PreorderStore = "";
        }
        $AlbumPreorderPreviews = "";
        $disc = audio::where('album_id', $id)->get();
        $SongDiscNumber = count($disc);
        $SongTrackNumber = $aud->song_track_number;
        $SongSampleLength  = "";
        $SongMainTitle = $aud->song_name;
        $SongMix = "";
        $SongPerformer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Performer')->value('track_name');
        $spotify_url = array();
        $urls = TrackDetails::where('track_record_id', $aud->id)->get();
        foreach($urls as $url){
          if(isset($url->track_artist_link)){
            $spotify_url[] = $url->track_artist_link;
          }
        }
        if(isset($spotify_url)){
          $spotify_url = implode(",", $spotify_url);
        }
        else {
          $spotify_url="NULL";
        }

        $performer_apple_url = "";
        $SongPriceCode = "";
        $SongISRC = "";
        $SongCopyrightYear = $release->c_year;

        if ($SubAlbumGenre == "Instrumental"){
          $Instrumental = "Y";
          $VocalsLanguage = "N";
          $Lyricists = "N";
        }
        else {
          $Instrumental = "N";
          $VocalsLanguage = "";
          $Lyricists = "";
        }

        $SongGenre = $release->p_genre;
        $SongWriter = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Writer')->value('track_name');
        $SongComposer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Composer')->value('track_name');
        $SongProducer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Producer')->value('track_name');
        $CountryOfOrigin = "";
        $SongFeaturedArtist = "";
        $SongRemixer = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Remixer')->value('track_name');
        $SongPublisher = TrackDetails::where('audio_id', $aud->id)->where('track_genre', 'Publisher')->value('track_name');
        $SongCLine = $release->c_license;
        $SongPLine = $release->r_license;
        $SongFileName = $aud->song;
        $SongAlbumOnly = "";
        $SongWitholdMechanicals = "";
        $PreorderAccessType = "";
        $TrackLength = audio::where('id', $aud->audio_id)->value('duration');
        $Formats = "WAV";
        $InHouse = "";
        $excel = Importer::make('Excel');
        $excel->load('base_sheet.xlsx');
        $collection = $excel->getCollection();
        $collection->push([$album_operation, $album_label, $album_title, $album_catalog, $album_upc, $album_performer, $album_liner_notes, $MetadataLanguage, $AlbumReleaseDate,	$AlbumCopyrightYear,	$AlbumDstCountriesOptIn,	$AlbumDstCountriesOptOut,	$AlbumDstServiceOptIn,	$AlbumDstServiceOptOut,	$AlbumCover,	$ExplicitArtwork,	$AlbumOnly,	$AlbumPriceCode,	$PrimaryAlbumGenre,	$SubAlbumGenre,	$AlbumExclusive,	$AlbumExclusiveStartDate,	$StreamOnExclusive,	$AlbumCLine, $AlbumPLine, $PreorderStartDate,	$PreorderStore,	$AlbumPreorderPreviews,	$SongDiscNumber,	$SongTrackNumber,	$SongSampleLength,	$SongMainTitle,	$SongMix,	$SongPerformer, $spotify_url, $performer_apple_url,	$SongPriceCode,	$SongISRC,	$SongCopyrightYear,	$SongExplicit,	$Instrumental,	$VocalsLanguage,	$Lyricists,	$SongGenre,	$SongWriter,	$SongComposer,	$SongProducer,	$CountryOfOrigin,	$SongFeaturedArtist,	$SongRemixer,	$SongPublisher,	$SongCLine,	$SongPLine,	$SongFileName,	$SongAlbumOnly,	$SongWitholdMechanicals,	$PreorderAccessType,	$TrackLength,	$Formats,	$InHouse]);
        $excel = Exporter::make('Excel');
        $excel->load($collection);
        $excel->save('base_sheet.xlsx');
    }

    return redirect('/admin_dashboard');

  }
}
