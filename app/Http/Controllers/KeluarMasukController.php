<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\LaranganModel;
use App\Models\Pelajar;
use App\Models\Tujuan;
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
        $dibenarkankeluar = KeluarMasuk::where('tujuan_id', '1')->get();
        // ->where('tujuan_id', '3')
        // ->get();

        $dibenarkanbalik = KeluarMasuk::orderBy('updated_at', 'desc')
            ->where('tujuan_id', '2')
            ->where('statuskebenaran_id', '2')
            ->get();
        $dibenarkanklinik = KeluarMasuk::orderBy('updated_at', 'desc')
            ->where('tujuan_id', '3')
            ->get();

        return view('keluarmasuk.index', compact(
            'dibenarkanKeluarMasuk',
            'dibenarkankeluar',
            'dibenarkanbalik',
            'dibenarkanklinik',
            'data',
            'permohonan_ditolak',
            'permohonan_digantung',
        ));
    }

    public function rekodpenuh()
    {

        //$tidakBolehKeluarMasuk = KeluarMasuk::where('statuskebenaran_id', '3')->get();
        $permohonan_ditolak = KeluarMasuk::where('statuskebenaran_id', '3')->get();
        $permohonan_digantung = KeluarMasuk::where('statuskebenaran_id', '4')->get();
        $dibenarkanbalik = KeluarMasuk::orderBy('updated_at', 'desc')
            ->where('tujuan_id', '2')
            ->where('statuskebenaran_id', '2')
            ->get();
        $dibenarkankeluar = KeluarMasuk::orderBy('tarikh_keluar', 'desc')
            ->where('tujuan_id', '1')
            ->get();
        $klinik = KeluarMasuk::orderBy('updated_at', 'desc')
            ->where('tujuan_id', '3')
            ->get();

        return view('keluarmasuk.rekodpenuh', compact(

            'dibenarkankeluar',
            'dibenarkanbalik',
            'klinik',
            'permohonan_ditolak',
            'permohonan_digantung',

        ));
    }

    public function mohonkeluar(Request $request)
    {
        //paparkan status permohonan pelajar
        $pelajarid = Auth()->user()->id;
        $pelajarData = Pelajar::where('user_id', $pelajarid)->first();

        $dataMohon = KeluarMasuk::where('user_id', $pelajarid)
            ->orderBy('updated_at', 'desc')
            ->get();
        $senaraiTujuan = Tujuan::all();

        return view('keluarmasuk.mohonkeluar', compact(
            'dataMohon',
            'senaraiTujuan',
            'pelajarData'
        ));
    }

    // public function simpanmohonkeluar(Request $request)
    // {
    //     // simpan permohonan
    //     $request->validate(

    //         [
    //             'tujuan_id' => 'required',
    //         ],
    //         [
    //             'tujuan_id.required' => 'Tujuan wajib dipilih'
    //         ]
    //     );

    //     $data = [
    // 'user_id' => $request->user_id,
    // 'kursus_id' => $request->kursus_id,
    // 'ndp_id' => $request->ndp_id,
    // 'tujuan_id' => $request->tujuan_id,
    // 'destinasi' => $request->destinasi,
    // 'statuskebenaran_id' => $request->statuskebenaran_id,
    // 'pegawaikeluar_id' => $request->pegawaikeluar_id,
    // 'pegawaimasuk_id' => $request->pegawaimasuk_id,
    // 'status_masuk' => $request->status_masuk

    //     ];

    //     KeluarMasuk::create($data);

    //     //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
    //     return redirect(route('keluarmasuk.mohonkeluar'))->with('success', 'Rekod berjaya disimpan');
    // }

    public function simpanmohonkeluar(Request $request)
    {
        // periksa dan simpan data form
        $request->validate([
            'tujuan_id' => 'required',
        ]);

        $tarikh_baru = $request->input('created_at');
        $pelajarid = Auth()->user()->id;

        // periksa tindakan disiplin
        $rekodTindakanDisiplin = Pelajar::where('gantung', '0')
            ->where('user_id', $pelajarid)
            ->first();

        // periksa tarikh mohon, adakah sama dengan tarikh telah dimohon
        $rekodSediaAdaKeluar = KeluarMasuk::whereDate('created_at', now()->toDateString())
            ->where('tujuan_id', '1')
            ->first();

        if ($rekodTindakanDisiplin) {
            // paparkan mesej tindakan disiplin
            $message = 'Permohonan gagal. Anda telah digantung untuk keluar.';
            return redirect()->back()->with('gagal', $message);
        } elseif ($rekodSediaAdaKeluar) {
            // paparkan mesej permohonan keluar gagal.
            $message = 'Permohonan gagal. Anda telah mohon keluar pada hari yang sama.';
            return redirect()->back()->with('gagal', $message);
        } else {
            // Simpan permohonan baru
            KeluarMasuk::create([
                'created_at' => $tarikh_baru,
                'user_id' => $request->input('user_id'),
                'kursus_id' => $request->input('kursus_id'),
                'ndp_id' => $request->input('ndp_id'),
                'tujuan_id' => $request->input('tujuan_id'),
                'destinasi' => $request->input('destinasi'),
                'statuskebenaran_id' => $request->input('statuskebenaran_id'),
                'pegawaikeluar_id' => $request->input('pegawaikeluar_id'),
                'pegawaimasuk_id' => $request->input('pegawaimasuk_id'),
                'status_masuk' => $request->input('status_masuk'),
            ]);

            $message = 'Permohonan telah disimpan!';
        }
        return redirect()->back()->with('berjaya', $message);
    }

    public function simpanmohonbalik(Request $request)
    {
        // periksa dan simpan data form
        $request->validate([
            'tujuan_id' => 'required',
        ]);

        $tarikh_baru = $request->input('created_at');

        $pelajarid = Auth()->user()->id;

        // periksa tindakan disiplin
        $rekodTindakanDisiplin = Pelajar::where('gantung', '0')
            ->where('user_id', $pelajarid)
            ->first();

        // periksa tarikh mohon, adakah sama dengan tarikh telah dimohon
        $rekodSediaAdaBalik = KeluarMasuk::whereDate('created_at', now()->toDateString())
            ->where('tujuan_id', '2')
            ->first();

        if ($rekodTindakanDisiplin) {
            // paparkan mesej tindakan disiplin
            $message = 'Permohonan gagal. Anda telah digantung untuk balik rumah.';
            return redirect()->back()->with('gagal', $message);
        } elseif ($rekodSediaAdaBalik) {
            // paparkan mesej permohonan keluar gagal.
            $message = 'Permohonan gagal. Anda telah mohon keluar balik pada hari yang sama.';
            return redirect()->back()->with('gagal', $message);
        } else {
            // Simpan permohonan baru
            KeluarMasuk::create([
                'created_at' => $tarikh_baru,
                'user_id' => $request->input('user_id'),
                'kursus_id' => $request->input('kursus_id'),
                'ndp_id' => $request->input('ndp_id'),
                'tujuan_id' => $request->input('tujuan_id'),
                'destinasi' => $request->input('destinasi'),
                'statuskebenaran_id' => $request->input('statuskebenaran_id'),
                'pegawaikeluar_id' => $request->input('pegawaikeluar_id'),
                'pegawaimasuk_id' => $request->input('pegawaimasuk_id'),
                'status_masuk' => $request->input('status_masuk'),
            ]);

            $message = 'Permohonan telah disimpan!';
        }
        return redirect()->back()->with('berjaya', $message);
    }
    public function simpanmohonklinik(Request $request)
    {
        // periksa dan simpan data form
        $request->validate([
            'tujuan_id' => 'required',
        ]);

        $tarikh_baru = $request->input('created_at');

        // periksa tarikh mohon, adakah sama dengan tarikh telah dimohon
        // $rekodSediaAdaKlinik = KeluarMasuk::whereDate('created_at', now()->toDateString())
        //     ->where('tujuan_id', '3')
        //     ->first();

        // if ($rekodSediaAdaKlinik) {
        //     // paparkan mesej permohonan keluar gagal.
        //     $message = 'Permohonan gagal. Anda telah mohon keluar ke klinik pada hari yang sama.';
        //     return redirect()->back()->with('gagal', $message);
        // } else {
        //     // Simpan permohonan baru
        //     KeluarMasuk::create([
        //         'created_at' => $tarikh_baru,
        //         'user_id' => $request->input('user_id'),
        //         'kursus_id' => $request->input('kursus_id'),
        //         'ndp_id' => $request->input('ndp_id'),
        //         'tujuan_id' => $request->input('tujuan_id'),
        //         'destinasi' => $request->input('destinasi'),
        //         'statuskebenaran_id' => $request->input('statuskebenaran_id'),
        //         'pegawaikeluar_id' => $request->input('pegawaikeluar_id'),
        //         'pegawaimasuk_id' => $request->input('pegawaimasuk_id'),
        //         'status_masuk' => $request->input('status_masuk'),
        //     ]);

        //     $message = 'Permohonan telah disimpan!';
        // }

        KeluarMasuk::create([
            'created_at' => $tarikh_baru,
            'user_id' => $request->input('user_id'),
            'kursus_id' => $request->input('kursus_id'),
            'ndp_id' => $request->input('ndp_id'),
            'tujuan_id' => $request->input('tujuan_id'),
            'destinasi' => $request->input('destinasi'),
            'statuskebenaran_id' => $request->input('statuskebenaran_id'),
            'pegawaikeluar_id' => $request->input('pegawaikeluar_id'),
            'pegawaimasuk_id' => $request->input('pegawaimasuk_id'),
            'status_masuk' => $request->input('status_masuk'),
        ]);

        $message = 'Permohonan telah disimpan!';
        return redirect()->back()->with('berjaya', $message);
    }

    public function semakPermohonan()
    {
        //paparkan status permohonan pelajar
        $senaraiTujuan = Tujuan::all();
        $semakStatus = KeluarMasuk::orderBy('created_at', 'desc')
            ->where('statuskebenaran_id', '1')
            ->get();

        return view('keluarmasuk.semakpermohonan', compact(
            'senaraiTujuan',
            'semakStatus'
        ));
    }
    public function lulusSemua()
    {
        KeluarMasuk::query()->update(['statuskebenaran_id' => '2']);
        return redirect()->route('keluarmasuk.semakpermohonan')->with('success', 'Data berjaya dikemas kini.');
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
