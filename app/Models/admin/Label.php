<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'parent_label',
        'label_name',
        'email',
        'image',
        'country',
        'beatpoort',
        'traxsource',
        'website',
        'my_space',
        'facebook',
        'youtube',
        'twitter',
        'sound_cloud',
        'genre_1',
        'genre_2',
        'compilations_label',
        'biography',
    ];
    public function account()
    {
        return $this->belongsTo('App\Models\admin\Account', 'account_id');
    }
    public function artists()
    {
        return $this->hasMany(Artist::class, 'label_id');
    }
}