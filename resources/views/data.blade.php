
@extends('layout.header')
@section('navbar')
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        table {
            width: 100%;
        }

        th,
        td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4>Data Anggota</h4>
        <a class="waves-effect waves-light btn" href="{{ route('auth.register') }}">Tambah Anggota</a>
        <!-- Tombol Tambah Data -->
        <table class="highlight centered responsive-table">
            <title>Data Anggota</title>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $see)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $see->name }}</td>
                        <td>{{ $see->email }}</td>
                        <td>{{ $see->gender }}</td>
                        <td>{{ $see->phone_number }}</td>
                        <td>{{ $see->address }}</td>
                        <td class="right-align">
                            <a class="waves-effect waves-light btn-small blue"
                                href="{{ route('user.edit', $see->id) }}">Edit</a>

                            <form method="POST" action="{{ route('user.destroy', $see->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="waves-effect waves-light btn-small red"
                                    onclick="return confirm('Apa kamu yakin mengahapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <!-- Tambahkan baris-baris data lainnya di sini -->
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
@endsection
