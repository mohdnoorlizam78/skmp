<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\Kursus;
use App\Models\Pelajar;
use App\Models\Peranan;
use App\Models\SesiMasuk;
use App\Models\StatusKebenaran;
use App\Models\Tujuan;
use App\Models\User;
use Illuminate\Http\Request;

class KeluarMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paparkan rekod keluar masuk
        $dibenarkanKeluarMasuk = KeluarMasuk::orderBy('created_at', 'desc')->get(); //dibenarkan keluar
        // $tidakBolehKeluarMasuk = KeluarMasuk::where('statuskebenaran_id', '3')
        //     ->where('statuskebenaran_id', '4')
        //     ->get();
        $data = KeluarMasuk::all();
        $permohonan_ditolak = KeluarMasuk::where('statuskebenaran_id', '3')->get();
        $permohonan_digantung = KeluarMasuk::where('statuskebenaran_id', '4')->get();

        return view('keluarmasuk.index', compact(
            'dibenarkanKeluarMasuk',
            'data',
            'permohonan_ditolak',
            'permohonan_digantung'
        ));
    }

    public function rekodpenuh()
    {
        // paparkan rekod keseluruhan keluar masuk
        $dataKeluarMasuk = KeluarMasuk::orderBy('created_at', 'desc')->get();
        $tidakBolehKeluarMasuk = KeluarMasuk::where('statuskebenaran_id', '3')->get();

        return view('keluarmasuk.rekodpenuh', compact('dataKeluarMasuk', 'tidakBolehKeluarMasuk'));
    }

    public function mohonkeluar(Request $request)
    {
        //paparkan status permohonan pelajar
        $pelajarid = Auth()->user()->id;
        $pelajarData = Pelajar::where('user_id', $pelajarid)->first();

        $dataMohon = KeluarMasuk::where('user_id', $pelajarid)->get();
        $senaraiTujuan = Tujuan::all();

        return view('keluarmasuk.mohonkeluar', compact(
            'dataMohon',
            'senaraiTujuan',
            'pelajarData'
        ));
    }

    public function simpanmohonkeluar(Request $request)
    {
        // simpan permohonan
        $request->validate(
            [
                'tujuan_id' => 'required',
            ],
            [
                'tujuan_id.required' => 'Tujuan wajib dipilih'
            ]
        );

        $data = [
            'user_id' => $request->user_id,
            'ndp_id' => $request->ndp_id,
            'tujuan_id' => $request->tujuan_id,
            'destinasi' => $request->destinasi,
            'statuskebenaran_id' => $request->statuskebenaran_id,
            'pegawaikeluar_id' => $request->pegawaikeluar_id,
            'pegawaimasuk_id' => $request->pegawaimasuk_id,
            'status_masuk' => $request->status_masuk
        ];

        KeluarMasuk::create($data);

        //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
        return redirect(route('keluarmasuk.mohonkeluar'))->with('success', 'Rekod berjaya disimpan');
    }
    public function semakPermohonan()
    {
        //paparkan status permohonan pelajar
        $statusMohon = KeluarMasuk::orderBy('created_at', 'desc')->get();
        $senaraiTujuan = Tujuan::all();
        $semakStatus = KeluarMasuk::where('statuskebenaran_id', '1')->get();
        // $tiadaPermohonan =  KeluarMasuk::where('statuskebenaran_id', '2')
        //     ->where('statuskebenaran_id', '3')
        //     ->get();

        return view('keluarmasuk.semakpermohonan', compact(
            'statusMohon',
            'senaraiTujuan',
            'semakStatus',
            // 'tiadaPermohonan'
        ));
    }
    public function editmohon(string $id)
    {
        //kemas kini permohonan
        $senaraiPermohonan = KeluarMasuk::find($id);
        $senaraiTujuan = Tujuan::all();
        return view('keluarmasuk.editmohon', compact('senaraiPermohonan', 'senaraiTujuan'));
    }
    public function sahkanmohon(string $id)
    {
        //kemas kini permohonan
        $senaraiPermohonan = KeluarMasuk::find($id);
        $senaraiTujuan = Tujuan::all();
        return view('keluarmasuk.sahkanmohon', compact('senaraiPermohonan', 'senaraiTujuan'));
    }
    public function updatemohon(Request $request, string $id)
    {
        //Kemas kini permohonan baru
        $kemaskiniPermohonan = KeluarMasuk::find($id);
        $kemaskini = $request->all();
        $kemaskiniPermohonan->update($kemaskini);

        return redirect()->route('keluarmasuk.semakpermohonan')->with('success', 'Permohonan berjaya dikemas kini.');
    }

    public function editkeluar(string $id)
    {
        // rekodkan pelajar keluar
        $editKeluar = KeluarMasuk::find($id);

        return view('keluarmasuk.editkeluar', compact('editKeluar'));
    }

    public function updatekeluar(Request $request, string $id)
    {
        $kemaskiniKeluar = KeluarMasuk::find($id);
        $kemaskini = $request->all();
        $kemaskiniKeluar->update($kemaskini);

        return redirect()->route('keluarmasuk.index')->with('success', 'Rekod keluar berjaya disahkan.');
    }
    public function editmasuk(string $id)
    {
        // rekodkan pelajar keluar
        $editMasuk = KeluarMasuk::find($id);

        return view('keluarmasuk.editmasuk', compact('editMasuk'));
    }

    public function updatemasuk(Request $request, string $id)
    {
        $kemaskiniKeluar = KeluarMasuk::find($id);
        $kemaskini = $request->all();
        $kemaskiniKeluar->update($kemaskini);

        return redirect()->route('keluarmasuk.index')->with('success', 'Rekod keluar berjaya disahkan.');
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
        // buang rekod permohonan pelajar dalam status proses atau tidak jadi keluar
        KeluarMasuk::destroy($id);
        return redirect('keluarmasuk/mohonkeluar');
    }
}
