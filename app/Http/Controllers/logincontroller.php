<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class logincontroller extends Controller
{
    public function registrasi(Request $request)
    {
        // Validate user input
        $request->validate([
            'nama' => 'sasa',
            'email' => 'sasa10@gmail.com',
            'password' => '55555555',

        ]);


        $user = new User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);


        $user->save();

        return "Registrasi berhasil!";
    }
}

