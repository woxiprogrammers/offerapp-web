<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupCustomer extends Model
{
    protected $table = 'group_customers';

    protected $fillable = ['id','group_id','customer_id'];

}
