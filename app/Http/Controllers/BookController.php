<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    public function showbook(){
        $books=Book::all();
        return view('admin.book',compact('books'));
    }
}
