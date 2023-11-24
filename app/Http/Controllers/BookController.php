<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\Category;
use Illuminate\Http\Request;

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

        return view("book.form",[
            "category" => Category::get()
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
            'cover_image'      => 'required|image|mimes: jpeg,png,jpg'
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
        // Simpan data buku ke database
        book::create($validatedData);

        // Redirect atau lakukan tindakan lain setelah penyimpanan
        return redirect()->route('book.index');
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
}
