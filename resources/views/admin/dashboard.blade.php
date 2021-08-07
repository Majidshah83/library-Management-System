@extends('admin.master');
@section('content')
        <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                    <ul class="dropdown-menu drop-menu-right" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>

                                <h4 class="page-title">Dashboard</h4>
                                <p class="text-muted page-title-alt">Welcome to Ubold admin panel !</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box fadeInDown animated" style="
    background-color: yellow;
">
                                    <div class="bg-icon bg-icon-info pull-left" style="background-color:violet;">
                                        <i class="ti-user"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter" style="color: black;">{{ $student }}</b></h3>
                                        <p class="text-muted" style=" color: black;font-size: 18px;">Total Student</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box" style="
    background-color: rebeccapurple;
">
                                    <div class="bg-icon bg-icon-pink pull-left" style="
    background-color: white;
">
                                       <i class="ti-book"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter" style="color: white;
">{{ $book }}</b></h3>
                                        <p class="text-muted" style=" color: white; font-size: 18px;">Total Book</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box" style="
    background-color: navajowhite;
">
                                    <div class="bg-icon bg-icon-purple pull-left">
                                          <i class="ti-book"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{ $isusesbook }}</b></h3>
                                        <p class="text-muted">Issue Book</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="widget-bg-color-icon card-box" style="
    background-color: black;
">
                                    <div class="bg-icon bg-icon-success pull-left">
                                       <i class="ti-user"></i>
                                    </div>
                                    <div class="text-right">
                                        <h3 class="text-dark"><b class="counter">{{ $user }}</b></h3>
                                        <p class="text-muted">Admins</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12">
            <div class="card-box table-responsive" style="
    margin-top: 7%;
    border-width: 5px;
    border-color: blue;">
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
                <h3>Late Students</h3>
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
                        
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2016. All rights reserved.
                </footer>

            </div>
@stop