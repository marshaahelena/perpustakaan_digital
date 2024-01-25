<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Peminjaman Berhasil</title>
</head>

<body>
    <div class="container">
        <h3>Peminjaman Buku Berhasil</h3>
        {{-- <h1>Barcode</h1> --}}
         {{-- <img src="{{ $barcodeUrl }}" alt="Barcode"> --}}
        <p>Kode Peminjaman Anda: {{ $generatedCode }}</p>
        <p>Terima kasih sudah melakukan peminjaman. Silakan simpan kode peminjaman ini untuk referensi Anda.</p>
        {{-- <a href="{{ route('borrowing.index') }}" class="waves-effect waves-light btn">Lihat Daftar Peminjaman</a> --}}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
