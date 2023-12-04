<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //senarai tujuan
        $senaraiTujuan = Tujuan::orderBy('nama_tujuan', 'asc')->get();
        return view('tujuan.index', compact('senaraiTujuan'));
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
        $simpanData = new Tujuan();
        $simpanData->nama_tujuan = $request->input('nama_tujuan');
        $simpanData->save();

        //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
        return redirect(route('tujuan.index'))->with('success', 'Rekod berjaya disimpan');
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
        // buka laman tujuan/edit
        $senaraiTujuan = Tujuan::find($id);
        return view('tujuan.edit', compact('senaraiTujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //kemas kini tujan
        $request->validate([
            'nama_tujuan' => 'required|max:255',

        ]);
        $kemaskini = Tujuan::find($id);
        $kemaskini->update($request->all());
        return redirect()->route('tujuan.index')->with('success', 'Data telah dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // buang rekod
        Tujuan::destroy($id);
        return redirect('tujuan');
    }
}
