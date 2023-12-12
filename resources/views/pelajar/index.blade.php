@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SENARAI KESELURUHAN PELAJAR</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">senarai pelajar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
@if ($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif 


<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Tambah pelajar
                    </button>
                    {{-- <a href="{{ route('pelajar.create') }}" class="btn btn-primary">Tambah pelajar</a> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="tablePelajar" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Gambar</th>
                                <th>Nama pelajar</th>
                                <th>Kursus</th>
                                <th>NDP</th>
                                <th>Sesi Kemasukan</th>
                                <th>Alamat rumah</th>
                                <th>Alamat lain</th>
                                <th>No. Tel.</th>
                                <th>No. Tel. Penjaga</th>
                                <th>status</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($senaraiPelajar as $pelajar )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pelajar->gambar}}</td>
                                <td>
                                    <a href="{{ route('pelajar.info', $pelajar->id) }}">{{$pelajar->nama_pelajar}}</a>
                                    
                                </td>
                                <td>
                                    @if($pelajar->kursus_id == null)
                                    <p></p>
                                    @else
                                    {{$pelajar->kursus->nama_kursus}}
                                    @endif
                                </td>
                                <td>{{$pelajar->no_ndp}}</td>
                                <td>
                                    @if($pelajar->sesimasuk_id == null)
                                    <p></p>
                                    @else
                                    {{$pelajar->sesimasuk->nama_sesi}}
                                    @endif
                                </td>
                                <td>{{$pelajar->alamat_rumah}}</td>
                                <td>{{$pelajar->alamat_lain}}</td>
                                <td>{{$pelajar->no_tel}}</td>
                                <td>{{$pelajar->no_tel_penjaga}}</td>
                                <td>
                                    @if($pelajar->status == 0)
                                    Berhenti
                                    @elseif($pelajar->status == 1)
                                    Aktif
                                    @else
                                    Tangguh
                                    @endif
                                </td>
                                <td>
                                    <div class="row">

                                        <a href="{{ route('pelajar.edit', $pelajar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        {{-- &nbsp;
                                        <form action="{{ route('pelajar.destroy', $pelajar->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Buang</button>
                                        </form> --}}

                                    </div>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah pelajar baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('pelajar.storePengguna') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="status" name="status" value="1">
                                <input type="hidden" class="form-control" id="status" name="peranan_id" value="4">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$latestId+1}}">

                                <div class="form-group row">
                                    <label for="no_ndp" class="col-sm-2 col-form-label">Nama pelajar:</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                                    <div class="col-sm-10">
                                    <select id="kursus_id" name="kursus_id" class="form-control" required>
                                        <option value="">-- Pilih Kursus --</option>
                                        @foreach ($senaraiKursus as $kursus)
                                        <option value="{{$kursus->id}}" {{ old('kursus_id') == $kursus->id ? 'selected' : null }}>{{$kursus->nama_kursus}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_ndp" class="col-sm-2 col-form-label">NDP</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="no_ndp" class="form-control" id="no_ndp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sesimasuk_id" class="col-sm-2 col-form-label">Sesi Kemasukan</label>
                                    <div class="col-sm-10">
                                            <select id="sesimasuk_id" name="sesimasuk_id" class="form-control">
                                                <option value="">-- Pilih Sesi Kemasukan --</option>
                                                @foreach ($sesiKemasukan as $sesimasuk)
                                                <option value="{{$sesimasuk->id}}" {{ old('sesimasuk_id') == $sesimasuk->id ? 'selected' : null }}>{{$sesimasuk->nama_sesi}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jantina" class="col-sm-2 col-form-label">Jantina</label>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jantina" id="jantina" value="1">
                                            <label class="form-check-label" for="jantina">
                                                Lelaki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jantina" id="statuskebenaran_id" value="2">
                                            <label class="form-check-label" for="jantina">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat rumah</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="alamat_rumah" class="form-control" id="alamat_rumah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat_lain" class="col-sm-2 col-form-label">Alamat lain</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="alamat_lain" class="form-control" id="alamat_lain">
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="no_tel" class="col-sm-2 col-form-label">No. Tel. </label>
                                    <div class="col-sm-10">
                                    <input type="text" name="no_tel" class="form-control" id="no_tel" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_tel_penjaga" class="col-sm-2 col-form-label">No. Tel. Penjaga</label>
                                    <div class="col-sm-10">
                                    <input type="text" name="no_tel_penjaga" class="form-control" id="no_tel_penjaga">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Emel:</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Kata laluan:</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="formFile" class="col-sm-2 col-form-label">Gambar pelajar</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" type="file" id="gambar" name="gambar">
                                    </div>
                                </div>
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                                <button type="reset" class="btn btn-warning ">Reset</button>
                                <button type="submit" class="btn btn-success">Hantar</button>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>


@endsection