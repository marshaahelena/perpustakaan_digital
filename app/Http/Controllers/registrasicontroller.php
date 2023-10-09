<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class registrasicontroller extends Controller
{
    public function registrasi(Request $request)
    {
        // Validate user input
        $request->validate([
          'nama' => 'required',
          'email' => 'required',
          'password' => 'required',
          'jenis_kelamin' => 'required',
          'no_hp' => 'required'


        ]);


    }
}

