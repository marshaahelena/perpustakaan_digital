@extends('layout.header')
@section('navbar')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Cards</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('pdfjs-dist-master/web/pdf_viewer.css') }}">


    </head>

    <body>
        <div class="ms-2 me-2">
            <div class="row">
                @foreach ($books as $book)
                    <div class="col s12 ">
                        <div class="card">
                            <span class="card-title center-align"><strong>{{ $book->title }}</strong></span>
                            <div class="card-image">
                                @if ($book->cover_image)
                                    <img src="{{ asset('uploads/book/' . $book->cover_image) }}" width="50"
                                        alt="{{ $book->title }} Cover">
                                @else
                                    <!-- Placeholder image jika tidak ada cover -->
                                    <img src="{{ asset('uploads/book/no-image-png.jpg') }}" alt="{{ $book->title }} Cover">
                                @endif
                            </div>
                            <div class="card-content">
                                <p>{{ $book->code }}</p>
                            </div>

                            <div class="card-action">
                                <!-- Pass the book ID to the route for detailed view -->
                                <a class="waves-effect waves-light btn modal-trigger"
                                    href="#modal-{{ $book->id }}">Detail Buku</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modals -->
                    <div id="modal-{{ $book->id }}" class="modal">
                        <div class="modal-content">
                            <div class="card">
                                <div class="card-image">
                                    @if ($book->cover_image)
                                        <img src="{{ asset('uploads/book/' . $book->cover_image) }}" width="50"
                                            alt="{{ $book->title }} Cover">
                                    @else
                                        <!-- Placeholder image jika tidak ada cover -->
                                        <img src="{{ asset('uploads/book/no-image-png.jpg') }}"
                                            alt="{{ $book->title }} Cover">
                                    @endif
                                </div>
                            <div class="row">
                                <div class="col s12 m4">

                                        <div class="modal-content">
                                            <h4>Judul : {{ $book->title }}</h4>
                                            <h4>Kode : {{ $book->code }}</h4>
                                            <h4>Penulis : {{ $book->author }}</h4>
                                            <h4>Penerbit : {{ $book->publisher }}</h4>
                                            <h4>Tahun Terbit : {{ $book->publication_year }}</h4>
                                            <h4>Stok : {{ $book->stock }}</h4>
                                            <h4>Sinopsis : {{ $book->synopsis }}</h4>

                                        </div>
                                        <div class="modal-footer">
                                            <a href="#!"
                                                class="modal-close waves-effect waves-green btn-flat">Close</a>
                                                <a class="waves-effect waves-light btn modal-trigger"
                                    href="{{ route('borrowing.create') }}">pinjam</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.sidenav').sidenav();
            });
            document.addEventListener('DOMContentLoaded', function() {
                var modals = document.querySelectorAll('.modal');
                M.Modal.init(modals);
            });
        </script>
@endsection
