<?php

namespace App\Http\Controllers;

use App\Models\KursusTahfiz;
use Illuminate\Http\Request;

class KursusTahfizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $senaraiKursus = KursusTahfiz::all();
        return view('kursus_tahfiz.index', compact('senaraiKursus'));
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
            'nama_kursus' => 'required|unique:kursus_tahfizs'
        ], [
            'nama_kursus.required' => 'Nama kursus wajib diisi',
            'nama_kursus.unique' => 'Nama kursus sudah digunakan, sila masukkan nama kursus yang lain'
        ]);

        $data = [
            'nama_kursus' => $request->nama_kursus,
            'status' => $request->status
        ];

        KursusTahfiz::create($data);

        return redirect(route('kursus_tahfiz.index'))->with('success', 'Rekod berjaya disimpan');
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
        $kemaskiniData = KursusTahfiz::find($id);
        $senaraiKursus = KursusTahfiz::all();
        //$kemaskiniData = Kursus::pluck('nama_kursus', 'id');
        return view('kursus_tahfiz.edit', compact('kemaskiniData', 'senaraiKursus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Kemas kini nama kursus
        $dataKursus = KursusTahfiz::find($id);
        $kemaskini = $request->all();
        $dataKursus->update($kemaskini);
        return redirect()->route('kursus_tahfiz.index')->with('success', 'Data berjaya dikemas kini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // buang rekod
        KursusTahfiz::destroy($id);
        return redirect('kursus_tahfiz');
    }
}
