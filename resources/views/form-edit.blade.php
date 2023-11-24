<!DOCTYPE html>
<html>

<head>
    <title>Form Registrasi</title>
    <!-- Tambahkan tautan ke Materialize CSS -->
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">

    <style>
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
    <div class="container" style="margin-top: 100px">
        <div class="row center-align valign-wrapper">
            <div class="col s10 m20">
                <div class="card horizontal  ">
                    <div class="card-image">
                        <img src="g1.jpg" alt="Deskripsi Gambar">
                    </div>
                    <div class="card-stacked">
                        <div class="card-content white">
                            <div class="row">
                                <form action="{{ route('user.update', $data->id) }}" method="post">
                                    @csrf
                                    @method('PUT')

                                    <div class="col s12">
                                        <div class="input-field">
                                            <input placeholder="nama" type="text" id="name" name="name"
                                                required value="{{ $data->name }}">
                                            <label for="name"></label>
                                        </div>
                                        <div class="input-field">
                                            <input placeholder="email" type="email" id="email" name="email"
                                                required value="{{ $data->email }}">
                                            <label for="email"></label>
                                        </div>
                                        <div class="input-field">
                                            <input placeholder="password" type="password" id="password" name="password"
                                                required value="{{ $data->password }}">
                                            <label for="password"></label>
                                        </div>
                                        <div class="input-field col s12">
                                            <p class="flex">
                                                <label>
                                                    <input type="radio" id="laki_laki" name="gender"
                                                        value="laki_laki" class="with-gap" required
                                                        value="{{ $data->gender }}">
                                                    <span>Laki-laki</span>
                                                </label>
                                                <label>
                                                    <input type="radio" id="perempuan" name="gender"
                                                        value="perempuan" class="with-gap" required
                                                        value="{{ $data->gender }}">
                                                    <span>Perempuan</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                            </div>
                            <div class="input-field">
                                <input placeholder="no_hp" type="text" id="phone_number" name="phone_number" required
                                    value="{{ $data->phone_number }}">
                                <label for="phone_number"></label>
                            </div>
                            <div class="input-field">
                                <textarea placeholder="alamat" id="address" name="address" class="materialize-textarea" required>{{ old('address', $data->address) }}</textarea>
                                <label for="address"></label>
                            </div>
                            <button class="btn waves-effect waves-light"
                                style="border-radius: 50px;
                                        overflow: hidden;"
                                type="submit">Edit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Tambahkan tautan ke Materialize JavaScript -->
    <script type="text/javascript" src="/public/asset/materialize/js/materialize.js"></script>
    <script>
        // Aktifkan fitur Materialize untuk input fields
        M.AutoInit();
    </script>
</body>

</html>
