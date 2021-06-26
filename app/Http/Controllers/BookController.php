<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{     //Show book detail
    public function showbook(){
        $books=Book::all();
        return view('admin.book',compact('books'));

    }
    //Insert book deatil
    public function addBook(Request $req){
       $book=new Book;
       $book->title=$req->title;
       $book->price=$req->price;
       $book->auther=$req->auther;
       $book->edition=$req->edition;
       $book->category=$req->category;
    //    dd($book);
       $book->save();
       return redirect('/book')->with('success','Insert Data Successfuly');

    }
}
