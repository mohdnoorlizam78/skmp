<?php

namespace App\Http\Controllers;

use App\Models\Pelajar;
use App\Models\Kursus;
use App\Models\Peranan;
use App\Models\SesiMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Validation\Rule;

class PelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // paparkan senarai pelajar
        $senaraiPelajar = Pelajar::orderBy('created_at', 'DESC')->get();
        $senaraiKursus = Kursus::all();
        $sesiMasuk = SesiMasuk::all();
        $senaraiPeranan = Peranan::all();
        $latestId = User::latest('id')->value('id');

        return view('pelajar.index', compact(
            'senaraiPelajar',
            'senaraiKursus',
            'sesiMasuk',
            'latestId',
            'senaraiPeranan'
        ));
        //return view('pelajar.index', ['senaraiPelajar' => $senaraiPelajar]);
    }
    public function info(Request $request, string $id)
    {
        // paparkan maklumat terperinci pelajar
        $kemaskiniPelajar = Pelajar::find($id);
        $senaraiKursus = Kursus::all();
        $senaraiSesiMasuk = SesiMasuk::all();
        return view('pelajar.info', compact('kemaskiniPelajar', 'senaraiKursus', 'senaraiSesiMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // buat data baru 
        $senaraiKursus = Kursus::all();
        return view('pelajar.create', compact('senaraiKursus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //simpan pelajar baru

        $request->validate([
            'nama_pelajar' => 'required',
            //'no_ndp' => 'required|unique',
            'no_ndp' => 'required|unique:pelajars|max:255',
            'no_tel' => 'required',
            'no_tel_penjaga' => 'required'
        ], [
            'nama_pelajar.required' => 'Nama wajib diisi',
            'no_ndp.required' => 'NDP wajib diisi',
            'no_ndp.unique' => 'NDP sudah digunakan, silakan masukkan NDP yang lain',
            'no_tel.required' => 'No. tel wajib diisi',
            'no_tel_penjaga.required' => 'No. tel penjaga wajib dipilih'
        ]);

        $data = [
            'user_id' => $request->user_id,
            'nama_pelajar' => $request->nama_pelajar,
            'jantina' => $request->jantina,
            'kursus_id' => $request->kursus_id,
            'no_ndp' => $request->no_ndp,
            'sesimasuk_id' => $request->sesimasuk_id,
            //'gambar' => $request->gambar,
            'alamat_rumah' => $request->alamat_rumah,
            'alamat_lain' => $request->alamat_lain,
            'no_tel' => $request->no_tel,
            'no_tel_penjaga' => $request->no_tel_penjaga,
            'status' => $request->status,

        ];
        $formData = $request->input('user_id');
        // $validatedData = new User();
        // $validatedData->user_id = $request->input('user_id');

        Pelajar::create($data);

        return view('pelajar.index', compact('formData'))->with('success', 'Rekod berjaya disimpan.');
        //return redirect(route('pelajar.index'))->with('success', 'Rekod berjaya disimpan');
    }
    public function storePengguna(Request $request)
    {
        //simpan data baru

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Emel wajib diisi',
            'email.email' => 'Emel yang dimasukkan tidak valid',
            'email.unique' => 'Emel sudah digunakan, sila masukkan email yang lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimum katalaluan 8 karakter'
        ]);

        $data = [
            //'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => FacadesHash::make($request->password),
            'peranan_id' => $request->peranan_id,
            'status' => $request->status
        ];
        User::create($data);

        $validatedData = new Pelajar();
        $nextId = User::max('id');
        $validatedData->user_id = $nextId;
        $validatedData->nama_pelajar = $request->input('name');
        $validatedData->status = 1;
        $validatedData->save();



        return redirect('pelajar')->with('success', 'Rekod berjaya disimpan');
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
        //kemas kini senarai pelajar
        $kemaskiniPelajar = Pelajar::find($id);
        $senaraiKursus = Kursus::all();
        $sesiKemasukan = SesiMasuk::all();
        return view('pelajar.edit', compact(
            'kemaskiniPelajar',
            'senaraiKursus',
            'sesiKemasukan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Kemas kini nama kursus
        $kemaskiniPelajar = Pelajar::find($id);
        $kemaskini = $request->all();
        $kemaskiniPelajar->update($kemaskini);
        return redirect()->route('pelajar.index')->with('success', 'Data berjaya dikemas kini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
