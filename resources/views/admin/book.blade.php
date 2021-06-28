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

                                    <!-- update modal-->
                                    <td>
                                        <div class="container">
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="{{ '#Updateform' . $data->id }}"
                                                style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;">
                                                Update Book
                                            </button>
                                        </div>
                                        <div class="modal fade" id="{{ 'Updateform' . $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header border-bottom-0">
                                                        <p class="modal-title" id="exampleModalLabel"
                                                            style="font-size: 29px; font-weight: bold;">
                                                            Update Book</p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="/update/{{$data->id}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="Title">Book Title</label>
                                                                <input type="hidden" value={{$data['id']}} name="id">
                                                                <input type="text" class="form-control" id="text1"
                                                                    name="title" aria-describedby="titleHelp"
                                                                    placeholder="Enter Title" value="{{$data['title']}}"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="pircebook">Book Price</label>
                                                                <input type="text" class="form-control" id="pircebook"
                                                                    name="price" placeholder="Enter Price"
                                                                    value="{{$data['price']}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="auther">Book Auther</label>
                                                                <input type="text" class="form-control" id="auther"
                                                                    name="auther" placeholder="Enter Auther Name"
                                                                    value="{{$data['auther']}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="bookedition">Book Edition</label>
                                                                <input type="text" class="form-control" id="bookedition"
                                                                    placeholder="Enter Edition" name="edition"
                                                                    value="{{$data['edition']}}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="categorybook">Book Category</label>
                                                                <input type="text" class="form-control"
                                                                    id="categorybook" name="category"
                                                                    placeholder="Enter Category"
                                                                    value="{{$data['category']}}" required>
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
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            style=" margin-bottom:9px; margin-left:-2px; margin-top:11px; border-radius: 61px;"
                                            data-target="{{'#deleteModal' .$data->id}}">

                                            Delete Book
                                        </button>
                                        <!-- Delete  Modal  -->
                                        <div class="modal fade" id="{{'deleteModal' . $data->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="font-size: 21px;
                                                            font-weight: bold;">Delete Book</h5>
                                                        <button type=" button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want delete book</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <a class="btn btn-primary"
                                                            href='delete/{{ $data->id }}'>Delete</a>
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