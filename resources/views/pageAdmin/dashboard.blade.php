    @extends('layout.header')
    @section('navbar')

    <div class="container-fluid p-3 view-content">
        <div class="row my-2 g-3">
            <div class="col-lg-3 col-sm-6">
                <div class="indicator p-3 bg-dark text-white d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$userCount}}</h3>
                        <p class="fs-2">Users</p>
                    </div>
                    <i class="bi bi-cart-plus p-3 fs-1"></i>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="indicator p-3 bg-primary text-white d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$bookCount}}</h3>
                        <p class="fs-2">Book</p>
                    </div>
                    <i class="bi bi-currency-dollar p-3 fs-1"></i>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="indicator p-3 bg-danger text-white d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">{{$categoryCount}}</h3>
                        <p class="fs-2">Kategory</p>
                    </div>
                    <i class="bi bi-cash p-3 fs-1"></i>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="indicator p-3 bg-warning d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">520</h3>
                        <p class="fs-2">Payments</p>
                    </div>
                    <i class="bi bi-credit-card-2-back-fill p-3 fs-1"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 mt-2">
        <h4>Data Peminjaman Buku</h4>
        <a class="waves-effect waves-light btn" href='{{ route('borrowing.create') }}'>Tambah Data</a>

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

    @endsection
