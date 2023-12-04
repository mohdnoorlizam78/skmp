@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>TAMBAH PELAJAR BARU</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">pelajar baru</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<hr />
<!-- mesej berjaya dipaparkan apabila data dimasukkan -->
<hr />
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<!-- mesej error dipaparkan berdasarkan validation -->
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
                    <h3 class="card-title">Tambah pelajar</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('pelajar.store') }}">
                        @csrf
                        <input type="text" value="" name="user_id" readonly>

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
                            <label for="jantina" class="col-sm-2 col-form-label">Jantina</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jantina" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">Lelaki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jantina" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="col-sm-2 col-form-label">Gambar pelajar</label>
                            <input class="form-control" type="file" id="gambar" name="gambar">
                        </div>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                        <button type="reset" class="btn btn-warning ">Reset</button>
                        <button type="submit" class="btn btn-success">Hantar</button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

@endsection