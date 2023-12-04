<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        // paparkan log masuk
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        //dd($request->all()); // periksa data log masuk
        //Session::flash('email', $request->input('email')); // periksa emel dan katalaluan yang dimasukkan bila salah

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Emel wajib diisi',
            'password.required' => 'Katalaluan wajib diisi'
        ]);

        // autentikasi/pengesahan
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        // periksa data dari login page
        if (Auth::attempt($infologin)) {
            if (Auth::user()->peranan_id == "1") {
                return redirect('dashboard');
            } elseif (Auth::user()->peranan_id == "2") {
                return redirect('/keluarmasuk/semakpermohonan');
            } elseif (Auth::user()->peranan_id == "3") {
                return redirect('keluarmasuk');
            } else
                return redirect('keluarmasuk/mohonkeluar')->with('success', 'Berhasil login');
        } else {
            return redirect('login')->with('gagal', 'Emel atau kata laluan salah.')->withInput();
        }
    }
    public function pentadbir()
    {
        // paparkan log masuk
        return view('kursus');
    }
    public function warden()
    {
        // paparkan log masuk
        return view('/keluarmasuk/semakpermohonan');
    }
    public function pengawal()
    {
        // paparkan log masuk
        return view('keluarmasuk');
    }
    public function pelajar()
    {
        // paparkan log masuk
        return view('keluarmasuk/mohonkeluar');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('berjaya', 'Anda telah keluar.');
    }
}
