<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_book extends Model
{
    public $timestamps = false;
     protected $table='book_returns';
     protected $fillable=['book_Id','issuedBy_Id','return_on','fine'];
}
