<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=['userid','pnumber','roomid','amountpay','amt',];
}
