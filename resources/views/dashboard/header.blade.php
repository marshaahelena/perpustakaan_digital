<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <!-- Import Google Icon Font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>

<body>
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="/coba">Aku</a></li>
        <li><a href="#!">Bukuku</a></li>
        <li class="divider"></li>
        <li><a href="{{ route('auth.logout') }}">logout</a></li>
    </ul>

    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background"style="background-color: purple;"></div>
                <a href="#user"><img class="circle" src=""></a>
                <a href="#name"><span class="white-text name"></span></a>
                <a href="#email"><span class="white-text email"></span></a>
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">home</i>Dashboard</a></li>
        <li><a href="/book"><i class="material-icons">assignment</i>Kelola buku</a></li>
        <li><a href="#!"><i class="material-icons">person</i>Kelola Anggota</a></li>
    </ul>
    <nav>
        <div class="nav-wrapper purple">
            <a href="#!" class="brand-logo ">
                <img src="/buku.png" alt="" style="height: 70px; float: left; margin-right: 10px;">
                Perpustakaan Digital
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="/form">Login</a></li>
                <li><a href="badges.html">Donasi Buku</a></li>
                <!-- Dropdown Trigger -->
                <li>
                    <a class="dropdown-trigger" href="#!" data-target="dropdown1">Menu<i
                            class="material-icons right">arrow_drop_down</i></a>
                </li>
            </ul>
            <a href="#" data-target="slide-out" class="sidenav-trigger" style="font-size: 32px !important; margin-left: 10px !important;">
                <i class="material-icons">menu</i>
            </a>

            <form>
                <ul class="right hide-on-med-and-down">
                    {{-- <div class="input-field">
                        <input id="search" type="search" required>
                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                      </div> --}}
                    <li><a href="#"><i class="material-icons">search</i></a></li>

                </ul>
            </form>
        </div>
        </div>
    </nav>



    <!-- JavaScript at the end of the body for optimized loading -->
    <script type="text/javascript" src="{{ url('asset/materialize/js/materialize.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownElems = document.querySelectorAll('.dropdown-trigger');
            var dropdownOptions = {};
            var dropdownInstances = M.Dropdown.init(dropdownElems, dropdownOptions);

            var sidenavElems = document.querySelectorAll('.sidenav');
            var sidenavOptions = {};
            var sidenavInstances = M.Sidenav.init(sidenavElems, sidenavOptions);

            //var sidenavInstance = M.Sidenav.getInstance(sidenavElems[0]);
       // sidenavInstance.open();
        });
    </script>

</body>

</html>
