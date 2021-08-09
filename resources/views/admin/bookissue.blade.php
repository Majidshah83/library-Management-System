@extends('admin.master');c
@section('content');
<div class="content-page">
    <style>
    .form-control {
        border-color: black;
    }

    .title {
        text-align: center;
        color: blue;
        font-weight: bold;
    }

    label {
        color: blue;
        font-weight: bold;
        font-size: 16px;
    }
    </style>
    <div class="container" style="margin-top: 2%;">
        <form action="{{url('/issue-book')}}" method="POST">
            @csrf
            <div class="modal-body">
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
                <h1 class="title">Issue Book</h1>
                <div class="form-group">
                    <label for="issuedBy_Id">Select Student:</label>
                    <select class="form-control" id="issuedBy_Id" name="issuedBy_Id">
                        @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                        if()
                        <option value="audi" selected>Audi</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="book_Id">Select Book:</label>
                    <select class="form-control" id="book_Id" name="book_Id">
                        @foreach($books as $book)
                        <option value="{{$book->id}}">{{$book->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="issues_date">Issue Date</label>
                    <input type="date" class="form-control" id="issues_date" name="issues_date">
                </div>
                <div class="form-group">
                    <label for="return_date">Return Date</label>
                    <input type="date" class="form-control" id="return_date" name="return_date">
                </div>
                <div class="form-group">
                    <label for="staffDetail">Staff Detail</label>
                    <textarea class="form-control" id="staffDetail" name="staff_detail" rows="3"></textarea>
                </div>
                <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </form>

    <
/div>
</div>
@stop