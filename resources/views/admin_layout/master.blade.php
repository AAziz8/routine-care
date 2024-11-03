<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@stack('title')</title>
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/iconfonts/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('asset_admin/vendors/css/vendor.bundle.addons.css')}}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('asset_admin/css/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="http://www.urbanui.com/" />
</head>
<body>

<div class="container-scroller">
    @include('admin_layout.INC.navbar')
    <div class="container-fluid page-body-wrapper">
        @include('admin_layout.INC.sidebar')
        @yield('content')
    </div>

</div>

</body>
<!-- plugins:js -->
<script src="{{asset('asset_admin/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('asset_admin/vendors/js/vendor.bundle.addons.js')}}"></script>
<script src="{{asset('asset_admin/js/off-canvas.js')}}"></script>
<script src="{{asset('asset_admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('asset_admin/js/misc.js')}}"></script>
<script src="{{asset('asset_admin/js/settings.js')}}"></script>
<script src="{{asset('asset_admin/js/todolist.js')}}"></script>
<script src="{{asset('asset_admin/js/dashboard.js')}}"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script src = "https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer ></script>


<!-- CodeMirror CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/theme/material-darker.min.css">

<!-- CodeMirror JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.62.0/mode/htmlmixed/htmlmixed.min.js"></script>


@stack('js')
</html>
