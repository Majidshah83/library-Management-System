@extends('admin.master');

@section('content');
<!-- add css -->
     <div class="content-page">

            <!-- Start content -->
            <div class="content">
                <div class="container">
     <!-- Start Modal Add form -->
<div class="container">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#form" style=" margin-bottom: 20px; margin-left: 90%;">
    Add Book
  </button>
</div>
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <p class="modal-title" id="exampleModalLabel" style="font-size: 29px; font-weight: bold;">Add Book</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/add" method="POST">
      @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="Title">Book Title</label>
            <input type="text" class="form-control" id="text1" name="title" aria-describedby="titleHelp" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label for="pircebook">Book Price</label>
            <input type="text" class="form-control" id="pircebook"  name="price" placeholder="Enter Price">
          </div>
         <div class="form-group">
            <label for="auther">Book Auther</label>
            <input type="text" class="form-control" id="auther"  name="auther" placeholder="Enter Auther Name">
          </div>
          <div class="form-group">
            <label for="bookedition">Book Edition</label>
            <input type="text" class="form-control" id="bookedition" placeholder="Enter Edition" name="edition" >
          </div>
          <div class="form-group">
            <label for="categorybook">Book Category</label>
            <input type="text" class="form-control" id="categorybook" name="category" placeholder="Enter Category">
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
                                            <td>Update</td>
                                            <td>Delete</td>

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
