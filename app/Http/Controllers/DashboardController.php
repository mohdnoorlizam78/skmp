<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\Pelajar;
use App\Models\StatusKebenaran;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // function __construct()
    // {
    //     //menggunakan construct untuk kawal keseluruhan class.
    //     $this->middleware(['role_or_permission:warden|keluarmasuk']);
    // }

    public function index()
    {
        //dd(auth()->user()->getRoleNames());// periksa user role

        $dataKeluarMasuk = KeluarMasuk::all();
        $data_pelajar =  Pelajar::orderBy('id', 'desc')->get();
        $data_outing = KeluarMasuk::where('tujuan_id', '1')->get();
        $data_balik = KeluarMasuk::where('tujuan_id', '2')->get();
        $data_klinik = KeluarMasuk::where('tujuan_id', '3')->get();
        $pelajar_aktif = Pelajar::where('status', '1')->get();
        $data_lelaki = Pelajar::where('jantina', '1')
            ->where('status', '1')
            ->get();

        $data_perempuan = Pelajar::where('jantina', '2')
            ->where('status', '1')
            ->get();

        // cari data hari ini
        $hariini = Carbon::today()->toDateString();
        $rekod_keluar_sekarang = KeluarMasuk::whereDate('tarikh_keluar', $hariini)
            ->where('tujuan_id', '1')
            ->get();
        $rekod_balik_sekarang = KeluarMasuk::whereDate('tarikh_keluar', $hariini)
            ->where('tujuan_id', '2')
            ->get();
        $rekod_klinik_sekarang = KeluarMasuk::whereDate('tarikh_keluar', $hariini)
            ->where('tujuan_id', '3')
            ->get();

        // cari data semalam
        $semalam = Carbon::yesterday()->toDateString();
        $rekod_keluar_semalam = KeluarMasuk::whereDate('tarikh_keluar', $semalam)
            ->where('tujuan_id', '1')
            ->get();
        $rekod_balik_semalam = KeluarMasuk::whereDate('tarikh_keluar', $semalam)
            ->where('tujuan_id', '2')
            ->get();
        $rekod_klinik_semalam = KeluarMasuk::whereDate('tarikh_keluar', $semalam)
            ->where('tujuan_id', '3')
            ->get();

        return view('dashboard.index', compact(
            'dataKeluarMasuk',
            'data_pelajar',
            'data_outing',
            'data_balik',
            'data_klinik',
            'pelajar_aktif',
            'data_lelaki',
            'data_perempuan',
            'rekod_keluar_semalam',
            'rekod_klinik_semalam',
            'rekod_balik_semalam',
            'rekod_keluar_sekarang',
            'rekod_klinik_sekarang',
            'rekod_balik_sekarang'
        ));

        // kaedah blade directive
        // if (auth()->user()->can('dashboard')) {
        //     return view('dashboard.index', compact(
        //         'dataKeluarMasuk',
        //         'data_pelajar',
        //         'data_outing',
        //         'data_balik',
        //         'data_klinik',
        //         'data_lelaki',
        //         'data_perempuan'
        //     ));
        // }
        return abort(403)->with('gagal', 'Anda tidak boleh akses laman ini.');
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
