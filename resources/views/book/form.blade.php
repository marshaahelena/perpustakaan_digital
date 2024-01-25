@extends('layout.header')
@section('navbar')

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('asset/materialize/css/form.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    {{-- <link rel="stylesheet" href="{{ asset('asset/side_bar/style.css') }}"> --}}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="row center-align valign-wrapper">
            <div class="row col s7 m20">
                @if ($errors->any())
                    <div class="card-panel red lighten-2">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('book.store') }}" method="POST" class="col s12" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="card-content">
                            <h3>Tambah Buku</h3>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input placeholder="Judul" id="title" type="text" class="validate"
                                        name="title">
                                    <label for="title">Judul</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">book</i>
                                    <input placeholder="Kode" id="code" type="text" class="validate" name="code" value="{{ $generatedCode }}" readonly>
                                    <label for="code">Kode</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input placeholder="Penulis" id="author" type="text" class="validate"
                                        name="author">
                                    <label for="author">Penulis</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">business</i>
                                    <input placeholder="Penerbit" id="publisher" type="text" class="validate"
                                        name="publisher">
                                    <label for="publisher">Penerbit</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">date_range</i>
                                    <input placeholder="Tahun Terbit" id="publication_year" type="number"
                                        class="validate" name="publication_year">
                                    <label for="publication_year">Tahun Terbit</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input placeholder="Stok" id="stock" type="number" class="validate"
                                        name="stock">
                                    <label for="stock">Stok</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">library_books</i>
                                    <textarea id="synopsis" class="materialize-textarea" name="synopsis"></textarea>
                                    <label for="synopsis">Sinopsis</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">category</i>
                                    <select id="category_id" name="category_id">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($category as $see)
                                            <option value="{{ $see->id }}">{{ $see->name }}</option>
                                        @endforeach
                                        <option value="NewCategory">Kategori Baru</option>
                                    </select>
                                    <label>Kategori</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">library_books</i>
                                    <input type="text" id="newCategory" name="newCategory">
                                    <label for="newCategory">Kategori Baru</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="file-field input-field">
                                        <div style="border-radius: 50px; overflow: hidden;"
                                            class="btn #7986cb indigo lighten-2
                                                ">
                                            <span>File PDF</span>
                                            <input type="file" name="pdf_file">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="file-field input-field">
                                        <div style="border-radius: 50px; overflow: hidden;"
                                            class="btn #7986cb indigo lighten-2">
                                            <span>Cover</span>
                                            <input type="file" name="cover_image">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn waves-effect waves-light indigo" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('asset/materialize/js/materialize.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Materialize components
            M.AutoInit();

            var categorySelect = document.getElementById('category_id');
            var newCategoryInput = document.getElementById('newCategory');

            categorySelect.addEventListener('change', function() {
                if (categorySelect.value === 'NewCategory') {
                    newCategoryInput.disabled = false;
                } else {
                    newCategoryInput.disabled = true;
                }
            });

            newCategoryInput.addEventListener('keydown', function(event) {
                if (event.key === ' ') {
                    event.preventDefault(); // Mencegah pengiriman formulir
                    var newCategoryValue = newCategoryInput.value.trim();

                    // Buat opsi baru jika nilainya tidak kosong
                    if (newCategoryValue !== '') {
                        var newOption = document.createElement('option');
                        newOption.value = newCategoryValue;
                        newOption.text = newCategoryValue;
                        categorySelect.appendChild(newOption);

                        // Inisialisasi ulang elemen select
                        M.FormSelect.init(categorySelect);
                        categorySelect.value = newCategoryValue;

                        // Atur kembali input "Kategori Baru" menjadi nonaktif
                        newCategoryInput.value = '';
                        newCategoryInput.disabled = true;
                    }
                }
            });
        });
    </script>

@endsection
</body
