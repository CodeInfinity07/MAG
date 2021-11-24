<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spotify;


class SpotifyController extends Controller
{
    public function searchArtist(Request $request){
      $myArtists = array();
      $results = Spotify::searchArtists($request->artist_name)->limit(5)->get();
      foreach($results as $r){
        foreach($r['items'] as $res){
          $myArtists[] = '<li style="cursor: pointer;"><a id="'.$res['id'].'"><img src="'.$res['images'][0]['url'].'" style="height: 40px; width: 40px;" alt="image" />'.$res['name'].'</a></li>';
        }
       }

       return Response($myArtists);


    }
}
