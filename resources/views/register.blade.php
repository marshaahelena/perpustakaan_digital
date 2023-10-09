<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <!-- Tambahkan tautan ke Materialize CSS -->
    <link rel="stylesheet" href="{{url('asset/materialize/css/materialize.min.css')}}">

    <style>
        .container {
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .h3{
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container s10">
        <div class="center_align">

            <h3>Form Registrasi </h3>
        </div>
        <form action="register" method="post">
        @csrf
            <div class="input-field">
                <input type="text" id="nama" name="nama" required>
                <label for="nama">Nama</label>
            </div>
   <div class="input-field">
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>

            <div class="input-field">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>

            <p>Jenis Kelamin:</p>
            <p>
                <label>
                    <input type="radio" id="laki_laki" name="jenis_kelamin" value="Laki-laki" required>
                    <span>Laki-laki</span>
                </label>
            </p>
            <p>
                <label>
                    <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
                    <span>Perempuan</span>
                </label>
            </p>

            <div class="input-field">
                <input type="text" id="no_hp" name="no_hp" required>
                <label for="no_hp">No. HP</label>
            </div>

            <div class="input-field">
                <textarea id="alamat" name="alamat" class="materialize-textarea" required></textarea>
                <label for="alamat">Alamat</label>
            </div>

            <button class="btn waves-effect waves-light" type="submit">Daftar</button>
        </form>
    </div>


    <!-- Tambahkan tautan ke Materialize JavaScript -->
    <script
            type="text/javascript"
            src="/public/asset/materialize/js/materialize.js"
        ></script>
<script>
        // Aktifkan fitur Materialize untuk input fields
        M.AutoInit();
    </script>
</body>
</html>
