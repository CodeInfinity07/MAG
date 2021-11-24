<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'distribution',
        'discography',
        'promotions',
        'label_artist',
        'mailing',
        'katorz',
    ];
    public function account()
    {
        $this->belongsTo(Account::class, 'account_id');
    }
}