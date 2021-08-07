@extends('admin.master');
@section('content');
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
                                <th>Department</th>
                                <th>Gender</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->regno}}</td>
                                <td>{{$data->department}}</td>
                                <td>{{$data->gender}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btton"
                                        onclick="UpdateStudent({{$data}})">
                                        Update Student
                                    </button>
                                    <a href="{{url('deletestudent',$data->id)}}" class="btn btn-success">Delete
                                        Student</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- The Modal -->

            <div class="modal" id="update-student">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Update Student</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div id="update-data-student"></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<script type="text/javascript">
function UpdateStudent(data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let id = data['id'];
    $.ajax({
        type: 'POST',
        url: "{{url('update-student')}}",
        data: {
            id: id
        },
        success: function(data) {

            $('#update-student').modal('show');
            $('#update-data-student').html('');
            $('#update-data-student').append(data);
        }
    });
}
</script>
<style type="text/css">
.btton {
    margin-right: 20px;
}
</style>
@stop