<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    //show student record
    public function show()
    {
        $student=Student::all();
        return view('admin.student',compact('student'));
    }

    //Add student record
    public function addstudent(Request $req){
     $student=new Student();
     $student->name=$req->name;
     $student->regno=$req->regno;
     $student->date_of_issue=$req->date_of_issue;
     $student->date_of_return=$req->date_of_return;
     $student->course=$req->course;
     $student->department=$req->department;
     $student->gender=$req->gender;
     $student->save();
     // dd($student);
     return redirect('/student')->with('success','Student Added Successfuly');
    }
}