<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('asset/materialize/css/form.css') }}">
    <title>Formulir Peminjaman</title>
</head>

<body>
    <div class="container">
        <div class="row center-align valign-wrapper">
            <div class="row col s12 m6 offset-m3">
                <form action="{{ route('borrowing.update', $data->id) }}" method="POST" class="card"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-content">
                            <h3 class="center-align">Peminjaman Buku</h3>

                            <div class="row">
                                <div class="input-field">
                                    <i class="material-icons prefix">person</i>
                                    <input type="text" id="name" name="name" required  value="{{ $data->name }}">
                                    <label for="name">Nama Lengkap</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">book</i>
                                    <input type="text" id="title" name="title" required value="{{ $data->title }}">
                                    <label for="title">Judul Buku</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" id="loan_date" name="loan_date" class="datepicker" required value="{{ $data->loan_date }}">
                                    <label for="loan_date">Tanggal Peminjaman</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" id="return_date" name="return_date" class="datepicker" required value="{{ $data->return_date }}">
                                    <label for="return_date">Tanggal Pengembalian</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">event</i>
                                    <input type="text" id="due_date" name="due_date" class="datepicker" required value="{{ $data->due_date }}">
                                    <label for="due_date">Jatuh Tempo</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">book</i>
                                    <input type="text" id="code" name="code" required value="{{ $data->code }}">
                                    <label for="code">Kode</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">check</i>
                                    <input type="text" id="status" name="status" required value="{{ $data->status }}">
                                    <label for="status">Status</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">money</i>
                                    <input type="text" id="fine" name="fine" required value="{{ $data->fine }}">
                                    <label for="fine">Denda</label>
                                </div>

                                <button class="btn waves-effect waves-light indigo" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var datepickers = document.querySelectorAll('.datepicker');
            M.Datepicker.init(datepickers, {
                format: 'yyyy-mm-dd'
            });
        });
    </script>
</body>

</html>
