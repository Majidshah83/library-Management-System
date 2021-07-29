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
                        <th>Update</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($Book_issues as $data)
                     <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->students->name}}</td>
                        <td>{{$data->books->title}}</td>
                        <td>{{$data->issues_date}}</td>
                        <td>{{$data->return_date}}</td>
                        <td><div class="container">
                              <button type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="{{'#studentupdateform' . $data->id }}"
                                 style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;">
                              Update List
                              </button>
                           </div>

                          <div class="modal fade" id="{{'studentupdateform' . $data->id }}" tabindex="-1"
                              role="dialog" aria-labelledby="IssueModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header border-bottom-0">
                                       <p class="modal-title" id="IssueModalLabel"
                                          style="font-size: 29px; font-weight: bold;">
                                          Update Issue List
                                       </p>
                                       <button type="button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <form action="/listupdate/{{$data->id}}" method="POST">
                                       @csrf
                                       <div class="modal-body">
                                          <div class="form-group">
                                            <input type="hidden" value="{{$data->id}}" name="id">
                                            <label for="issuedBy_Id">IssuebyId</label>
                                             <input type="text" class="form-control" id="issuedBy_Id" name="issuedBy_Id"
                                                aria-describedby="titleHelp" value="{{$data->issuedBy_Id}}">
                                          </div>
                                             <label for="student">Student</label>
                                             <input type="text" class="form-control" id="student" name="student"
                                                aria-describedby="titleHelp" placeholder="Enter name" value="{{$data->students->name}}" readonly>
                                          </div>
                                          <div class="form-group">
                                             <label for="book_Id">Book</label>
                                             <input type="text" class="form-control" id="book_Id" name="book_Id" value="{{$data->book_Id}}" placeholder="Enter  book name ">
                                          </div>
                                          <div class="form-group">
                                             <label for="book">Book</label>
                                             <input type="text" class="form-control" id="book" name="book" value="{{$data->books->title}}" placeholder="Enter  book name" readonly>
                                          </div>
                                          <div class="form-group">
                                             <label for="issues_date">Issue_Date</label>
                                             <input type="date" id="issues_date" name="issues_date" class="form-control" value="{{$data->issues_date}}">
                                          </div>
                                          <div class="form-group">
                                             <label for="return_date">Return_Date</label>
                                             <input type="date" class="form-control" id="return_date" name="return_date" value="{{$data->return_date}}">
                                          </div>
                               <div class="form-group">
                               <label for="staffDetail">Staff Detail</label>
                              <textarea class="form-control"  id="staffDetail" name="staffDetail" rows="3">{{$data->staffDetail}}</textarea>
                              </div>
                               <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                                       </div>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </td>
                        <td>  <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal"
                              style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;"
                              data-target="{{'#listdelete' .$data->id}}">
                           Delete List
                           </button>
                           <!-- Delete  Modal  -->
                           <div class="modal fade" id="{{'listdelete' . $data->id}}" tabindex="-1"
                              role="dialog" aria-labelledby="issueModalLabeldelete" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="issueModalLabeldelete" style="font-size: 21px;
                                          font-weight: bold;">Delete </h5>
                                       <button type=" button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p>Are you sure you want delete book issue </p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Close</button>
                                       <a class="btn btn-primary" href='/listdelete/{{ $data->id }}'>Delete</a>
                                       <!-- <button type="button" class="btn btn-primary">Delete -->
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@stop