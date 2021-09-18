<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Book_issues;
use App\Book;
use App\Student;
use App\Fine;
use DB;
use Auth;

class IssuebokController extends Controller
{
    //issue list
    public function index(){
       $Book_issues = Book_issues::with('books','students','fines')->get();
       return view('admin.bookissuelist')->with('Book_issues',$Book_issues);
    }
    public function issuebook(Request $request)
    {

        $student = Student::all();

        $book=Book::all();

        return view('admin.bookissue')->with('students',$student)->with('book' ,$book);
   /*   $std= DB::table('book_issues')
            ->join('students','students.id', '=' ,'book_issues.issuedBy_Id')
            ->join('books','book_issues.book_Id', '=','books.id')
            ->select('students.id as Studentid','students.name','books.title','books.id as Bookid',)
             ->get();
      return view('admin.bookissue', compact('std'));*/


}
public function saveissuebook(Request $request)
{
     $updatedata=['availableCopies'=>$request->availableCopies];
    $data = ['issuedBy_Id'=>$request->issuedBy_Id,
              'book_Id' => $request->book_Id,
              'issues_date' =>$request->issues_date,
              'return_date' => $request->return_date,
               'staffDetail' => $request->staff_detail,
               

           ];
          
     
     // Book::find($id)->increment('issuedcopies');
     // dd($data);
    $data = Book_issues::create($data);

    if($data){
         return redirect()->back()->with('message','Book Isuue Succefully');
    }else{
         return redirect()->back()->with('error','Book not Isuue Succefully');
    }


}

// public function updateissuebook(Request $request, $id)
//     {
//          $request->validate([
//             'issuedBy_Id'=>'required',
//             'book_Id'=>'required',
//             'issues_date'=>'required',
//             'return_date'=>'required',
//             'staffDetail'=>'required'

//         ]);

//         $std=Book_issues::find($id);
//         $std->issuedBy_Id=$request->input('issuedBy_Id');
//         $std->book_Id=$request->input('book_Id');
//         $std->issues_date=$request->input('issues_date');
//         $std->return_date=$request->input('return_date');
//         $std->staffDetail=$request->input('staffDetail');
//         $std->save();

//         return redirect('/issuelist')->with('message', 'Book update Successfuly');
//     }



//get data after click Update issue button

public function updateList (Request $request)
{

 $student=Student::all();
 $book=Book::all();
 $issue=Book_issues::where('id',$request->id)->first();
 dd($student,$book,$issue);
 return view('admin.update_list')->with('students',$student)->with('books' ,$book)->with('issue',$issue);
  // $data=Book_issues::where('id',$request->id)->first();
  // return view('admin.update_list')->with('data',$data)->render();

}


public function updateRecordlist(Request $request)
{
    
    $data=['book_Id'=>$request->book_Id,'issuedBy_Id'=>$request->issuedBy_Id,'issues_date'=>$request->issues_date,'return_date'=>$request->return_date,'staffDetail'=>$request->staffDetail];
    $update = Book_issues::where('id',$request->id)->update($data);
    if($update){
        return redirect()->back()->with('message','Update Successfuly');
    } else {
        return redirect()->back()->with('error','Update not Successfuly');
    }

}

public function deleteissuebook($id){
        $std=Book_issues::find($id);
        $std->delete();
        return redirect('/issuelist')->with('message','Delete Successfuly');
}


// public function returnbook(Request $request){
//        $returnbooks = Book_issues::with('books','students','fines')->get();
//        dd(returnbooks);
//        return view('admin.returnbook')->with('returnbooks',$returnbooks);
//     }

//click return book button get record 
public function returnbooks(Request $request)
{
    $books=Book::all();
    $fines=Fine::all();
    $students=Student::all();
  
    $bookissue=Book_issues::where('id',$request->id)->with('books','students','fines')->where('return_date', '>', date('Y-m-d').' 00:00:00')->orwhere('id',$request->id)->with('books','students','fines')->where('return_date', '<', date('Y-m-d').' 00:00:00')->first();
    return view('admin.returnbook')->with('bookissue',$bookissue)->with('students',$students)->with('books',$books)->with('fines',$fines);
}

// // return book record 
//  public function retunbookrecord(){
//       $Bookissues =Book_issues::with('books','students','studentfine')->get();
//   return view('admin.returnBookrecord')->with('Bookissues',$Bookissues);
//    }


   //return books

   public function retunBooksave(Request $request){

   $getfineid=DB::table('fines')->orderBy('id','desc')->first()->id;

     $request->validate([
   'return_on'=>'required',
   
    ]);
     
       $data=[
            'return_on'=>$request->return_on,
             'fine_id'=>$getfineid,
        ];
      
        $datas=[
            'receivefine'=>$request->receivefine,
            'fine'=>$request->fine,

        ];
     $insert=Fine::create($datas);
        $update =Book::where('id',$request->id)->update($data);

        return redirect('/issuelist')->with('message','Return Book Successfuly');
    }
   


      //return book record
     public function retunbookrecord(){
        $Bookissues =Book_issues::where('return_on','!=','null')->get();
      return view('admin.returnBookrecord')->with('Bookissues',$Bookissues);
 }


 //delete return books record

 public function delteReturnBook($id){
        $book=Book_issues::find($id);
    $book->delete();
   return redirect('/return-book-record')->with('message','Delete Successfuly');

}
}