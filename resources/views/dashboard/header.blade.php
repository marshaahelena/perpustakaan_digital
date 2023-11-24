<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <style>
        .container{
        margin-top: 50px;
    }
    .card {
      margin: 10px;
    }

    .card-content {
      padding: 20px;
    }

    .card-title {
      font-size: 24px;
    }

    .icon-box {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 60px; /* Sesuaikan ukuran ikon box */
      height: 60px; /* Sesuaikan ukuran ikon box */
      background-color: #26a69a; /* Warna latar belakang ikon box */
      border-radius: 50%; /* Untuk membuat kotak bundar */
      margin-right: 20px; /* Jarak antara ikon box dengan judul kartu */
    }

    .icon {
      font-size: 30px; /* Ukuran ikon */
      color: #fff; /* Warna ikon */
    }
    </style>
</head>

<body>
    @yield('heading')
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                @yield('side_bar')
                <div class="background"style="background-color: #303f9f;"></div>
                <a href="#"><img class="circle" src="aku.jpg">
                    {{-- <a href="#name"><span class="white-text name">{{ auth()->user()->name }}</span></a>
                <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a> --}}
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="{{ route('book.store') }}"><i class="material-icons">assignment</i>Kelola buku</a></li>
        <li><a href="{{ route('auth.index') }}"><i class="material-icons">person</i>Kelola Anggota</a></li>
        <li><a href="{{ route('borrowing.index') }}"><i class="material-icons">note</i>Peminjaman Buku</a></li>
        <li><a href="{{ route('donation.index') }}"><i class="material-icons">note</i>Data Donasi Buku</a></li>
        <li><a href="{{ route('auth.logout') }}"><i class="material-icons">exit_to_app</i>Logout</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper" style="background-color:#303f9f">
            <a href="#!" class="brand-logo ">
                <img src="/buku.png" alt="" style="height: 70px; float: left; margin-right: 10px;">
                Perpustakaan Digital
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('donation.create') }}" id="donate-link">Donasi Buku</a></li>
            </ul>

            <form>
                <ul class="right hide-on-med-and-down">
                    {{-- <div class="input-field s10">
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons" style="margin-left:0%">search</i></label>
                        <i class="material-icons">close</i>
                      </div> --}}
                    <li><a href="#"><i class="material-icons">search</i></a></li>

                </ul>
            </form>
        </div>
        </div>
    </nav>
    <a href="#" data-target="slide-out" class="sidenav-trigger"
        style="font-size: 32px !important; margin-left: 10px !important;transform: scaleX(1.5);">
        <i class="material-icons">menu</i>
    </a>

    <div class="container ">
        <div class="row">
          <!-- Card untuk Daftar Anggota -->
          <div class="col s12 m4">
            <div class="card">
              <div class="card-content">
                <div class="icon-box red">
                  <i class="material-icons icon">group</i>
                </div>
                <span class="card-title">Daftar Anggota</span>
                <!-- Isi daftar anggota di sini -->
              </div>
            </div>
          </div>

          <!-- Card untuk Daftar Buku yang Dipinjam -->
          <div class="col s12 m4">
            <div class="card">
              <div class="card-content">
                <div class="icon-box yellow">
                  <i class="material-icons icon">library_books</i>
                </div>
                <span class="card-title">Daftar Buku yang Dipinjam</span>
                <!-- Isi daftar buku yang dipinjam di sini -->
              </div>
            </div>
          </div>

          <!-- Card untuk Daftar Admin -->
          <div class="col s12 m4">
            <div class="card">
              <div class="card-content">
                <div class="icon-box blue">
                  <i class="material-icons icon">person</i>
                </div>
                <span class="card-title">Daftar Admin</span>
                <!-- Isi daftar admin di sini -->
              </div>
            </div>
          </div>
        </div>
      </div>



    <!-- JavaScript at the end of the body for optimized loading -->
    <script type="text/javascript" src="{{ url('asset/materialize/js/materialize.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            var sidenavElems = document.querySelectorAll('.sidenav');
            var sidenavOptions = {};
            var sidenavInstances = M.Sidenav.init(sidenavElems, sidenavOptions);

            //         var sidenavInstance = M.Sidenav.getInstance(sidenavElems[0]);
            //    sidenavInstance.open();


        });

    </script>

</body>

</html>
