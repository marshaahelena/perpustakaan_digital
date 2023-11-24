{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Formulir Donasi Buku</title>
</head>

<body>
    <div class="container">
        <h3 class="center-align">Formulir Donasi Buku</h3>
        <form action="{{ route('donation.store') }}" method="POST" class="card" enctype="multipart/form-data">
            @csrf
            <div class="card-content">
                <div class="input-field">
                    <i class="material-icons prefix">title</i>
                    <input id="title" type="text" class="validate" name="title" required>
                    <label for="title">Judul Buku</label>
                </div>

                <div class="input-field">
                    <i class="material-icons prefix">person</i>
                    <input id="author" type="text" class="validate" name="author" required>
                    <label for="author">Penulis</label>
                </div>

                <div class="file-field input-field">
                    <div class="btn">
                        <span>Upload Ebook (PDF)</span>
                        <input type="file" name="pdf_file" accept=".pdf" required>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="input-field">
                    <i class="material-icons prefix">message</i>
                    <textarea id="massage" class="materialize-textarea" name="message" rows="4" required></textarea>
                    <label for="massage">Pesan Tambahan</label>
                </div>

                <div class="row center-align">
                    <div class="col s6 offset-s3">
                        <button class="btn waves-effect waves-light indigo lighten-2" type="submit">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>

</html>
 --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <link rel="stylesheet" href="{{ url('asset/materialize/css/form_donation.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <title>Donasi E-BOOK</title>
</head>

<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <form action="{{ route('donation.store') }}" method="POST" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-content">
                        <h3 class="center-align">Donasi Ebook</h3>

                        <div class="input-field">
                            <input id="title" type="text" class="validate" name="title" required>
                            <label for="title">Judul Ebook</label>
                        </div>

                        <div class="input-field">
                            <input id="author" type="text" class="validate" name="author" required>
                            <label for="author">Penulis</label>
                        </div>

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Upload Ebook (PDF)</span>
                                <input type="file" name="pdf_file" accept=".pdf" required>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <div class="input-field">
                            <textarea id="massage" class="materialize-textarea" name="massage" rows="4"></textarea>
                            <label for="massage">Pesan Tambahan</label>
                        </div>

                        <div class="row center-align">
                            <div class="col s6 offset-s3">
                                <button class="btn waves-effect waves-light indigo lighten-2" type="submit">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Materialize components
            M.AutoInit();

        });
    </script>
</body>

</html>

