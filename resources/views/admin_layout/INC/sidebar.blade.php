<?php
$users  = App\helpers::admin_user();
$logos = App\helpers::logo();
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{ asset('images/upperlogo.png') }}" alt="image" style="width: auto;" />
                </div>
                <div class="profile-name">
                    <p class="name">Welcome</p>
                    <p class="designation">{{ $users }}</p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="fas fa-tachometer-alt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user-management" aria-expanded="false" aria-controls="user-management">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">User Management</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{ url('/users') }}">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{ url('roles') }}">Roles</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/categories') }}">
                <i class="fas fa-th-list menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/products') }}">
                <i class="fas fa-box menu-icon"></i>
                <span class="menu-title">Product</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{ url('/updates/1/edit') }}">Socials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black; font-size: 16px; font-weight: 900;" href="{{ url('/logos/1/edit') }}">Logo</a>
                    </li>
                </ul>
            </div>
        </li>
        

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/transaction') }}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('/contract') }}">
                <i class="fas fa-envelope menu-icon"></i>
                <span class="menu-title">Contact</span>
            </a>
        </li>
    </ul>
</nav>

<script>
    // JavaScript to handle sidebar active state and collapse functionality
    document.querySelectorAll('.nav-link[data-toggle="collapse"]').forEach(link => {
        link.addEventListener('click', function() {
            const collapseId = this.getAttribute('href');
            const otherCollapses = document.querySelectorAll('.collapse.show');

            otherCollapses.forEach(collapse => {
                if (collapse.id !== collapseId.replace('#', '')) {
                    collapse.classList.remove('show');
                }
            });
        });
    });
</script>
