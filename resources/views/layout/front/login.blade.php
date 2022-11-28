<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>
        @if(isset($title))
            {{$title}}
        @endif
    </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/vendor/linearicons/style.css') }}">

    <link rel="stylesheet" href="{{ asset('/tamplate/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/vendor/toastr/toastr.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('/tamplate/assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    {{--    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/tamplate/assets/img/apple-icon.png') }}">--}}
    <link rel="icon" type="image/ico" sizes="96x96" href="{{ asset('tamplate/assets/img/sbfavico.ico') }}">
</head>

<body>

<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">

                        <div class="header">
                            <div class="logo text-center"><img src="{{ asset('/tamplate/assets/img/logo.png') }}"
                                                               alt="Klorofil Logo"></div>
                            <p class="lead">Login to your account</p>
                        </div>

                        @if( session("sukses"))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> {{ session("sukses") }}
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            {{--                        @if( session("error"))--}}
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <i class="fa fa-warning"></i> {{ session("error") }}
                            </div>
                        @endif

                        <form class="form-auth-small needs-validation" novalidate action="/requestlogin" method="post">
                            @csrf

                            <div class="form-group @error("email") has-error @enderror">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="text" name="email" class="form-control" id="signin-email"
                                       placeholder="Email" value="{{ old("email") }}">
                                @error("email")
                                <div class="invalid-feedback  alert-danger alert-dismissible">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group @error("password") has-error @enderror">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" name="password" class="form-control" id="signin-password"
                                       placeholder="Password">
                                @error("password")
                                <div class="invalid-feedback alert-danger alert-dismissible">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                        </form>

                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">Warehouse</h1>
                        <p>Sumber Barokah</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- END WRAPPER -->

<!-- Javascript -->
<script src="{{ asset('/tamplate/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/tamplate/assets/vendor/toastr/toastr.min.js') }}"></script>
{{--<script src="{{ asset('/tamplate/assets/scripts/klorofil-common.js') }}"></script>--}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>
