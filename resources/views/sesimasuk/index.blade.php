@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SENARAI SESI</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">senarai sesi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Senarai sesi</h3>
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Rekod Baru
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Sesi</th>
                                <th></th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($senaraiSesi as $sesimasuk )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$sesimasuk->nama_sesi}}</td>
                                <td>
                                    <div class="row">

                                        <a href="{{ route('sesimasuk.edit', $sesimasuk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        &nbsp;
                                        <form action="{{ route('sesimasuk.destroy', $sesimasuk->id) }}" method="post">
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


            <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Rekod baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('sesimasuk.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama_sesi" class="col-form-label">Nama sesi:</label>
                                    <input type="text" class="form-control" id="nama_sesi" name="nama_sesi" required>
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