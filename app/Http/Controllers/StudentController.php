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
    $req->validate([
    'name' => 'required',
    'regno' => 'required',
    'date_of_issue' => 'required',
    'date_of_return' => 'required',
    'course' => 'required',
    'department' => 'required',
    'gender' => 'required',
    

]);
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


public function update(Request $req,$id){
    $req->validate([
   'name'=>'required',
    'regno' => 'required',
    'date_of_issue' => 'required',
    'date_of_return' => 'required',
    'course' => 'required',
    'department' => 'required',
    'gender' => 'required',
    ]);
    $student=Student::find($id);
    $student->name=$req->input('name');
    $student->regno=$req->input('regno');
     $student->date_of_issue=$req->input('date_of_issue');
     $student->date_of_return=$req->input('date_of_return');
    $student->course=$req->input('course');
     $student->department=$req->input('department');
     $student->gender=$req->input('gender');
     $student->save();
     return redirect('/student')->with('success','Student update Successfuly');
 }
 public function deleteStudent($id){
    $student=Student::find($id);
    $student->delete();
    return redirect('/student')->with('success','Delete Student Successfuly');
 }

}