<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Group;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role_id',
        'country',
        'first_name',
        'last_name',
        'contact_no',
        'status',
        'payment_method',
        'picture',
        'notes',
        'artist_many',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function get_role_name()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
    public function get_artist()
    {
        return $this->hasMany('App\Models\ArtistLabel', 'user_id');
    }
    public function account()
    {
        return $this->hasOne('App\Models\admin\Account', 'user_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            Group::class,     //first argument is the destination table
            'account_group_lists',    //second argument is the name of the intermediate table name should be alphabaticaly like first table and then _ second table or vice vera
            'user_id',      //third argument is foreign key from parent table in pivot table
            'group_id'       //fourth argument is foreign key from child table/destination table in pivot table
        )->withTimestamps();
    }

}
