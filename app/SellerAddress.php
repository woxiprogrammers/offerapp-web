<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerAddress extends Model
{
    protected $table = 'seller_addresses';

    protected $fillable = ['id','seller_id','shop_name','landline','address','floor_id','zipcode','city','state','longitude','latitude','is_active'];

}
