<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

       function register(){
        return view("register");
       }

       function store(Request $request){
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'address' => 'required'

        ]);

        $validasi['password'] = password_hash($validasi['password'], PASSWORD_BCRYPT);

               user::create($validasi);

               return redirect()->route('login')->with('message-info', 'Pendaftaran berhasil, silakan masuk.');

       }


    function login(){
        return view("login");
    }

    function authentication(Request $request){
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validasi)){
            $request->session()->regenerate();

            return redirect()->intended('header');
        }

        return redirect()->route('login')->with('message-info', "cek lagi ada yang salah");

    }
        public function logout()
        {
            Auth::logout();

            return redirect()->route('login');
        }

            }



