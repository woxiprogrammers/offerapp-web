<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellerPaymentMode extends Model
{
    protected $table = 'seller_payment_modes';

    protected $fillable = ['id','seller_id','payment_mode_id'];

}
