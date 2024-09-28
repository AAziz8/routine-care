
<?php
$users  = App\helpers::admin_user();
$logos = App\helpers::logo();
?>



<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('images/'.'upperlogo.png')}}" alt="image" style="width: auto;"/>
                </div>
                <div class="profile-name">
                    <p class="name">
                        Welcome
                    </p>

                    <p class="designation">
                        {{$users}}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('/dashboard')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fab fa-trello menu-icon"></i>
                <span class="menu-title">Users Managment</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{url('/users')}}">User</a></li>
                    <li class="nav-item"> <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{url('roles')}}">Role</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/categories')}}">
                <i class="fa fa-caret-square-up menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('/products')}}">
                <i class=" fa-product-hunt menu-icon"></i>
                <span class="menu-title">Product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#setting-layouts" aria-expanded="false" aria-controls="page-layouts">
                <i class="fa fa-cog menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="setting-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{url('/updates/{1}/edit')}}">Socials</a></li>
                    <li class="nav-item"> <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{url('/logos/{1}/edit')}}">Logo</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{url('/transaction')}}">
                <i class="fa-first-order menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="{{url('/contract')}}">
                <i class=" fa-file-contract menu-icon"></i>
                <span class="menu-title">Contact</span>
            </a>
        </li>

    </ul>
</nav>
