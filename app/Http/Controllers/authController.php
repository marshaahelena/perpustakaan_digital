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

               return redirect()->route('login')->with('status', 'Pendaftaran berhasil, silakan masuk.');
       }

       function countUsers() {
        $count = User::count(); // Menghitung jumlah pengguna dalam tabel User

        return $count;
    }


    function login(){
        return view("login");
    }

    function authentication(Request $request){
        $validasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            if(auth()->user()->role === 'admin'){
                return redirect()->intended('dashboardAdmin')->with('status', 'Login successful. Welcome!');
            }else if(auth()->user()->role === 'anggota'){
                return redirect()->intended('/dashboardAnggota')->with('status', 'Login successful. Welcome!');
            }else if(auth()->user()->role === 'pustakawan'){
                return redirect()->intended('/dashboardPustakawan')->with('status', 'Login successful. Welcome!');
            }
        }

        return redirect()->route('login')->with('status', 'Email or password is incorrect. Please try again.');
        if(Auth::user()->role_id == 1){
            return redirect('dashboard');
        }
        if(Auth::user()->role_id == 2){
            return redirect('Home');
        }

    // function authentication(Request $request){
    //     $validasi = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);

    //     if (Auth::attempt($validasi)) {
    //         $request->session()->regenerate();

    //         // Redirect based on user role
    //         if(Auth::user()->role_id == 1){
    //             return redirect('header');
    //         }
    //         if(Auth::user()->role_id == 2){
    //             return redirect('home');
    //         }
    //     }

    //     return redirect()->route('login')->with('status', 'Email or password is incorrect. Please try again.');





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
            return redirect()->route("user.index");
        }
        public function showCountUsers()
{
    $count = $this->countUsers(); // atau cara lain untuk mendapatkan jumlah anggota

    return view('layout.dashboard', compact('count'));
}


            }



