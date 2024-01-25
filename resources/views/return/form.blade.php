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
    <title>Formulir Peminjaman</title>


<body>
    {{-- <section class="intro">
        <div class="bg-image h-100">
            <h3 class="ms-5">Daftar Peminjam</h3>
            <div class="mask d-flex mt-5 h-100">
                <div class="w-100">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0 return-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Buku</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Tanggal Peminjaman</th>
                                            <th scope="col">Tenggat</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>61</td>
                                            <td>Edinburgh</td>
                                            <td>Edinburgh</td>
                                            <td>Edinburgh</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm px-3">
                                                    <img width="16" height="16" src="https://img.icons8.com/office/16/visible--v1.png" alt="visible--v1"/>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 --}}

    <div class="container">
        <div class="row center-align valign-wrapper">
            <div class="row col s12 m6 offset-m3">
                <form action="{{ route('borrowing.savereturnbook') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-content">
                            <h3 class="center-align">Pengembalian Buku</h3>

                            <div class="row">
                                <div class="input-field">                                    <select name="name" id="name" required>
                                        <option value="" disabled selected>Nama</option>
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
                                            <option value="{{ $book->title }}">{{ $book->code}} {{ $book->title }}</option>
                                        @endforeach
                                    </select>

                                      <label for="title"> Pilih Judul Buku</label>
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
