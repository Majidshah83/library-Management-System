@extends('admin.master');
@include('admin.include.script');
@section('content');
<div class="content-page">
    <div class="container" style="margin-top:3%;">
        <!-- session insert successfuly -->
        <!-- Page-Title -->
        <div class="col-sm-12">
            <div class="card-box table-responsive" style=" margin-top: 20px;">
                @if(count($errors)>0)
                @foreach ($errors->all() as $errors)
                <p class="alert alert-danger">{{$errors}}</p>
                @endforeach
                @endif
                @if(session('message'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
                @endif
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Student Name</th>
                            <th>Book Name</th>
                            <th>Return On</th>
                            <th>Fine</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Bookissues as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->students->name}}</td>
                            <td>{{$data->books->title}}</td>
                            <td>{{$data->return_on}}</td> 
                            <td>{{$data->fine}}</td>   
                            <td> <a href="{{url('returnbook',$data->id)}}" class="btn btn-danger botton">Delete Return Book</a></td>                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
