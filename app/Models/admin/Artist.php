<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = [
        'label_id',
        'account_id',
        'name',
        'contact_email',
        'first_name',
        'last_name',
        'gender',
        'telephone',
        'image',
        'biography',
        'release_feed',
        'artist_feed',
        'building_name_no',
        'street',
        'area',
        'town',
        'post_code',
        'county',
        'country',
        'apple_music_profile',
        'apple_music_URL',
        'facebook',
        'sound_cloud',
        'spotify_profile',
        'spotify_URL',
        'twitter',
        'website',
    ];
    public function label()
    {
        return $this->belongsTo('App\Models\admin\Label', 'label_id');
    }
    public function account()
    {
        return $this->belongsTo('App\Models\admin\Account', 'account_id');
    }
}