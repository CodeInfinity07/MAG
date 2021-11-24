<?php

namespace App\Models;

use App\Models\admin\Account;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_name',
    ];
    public function contacts()
    {
        return $this->belongsToMany(
            Account::class,     //first argument is the destination table
            'account_mailing_list',    //second argument is the name of the intermediate table name should be alphabaticaly like first table and then _ second table or vice vera
            'mailing_list_id',      //third argument is foreign key from parent table in pivot table
            'account_id'       //fourth argument is foreign key from child table/destination table in pivot table
        )->withTimestamps();
    }
}
