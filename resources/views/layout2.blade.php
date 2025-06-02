<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ElectroDeals')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            position: fixed;
            height: 100%;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,.75);
            padding: 10px 20px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover {
            color: white;
            background-color: rgba(255,255,255,.1);
        }
        .sidebar .nav-link.active {
            color: white;
            border-left: 3px solid #0d6efd;
        }
        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 250px; 
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="px-3 mb-4">
            <h4 class="text-white">ElectroDeals</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/">
                    <i class="fas fa-home me-2"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('mobiles') ? 'active' : '' }}" href="/mobiles">
                    <i class="fas fa-mobile-alt me-2"></i> Mobile Phones
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('computers') ? 'active' : '' }}" href="/computers">
                    <i class="fas fa-laptop me-2"></i> Personal Computers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('settings') ? 'active' : '' }}" href="/settings">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link {{ request()->is('logout') ? 'active' : '' }}" href="/logout">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>