<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <h4>Data Donasi Buku</h4>
        <a class="waves-effect waves-light btn" href='{{ route('donation.create') }}'>Tambah Data</a>

        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>E-Book</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $see)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $see->title }}</td>
                    <td>{{ $see->author }}</td>
                    <td>{{ $see->pdf_file }}</td>
                    <td>{{ $see->massage }}</td>
                    <td class="right-align">
                        <a class="waves-effect waves-light btn-small blue" href="{{ route('donation.edit', $see->id) }}">Edit</a>
                        <form method="POST" action="{{ route('donation.destroy', $see->id) }}" style="display: inline;">
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
