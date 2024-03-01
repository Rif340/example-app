<?php

namespace App\Http\Controllers;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\tanggapan;
use App\Models\Petugas;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PetugasController extends Controller
{
    function index()
    {  $masyarakat =DB::table('masyarakat')->count('nama');
        $pengaduan = DB::table('pengaduan')->count('isi_laporan');
        $petugas = DB::table('petugas')->count('nama_petugas');
        $tanggapan = DB::table('tanggapan')->count('tanggapan');

        return view('/petugas-home', ['tanggapan'=>$tanggapan,'petugas'=>$petugas,'masyarakat' =>  $masyarakat, 'pengaduan' => $pengaduan]);
    }

    function tampil_petugas()
    {
        $judul = "selamat datang ditambah petugas petugas";

        return view('isi-petugas', ['TextJudul' => $judul,]);
    }

    function proses_tambah_petugas(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5'
        ]);
        $username = $request->username;
        $nama = $request->nama;
        $level = $request->level;
        $telp = $request->telp;
        $password = $request->password;

        DB::table('petugas')->insert([
            'username' => $username,
            'nama_petugas' => $nama,
            'level' => $level,
            'telp' => $telp,
            'password' => Hash::make($password),
            
        ]);

        return redirect('/petugas');
    }

    function pengaduan(){
        $pengaduan = DB::table('pengaduan')->get();
        return view('/pengaduan-petugas',['pengaduan'=>$pengaduan]);
    }

    function petugas()
    {
        // $pengaduan = Pengaduan::where"id_pengaduan",$id->first();
        $petugas = DB::table('petugas')->get();
        return view('petugas', ['petugas' => $petugas]);
    }

    function update_petugas($id)
    {
        $petugas = DB::table('petugas')->where('id_petugas', $id)->first();
        return view('update-petugas', ['petugas' => $petugas]);
    }

    function proses_update_petugas(Request $request, $id)
    {
        $nama = $request->nama_petugas;

        DB::table('petugas')
            ->where('id_petugas', $id)
            ->update(['nama_petugas' => $nama]);

        return redirect('/petugas');
    }

    function petugas_login()
    {
        return view('/petugas-login');
    }

    function login_petugas(Request $request)
    {
        $data = $request->only("username", "password");
        if (Auth::guard("CekPetugas")->attempt($data)) {
            return redirect('/petugas-home');
        } else {
            return view('petugas-login');
        }
    }

    public function Petugas_home()
    {
        $pengaduan = pengaduan::all();
        return view('/Petugas-home', ['pengaduan' => $pengaduan]);
    }

    function tampil_register_petugas()
    {
        return view('/petugas-register');
    }

    function petugas_register(Request $request)
    {
        $nama = $request->nama;
        $username = $request->username;
        $level = $request->level;
        $password = $request->password;
        $telepon = $request->telepon;

        DB::table('petugas')->insert([
            'nama_petugas' => $nama,
            'username' => $username,
            'level' => $level,
            'password' => Hash::make($request->password),
            'telp' => $telepon
        ]);

        return redirect('/petugas-login');
    }

    function petugas_logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('/petugas-login');
    }

    function petugas_tanggapan(request $request, $id)
    {
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $detail = DB::table('pengaduan')
        ->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')
        ->get();

        $tanggapan = DB::table('tanggapan')
        ->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
        ->where('pengaduan.id_pengaduan','=',$id)
        ->get();

    return view('/petugas-tanggapan', ['tanggapan'=>$tanggapan,'detail'=>$detail,'pengaduan' => $pengaduan]);
    }

    function proses_berikan_tanggapan(Request $request, $id)
    {
        $tanggapan = $request->tanggapan;
        $status = $request->status;
        $id_pengaduan = $request->id_pengaduan;

        DB::table('tanggapan')
            ->insert([
                'tanggapan' => $tanggapan,
                "id_pengaduan" => $id_pengaduan,
                'tgl_pengaduan' => date('y-m-d'),
                'id' => Auth::guard('CekPetugas')->id(),
            ]);

        DB::table('pengaduan')
            ->where('id_pengaduan', $id)
            ->update(['status' => $status]);

        return redirect()->back();
    }

    function detail_tanggapan(request $request, $id)
    {
        $pengaduan = DB::table('pengaduan')->where('id_pengaduan', $id)->first();
        $detail = DB::table('pengaduan')
        ->join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')
        ->get();

        $tanggapan = DB::table('tanggapan')
        ->join('pengaduan', 'pengaduan.id_pengaduan', '=', 'tanggapan.id_pengaduan')
        ->where('pengaduan.id_pengaduan','=',$id)
        ->get();

    return view('/detail-tanggapan', ['tanggapan'=>$tanggapan,'detail'=>$detail,'pengaduan' => $pengaduan]);
    }
}
