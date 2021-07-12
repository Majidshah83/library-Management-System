<?php


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Student;
class StudentController extends Controller
{ 
   
    public function show()
    {
        $student=Student::all();
        return view('admin.student',compact('student'));
    }

    }