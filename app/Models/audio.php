<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class audio extends Model
{
    use HasFactory;

    protected $fillable = ['song','album_id','song_name','song_track_number','track_record_id','duration'];
}
