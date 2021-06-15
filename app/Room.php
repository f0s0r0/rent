<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=['roomno','floor','roomtype','amount',];

    protected $fillable2=['roomnumber','floor','role','amountpaid',];
}
