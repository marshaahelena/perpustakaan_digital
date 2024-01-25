<!DOCTYPE html>
<html lang="en" data-bs-theme="ligth">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Styles -->
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="{{asset('asset/Dasboard')}}/style.css" />

</head>
<body>
    <!-- Layout -->
    @yield('navbar')

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="sidebar col-4 col-lg-2 p-0">
                <a href="javascript:;" class="link-secondary text-decoration-none btn-close-sidebar"><i class="bi bi-x-lg"></i></a>
                <div class="m-2">

                    <img src="hy.jpg" alt="" width="45px" style="border-radius: 50px;">
                    <span class="brand-name fs-3">Helena Library</span>
                </div>
                @if (Auth::User())
                @if (Auth::User()->role == 'admin')
                <div class="list-group list-group-flush mt-3">
                    <a href="#!" class="list-group-item py-2 fs-5">
                        <i class="bi bi-speedometer me-2"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('public.index') }}" class="list-group-item py-2 fs-5">
                        <i class="bi bi-house me-2"></i>
                        <span>Home</span>
                    </a>
                    <a href="{{ route('book.store') }}" class="list-group-item py-2 fs-5">
                        <i class="bi bi-cart me-2"></i>
                        <span>Kelola Buku</span>
                    </a>
                    <a href="{{ route('auth.index') }}" class="list-group-item py-2 fs-5">
                        <i class="bi bi-clipboard-data me-2"></i>
                        <span>Users</span>
                    </a>
                    <a href="{{ route('borrowing.store') }}" class="list-group-item py-2 fs-5">
                        <i class="bi bi-people me-2"></i>
                        <span>Peminjaman</span>
                    </a>
                    <a href="{{ route('donation.index') }}" class="list-group-item py-2 fs-5">
                        <i class="bi bi-truck me-2"></i>
                        <span>Donasi Buku</span>
                    </a>
                </div>
            </div>
            <!-- Main Content -->
            <!-- Navbar -->
            <div class="col p-0">
                <div class="navbar navbar-expand py-3">
                    <div class="container-fluid">
                        <a href="javascript:;" class="text-decoration-none link-secondary" id="btn-toggle">
                            <i class="bi bi-justify-left fs-3"></i>
                        </a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item me-3">
                                    <div class="form-check form-switch pt-2">
                                        <input class="form-check-input" type="checkbox" role="switch" id="theme-mode">
                                        <i class="bi bi-moon-fill text-secondary"></i>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Welcome, {{ auth()->user()->name }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="{{ route('login') }}"><i
                                                    class="bi bi-person-fill"></i> login</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i>
                                                Setting</a></li>
                                        <li><a class="dropdown-item" href="{{ route('auth.logout') }}"><i
                                                    class="bi bi-box-arrow-left"></i> Logout</a></li>

                                    </ul>
                                </li>
                            @else
                                <div class="list-group list-group-flush mt-3">
                                    <a href="{{ route('public.index') }}" class="list-group-item py-2 fs-5">
                                        <i class="bi bi-house me-2"></i>
                                        <span>Home</span>
                                    </a>
                                </div>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ms-auto">
                                        <li class="nav-item me-3">
                                            <div class="form-check form-switch pt-2">
                                                <input class="form-check-input" type="checkbox" role="switch" id="theme-mode">
                                                <i class="bi bi-moon-fill text-secondary"></i>
                                            </div>
                                        </li>
                                    </ul>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Welcome, {{ auth()->user()->name }}
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="{{ route('login') }}"><i class="bi bi-person-fill"></i> login</a></li>
                                              <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Setting</a></li>
                                              <li><a class="dropdown-item" href="{{ route('auth.logout') }}"><i class="bi bi-box-arrow-left"></i> Logout</a></li>

                                            </ul>
                                        </li>
                                @endif

                                @endif

                            </div>
                    </div>
                </div>
                <!-- Section Content -->
                @yield('content')

            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $(() => {
            let theme_prefer = localStorage.getItem('theme') ?? 'ligth';
            $('html').attr('data-bs-theme', theme_prefer);
            $('#theme-mode').prop('checked', theme_prefer == 'ligth' ? false : true)
            $('#btn-toggle').on('click', () => {
                $('.sidebar').toggle();
                if(!$('.sidebar').hasClass('open')) {
                    $('.sidebar').addClass('open');
                }
            })
            $('.btn-close-sidebar').on('click', () => {
                $('.sidebar').toggle();
                $('.sidebar').removeClass('open');
            })
            $('#theme-mode').on('click', function() {
                let theme = $(this).prop('checked') === true ? 'dark' : 'ligth';
                $('html').attr('data-bs-theme', theme);
                localStorage.setItem('theme', theme);
            })
        })
    </script>
</body>
</html>
