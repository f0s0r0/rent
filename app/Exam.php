<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable =['teacherid','examtitle','subject','form','image',];
}
