<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $table = 'floors';

    protected $fillable = ['id','name','slug','no'];

}
