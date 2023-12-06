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
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Rekod Baru
                    </button> -->
                    <a href="{{ route('pelajar.create') }}" class="btn btn-primary">Tambah pelajar</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
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
                                <td>{{$pelajar->kursus->nama_kursus}}</td>
                                <td>{{$pelajar->no_ndp}}</td>
                                <td>{{$pelajar->sesimasuk->nama_sesi}}</td>
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

                                        <a href="{{ route('pelajar.edit', $pelajar->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        &nbsp;
                                        <form action="{{ route('pelajar.destroy', $pelajar->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Buang</button>
                                        </form>

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

            <!-- 
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
                            <form method="POST" action="{{ route('pelajar.store') }}">
                                @csrf
                                <input type="text" value="13" name="user_id">

                                <div class="mb-3">
                                    <label for="nama_pelajar" class="col-form-label">Nama pelajar:</label>
                                    <input type="text" class="form-control" id="nama_pelajar" name="nama_pelajar" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                                    <select id="kursus_id" name="kursus_id" class="form-control" required>
                                        <option value="">-- Pilih Kursus --</option>
                                        @foreach ($senaraiKursus as $kursus)
                                        <option value="{{$kursus->id}}" {{ old('kursus_id') == $kursus->id ? 'selected' : null }}>{{$kursus->nama_kursus}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <dvi class="mb-3">
                                    <label for="no_ndp" class="col-sm-2 col-form-label">NDP</label>
                                    <input type="text" name="no_ndp" class="form-control" id="no_ndp" required>
                                </dvi>
                                <div class="mb-3">
                                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                                    <input type="text" name="semester" class="form-control" id="semester" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat rumah</label>
                                    <input type="text" name="alamat_rumah" class="form-control" id="alamat_rumah">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lain" class="col-sm-2 col-form-label">Alamat lain</label>
                                    <input type="text" name="alamat_lain" class="form-control" id="alamat_lain">
                                </div>
                                <div class="mb-3">
                                    <label for="no_tel" class="col-sm-2 col-form-label">No. Tel. </label>
                                    <input type="text" name="no_tel" class="form-control" id="no_tel" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_tel_penjaga" class="col-sm-2 col-form-label">No. Tel. Penjaga</label>
                                    <input type="text" name="no_tel_penjaga" class="form-control" id="no_tel_penjaga">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Aktif">
                                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="Berhenti">
                                        <label class="form-check-label" for="inlineRadio2">Berhenti</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Tangguh">
                                        <label class="form-check-label" for="inlineRadio3">Tangguh</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="col-sm-2 col-form-label">Gambar pelajar</label>
                                    <input class="form-control" type="file" id="gambar" name="gambar">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hantar</button>
                        </div>
                    </div>
                     
        </div>
         
    </div>
    -->

        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@endsection