<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Student;
class Student extends Model
{
    protected $fillable=['name','regno','course','department','gender'];
    protected $primaryKey='id';

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_issues');
    }
}
