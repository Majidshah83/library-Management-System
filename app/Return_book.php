<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Return_book extends Model
{
    public $timestamps = false;
     protected $table='book_returns';
     protected $fillable=['book_Id','issuedBy_Id','return_on','fine'];


    public function books(){
        return $this->hasOne('App\Book','id','book_Id');
    }
    public function students(){
        return $this->hasOne('App\Student','id','issuedBy_Id');
    }
}