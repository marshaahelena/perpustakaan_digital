<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {

            $data = User::all();
            return view('data', compact('data'));

    }

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

       function countUsers() {
        $count = User::count(); // Menghitung jumlah pengguna dalam tabel User

        return $count;
    }


    function login(){
        return view("login");
    }

    function authentication(Request $request){
        // dd($request);
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'

        ]);
        // dd($validasi);
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



        public function edit($id)
        {
            return view("form-edit", [
                "data" => User::find($id)

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
            $validasi = $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'password' => 'required',
                    'gender' => 'required',
                    'phone_number' => 'required',
                    'address' => 'required'
            ]);

            User::find($id)->update($validasi);
            return redirect()->route("user.index");
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy(string $id)
        {
            User::find($id)->delete();
            return redirect()->route("User.index");
        }

            }



