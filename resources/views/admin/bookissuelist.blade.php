@extends('admin.master');
@section('content');
<div class="content-page">
   <div class="container" style="margin-top:3%;">
      <!-- session insert successfuly -->
      <!-- Page-Title -->
         <div class="col-sm-12">
            <div class="card-box table-responsive">
               @if(count($errors)>0)
               @foreach ($errors->all() as $errors)
               <p class="alert alert-danger">{{$errors}}</p>
               @endforeach
               @endif
               @if(session('success'))
               <div class="alert alert-success">
                  <strong>{{session('success')}}</strong>
               </div>
               @endif
               <table id="datatable" class="table table-striped table-bordered">
                  <thead>
                     <tr>
                        <th>Id</th>
                  
                        <th>Std Name</th>
                        <th>Book Name</th>
                        <th>Issue_Date</th>
                        <th>Return_Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Book_issues as $data)
                     <tr>
                        <td>{{$data->id}}</td>
                        <td>@if($data->students) {{$data->students->name}} @endif()</td>
                        <td>@if($data->books) {{$data->books->title}} @endif()</td>
                        <td>{{$data->issues_date}}</td>
                        <td>{{$data->return_date}}</td>
                        <td>
                           <button type="button" class="btn btn-primary botton" onclick="UpdateBookIssue({{$data}})"> 
                              Update Student
                           </button>
                           <a href="{{url('listdelete',$data->id)}}" class="btn btn-success botton">Delete Student</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<style type="text/css">
   
   .botton{
      margin-right: 20px;
   }
</style>
@stop