<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['name','regno','date_of_issue','date_of_return','course','department','gender'];
}
