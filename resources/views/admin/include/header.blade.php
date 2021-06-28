 <div id="wrapper" style="overflow:scroll;">

     <!-- Top Bar Start -->
     <div class="topbar">

         <!-- LOGO -->
         <div class="topbar-left">
             <div class="text-center">
                 <a href="/dashboard" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Library <i
                             class="md md-album"></i></span></a>
                 <!-- Image Logo here -->

             </div>
         </div>

         <!-- Button mobile view to collapse sidebar menu -->
         <div class="navbar navbar-default" role="navigation">
             <div class="container">
                 <div class="">
                     <ul class="nav navbar-nav navbar-right pull-right">
                         <li class="dropdown top-menu-item-xs">

                             <ul class="dropdown-menu dropdown-menu-lg">
                                 <li class="notifi-title"><span class="label label-default pull-right">New
                                         3</span>Notification</li>
                                 <li class="list-group slimscroll-noti notification-list">
                                     <!-- list item-->



                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                         <div class="media">
                                             <div class="pull-left p-r-10">
                                                 <em class="fa fa-bell-o noti-custom"></em>
                                             </div>
                                             <div class="media-body">
                                                 <h5 class="media-heading">Updates</h5>
                                                 <p class="m-0">
                                                     <small>There are <span class="text-primary font-600">2</span> new
                                                         updates available</small>
                                                 </p>
                                             </div>
                                         </div>
                                     </a>

                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                         <div class="media">
                                             <div class="pull-left p-r-10">
                                                 <em class="fa fa-user-plus noti-pink"></em>
                                             </div>
                                             <div class="media-body">
                                                 <h5 class="media-heading">New user registered</h5>
                                                 <p class="m-0">
                                                     <small>You have 10 unread messages</small>
                                                 </p>
                                             </div>
                                         </div>
                                     </a>

                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                         <div class="media">
                                             <div class="pull-left p-r-10">
                                                 <em class="fa fa-diamond noti-primary"></em>
                                             </div>
                                             <div class="media-body">
                                                 <h5 class="media-heading">A new order has been placed A new order has
                                                     been placed</h5>
                                                 <p class="m-0">
                                                     <small>There are new settings available</small>
                                                 </p>
                                             </div>
                                         </div>
                                     </a>

                                     <!-- list item-->
                                     <a href="javascript:void(0);" class="list-group-item">
                                         <div class="media">
                                             <div class="pull-left p-r-10">
                                                 <em class="fa fa-cog noti-warning"></em>
                                             </div>
                                             <div class="media-body">
                                                 <h5 class="media-heading">New settings</h5>
                                                 <p class="m-0">
                                                     <small>There are new settings available</small>
                                                 </p>
                                             </div>
                                         </div>
                                     </a>
                                 </li>
                                 <li>
                                     <a href="javascript:void(0);" class="list-group-item text-right">
                                         <small class="font-600">See all notifications</small>
                                     </a>
                                 </li>
                             </ul>
                         </li>

                         <li class="dropdown top-menu-item-xs">
                             <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown"
                                 aria-expanded="true"><img src="assets/images/users/avatar-1.jpg" alt="user-img"
                                     class="img-circle"> </a>
                             <ul class="dropdown-menu">
                                 <li><a href="javascript:void(0)"><i class="ti-user m-r-10 text-custom"></i> Profile</a>
                                 </li>
                                 <li><a href="{{url('/logout')}}"><i class="ti-power-off m-r-10 text-danger"></i>
                                         Logout</a></li>
                             </ul>
                         </li>
                     </ul>
                 </div>
                 <!--/.nav-collapse -->
             </div>
         </div>
     </div>
     <!-- Top Bar End -->


     <!-- ========== Left Sidebar Start ========== -->
     @include('admin.include.navbar')

     <!-- Left Sidebar End -->



     <!-- ============================================================== -->
     <!-- Start right Content here -->
     <!-- ============================================================== -->
     @yield('content');
     <!-- ============================================================== -->
     <!-- End Right content here -->
     <!-- ============================================================== -->


 </div>