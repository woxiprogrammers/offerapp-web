<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMessage extends Model
{
    protected $table = 'group_messages';

    protected $fillable = ['id','group_id','role_id','offer_id','reference_member_id'];

}
