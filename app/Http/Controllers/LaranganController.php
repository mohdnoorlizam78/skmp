<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\Kursus;
use App\Models\Pelajar;
use Illuminate\Http\Request;


class LaranganController extends Controller
{
    // paparan pelajar yang dilarang
    public function index()
    {
        $data = Pelajar::all();
        return view('warden.index', compact('data'));
    }
    public function edit(string $id)
    {
        //kemas kini senarai pelajar
        $gantungPelajar = Pelajar::find($id);
        $senaraiKursus = Kursus::all();

        return view('warden.edit', compact(
            'gantungPelajar',
            'senaraiKursus'
        ));
    }
    public function update(Request $request, string $id)
    {
        //Kemas kini digantung
        $kemaskiniPelajar = Pelajar::find($id);
        $kemaskini = $request->all();
        $kemaskiniPelajar->update($kemaskini);
        return redirect()->route('warden.index')->with('success', 'Data berjaya dikemas kini.');
    }
}
