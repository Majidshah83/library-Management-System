@extends('admin.master');
@include('admin.include.script');
@section('content');
<div class="content-page">
<div class="container">
   <div class="col-sm-12">
      <!-- Start Modal Add form -->
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#admin-form"
         style="margin-left: 89%;margin-top: 6%;margin-bottom: -8%;">
      Add Admin
      </button>
      <div class="modal fade" id="admin-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header border-bottom-0">
                  <p class="modal-title" id="exampleModalLabel" style="font-size: 29px; font-weight: bold;">
                     Add Admin
                  </p>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form action="{{url('add-admins')}}" method="POST">
                  @csrf
                  <div class="modal-body">
                     <div class="form-group">
                        <label for="Title">Name</label>
                        <input type="text" class="form-control" id="text1" name="name"
                           aria-describedby="titleHelp" placeholder="Enter name">
                     </div>
                     <div class="form-group">
                        <label for="Title">Email</label>
                        <input type="email" class="form-control" id="text1" name="email"
                           aria-describedby="titleHelp" placeholder="Enter Email">
                     </div>
                     <div class="form-group">
                        <label for="Title">Password</label>
                        <input type="password" class="form-control" id="text1" name="password"
                           aria-describedby="titleHelp" placeholder="Enter Password">
                     </div>
                     <div class="form-group">
                        <label for="department">Select Role</label></br>
                        <select class="form-control" aria-label=".form-select-sm example" name="role">
                           <option selected>Manger</option>
                           <option>Admin</option>
                           <option>Operator</option>
                        </select>
                     </div>
                  </div>
                  <div class="modal-footer border-top-0 d-flex justify-content-center">
                     <button type="submit" class="btn btn-success">Save</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="card-box table-responsive" style="padding: inherit;margin-top: 9%;">
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
                  <th>Name</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>role</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($user as $data)
               <tr>
                  <td>{{$data->id}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->password}}</td>
                  <td>{{$data->role}}</td>
                  <td><a href="{{url('delete-admin',$data->id)}}" class="btn btn-danger">Delete Role</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@stop
