@extends('layout.header')
@section('navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Data Peminjaman Buku</title>
</head>

<body>
    <div class="w-100">
        <h4 class="ms-4">Data Peminjaman Buku</h4>
        <a class="waves-effect waves-light btn ms-4" href='{{ route('borrowing.create') }}'>Tambah Data</a>

        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>TGL Pinjam</th>
                    <th>TGL Pengembalian</th>
                    <th>Jatuh Tempo</th>
                    <th>Kode</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $see)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $see->name}}</td>
                    <td>{{ $see->title }}</td>
                    <td>{{ $see->loan_date }}</td>
                    <td>{{ $see->return_date }}</td>
                    <td>{{ $see->due_date }}</td>
                    <td>{{ $see->code }}</td>
                    <td class="right-align">
                        <a class="waves-effect waves-light btn-small btn btn-success" href="{{ route('borrowing.returnbook', $see->id) }}">Return</a>
                        <a class="waves-effect waves-light btn-small blue" href="{{ route('borrowing.edit', $see->id) }}">Edit</a>
                        <form method="POST" action="{{ route('borrowing.destroy', $see->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="waves-effect waves-light btn-small red" onclick="return confirm('Are you sure you want to delete this book?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
@endsection
