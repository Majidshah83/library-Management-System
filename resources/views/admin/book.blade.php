@include('admin.include.script');
@extends('admin.master');
@section('content');
<!-- add css -->
<!-- Start content -->
<div class="content-page">
    <div class="container">
        <!-- session insert successfuly -->

        <!-- Page-Title -->
        <div class="row mt-8">
            <!-- Start Modal Add form -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form"
                style="  margin-left: 90%;margin-top: 26px;margin-bottom: 2%;">
                Add Book
            </button>
            <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <p class="modal-title" id="exampleModalLabel" style="font-size: 29px; font-weight: bold;">
                                Add Book</p>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/add" method="POST">


                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Title">Book Title</label>
                                    <input type="text" class="form-control" id="text1" name="title"
                                        aria-describedby="titleHelp" placeholder="Enter Title">

                                </div>
                                <div class="form-group">
                                    <label for="pircebook">Book Price</label>
                                    <input type="text" class="form-control" id="pircebook" name="price"
                                        placeholder="Enter Price">
                                </div>
                                <div class="form-group">
                                    <label for="auther">Book Auther</label>
                                    <input type="text" class="form-control" id="auther" name="auther"
                                        placeholder="Enter Auther Name">
                                </div>
                                <div class="form-group">
                                    <label for="bookedition">Book Edition</label>
                                    <input type="text" class="form-control" id="bookedition" placeholder="Enter Edition"
                                        name="edition">
                                </div>
                                <div class="form-group">
                                    <label for="categorybook">Book Category</label>
                                    <input type="text" class="form-control" id="categorybook" name="category"
                                        placeholder="Enter Category">
                                </div>
                                <div class="form-group">
                                    <label for="availableCopies">Number of Copies</label>
                                    <input type="text" class="form-control" id="availableCopies" name="availableCopies"
                                        placeholder="Enter availableCopies">
                                </div>
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
                    @if(session('message'))
                    <div class="alert alert-success">
                        <strong>{{session('message')}}</strong>
                    </div>
                    @endif
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Auther</th>
                                <th>Edition</th>
                                <th>Category</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($books as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data->auther}}</td>
                                <td>{{$data->edition}}</td>
                                <td>{{$data->category}}</td>

                                <!-- update modal-->
                                <td>
                                    <button type="button" class=" btn btn-primary"
                                        onclick="UpdateBook({{$data}})">Update Book</button>
                                    <a href="{{url('bookdelete',$data->id)}}" class="btn btn-success">Delete</a>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal" id="update-book">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Boook Record</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div id="update-data-book">

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
<script>
    function UpdateBook(data) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let id = data['id'];
    $.ajax({
        type: 'POST',
        url: "{{url('update-book')}}",
        data: {
            id: id
        },
        success: function(data) {

            $('#update-book').modal('show');
            $('#update-data-book').html('');
            $('#update-data-book').append(data);
        }
    });
}
</script>

@stop
