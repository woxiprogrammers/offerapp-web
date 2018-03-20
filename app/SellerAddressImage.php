<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddressImage extends Model
{
    protected $table = 'seller_address_images';

    protected $fillable = ['id','seller_address_id','name'];

}
