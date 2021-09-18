<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps=false;
    protected $fillable = ['title','price','auther','edition','category','availableCopies','issuedCopies'];
    protected $primaryKey = 'id';

    public function students(){
      return $this->belongsTo(Student::class,'book_issues','book_issues');
    }
}
