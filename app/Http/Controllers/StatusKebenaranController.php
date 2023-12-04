<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\StatusKebenaran;
use App\Models\Tujuan;
use App\Models\User;
use Illuminate\Http\Request;

class StatusKebenaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mohonKeluar()
    {
        //paparkan status permohonan pelajar
        $statusMohon = KeluarMasuk::all();
        $senaraiTujuan = Tujuan::all();
        return view('statuskebenaran.index', compact('statusMohon', 'senaraiTujuan'));
    }
    // public function semakPermohonan()
    // {
    //     //paparkan status permohonan pelajar
    //     $statusMohon = StatusKebenaran::all();
    //     $senaraiTujuan = Tujuan::all();
    //     return view('statuskebenaran.semakpermohonan', compact('statusMohon', 'senaraiTujuan'));
    // }

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
        // simpan permohonan
        $request->validate([
            'tujuan_id' => 'required',
            'tarikh_keluar' => 'required'
        ], [
            'tujuan_id.required' => 'Tujuan wajib dipilih',
            'tarikh_keluar.required' => 'Pilih tarikh untuk keluar'
        ]);

        $data = [
            'user_id' => $request->pelajar_id,
            'tujuan_id' => $request->tujuan_id,
            'tarikh_keluar' => $request->tarikh_keluar,
            'status_kebenaran' => $request->status_kebenaran,
            'pegawai_id' => $request->pegawai_id
        ];

        StatusKebenaran::create($data);

        //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
        return redirect(route('statuskebenaran.index'))->with('success', 'Rekod berjaya disimpan');
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
        //kemas kini permohonan
        $senaraiPermohonan = StatusKebenaran::find($id);
        $senaraiTujuan = Tujuan::all();
        return view('statuskebenaran.edit', compact('senaraiPermohonan', 'senaraiTujuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Kemas kini permohonan baru
        $kemaskiniPermohonan = StatusKebenaran::find($id);
        $kemaskini = $request->all();
        $kemaskiniPermohonan->update($kemaskini);

        return redirect()->route('statuskebenaran.semakpermohonan')->with('success', 'Permohonan berjaya dikemas kini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
