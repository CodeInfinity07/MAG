<?php

namespace App\Models\admin;

use App\Models\admin\Section;
use App\Models\MailingList;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'role_id',
        'company_name',
        'email',
        'account_type',
        'telephone',
        'role_id',
        'fax',
        'vat_no',
        'building_name_no',
        'street',
        'area',
        'town',
        'county',
        'post_code',
        'country',
        'update_logo',
        'show_feedback',
        'sections',
        'facebook',
        'my_space',
        'sound_cloud',
        'twitter',
        'youtube',
        'biography',
    ];
    public function labels()
    {
        return $this->hasMany(Label::class, 'account_id');
    }
    public function section()
    {
        return $this->hasOne(Section::class, 'account_id', 'id');
    }
    public function mailing_lists()
    {
        return $this->belongsToMany(
            MailingList::class,     //first argument is the destination table
            'account_mailing_list',    //second argument is the name of the intermediate table name should be alphabaticaly like first table and then _ second table or vice vera
            'account_id',      //third argument is foreign key from parent table in pivot table
            'mailing_list_id'       //fourth argument is foreign key from child table/destination table in pivot table
        )->withTimestamps();
    }
    // account belongs to which user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
