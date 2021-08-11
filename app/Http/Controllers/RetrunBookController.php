<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Return_book;
use App\Book_issues;
use App\Book;
use App\Student;
class RetrunBookController extends Controller
{
    public function retunbook(Request $request)
    {
        
        $books=Book::all();
        $students=Student::all();
        $bookissue=Book_issues::where('id',$request->id)->first();
        return view('admin.returnbook')->with('students',$students)->with('books',$books)->with('bookissue',$bookissue);
      
    }
    public function retunBookrecord(Request $request){
        $data = ['issuedBy_Id' => $request->issuedBy_Id,
              'book_Id'=>$request->book_Id,
              'return_on'=>$request->return_on,
              'fine'=> $request->fine];
    $data=Return_book::create($data);
    if($data){
         return redirect()->back()->with('message','Book Isuue Succefully');
    }else{
         return redirect()->back()->with('error','Book not Isuue Succefully');
    }


    }
}
