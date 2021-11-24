<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class release extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'title',
        'language',
        'content',
        'p_genre',
        's_genre',
        'is_compilation',
        'record',
        'r_year',
        'c_year',
        'c_license',
        'r_license',
        'original_release',
        'pre_order',
        'sales',
        'version',
        'artiste',
    ];
}
