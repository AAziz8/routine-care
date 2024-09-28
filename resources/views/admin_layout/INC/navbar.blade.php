

<?php
$users  = App\helpers::admin_user();
$logos = App\helpers::logo();
//?>


<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{--><!--{url('/')}}"><img src="{{asset('images/'.'upperlogo.png')}}" alt="logo" style="width: 50px"/></a>
{{--        <a class="navbar-brand brand-logo-mini" href="{{url('/')}}"><img src="{{asset('image/'.$logos->logo)}}" alt="logo"/></a>--}}
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars"></span>
        </button>
        <ul class="navbar-nav">

        </ul>
        <ul class="navbar-nav navbar-nav-right">

{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">--}}
{{--                    <i class="fas fa-envelope mx-0"></i>--}}
{{--                    <span class="count">25</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">--}}
{{--                    <div class="dropdown-item">--}}
{{--                        <p class="mb-0 font-weight-normal float-left">You have 7 unread mails--}}
{{--                        </p>--}}
{{--                        <span class="badge badge-info badge-pill float-right">View all</span>--}}
{{--                    </div>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <img src="images/faces/face4.jpg" alt="image" class="profile-pic">--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content flex-grow">--}}
{{--                            <h6 class="preview-subject ellipsis font-weight-medium">David Grey--}}
{{--                                <span class="float-right font-weight-light small-text">1 Minutes ago</span>--}}
{{--                            </h6>--}}
{{--                            <p class="font-weight-light small-text">--}}
{{--                                The meeting is cancelled--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <img src="images/faces/face2.jpg" alt="image" class="profile-pic">--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content flex-grow">--}}
{{--                            <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook--}}
{{--                                <span class="float-right font-weight-light small-text">15 Minutes ago</span>--}}
{{--                            </h6>--}}
{{--                            <p class="font-weight-light small-text">--}}
{{--                                New product launch--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a class="dropdown-item preview-item">--}}
{{--                        <div class="preview-thumbnail">--}}
{{--                            <img src="images/faces/face3.jpg" alt="image" class="profile-pic">--}}
{{--                        </div>--}}
{{--                        <div class="preview-item-content flex-grow">--}}
{{--                            <h6 class="preview-subject ellipsis font-weight-medium"> Johnson--}}
{{--                                <span class="float-right font-weight-light small-text">18 Minutes ago</span>--}}
{{--                            </h6>--}}
{{--                            <p class="font-weight-light small-text">--}}
{{--                                Upcoming board meeting--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    @if(isset($logos))
                    <img src="{{asset('image/'.$logos->logo) ?? ''}}" alt="profile"/>
                        @endif

                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off text-primary"></i>
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
{{--            <li class="nav-item nav-settings d-none d-lg-block">--}}
{{--                <a class="nav-link" href="#">--}}
{{--                    <i class="fas fa-ellipsis-h"></i>--}}
{{--                </a>--}}
{{--            </li>--}}
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>
