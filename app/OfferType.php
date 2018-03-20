<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferType extends Model
{
    protected $table = 'offer_types';

    protected $fillable = ['id','name','slug'];

}
