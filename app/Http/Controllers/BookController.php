<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\Category;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("book.data",[
            "data" => book::get()


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

    return view("book.form", [
        "category" => Category::get(),
        "generatedCode" => $generatedCode,
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
        $validatedData = $request->validate([
            'title'            => 'required',
            'code'             => 'required',
            'author'           => 'required',
            'publisher'        => 'required',
            'publication_year' => 'required',
            'synopsis'         => 'required',
            'category_id'      => 'required',
            'stock'            => 'required',
            'pdf_file'         => 'required',
            'cover_image'      => 'image|mimes:jpeg,png,jpg|nullable',
        ]);

        $newCategoryValue = $request->input('category_id') === 'NewCategory' ? $request->input('newCategory') : null;

        if ($newCategoryValue) {
            $category = Category::firstOrNew(['name' => $newCategoryValue]);
            $category->save();
            $validatedData['category_id'] = $category->id;
        }

        // $file = $request->file('cover_image');
        // $file_name = $file->getClientOriginalName();
        // $file->move(public_path("uploads/book/"), $file_name);
        // $validatedData["cover_image"] = $file_name;
        // Penanganan gambar sampul
    if ($request->hasFile('cover_image')) {
        $file = $request->file('cover_image');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path("uploads/book/"), $file_name);
        $validatedData["cover_image"] = $file_name;
    } else {
        $defaultImage = 'no-image-png.jpg';
        $validatedData["cover_image"] = $defaultImage;
    }


        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFile->move(public_path("uploads/book/"), $pdfFile->getClientOriginalName());
            $validatedData['pdf_file'] = $pdfFile->getClientOriginalName();
        } else {
            $validatedData['pdf_file'] = null;
        }


        // Simpan data buku ke database
        Book::create($validatedData);

        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect()->route('book.index')->with('status', 'Buku berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = book::find($id);

        return view('book-list',['show'=> $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("book.form-edit", [
            "data" => book::find($id),
            "category" => Category::get()

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
            'title' => 'required',
            'code' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'publication_year' => 'required',
            'synopsis' => 'required',
            'category_id' => 'required',
            'stock' => 'required',
            'pdf_file' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg'
        ]);
        // nilai dari newcategory
        $newCategoryValue = $request->input('category_id') === 'NewCategory' ? $request->input('newCategory') : null;

        if ($newCategoryValue) {
            $category = Category::firstOrNew(['name' => $newCategoryValue]);
            $category->save();
            $validatedData['category_id'] = $category->id;
        }

        $file  = $request->file('cover_image');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path("uploads/book/"), $file_name);
        $validatedData["cover_image"] = $file_name;


        if ($request->hasFile('pdf_file')) {
            $pdfFile = $request->file('pdf_file');
            $pdfFile->move(public_path("uploads/book/"), $pdfFile->getClientOriginalName());
            $validatedData['pdf_file'] = $pdfFile->getClientOriginalName();
        } else {
            $validatedData['pdf_file'] = null;
        }

        book::find($id)->update($validatedData);
        return redirect()->route("book.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        book::find($id)->delete();
        return redirect()->route("book.index");
    }

    public function showCategories()
    {
        $categories = Category::all();

        return view("category.data", [
            "categories" => $categories,
        ]);
    }

   

}
