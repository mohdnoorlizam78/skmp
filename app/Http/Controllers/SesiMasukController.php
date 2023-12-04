<?php

namespace App\Http\Controllers;

use App\Models\SesiMasuk;
use Illuminate\Http\Request;

class SesiMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paparkan senarai sesi
        $senaraiSesi = SesiMasuk::all();
        return view('sesimasuk.index', compact('senaraiSesi'));
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
        $simpanData = new SesiMasuk();
        $simpanData->nama_sesi = $request->input('nama_sesi');
        $simpanData->save();

        return redirect(route('sesimasuk.index'))->with('success', 'Rekod berjaya disimpan');
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
        // buka laman sesi/edit
        $senaraiSesi = SesiMasuk::find($id);
        return view('sesimasuk.edit', compact('senaraiSesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //kemas kini sesi
        $request->validate([
            'nama_sesi' => 'required|max:255',

        ]);
        $kemaskini = SesiMasuk::find($id);
        $kemaskini->update($request->all());
        return redirect()->route('sesimasuk.index')->with('success', 'Data telah dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // buang rekod
        SesiMasuk::destroy($id);
        return redirect('sesimasuk');
    }
}
