<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //memaparkan senarai kursus
        $senaraiKursus = Kursus::all();
        //return view('kursus.index', compact('senaraiKursus'));
        return view('kursus.index', ['senaraiKursus' => $senaraiKursus]);
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
        //simpan data baru

        $request->validate([
            'nama_kursus' => 'required|unique:kursuses'
        ], [
            'nama_kursus.required' => 'Nama kursus wajib diisi',
            'nama_kursus.unique' => 'Nama kursus sudah digunakan, sila masukkan nama kursus yang lain'
        ]);

        $data = [
            'nama_kursus' => $request->nama_kursus
        ];

        Kursus::create($data);

        //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
        return redirect(route('user.index'))->with('success', 'Rekod berjaya disimpan');
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
        //kemas kini senarai kursus
        $kemaskiniData = Kursus::find($id);
        $senaraiKursus = Kursus::all();
        //$kemaskiniData = Kursus::pluck('nama_kursus', 'id');
        return view('kursus.edit', compact('kemaskiniData', 'senaraiKursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Kemas kini nama kursus
        $dataKursus = Kursus::find($id);
        $kemaskini = $request->all();
        $dataKursus->update($kemaskini);
        return redirect()->route('kursus.index')->with('success', 'Data berjaya dikemas kini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // buang rekod
        Kursus::destroy($id);
        return redirect('kursus');
    }
}
