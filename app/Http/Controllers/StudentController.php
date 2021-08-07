<?php
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\Book;
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
    'department' => 'required',
    'gender' => 'required',


]);
     $student=new Student();
     $student->name=$req->name;
     $student->regno=$req->regno;
     $student->department=$req->department;
     $student->gender=$req->gender;
     $student->save();
     // dd($student);
     return redirect('/student')->with('message','Student Added Successfuly');
    }


public function update(Request $req,$id){
    $req->validate([
   'name'=>'required',
    'regno' => 'required',
    'department' => 'required',
    'gender' => 'required',
    ]);
    $student=Student::find($id);
    $student->name=$req->input('name');
    $student->regno=$req->input('regno');
     $student->department=$req->input('department');
     $student->gender=$req->input('gender');
     $student->save();
     return redirect('/student')->with('message','Student update Successfuly');
 }
 public function deleteStudent($id){
    $student=Student::find($id);
    $student->delete();
    return redirect('/student')->with('message','Delete Student Successfuly');
 }

// public function index()
// {
// $std=Student::first();
// $book=Book::first();

// $std->books()->attach($issuedById);
// }

 public function updateStudent(Request $request){

   $student = Student::where('id',$request->id)->first();
   return view('admin.update_student')->with('student',$student)->render();

 }




public function updateRecordStudent (Request $request){

   $data = ['name' => $request->name,'regno' => $request->regno,'department' => $request->department,'gender' => $request->gender];
    $update = Student::where('id',$request->id)->update($data);
    if($update){
        return redirect()->back()->with('message','Update Successfuly');
    } else {
        return redirect()->back()->with('error','Update not Successfuly');
    }

 }


 //dashbord count student 
public function countStudent()
{
  // $studentscount=Student::count();
  $studentscount=DB::table('students')->count();
  return view('admin.dashboard', compact('studentscount'));
 
}

}
