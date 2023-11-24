<?php

namespace App\Http\Controllers;

use App\Models\donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("book_donation.data",[
            "data" => donation::get()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book_donation.form');

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
            'author'           => 'required',
            'pdf_file'         => 'required',
            'massage'          => 'required'
        ]);
        $file  = $request->file('pdf_file');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path("uploads/donation/"), $file_name);
        $validatedData["pdf_file"] = $file_name;

        session()->flash('success', 'Data berhasil disimpan');


        donation::create($validatedData);
        return redirect()->route('donation.index');
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
        return view("book_donation.form-edit", [
            "data" => donation::find($id),


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
            'title'            => 'required',
            'author'           => 'required',
            'pdf_file'         => 'required',
            'massage'          => 'required'
        ]);
        $file  = $request->file('pdf_file');
        $file_name = $file->getClientOriginalName();
        $file->move(public_path("uploads/donation/"), $file_name);
        $validatedData["pdf_file"] = $file_name;

        donation::find($id)->update($validatedData);
        return redirect()->route("donation.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        donation::find($id)->delete();
        return redirect()->route("donation.index");
    }
}
