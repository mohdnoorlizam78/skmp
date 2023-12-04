<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('sesi.index');
        return view('login');
    }

    public function login(Request $request)
    {
        Session::flash('email', $request->input('email')); // periksa emel dan katalaluan yang dimasukkan bila salah

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
            return redirect('dashboard')->with('success', 'Berhasil login');
        } else {
            return redirect('')->withErrors('Emel dan katalaluan yang dimasukkan tidak sesuai')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('')->with('success', 'Anda telah log keluar.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
