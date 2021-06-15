<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable =['teacherid','assigntitle','subject','form','image',];
}
