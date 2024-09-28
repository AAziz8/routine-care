
<!doctype html>
<html lang="{{ app()->getLocale() }}">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Fully Featured Application">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name')) | {{config('app.name')}}</title>
    <!-- Favicon-->

    <link rel="icon" type="image/x-icon"  href="{{asset('images/upperlogo.png')}}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/plugins/charts-c3/plugin.css')}}"/>

    <link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css')}}" />

    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css')}}"/>

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css')}}">
    <style type="text/css">
        .activetab{
            background: #405faf !important;
            border-radius: 10px;

        }
        .activetab a{
            color: white !important;
        }/* For number input */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
          -webkit-appearance: none;
          margin: 0;
      }
  </style>

</head>

<body class="theme-blush">
    <?php $user_role = request()->cookie('user_role'); ?>
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="../images/SPO Logo-h.png" width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div> -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Right Icon menu Sidebar -->
    <div class="navbar-right" >
        <ul class="navbar-nav" >
            <li class="dropdown mt-3">
                <a href="javascript:void(0);" class="dropdown-toggle" title="Notifications" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                    <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu slideUp2">
                    <li class="header">Notifications</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li>
                                <a href="{{ url('orders') }}">
                                    <div class="menu-info">
                                        <?php if ($user_role == 'Admin') { ?>


                                        <?php } ?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>


            <li><a href="javascript:void(0);" class="js-right-sidebar mt-3" title="Setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
            <li><a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"  class="mega-menu mt-3" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
            </ul>
        </div>

        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <div class="navbar-brand text-center">
                <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
                <a href="{{ url('dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt="logo" height="80px">
                    <!-- <span class="m-l-10">Aero</span> -->
                </a>
            </div>
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info ">
                            <a class="image" href="#"><img src="{{ asset('images/avatar.png') }}" alt="User">   </a><div class="detail">
                                <h4>{{ request()->cookie('user_name')}}</h4>
                            </div>
                        </div>
                    </li>
                    <?php if ($user_role == 'Admin') { ?>


                        <li class=" open"><a href="{{ url('dashboard') }}" ><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                        <li class=" "><a href="{{ url('users') }}" ><i class="zmdi zmdi-accounts"></i><span>Users</span></a></li>

                        <li class=" "><a href="{{ url('roles') }}" ><i class="zmdi zmdi-collection-text"></i><span>Roles</span></a></li>

                <!-- <li class=" "><a href="regions" ><i class="zmdi zmdi-city-alt"></i><span>Regions</span></a></li>

                <li class=" "><a href="donors" ><i class="zmdi zmdi-badge-check"></i><span>Donors</span></a></li>
                <li class=""><a href="users"><i class="zmdi zmdi-accounts"></i><span>Users</span></a></li> -->
               <!--  <li class=""><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Setting</span></a>
                    <ul class="ml-menu">
                        <li class=""><a href="company_profile">Company Setting</a></li>
                        <li class=""><a onclick="backup(backup_data);" >Database Backup</a></li>
                    </ul>
                </li> -->

            <?php  } else{} ?>



            <li class=""><a  href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><i class="zmdi zmdi-sign-in"></i><span>Logout</span></a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </aside>
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs sm">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="setting">
                <div class="slim_scroll">
                    <div class="card">
                        <h6>Theme Option</h6>
                        <div class="light_dark">
                            <div class="radio">
                                <input type="radio" name="radio1" id="lighttheme" value="light" checked="">
                                <label for="lighttheme">Light Mode</label>
                            </div>
                            <div class="radio mb-0">
                                <input type="radio" name="radio1" id="darktheme" value="dark">
                                <label for="darktheme">Dark Mode</label>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h6>Color Skins</h6>
                        <ul class="choose-skin list-unstyled">
                            <li data-theme="purple"><div class="purple"></div></li>
                            <li data-theme="blue"><div class="blue"></div></li>
                            <li data-theme="cyan"><div class="cyan"></div></li>
                            <li data-theme="green"><div class="green"></div></li>
                            <li data-theme="orange"><div class="orange"></div></li>
                            <li data-theme="blush" class="active"><div class="blush"></div></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </aside>
    <!-- Main Content -->
    <section class="content">
        <div class="">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2> @yield('title', config('app.name'))</h2>
                        <ul class="breadcrumb">
                            <li class="">
                                <i class="zmdi zmdi-caret-left-circle" onclick="history.back()"></i>&nbsp;
                                <i class="zmdi zmdi-caret-right-circle" onclick="history.forward()"></i>&nbsp;
                            </li>
                            <li class="breadcrumb-item active"><a href="{{ url('dashboard') }}"> {{config('app.name')}} / @yield('title', config('app.name'))</a></li>
                        </ul>
                        <button class="btn  btn-icon mobile_menu" type="button" style="background: #405faf;color: white;"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn  btn-icon float-right right_icon_toggle_btn" type="button" style="background: #405faf;"><i class="zmdi zmdi-arrow-right" ></i></button>
                    </div>
                </div>
            </div>

            @yield('content')<!-- slimscroll, waves Scripts Plugin Js -->
             <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
            <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->

            <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
            <script src="{{ asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
            <script src="{{ asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
            <script src="{{ asset('assets/bundles/c3.bundle.js')}}"></script>

            <script src="{{ asset('assets/js/pages/index.js')}}"></script>

            <script src="{{ asset('assets/sweetalert2.all.min.js')}}"></script>

            <!-- Jquery Core Js -->
            <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
            <!-- Jquery DataTable Plugin Js -->
            <script src="{{ asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
            <script src="{{ asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
            <script src="{{ asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>


            <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
            <script src="{{ asset('assets/js/pages/forms/dropify.js')}}"></script>

            <script src="{{ asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
            <script src="{{ asset('assets/plugins/select2/select2.min.js')}}"></script>

            <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script>

            <script type="text/javascript">


    // Database Backup
                function backup(x) {
                    Swal.fire({
                        title: 'Are you sure?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: 'green',
                        cancelButtonColor: '#bab8b8',
                        confirmButtonText: 'Yes, do it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            x();
                        }
                    })
                }
                function backup_data() {
                    $.ajax({
                        type:"POST",
                        url:"getState.php",
                        data: 'data_backup',
                        success:function(data) {
                            alert(data);
                            Swal.fire(
                              'Backuped!',
                              'Data has been Backuped.',
                              'success'
                              )
                        }
                    });
                }
