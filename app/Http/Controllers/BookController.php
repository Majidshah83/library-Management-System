<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Book;
class BookController extends Controller
{     //Show book detail
    public function showbook(){
        $books=Book::all();
        return view('admin.book',compact('books'));

    }
    //Insert book deatil
    public function addBook(Request $req){
$req->validate([
    'title' => 'required',
    'price' => 'required',
    'auther'=>'required',
     'edition'=>'required',
     'category'=>'required'

]);
       $book=new Book;
       $book->title=$req->title;
       $book->price=$req->price;
       $book->auther=$req->auther;
       $book->edition=$req->edition;
       $book->category=$req->category;
    //    dd($book);
       $book->save();
       return redirect('/book')->with('message','Book Added Successfuly');

    }
    // public function update(Request $req, $id)
    // {
    //     $req->validate([
    //         'title'=>'required',
    //         'price'=>'required',
    //         'auther'=>'required',
    //         'edition'=>'required',
    //         'category'=>'required'
    //     ]);
    //     $book=Book::find($id);
    //     $book->title=$req->input('title');
    //     $book->price=$req->input('price');
    //     $book->auther=$req->input('auther');
    //     $book->edition=$req->input('edition');
    //     $book->category=$req->input('category');
    //     $book->save();

    //     return redirect('/book')->with('success', 'Book update Successfuly');
    // }

   //get data books
    public function updateBook(Request $request){
        $book=Book::where('id',$request->id)->first();
       return view('admin.update_book')->with('book',$book)->render();
    }
     //updat data books
public function updateRecordBook (Request $request){

   $data = ['title' => $request->title,'price' => $request->price,'auther' => $request->auther,'edition' => $request->edition,'category'=>$request->category];
    // dd($data);
   $update = Book::where('id',$request->id)->update($data);
    if($update){
        return redirect()->back()->with('message','Update Successfuly');
    } else {
        return redirect()->back()->with('error','Update not Successfuly');
    }

 }
   //Delete data books
  public function deleteBook($id){
          $contact = Book::find($id);
          $contact->delete();
          return redirect('/book')->with('message','Book Delete Successfuly');
    }

}