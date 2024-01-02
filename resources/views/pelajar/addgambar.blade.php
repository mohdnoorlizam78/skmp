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
                    <form method="POST" action="{{ route('pelajar.gambar') }}">
                        @csrf
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