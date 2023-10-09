<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="{{url('asset/materialize/css/materialize.min.css')}}">
        <!--Import Google Icon Font-->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
        />
        <!-- Import materialize.css-->
        <!-- <link
            type="text/css"
            rel="stylesheet"
            href="/public/asset/materialize/css/materialize.css"
            media="screen,projection" -->
        <!-- /> -->

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>LOGIN</title>
        <style>
            .form-container {
                margin-top: 80px;
                border-radius: 0 0 20px 20px;
            }
            .kata {
                text-align: center; /* Mengatur teks ke tengah secara horizontal */
                display: flex; /* Menggunakan flexbox untuk mengatur teks ke tengah secara vertikal */
                justify-content: center; /* Mengatur teks ke tengah secara horizontal */
                align-items: center; /* Mengatur teks ke tengah secara vertikal */
                height: 5vh; /* Mengisi tinggi div hingga seluruh ketinggian layar (vertically centered) */
                color: rgb(108, 108, 147);
            }

                .button {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 10vh; /* Ini untuk mengisi tinggi seluruh layar */
        margin-top:10px;

    }
            .brand-logo{
                padding-left:50px ;
            }
            body{
    background-image: url('https://i.pinimg.com/564x/53/92/c4/5392c4f09343f2da35839b0fb05b7534.jpg'); /* Ganti dengan path gambar Anda */
    background-size: cover; /* Membuat gambar latar belakang menutupi seluruh area elemen */
    background-repeat: no-repeat; /* Menghindari pengulangan gambar */
    /* Tambahan gaya lainnya seperti warna latar belakang fallback, ukuran, dll */
}
.card-content{
    background-color:#d6cbd3;

;
}



        </style>
    </head>

    <body>
       <div class="row form-container">
            <div class="col s12 m6 offset-m3">
                <form class="col s12">
                    <div class="row">
                    <div class="col s12 m20">
    <div class="card horizontal">
      <div class="card-stacked">
        <div class="card-content">
        <div class="row">
    <div class="input-field col s12 ">
        <i class="material-icons prefix">account_circle</i>
        <input id="icon_email" type="text" class="validate">
        <label for="icon_email">Email</label>
    </div>
</div>
<div class="row">
    <div class="input-field col s12">
        <i class="material-icons prefix">vpn_key</i>
        <input id="icon_password" type="password" class="validate">
        <label for="icon_password">Password</label>
    </div>
</div>
                    <div class="kata">
                        Nikmati berbagai layanan perpus setelah login
                    </div>
                    <div class="button">
                    <button type="submit" class="button1 ">login sekarang</button>
                    <p><a href="/daftar">daftar</a></p>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>


        <!--JavaScript at end of body for optimized loading-->
        <script
            type="text/javascript"
            src="/public/asset/materialize/js/materialize.js"
        ></script>
        <!-- JavaScript at the bottom of the page for optimized loading -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        var loginForm = document.querySelector("form");
        loginForm.addEventListener("submit", function(event) {
            event.preventDefault(); // Menghentikan pengiriman form secara default

            // Gantilah "/home" dengan URL halaman home yang sesuai
            window.location.href = "/header";
        });
    });
</script>
    </body>
</html>
