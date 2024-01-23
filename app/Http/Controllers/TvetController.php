<?php

namespace App\Http\Controllers;

use App\Models\KursusTvet;
use App\Models\Tvet;
use Illuminate\Http\Request;

class TvetController extends Controller
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
        $senaraiMohon = Tvet::all();
        $senaraiKursus = KursusTvet::all();
        return view('tvet.senarai_mohon', compact(
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
        $mohontvet = Tvet::all();
        $senaraiKursus = KursusTvet::where('status', '1')->get();
        return view('tvet.create', compact(
            'mohontvet',
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
            'nama_penuh' => 'required|regex:/^[a-zA-Z@-Z\s]+$/', //cth nama lizam@ali, muthu a/l
            'no_kp' => 'required|unique:tvets|regex:/^\d{6}-\d{2}-\d{4}$/',
            'alamat' => 'required',
            'no_tel' => 'required',
            'no_tel_ibubapa' => 'required',
            'emel' => 'required|email|unique:tvets',
            'kursus_id1' => 'required',
            'kursus_id2' => 'required',
            'kursus_id3' => 'required',
            'akuan' => 'required',

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
            'kursus_id1' => 'Sila pilih kursus pertama',
            'kursus_id2' => 'Sila pilih kursus kedua',
            'kursus_id3' => 'Sila pilih kursus ketiga',
            'akuan' => 'Tanda pada akuan'
        ]);

        $data = [
            'nama_penuh' => $request->nama_penuh,
            'no_kp' => $request->no_kp,
            'alamat' => $request->alamat,
            'no_tel' => $request->no_tel,
            'no_tel_ibubapa' => $request->no_tel_ibubapa,
            'emel' => $request->emel,
            'kursus_id1' => $request->kursus_id1,
            'kursus_id2' => $request->kursus_id2,
            'kursus_id3' => $request->kursus_id3,
            'akuan' => $request->akuan

        ];

        Tvet::create($data);

        return redirect(route('tvet.create'))->with('berjaya', 'Permohonan berjaya disimpan');
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

    public function test()
    {
        // buat data baru 
        $mohontvet = Tvet::all();
        $senaraiKursus = KursusTvet::where('status', '1')->get();
        return view('tvet.testing', compact(
            'mohontvet',
            'senaraiKursus'
        ));
    }
}
