<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vision Foreign Language Center</title>
    <link rel="icon" type="image/png" href="/images/Backup_of_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/actionuser.css">
</head>
<body>
    @include('header')
    <div class="container-xl px-4 content-all-action">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="/profile">Hồ sơ</a>
            <a class="nav-link {{ request()->is('billing') ? 'active' : '' }}" href="/billing">Lịch sử thanh toán</a>
            <a class="nav-link {{ request()->is('change_password') ? 'active' : '' }}" href="{{route('user-action.change_password')}}">Bảo mật</a>
        </nav>
        
            @yield('content-profile')
            @yield('content-billing')
            @yield('content-security')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>