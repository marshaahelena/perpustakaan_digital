@extends('dashboard/header')
@section('heading')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>rumahh</title>
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

  

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
@endsection
