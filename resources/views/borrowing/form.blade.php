@extends('../layout.header')
@section('navbar')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('asset/materialize/css/form.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>Formulir Peminjaman</title>


<body>
    <div class="container">
        <div class="row center-align valign-wrapper">
            <div class="row col s12 m6 offset-m3">
                <form action="{{ route('borrowing.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-content">
                            <h3 class="center-align">Peminjaman Buku</h3>

                            <div class="row">
                                <div class="input-field">
                                    {{-- <i class="material-icons prefix">person</i> --}}
                                    <select name="name" id="name" required>
                                        <option value="pilih user" disabled selected>Nama</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->name }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    <label for="name">Pilih Nama</label>
                                </div>

                                <div class="input-field">
                                    <select name="title" id="title" required>
                                        <option value="" disabled selected>Judul</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->title }}">{{ $book->title }}</option>
                                        @endforeach
                                    </select>

                                      <label for="title"> Pilih Judul Buku</label>
                                </div>

                                {{-- <div class="input-field">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" id="loan_date" name="loan_date" class="datepicker" value="{{ old('loan_date', getCurrentDateFormatted()) }}">
                                    <label for="loan_date">Tanggal Peminjaman</label>
                                </div>


                                <div class="input-field">
                                    <i class="material-icons prefix">date_range</i>
                                    <input type="text" id="return_date" name="return_date" class="datepicker" value="{{ old('return_date', getCurrentDateFormatted()) }}">
                                    <label for="return_date">Tanggal Pengembalian</label>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix">event</i>
                                    <input type="text" id="due_date" name="due_date" class="datepicker" value="{{ old('due_date', getCurrentDateFormatted()) }}">
                                    <label for="due_date">Jatuh Tempo</label>
                                </div> --}}

                                {{-- <div class="input-field">
                                    <input type="text" id="code" name="code"  value="{{ $generatedCode }}" readonly >
                                    <label for="code">Kode</label>
                                </div> --}}

                                <div class="input-field col s12">
                                    <i class="material-icons prefix">add</i>
                                    <input type="number" id="quantity" name="quantity" required>
                                    <label for="quantity">Jumlah Buku</label>
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

            var selectElements = document.querySelectorAll('select');
            var selectInstances = M.FormSelect.init(selectElements);
        var datepickerElement = document.querySelectorAll('.datepicker');
        var datepickerOptions = {
            format: 'yyyy-mm-dd',
            defaultDate: new Date(),
            setDefaultDate: true,
        };
        M.Datepicker.init(datepickerElement, datepickerOptions);

        // Mengisi otomatis tanggal peminjaman saat halaman dimuat
        var loanDateElement = document.getElementById('loan_date');
        loanDateElement.value = getCurrentDateFormatted(); // Memanggil fungsi untuk mendapatkan tanggal saat ini

        // Mengisi otomatis tanggal pengembalian saat halaman dimuat
        var returnDateElement = document.getElementById('return_date');
        returnDateElement.value = getReturnDateFormatted(); // Memanggil fungsi untuk mendapatkan tanggal pengembalian

        // Fungsi untuk mendapatkan tanggal saat ini
        function getCurrentDateFormatted() {
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0');
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var year = today.getFullYear();
            return year + '-' + month + '-' + day;
        }

        // Fungsi untuk mendapatkan tanggal pengembalian (5 hari setelah tanggal peminjaman)
        function getReturnDateFormatted() {
            var today = new Date();
            var returnDate = new Date(today.setDate(today.getDate() + 5));
            var day = String(returnDate.getDate()).padStart(2, '0');
            var month = String(returnDate.getMonth() + 1).padStart(2, '0');
            var year = returnDate.getFullYear();
            return year + '-' + month + '-' + day;
        }
    });

    </script>

</body>
@endsection
</html>
