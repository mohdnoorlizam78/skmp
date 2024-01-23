<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tahfiz;
use App\Models\KursusTahfiz;


class TahfizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('index');
    }

    public function senarai_mohon()
    {
        $senaraiMohon = Tahfiz::all();
        $senaraiKursus = KursusTahfiz::all();
        return view('tvet_tahfiz.senarai_mohon', compact(
            'senaraiKursus',
            'senaraiMohon'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // buat data baru 
        $mohontahfiz = Tahfiz::all();
        $senaraiKursus = KursusTahfiz::where('status', '1')->get();
        return view('tvet_tahfiz.create', compact(
            'mohontahfiz',
            'senaraiKursus'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //'nama_penuh' => 'required',
            //'nama_penuh' => 'required|regex:[a-zA-Z\s]',
            'nama_penuh' => 'required|regex:/^[a-zA-Z@-Z\s]+$/',
            'no_kp' => 'required|unique:tahfizs|regex:/^\d{6}-\d{2}-\d{4}$/',
            'alamat' => 'required',
            'no_tel' => 'required',
            'no_tel_ibubapa' => 'required',
            'emel' => 'required|email|unique:tahfizs',
            'kursus_id' => 'required',
            'akuan' => 'required',
            'akuanjuz' => 'required'

        ], [
            'nama_penuh.required' => 'Nama wajib diisi.',
            'nama_penuh.regex' => 'Ruangan nama tidak boleh ada nombor',
            'no_kp.unique' => 'No Kad Pengenalan sudah digunakan, sila masukkan No Kad Pengenalan yang lain',
            'no_kp.required' => 'No Kad Pengenalan wajib diisi',
            'no_kp.regex' => 'No Kad Pengenal tidak ikut format',
            'alamat.required' => 'Alamat rumah wajib diisi',
            'no_tel.required' => 'Nombor telefon wajib diisi',
            'no_tel_ibubapa.required' => 'Nombor telefon ibubapa wajib diisi',
            'emel.required' => 'Emel wajib diisi',
            'emel.email' => 'Emel yang dimasukkan tidak sah',
            'emel.unique' => 'Emel sudah digunakan, sila masukkan email yang lain',
            'kursus_id' => 'Sila pilih kursus',
            'akuan' => 'Tanda pada akuan',
            'akuanjuz' => 'Tanda pada akuan juz'
        ]);

        $data = [
            'nama_penuh' => $request->nama_penuh,
            'no_kp' => $request->no_kp,
            'alamat' => $request->alamat,
            'no_tel' => $request->no_tel,
            'no_tel_ibubapa' => $request->no_tel_ibubapa,
            'emel' => $request->emel,
            'kursus_id' => $request->kursus_id,
            'akuan' => $request->akuan,
            'akuanjuz' => $request->akuanjuz

        ];

        Tahfiz::create($data);

        //return view('tvet_tahfiz.create')->with('berjaya', 'Permohonan telah disimpan.');
        return redirect(route('tvet_tahfiz.create'))->with('berjaya', 'Permohonan berjaya disimpan');
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
