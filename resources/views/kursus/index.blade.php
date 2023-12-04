@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SENARAI KURSUS</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">senarai kursus</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- mesej berjaya dipaparkan apabila data dimasukkan -->

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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Tambah kursus baru
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Nama Kursus</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($senaraiKursus as $kursus )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kursus->nama_kursus}}</td>
                                <td>

                                    <div class="row">

                                        <a href="{{ route('kursus.edit', $kursus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                        <form action="{{ route('kursus.destroy', $kursus->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Buang</button>
                                        </form>

                                    </div>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Bil</th>
                                <th>Nama Kursus</th>
                                <th></th>

                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah kursus baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('kursus.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_kursus" class="col-form-label">Nama kursus:</label>
                                    <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hantar</button>
                        </div>
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