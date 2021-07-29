<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book_issues extends Model
{
    protected $table='book_issues';
    protected $fillable=['book_Id','issuedBy_Id','issues_date','return_date','staffDetail'];

    public function books(){
        return $this->hasOne('App\Book','id','book_Id');
    }
    public function students(){
        return $this->hasOne('App\Student','id','issuedBy_Id');
    }
}
