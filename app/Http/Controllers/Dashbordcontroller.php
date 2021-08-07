<?php

namespace App\Http\Controllers;
use App\Book;
use App\Student;
use App\Book_issues;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Dashbordcontroller extends Controller
{
    public function counts()
    {
        $student=DB::table('students')->count();
        $book=DB::table('books')->count();
        $isusesbook=DB::table('book_issues')->count();
        $user=DB::table('users')->count();
        return view('admin.dashboard',compact('student','book','isusesbook','user'));
    }
}
