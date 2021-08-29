<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_issues extends Model
{
    protected $table='book_issues';
    protected $fillable=['book_Id','issuedBy_Id','fine_id','issues_date','return_date','staffDetail','return_on','fine_id'];

    public function books(){
        return $this->hasOne('App\Book','id','book_Id');
    }
    public function students(){
        return $this->hasOne('App\Student','id','issuedBy_Id');
    }
    public function studentfine(){
        return $this->hasOne('App\Fine','id','fine_id');
    }
}
