
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/sb-admin-2.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <!-- summernote css links -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>
<body id="page-top">
<!-- -->
    <div id="wrapper">
        @include('layouts.inc.admin-sidebar')
         
        <div id="content-wrapper" class="d-flex flex-column">
             <div id="content">
             @include('layouts.inc.admin-navbar')
             <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i -->
                            <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                </div>
                <div class="row">
                @yield('content')
                </div>
             </div>
              
         </div>
         @include('layouts.inc.admin-footer')
        </div>
    </div>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <!-- summernote js link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
   <script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
   <script>
    $(document).ready(function() {
        $("#mysummernote").summernote({
            height: 150,
        });
        $('.dropdown-toggle').dropdown();
    });

    let table = new DataTable('#myTable');
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    });
</script>
</body>
</html>
