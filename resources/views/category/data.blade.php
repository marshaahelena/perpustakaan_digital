@extends('layout.header')

@section('heading')
    <body>
        <div class="container">
            <h4>Data Kategori</h4>
            <table class="highlight centered responsive-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $see)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $see->name }}</td>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    </body>
@endsection
