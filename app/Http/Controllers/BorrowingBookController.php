<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use Illuminate\Http\Request;

class BorrowingBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("borrowing.data",[
            "data" => borrowing::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrowing.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name'            => 'required',
            'title'            => 'required',
            'loan_date'        => 'required',
            'return_date'      => 'required',
            'due_date'         => 'required',
            'code'             => 'required',
            'status'           => 'required',
            'fine'             => 'required'

        ]);
        borrowing::create($validatedData);
        return redirect()->route('borrowing.index');


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
            'name'            => 'required',
            'title'            => 'required',
            'loan_date'        => 'required',
            'return_date'      => 'required',
            'due_date'         => 'required',
            'code'             => 'required',
            'status'           => 'required',
            'fine'             => 'required'

         ]);
        borrowing::find($id)->update($validatedData);
        return redirect()->route("borrowing.index");
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
}