// For Delete alert error
                function del(x,y) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#bab8b8',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            x(y);
                        }
                    })
                }
// Prevent from form resubmission
                if(window.history.replaceState){
                    window.history.replaceState(null, null, window.location.href);
                }
// Print Div
                function printSection(el){
                    var getFullContent = document.body.innerHTML;
                    var printsection = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printsection;
                    window.print();
                    document.body.innerHTML = getFullContent;
                    window.addEventListener("afterprint", myFunction);

                }

            </script><script>
    // Function to add the active class to the current tab
                function setActiveTab() {
    // Get the current URL without query parameters
                    var currentUrl = window.location.href.split('?')[0];

    // Get all the tab links, including dropdown menu items
                    var tabLinks = document.querySelectorAll('#leftsidebar .list > li > a');
                    var tabLinks1 = document.querySelectorAll('#leftsidebar .list > li > ul > li > a');

    // Loop through each tab link
                    tabLinks.forEach(function(link) {
                        var linkUrl = link.getAttribute('href');

                        if (linkUrl === currentUrl) {
                            link.parentElement.classList.add('activetab');
                            var parentDropdown = link.closest('.menu-toggle');
                            if (parentDropdown) {
                                parentDropdown.classList.add('activetab');

                // Adjust the display property of the dropdown menu
                                parentDropdown.querySelector('.ml-menu').style.display = 'block';
                            }
                        }
                    });

    // Loop through each tab link inside dropdown menus
                    tabLinks1.forEach(function(link) {
                        var linkUrl = link.getAttribute('href');

                        if (linkUrl === currentUrl) {
                            link.parentElement.classList.add('activetab');
                            var parentDropdown = link.closest('.menu-toggle');
                            if (parentDropdown) {
                                parentDropdown.classList.add('activetab');

                // Adjust the display property of the dropdown menu
                                parentDropdown.querySelector('.ml-menu').style.display = 'block';
                            }
                        }
                    });
                }

// Add an event listener to run the setActiveTab function when the DOM is loaded
                window.addEventListener('DOMContentLoaded', function() {
                    setActiveTab();
                });

                $(function () {
                    $('.js-basic-example').DataTable();

    //Exportable table
                });

            </script>

        </body>


        </html>

