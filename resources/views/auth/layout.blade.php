<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feather Softwares</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    {{-- Favicon --}}
   <link rel="icon" type="image/x-icon" href="{{ asset('controlpanel/dist/img/featherlogo.png') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('controlpanel/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('controlpanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('controlpanel/dist/css/adminlte.min.css') }}">
    {{-- Toastr JS Plugin --}}
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  
    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {{-- Bootstrap CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .submit_btn {
    color: #fff;
    background-color: #234753;
    border-color: #234753;
}
    </style>
    @yield('styles')
</head>

<body class="hold-transition login-page">
    @yield('content')
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('controlpanel/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('controlpanel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('controlpanel/dist/js/adminlte.min.js') }}"></script>
    {{-- Toastr JS Plugin --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            @if (Session::has('successmessage'))
                toastr.options = {
                    "closeButton": true,
                }
                toastr.success("{{ Session::get('successmessage') }}");
            @endif
            @if (Session::has('errormessage'))
                toastr.options = {
                    "closeButton": true,
                }
                toastr.error("{{ Session::get('errormessage') }}");
            @endif
            @if (Session::has('infomessage'))
                toastr.options = {
                    "closeButton": true,
                }
                toastr.info("{{ Session::get('infomessage') }}");
            @endif
        });
    </script>
    @yield('scripts')
</body>

</html>



