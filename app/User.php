<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'id','role_id','first_name','last_name','password','email','mobile_no',
        'profile_picture','token'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isSeller()
    {
        return $this->hasOne('App\Seller', 'user_id');
    }

    public function isCustomer()
    {
        return $this->hasOne('App\Customer');
    }
}
