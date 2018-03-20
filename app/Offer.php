<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = 'offers';

    protected $fillable = ['id','category_id','offer_type_id','seller_address_id','offer_status_id','offer_id','description','valid_from','valid_to'];

    public function offerImages(){
        return $this->hasMany('App\OfferImage','offer_id');
    }
}
