<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/iconly/bold.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/app.css">
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.html" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('admin') }}/assets/images/logo/logo.png"
                                    alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        <ul class="sidebar-nav">
                            <li class="sidebar-item {{ Request::is('dashboard*') ? 'active' : '' }}">
                                <a href="/dashboard" class='sidebar-link'>
                                    <i class="bi bi-grid-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                        
                            <li class="sidebar-item {{ Request::is('mahasiswa*') ? 'active' : '' }}">
                                <a href="/mahasiswa" class='sidebar-link'>
                                    <i class='bx bx-walk'></i>
                                    <span>Mahasiswa</span>
                                </a>
                            </li>
                        
                            <li class="sidebar-item {{ Request::is('jurusan*') ? 'active' : '' }}">
                                <a href="/jurusan" class='sidebar-link'>
                                    <i class='bx bx-library'></i>
                                    <span>Jurusan</span>
                                </a>
                            </li>
                        </ul>
                        
                    </ul>
                                 

                </div>

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

        @yield('content')

        <footer>
            <div class="footer clearfix mb-0 fixed-bottom">
                <div class="float-end">
                    <a href="/logout">LOGOUT AGAMA LU DISNI!!</a>   
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="https://www.instagram.com/zriialll?igsh=MWl6NTBhY2drNXZnaw==">Zriiall</a></p>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="{{ asset('admin') }}/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('admin') }}/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('admin') }}/assets/js/pages/dashboard.js"></script>

    <script src="{{ asset('admin') }}/assets/js/main.js"></script>

    
</body>


<!-- Mirrored from themewagon.github.io/mazer/dist/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Jul 2024 05:58:46 GMT -->

</html>
