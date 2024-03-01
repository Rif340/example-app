<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    function logout(){
            Session::flush();
            Auth::logout();  
            
            return redirect ('/login');    
        }

    function tampil_register()
    {
        return view('/register');
    }

    function register(Request $request)
    {
        $username = $request -> username;
        $nama = $request -> nama;
        $nik = $request -> nik;
        $telepon = $request -> telepon;
        $password = $request -> password;
       
        DB::table('masyarakat')->insert([
            'username' => $username,
            'nama' => $nama,
            'nik' => $nik,
            'telepon' => $telepon,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login');
    }

    public function login(Request $request)
    {
        $data = $request->only("username", "password");
    
        if (Auth::attempt($data)) {
            // Jika login berhasil, redirect ke '/home' dengan membawa data
            return redirect('/home');
        } else {
            // Jika login gagal, tampilkan halaman login kembali
            return view('login');
        }
    }
    
    function tampil_login()
    {
        return view('/login');
    }

    
}
