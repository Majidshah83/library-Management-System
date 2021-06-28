<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=false;
    protected $fillable = ['title','price','auther','edition','category'];
    protected $primaryKey = 'id';
}
