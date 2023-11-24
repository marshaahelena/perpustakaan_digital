<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('asset/materialize/css/materialize.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('asset/materialize/css/form.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Buku</title>
    
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

                <form action="{{ route('book.update', $data->id) }}" method="POST" class="col s12"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card center-align">
                        <div class="card-content">
                            <h3>Tambah Buku</h3>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">title</i>
                                    <input placeholder="Judul" id="title" type="text" class="validate"
                                        name="title" required value="{{ $data->title }}">
                                    <label for="title">Judul</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">book</i>
                                    <input placeholder="Kode" id="code" type="text" class="validate"
                                        name="code" required value="{{ $data->code }}">
                                    <label for="code">Kode</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">person</i>
                                    <input placeholder="Penulis" id="author" type="text" class="validate"
                                        name="author" required value="{{ $data->author }}">
                                    <label for="author">Penulis</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">business</i>
                                    <input placeholder="Penerbit" id="publisher" type="text" class="validate"
                                        name="publisher" required value="{{ $data->publisher }}">
                                    <label for="publisher">Penerbit</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">date_range</i>
                                    <input placeholder="Tahun Terbit" id="publication_year" type="text"
                                        class="validate" name="publication_year" required
                                        value="{{ $data->publication_year }}">
                                    <label for="publication_year">Tahun Terbit</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">attach_file</i>
                                    <input placeholder="Stok" id="stock" type="text" class="validate"
                                        name="stock" required value="{{ $data->stock }}">
                                    <label for="stock">Stok</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">library_books</i>
                                    <textarea id="synopsis" class="materialize-textarea" name="synopsis" required>{{ old('synopsis', $data->synopsis) }}</textarea>
                                    <label for="synopsis">Sinopsis</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">category</i>
                                    <select id="category" name="category_id" required>
                                        <option value="" disabled selected>Pilih Kategori</option>

                                        @foreach ($category as $see)
                                            <option {{ $see->id == $data->category_id ? 'selected' : '' }}
                                                value="{{ $see->id }}">{{ $see->name }}</option>
                                        @endforeach

                                        <option value="NewCategory"
                                            {{ $data->category == 'NewCategory' ? 'selected' : '' }}>Kategori Baru
                                        </option>
                                    </select>

                                    <label>Kategori</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">library_books</i>
                                    <input type="text" id="newCategory" name="newCategory" required
                                        value="{{ old('newCategory', $data->newcategory) }}">
                                    <label for="newCategory">Kategori Baru</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="file-field input-field">
                                        <div style="border-radius: 50px; overflow: hidden;"
                                            class="btn #7986cb indigo lighten-2">
                                            <span>File PDF</span>
                                            <input type="file" name="pdf_file" required
                                                value="{{ old('pdf_file', $data->pdf_file) }}">
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
                                            <input type="file" name="cover_image" required>
                                            <input type="hidden" name="old_cover_image"
                                                value="{{ $data->cover_image }}">
                                        </div>

                                        <div class="file-path-wrapper">
                                            <input class="file-path validate" type="text">
                                        </div>
                                        <div class="row center-align ">
                                            <div class="col s4 offset-s3 ">
                                                <button style="border-radius: 50px; overflow: hidden; width: 300px"
                                                    class="btn waves-effect waves-light #7986cb indigo lighten-2"
                                                    type="submit">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

            var categorySelect = document.getElementById('category');
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


</body
