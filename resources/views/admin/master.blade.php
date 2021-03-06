<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
<meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>Ubold - Responsive Admin Dashboard Template</title>

    <!--Morris Chart CSS -->
    @include('admin.include.style')

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->


</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
         @include('admin.include.header')
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->

       @include('admin.include.navbar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
         @yield('content');
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

     @include('admin.include.footer')
    </div>
    <!-- END wrapper -->

 @include('admin.include.script')
</body>

</html>
