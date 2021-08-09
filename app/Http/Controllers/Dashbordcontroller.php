<?php

namespace App\Http\Controllers;
use App\Book;
use App\Student;
use App\Book_issues;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashbordcontroller extends Controller
{
    public function counts()
    {
        $orders = Book_issues::with('books','students')->where('return_date', '<=', date('Y-m-d').' 00:00:00')->get();
     // $books=Book::all();
     //    $students=Student::all();
        $student=DB::table('students')->count();
        $book=DB::table('books')->count();
        $isusesbook=DB::table('book_issues')->count();
        $user=DB::table('users')->count();
         return view('admin.dashboard')->with('student',$student)->with('book' ,$book)->with('isusesbook',$isusesbook)->with('user',$user)->with('orders',$orders);
 }


}
