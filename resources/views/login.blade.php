<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOGIN</title>
    @csrf
    <style>
        .form-container {
            margin-top: 80px;
            border-radius: 0 0 20px 20px;
        }

        /* .kata {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 5vh;
            color: rgb(108, 108, 147);
        } */

        .button {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 10vh;
            margin-top: 10px;
        }

        .brand-logo {
            padding-left: 50px;
        }

        body {
            background-image: url(https://i.pinimg.com/564x/a7/d9/fc/a7d9fc4f7c185c0e250e5fcedf692305.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        .card.horizontal {
            border-radius: 50px;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="row form-container">
        <div class="col s12 m6 offset-m3">


            <form class="col s12" method="POST" action="{{ route('auth.authentication') }}">
                @csrf
                <div class="row center-align valign-wrapper">
                    <div class="col s12 m20">
                        <div class="card horizontal">
                            <div class="card-image">
                                <img src="g1.jpg" alt="Deskripsi Gambar">
                            </div>
                            <div class="card-stacked">
                                <div class="card-content white">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix" style="font-size: 28px;">account_circle</i>
                                            <input placeholder="Email" id="icon_email" type="text" class="validate"
                                                name="email" required>
                                            <label for="icon_email"></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix" id="togglePasswordVisibility"
                                                style="font-size: 28px;">visibility</i>
                                            <input placeholder="Password" id="icon_password" type="password"
                                                class="validate" name="password" required>
                                            <label for="icon_password"></label>
                                        </div>
                                    </div>

                                    <div class="kata">Nikmati berbagai layanan perpustakaan setelah login</div>
                                    <div class="button">
                                        <button class="btn waves-effect waves-light" type="submit" class="button"
                                            style="border-radius: 50px;
                                            overflow: hidden;">Login
                                            Sekarang</button>
                                        <p style="margin-top: 10px;">Balum punya akun?<a
                                                href="{{ route('auth.register') }}">Daftar</a></p>

                                                <div id="status-message" class="{{ session('status') ? (strpos(session('status'), 'successful') !== false ? 'green-text' : 'red-text') : 'hide' }}">
                                                    {{ session('status') }}
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="/public/asset/materialize/js/materialize.js"></script>
    <script>
        var passwordField = document.getElementById("icon_password");
        var togglePasswordIcon = document.getElementById("togglePasswordVisibility");

        togglePasswordIcon.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                togglePasswordIcon.textContent = "visibility_off";
            } else {
                passwordField.type = "password";
                togglePasswordIcon.textContent = "visibility";
            }
        });
    </script>

</body>

</html>
