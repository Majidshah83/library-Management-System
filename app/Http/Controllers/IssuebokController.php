<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book_issues;
use App\Book;
use App\Student;
use DB;
class IssuebokController extends Controller
{
    public function index(){
       $Book_issues = Book_issues::with('books','students')->get();
       return view('admin.bookissuelist')->with('Book_issues',$Book_issues);
    }
    public function issuebook()
    {

        $student = Student::all();
        $book    = Book::all();
        return view('admin.bookissue')->with('students',$student)->with('books' ,$book);

   /*   $std= DB::table('book_issues')
            ->join('students','students.id', '=' ,'book_issues.issuedBy_Id')
            ->join('books','book_issues.book_Id', '=','books.id')
            ->select('students.id as Studentid','students.name','books.title','books.id as Bookid',)
             ->get();
      return view('admin.bookissue', compact('std'));*/
    
   
}
public function saveissuebook(Request $request)
{

    $data = ['issuedBy_Id' => $request->issuedBy_Id,
              'book_Id' => $request->book_Id,
              'issues_date' =>$request->issues_date,
              'return_date' => $request->return_date,
               'staffDetail' => $request->staff_detail];
               
    $data = Book_issues::create($data);
    if($data){
         return redirect()->back()->with('success','Book Isuue Succefully');   
    }else{
         return redirect()->back()->with('error','Book not Isuue Succefully');   
    }


}

public function updateissuebook(Request $request, $id)
    {
         $request->validate([
            'issuedBy_Id'=>'required',
            'book_Id'=>'required',
            'issues_date'=>'required',
            'return_date'=>'required',
            'staffDetail'=>'required'
           
        ]);

        $std=Book_issues::find($id);
        $std->issuedBy_Id=$request->input('issuedBy_Id');
        $std->book_Id=$request->input('book_Id');
        $std->issues_date=$request->input('issues_date');
        $std->return_date=$request->input('return_date');
        $std->staffDetail=$request->input('staffDetail');
        $std->save();

        return redirect('/issuelist')->with('success', 'Book update Successfuly');
    }

public function deleteissuebook($id){
        $std=Book_issues::find($id);
        $std->delete();
        return redirect('/issuelist')->with('success','Delete Successfuly');
}

   

}
