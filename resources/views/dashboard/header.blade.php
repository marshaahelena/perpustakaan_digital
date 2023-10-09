<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="{{url('asset/materialize/css/materialize.min.css')}}">
        <!--Import Google Icon Font-->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"/>

</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="/coba">Aku</a></li>
  <li><a href="#!">Bukuku</a></li>
  <li class="divider"></li>
  <li><a href="#!">logout</a></li>
</ul>
<nav>
  <div class="nav-wrapper">
  <a href="#!" class="brand-logo ">
  <img
    src="/buku.png"
    alt=""
    style="height: 70px; float: left; margin-right: 10px;"

  />
    Perpustakaan Digital Marsha
</a>


    <ul class="right hide-on-med-and-down">
      <li><a href="/form">Login</a></li>
      <li><a href="badges.html">Donasi Buku</a></li>
      <!-- Dropdown Trigger -->
      <li>
        <a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a>
    </li>
    </ul>
    <form>
    <ul class="right hide-on-med-and-down">

         <div class="input-field">
        <input id="search" type="search" required />
         <label class="label-icon" for="search"
         ><i class="material-icons left">search</i></label
         >
         <i class="material-icons">close</i>
          </div>
        </form>
  </div>
</nav>



<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{url('asset/materialize/js/materialize.min.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.dropdown-trigger');
  var options = {}; // Opsional, Anda dapat menambahkan opsi sesuai kebutuhan.
  var instances = M.Dropdown.init(elems, options);
});
</script>
</body>
</html>
