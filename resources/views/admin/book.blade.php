@extends('admin.master');

@section('content');
<!-- add css -->
<div class="content-page">

    <!-- Start content -->
    <div class="content">
        <div class="container">
            <!-- session insert successfuly -->
            @if(session('success'))
            <div class="alert alert-success">
                <strong>{{session('success')}}</strong>
            </div>
            @endif

            <!-- Start Modal Add form -->
            <div class="container">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form"
                    style=" margin-bottom: 20px; margin-left: 90%;">
                    Add Book
                </button>
            </div>
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
                                        aria-describedby="titleHelp" placeholder="Enter Title" required>

                                </div>
                                <div class="form-group">
                                    <label for="pircebook">Book Price</label>
                                    <input type="text" class="form-control" id="pircebook" name="price"
                                        placeholder="Enter Price" required>
                                </div>
                                <div class="form-group">
                                    <label for="auther">Book Auther</label>
                                    <input type="text" class="form-control" id="auther" name="auther"
                                        placeholder="Enter Auther Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="bookedition">Book Edition</label>
                                    <input type="text" class="form-control" id="bookedition" placeholder="Enter Edition"
                                        name="edition" required>
                                </div>
                                <div class="form-group">
                                    <label for="categorybook">Book Category</label>
                                    <input type="text" class="form-control" id="categorybook" name="category"
                                        placeholder="Enter Category" required>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">

                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"><b>Default Example</b></h4>
                        <p class="text-muted font-13 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it
                            with
                            your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Auther</th>
                                    <th>Edition</th>
                                    <th>Category</th>
                                    <th>Update</th>
                                    <th>Delete</th>

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
                                    <td>
                                        <!-- Update modal -->
                                        <div class="container">
                                            <button type="button" class="btn btn-primary rounded-pill"
                                                data-toggle="modal" data-target="#Updateform"
                                                style="margin-bottom:9px;margin-left:1%;margin-top:4px;">
                                                Update
                                            </button>
                                        </div>
                                        <div class="modal fade" id="Updateform" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0">
                                                        <p class="modal-title" id="exampleModalLabel"
                                                            style="font-size: 29px; font-weight: bold;">Update Book</p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="/add" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="Title">Book Title</label>
                                                                <input type="text" class="form-control" id="text1"
                                                                    name="title" aria-describedby="titleHelp"
                                                                    placeholder="Enter Title" required>

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pircebook">Book Price</label>
                                                                <input type="text" class="form-control" id="pircebook"
                                                                    name="price" placeholder="Enter Price" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="auther">Book Auther</label>
                                                                <input type="text" class="form-control" id="auther"
                                                                    name="auther" placeholder="Enter Auther Name"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bookedition">Book Edition</label>
                                                                <input type="text" class="form-control" id="bookedition"
                                                                    placeholder="Enter Edition" name="edition" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="categorybook">Book Category</label>
                                                                <input type="text" class="form-control"
                                                                    id="categorybook" name="category"
                                                                    placeholder="Enter Category" required>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="modal-footer border-top-0 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-success">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <!-- Delete modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style="font-size: 20px; font-weight: bold;">Delete Book</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="color:red;">Are you sure you want to delete book?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Delete</button>
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