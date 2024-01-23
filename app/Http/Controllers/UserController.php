<?php

namespace App\Http\Controllers;

use App\Models\KeluarMasuk;
use App\Models\Pelajar;
use App\Models\User;
use App\Models\Peranan;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //paparkan senarai pengguna
        $senaraiPengguna = User::orderBy('id', 'DESC')->get();
        $senaraiPeranan = Peranan::all();
        $latestId = User::latest('id')->value('id');
        $senaraiWarden = User::orderBy('id', 'DESC')
            ->where('peranan_id', 2)
            ->get();
        $senaraiPengawal = User::orderBy('id', 'DESC')
            ->where('peranan_id', 3)
            ->get();
        $senaraiPelajar = User::orderBy('id', 'DESC')
            ->where('peranan_id', 4)
            ->get();

        return view('user.index', compact(
            'senaraiPengguna',
            'senaraiPeranan',
            'latestId',
            'senaraiWarden',
            'senaraiPengawal',
            'senaraiPelajar'
        ));
    }

    public function pentadbir()
    {
        //paparkan senarai pengguna
        $senaraiPengguna = User::orderBy('id', 'DESC')->get();
        $senaraiPeranan = Peranan::all();
        $latestId = User::latest('id')->value('id');

        return view('user.pentadbir', compact('senaraiPengguna', 'senaraiPeranan', 'latestId'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // simpan pengguna baru
        // $penggunaBaru = Role::pluck('name','name')->all();
        // return view('users.create',compact('penggunaBaru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //simpan data baru

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'peranan_id' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Emel wajib diisi',
            'email.email' => 'Emel yang dimasukkan tidak valid',
            'email.unique' => 'Emel sudah digunakan, sila masukkan email yang lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimum katalaluan 8 karakter',
            'peranan_id.required' => 'Peranan wajib dipilih',
            'status.required' => 'Status wajib dipilih'
        ]);

        $data = [
            //'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => FacadesHash::make($request->password),
            'peranan_id' => $request->peranan_id,
            'status' => $request->status,
            'gantung' => $request->gantung,
        ];
        User::create($data);

        $validatedData = new Pelajar();
        $nextId = User::max('id');
        $validatedData->user_id = $nextId;
        $validatedData->nama_pelajar = $request->input('name');
        $validatedData->status = 1;
        $validatedData->gantung = 1;
        $validatedData->save();

        //return view('tujuan.index', compact('simpanData'))->with('success', 'Rekod berjaya disimpan.');
        return redirect('user')->with('success', 'Rekod berjaya disimpan');
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
        //kemas kini senarai pengguna
        $senaraiPengguna = User::find($id);
        $senaraiPeranan = Peranan::all();
        return view('user.edit', compact('senaraiPengguna', 'senaraiPeranan'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Kemas kini nama pengguna
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email,' . $id,
        //     'password' => 'same:confirm-password'
        //     // 'peranan_id' => 'required',
        //     // 'status' => 'required',
        // ]);



        $kemaskiniPengguna = User::find($id);
        $input = $request->all();
        // if (!empty($input['password'])) {
        //     $input['password'] = FacadesHash::make($input['password']);
        // } else {
        //     $input = Arr::except($input, array('password'));
        // }
        $kemaskiniPengguna->update($input);

        return redirect('user')->with('success', 'Data berjaya dikemas kini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // buang rekod
        User::destroy($id);
        return redirect('user');
    }
    public function infopengguna(string $id)
    {
        //maklumat pengguna
        $senaraiPengguna = User::find($id);
        $senaraiPeranan = Peranan::all();
        return view('user.infopengguna', compact('senaraiPengguna', 'senaraiPeranan'));
    }
    public function editinfo(string $id)
    {
        //kemas kini senarai pengguna
        $senaraiPengguna = User::find($id);
        return view('user.editinfo', compact('senaraiPengguna'));
    }
    public function updateinfo(Request $request, string $id)
    {
        $kemaskiniPengguna = User::find($id);
        $input = $request->all();
        $kemaskiniPengguna->update($input);
        if (Auth()->user()->peranan_id == 4)
            return redirect('keluarmasuk/mohonkeluar')->with('success', 'Profail dikemas kini.');
        elseif (Auth()->user()->peranan_id == 1)
            return redirect('dashboard');
        elseif (Auth()->user()->peranan_id == 2)
            return redirect('keluarmasuk/semakpermohonan')->with('success', 'Profail dikemas kini.');
        elseif (Auth()->user()->peranan_id == 3)
            return redirect('keluarmasuk')->with('success', 'Profail dikemas kini.');
    }
    public function updatepelajar(Request $request, string $id)
    {
        $kemaskiniPengguna = User::find($id);
        $input = $request->all();
        $kemaskiniPengguna->update($input);

        // return redirect('/keluarmasuk/mohonkeluar'); //boleh digunakan 
        return redirect()->route('keluarmasuk.mohonkeluar');
    }
}
