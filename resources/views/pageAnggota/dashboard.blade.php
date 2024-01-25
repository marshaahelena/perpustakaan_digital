@extends('layout.header')
@section('navbar')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Cards</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>

<div class="mt-2 mt-2">
  <div class="row">
    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="no-image-png.jpg" alt="Book Cover">
          <span class="card-title">Judul Buku</span>
        </div>
        <div class="card-content">
          <p>Sinopsis singkat tentang buku ini. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="card-action">
          <a href="#">Detail Buku</a>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="no-image-png.jpg" alt="Book Cover">
          <span class="card-title">Judul Buku</span>
        </div>
        <div class="card-content">
          <p>Sinopsis singkat tentang buku ini. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="card-action">
          <a href="#">Detail Buku</a>
        </div>
      </div>
    </div>

    <div class="col s12 m4">
      <div class="card">
        <div class="card-image">
          <img src="no-image-png.jpg" alt="Book Cover">
          <span class="card-title"></span>
        </div>
        <div class="card-content">
          <p>Sinopsis singkat tentang buku ini. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="card-action">
          <a href="#">Detail Buku</a>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
</script>

</body>
</html>

@endsection
