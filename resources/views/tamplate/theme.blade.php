<!doctype html>
<html lang="en">

<head>
    <title>
        @if(isset($title))
            {{$title}}
        @endif
    </title>
    <!-- perlu jika kalau mau pakai ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- perlu jika kalau mau pakai ajax -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('tamplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('tamplate/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('tamplate/assets/vendor/linearicons/style.css')}}">
    <link rel="stylesheet" href="{{asset('tamplate/assets/vendor/chartist/css/chartist-custom.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('tamplate/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{asset('tamplate/assets/css/demo.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="icon" type="image/ico" sizes="96x96" href="{{ asset('tamplate/assets/img/sbfavico.ico') }}">
</head>
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    @include('tamplate.navbar')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    @include('tamplate.sidebar')
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <!-- content -->
                @yield('content')
                <!-- content -->
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">Copyright <i class="fa fa-copyright"></i> Sumber Barokah. All rights reserved.
            </p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="{{ asset('/tamplate/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/scripts/klorofil-common.js') }}"></script>
{{--supaya ketika di back browser, akan di reload ulang--}}
<input type="hidden" id="refreshed" value="no">
<script type="text/javascript">
    onload = function () {
        var e = document.getElementById("refreshed");
        if (e.value == "no") e.value = "yes";
        else {
            e.value = "no";
            location.reload();
        }
    };
</script>
</body>
</html>
