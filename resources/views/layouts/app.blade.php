
<!doctype html>
<html lang="{{ app()->getLocale() }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Fully Featured Application">

    <title>@yield('title', config('app.name')) | {{config('app.name')}}</title>
    <!-- Favicon-->

    <link rel="icon" type="image/x-icon"  href="{{asset('images/upperlogo.png')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
</head>

<body class="theme-blush">

    @yield('content')


    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
</body>

</html>
