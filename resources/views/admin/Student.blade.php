@extends('admin.master');
@section('content');
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $(document).on("click", ".updatestudent-modal", function() {
  var id = $(this).val();  
  url = "/127.0.0.1:8000/student/show"+id;
  alert("helo majid");
  $.ajax({
    url: url,
    method: "post"    
  }).done(function(response) {
    //Setting input values
    $("input[name='id']").val(id);
    $("input[name='name']").val(response.name);
    $("input[name='regno']").val(response.regno);
    $("input[name='date_of_issue']").val(response.date_of_issue);
     $("input[name='date_of_return']").val(response.date_of_return);
      $("input[name='course']").val(response.course);
      $("input[name='department']").val(response.department);
      $("input[name='gender']").val(response.gender);
      $("input[name='gender']").val(response.gender);

    //Setting submit url
    $("studentupdateform").attr("action","/127.0.0.1:8000/student/show"+id)
  });
});
</script>
<div class="content-page">
   <div class="container">
      <!-- session insert successfuly -->
      <!-- Page-Title -->
      <div class="row mt-8">
         <!-- Start Modal Add form -->
         <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form"
            style="  margin-left: 90%;margin-top: 26px;margin-bottom: 2%;">
         Add Student
         </button>
         <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
               <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                     <p class="modal-title" id="exampleModalLabel" style="font-size: 29px; font-weight: bold;">
                        Add Student 
                     </p>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <form action="/addbook" method="POST">
                     @csrf
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="Title">Student name</label>
                           <input type="text" class="form-control" id="text1" name="name"
                              aria-describedby="titleHelp" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                           <label for="regno">Student RegNo</label>
                           <input type="text" class="form-control" id="regno" name="regno"
                              placeholder="Enter RegNo">
                        </div>
                        <div class="form-group">
                           <label for="date_of_issue">Issue_Date</label>
                           <input type="date" id="date_of_issue" name="date_of_issue" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="date_of_return">Return_Date</label>
                           <input type="date" class="form-control" id="date_of_return" name="date_of_return">
                        </div>
                        <div class="form-group">
                           <label for="course">Course</label>
                           <input type="text" class="form-control" id="course" name="course"
                              placeholder="Enter course">
                        </div>
                        <div class="form-group">
                           <label for="department">Department</label>
                           <input type="text" class="form-control" id="department" name="department"
                              placeholder="Enter course">
                        </div>
                        <label for="department">Gender</label> </br>
                        <input type="radio" name="gender" value="Male" id="male"> Male
                        <input type="radio" name="gender" value="Female" id="female"> Female
                     </div>
                     <div class="modal-footer border-top-0 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
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
                        <th>Name</th>
                        <th>RegNo</th>
                        <th>Issue_Date</th>
                        <th>Return_Date</th>
                        <th>Course</th>
                        <th>Department</th>
                        <th>Gender</th>
                        <th>Update</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($student as $data)
                     <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->regno}}</td>
                        <td>{{$data->date_of_issue}}</td>
                        <td>{{$data->date_of_return}}</td>
                        <td>{{$data->course}}</td>
                        <td>{{$data->department}}</td>
                        <td>{{$data->gender}}</td>
                        <!-- update modal-->
                        <td>
                           <div class="container">
                              <button type="button" class="btn btn-primary updatestudent-modal" data-toggle="modal"
                                 data-target="{{'#studentupdateform' . $data->id }}"
                                 style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;">
                              Update Student
                              </button>
                           </div>
                           
                        </td>
                        <td>
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-danger" data-toggle="modal"
                              style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;"
                              data-target="{{'#deletestudent' .$data->id}}">
                           Delete Student
                           </button>
                           <!-- Delete  Modal  -->
                           <div class="modal fade" id="{{'deletestudent' . $data->id}}" tabindex="-1"
                              role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel" style="font-size: 21px;
                                          font-weight: bold;">Delete </h5>
                                       <button type=" button" class="close" data-dismiss="modal"
                                          aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                    <div class="modal-body">
                                       <p>Are you sure you want delete Student</p>
                                    </div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary"
                                          data-dismiss="modal">Close</button>
                                       <a class="btn btn-primary" href='deletestudent/{{ $data->id }}'>Delete</a>
                                       <!-- <button type="button" class="btn btn-primary">Delete -->
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
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
@stop