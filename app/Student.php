<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Student;
class Student extends Model
{
    protected $fillable=['name','regno','date_of_issue','date_of_return','course','department','gender'];
    protected $primaryKey='id';

    public function books()
    {
        return $this->belongsToMany(Book::class,'book_issues');
    }
}
