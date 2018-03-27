<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $table = 'otps';

    protected $fillable = ['id', 'mobile_no', 'otp'];

    protected $hidden = ['mobile_no', 'otp'];
}
