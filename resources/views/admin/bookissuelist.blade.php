@extends('admin.master');
@include('admin.include.script');
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
                @if(session('message'))
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
                                <button type="button" class="btn btn-primary" onclick="Updatelist({{$data}})">Update list</button>
                                <a href="{{url('listdelete',$data->id)}}" class="btn btn-success botton">Delete
                                    Student</a>
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

<!-- Modal -->
<div class="modal" id="update-list">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Boook Record</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div id="update-data-list">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function Updatelist(data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let id = data['id'];
    $.ajax({
        type: 'POST',
        url: "{{url('update-list')}}",
        data: {
            id: id
        },
        success: function(data) {

            $('#update-list').modal('show');
            $('#update-data-list').html('');
            $('#update-data-list').append(data);
        }
    });
}
</script>

<style type="text/css">
.botton {
    margin-right: 20px;
}


</sty le>@stop