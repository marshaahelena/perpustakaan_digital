<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    <style>
        body {
            background-color: rgb(157, 153, 153);
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <form action="{{ route('book.store') }}" method="POST" class="col s12">
                @csrf
                <div class="card center-align">
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
                                <input placeholder="Kode" id="code" type="text" class="validate" name="code">
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
                                <input placeholder="Tahun Terbit" id="publication_year" type="text" class="validate"
                                    name="publication_year">
                                <label for="publication_year">Tahun Terbit</label>
                            </div>
                            <div class="input-field col s6">
                                <i class="material-icons prefix">attach_file</i>
                                <input placeholder="Stok" id="stock" type="text" class="validate" name="stock">
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
                                <select id="category" name="category">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    <option value="Fiksi">Fiksi</option>
                                    <option value="Non-Fiksi">Non-Fiksi</option>
                                    <option value="Sains">Sains</option>
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
                            <form action="#" class="col s6">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File PDF</span>
                                        <input type="file" name="pdf-file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Cover</span>
                                        <input type="file" name="cover-image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                    <div class="button">
                                        <button class="btn waves-effect waves-light" type="submit">Kirim </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ url('asset/materialize/js/materialize.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Materialize components
            M.AutoInit();

            var categorySelect = document.getElementById('category');
            var newCategoryInput = document.getElementById('newCategory');

            categorySelect.addEventListener('change', function() {
                if (categorySelect.value === 'NewCategory') {
                    newCategoryInput.style.display = 'block';
                } else {
                    newCategoryInput.style.display = 'none';
                }

                var categorySelect = document.getElementById('category');
                var newCategoryInput = document.getElementById('newCategory');

                newCategoryInput.addEventListener('input', function() {
                    var newCategoryValue = newCategoryInput.value;

                    // Buat opsi baru jika nilainya tidak kosong
                    if (newCategoryValue.trim() !== '') {
                        var newOption = document.createElement('option');
                        newOption.value = newCategoryValue;
                        newOption.text = newCategoryValue;
                        categorySelect.appendChild(newOption);
                    }
                });
            });

        });
    </script>
</body
