@extends('layout.header')
@section('navbar')
<body>
    @if(session('success'))
        <div class="row">
            <div class="col s12">
                <div class="card-panel green lighten-2">
                    <span class="white-text">{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <h4>Data Buku</h4>
        <a class="waves-effect waves-light btn" href='{{ route('book.create') }}'>Tambah Data</a>
        <table class="highlight centered responsive-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kode</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Sinopsis</th>
                    <th>Kategori</th>
                    <th>E-Book</th>
                    <th>Cover</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $see)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $see->title }}</td>
                        <td>{{ $see->code }}</td>
                        <td>{{ $see->author }}</td>
                        <td>{{ $see->publisher }}</td>
                        <td>{{ $see->publication_year }}</td>
                        <td>{{ $see->stock }}</td>
                        <td>{{ $see->synopsis }}</td>
                        <td>{{ $see->category->name }}</td>
                        <td>{{ $see->pdf_file }}</td>
                        <td><img src="{{asset("uploads/book/".$see->cover_image) }}" alt="" width="50"></td>
                        <td class="right-align">
                            <a class="waves-effect waves-light btn-small blue" href="{{ route('book.edit', $see->id) }}">Edit</a>
                            <form method="POST" action="{{ route('book.destroy', $see->id) }}" style="display: inline;">
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
