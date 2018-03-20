<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferImage extends Model
{
    protected $table = 'offer_images';

    protected $fillable = ['id','name','offer_id'];

}
