<!DOCTYPE html>
<html>

<head>
    <title>Halaman Akun</title>
    <!-- Tambahkan tautan ke Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        .profile-container {
            text-align: center;
            margin-top: 50px;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid #fff;
            overflow: hidden;
            margin: 0 auto;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-name {
            font-size: 24px;
            margin-top: 20px;
            color: #000; /* Warna teks hitam */
        }

        .user-email {
            font-size: 18px;
            color: #000; /* Warna teks hitam */
        }

        .btn-logout {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="profile-container">
            <div class="profile-picture">
                <img src="/aku.jpg" alt="Profil Anda">
            </div>
            <div class="user-name">
                Marsha Helena Ismanda
            </div>
            <div class="user-email">
                marshahelena12@gmail.com
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        // Aktifkan fitur Materialize
        M.AutoInit();

        function logout() {
            // Lakukan tindakan logout di sini, misalnya mengarahkan ke halaman login
            window.location.href = "/login"; // Ganti dengan URL logout atau halaman login
        }
    </script>
</body>

</html>
