<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use App\Models\User;
use App\Models\book;
use Carbon\Carbon;
use Milon\Barcode\DNS1D;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BorrowingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("borrowing.data", [
            "data" => borrowing::get(),
            "books" => book::where('stock', '>', 0)->get()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // Generate a UUID
    $uuid = (string) Str::uuid();
    // Ambil lima karakter pertama dari UUID
    $shortUuid = substr($uuid, 0, 8);
    // Konversi ke huruf besar dan pastikan hanya angka dan huruf yang ada
    $generatedCode = strtoupper(preg_replace('/[^A-Za-z0-9]/', '', $shortUuid));

        //admin tidak masuk ke pilihan
        $users = User::where('role', '!=', 'admin')->get();
        $books = book::where('stock', '>', 0)->get();
        return view("borrowing.form", [
            'users' => $users,
            'books' => $books,
            'generatedCode' => $generatedCode,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name'       => 'required',
            'title'      => 'required',
            'loan_date'  => 'nullable|date',
            'due_date'   => 'nullable|date',
            'return_date' => 'nullable|date',
            'quantity'   => 'required|numeric',
        ]);

        // Menggunakan Carbon untuk mengelola tanggal
        $loanDate = $request->input('loan_date', Carbon::now()->toDateString());
        // $returnDate = $request->input('return_date', Carbon::now()->toDateString());
        $dueDate = now()->addDays(5)->toDateString();

        $validatedData['loan_date'] = $loanDate;
        // $validatedData['return_date'] = $returnDate;
        $validatedData['due_date'] = $dueDate;

        $books = book::where('title', $request->title)->firstOrFail();

        // Cek apakah stok mencukupi
        if ($books->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk peminjaman ini.');
        }

        $books->decrement('stock', $request->quantity);

        // Membuat UUID sebagai kode peminjaman
        $generatedCode = strtoupper(Str::random(8));

        // Menyimpan kode peminjaman ke database
        $validatedData['code'] = $generatedCode;
        $borrowing = borrowing::create($validatedData);

         return view("borrowing.show", [
         'generatedCode' => $borrowing->code,
     ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("borrowing.form-edit", [
            "data" => borrowing::find($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'return_date' => 'required|date',
            'quantity'    => 'required|numeric',
        ]);

        // Cek apakah buku sudah dikembalikan sebelumnya
        $borrowing = borrowing::find($id);
        if ($borrowing->returned_at) {
            return redirect()->back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
        }

        // Set tanggal pengembalian hanya jika buku belum dikembalikan
        $returnedDate = Carbon::now()->toDateString();
        $validatedData['return_date'] = $returnedDate;

        // Update catatan peminjaman
        $borrowing->update($validatedData);

        // Kembalikan stok buku hanya jika buku belum dikembalikan
        $book = book::where('title', $borrowing->title)->firstOrFail();
        $book->increment('stock', $borrowing->quantity);

        return redirect()->route("borrowing.index")->with('success', 'Buku berhasil dikembalikan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        borrowing::find($id)->delete();
        return redirect()->route("borrowing.index");
    }

    public function returnbook()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $books = book::all();
        return view("return.form", [
            'users' => $users,
            'books' => $books,

        ]);
    }

    public function savereturnbook(Request $request)
    {

        $rent = borrowing::where('name', $request->name)
                        ->where('title', $request->title)
                        ->whereNull('return_date')
                        ->first();

        if ($rent) {
            if ($rent->return_date) {
                return redirect()->back()->with('error', 'Buku sudah dikembalikan sebelumnya.');
            }

            $rent->update([
                'return_date' => now()->toDateString()
            ]);

            $book = book::where('title', $rent->title)->firstOrFail();

            $book->update([
                'stock' => ($book->stock += $rent->quantity)
            ]);

            return redirect()->route('borrowing.create')->with('success', 'Buku berhasil dikembalikan.');
        } else {
            // Tidak ada peminjaman yang sesuai
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan atau buku sudah dikembalikan.');
        }

    }

// Note: Assuming 'additional_field' is a field in your 'borrowing' model that you want to update

// $return = borrowing::where('name', $request->name)
//     ->where('title', $request->title)
//     ->whereNotNull('return_date')
//     ->update([
//         'return_date' => Carbon::now()
//     ]);

// if ($return > 0) {
//     return redirect()->route('borrowing.create')->with('success', 'Buku berhasil dikembalikan.');
// } else {
//     return redirect()->back()->with('error', 'Peminjaman tidak ditemukan atau buku sudah dikembalikan.');
// }



}
