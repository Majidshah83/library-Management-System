@extends('admin.master');
@section('content');
<div class="content-page">
  <style>
    .form-control{
      border-color: black;
    }
    .title{
         text-align: center;
         color: blue;
         font-weight: bold;
    }
    label{
      color: blue;
      font-weight: bold;
      font-size: 16px;
    }
  </style>
    <div class="container" style="margin-top: 2%;">
   <form action="/add" method="POST">
                            @csrf
                            <div class="modal-body">
                              <h1 class="title">Issue Book</h1>
                              <div class="form-group">
                              <label for="student">Select Student:</label>
                            <select class="form-control" id="student">
                            <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           </select>
                              </div>
                            <div class="form-group">
                              <label for="book">Select Book:</label>
                            <select class="form-control" id="book">
                            <option>1</option>
                           <option>2</option>
                           <option>3</option>
                           <option>4</option>
                           </select>
                              </div>
                                <div class="form-group">
                                    <label for="issuesFrom">Issues From</label>
                                    <input type="date" class="form-control" id="issuesFrom" name="issuesFrom">
                                </div>
                                <div class="form-group">
                                    <label for="issuedTo">Issued To</label>
                                    <input type="date" class="form-control" id="issuedTo" name="issuedTo">
                                </div>
                                <div class="form-group">
                               <label for="staffDetail">Staff Detail</label>
                              <textarea class="form-control" id="staffDetail" name="staffDetail" rows="3"></textarea>
                              </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>

    </div>
  </div>
@stop