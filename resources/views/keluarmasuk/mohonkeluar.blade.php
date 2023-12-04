@extends('layouts.master')
@section('content')

<!-- /second row -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rekod permohonan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">Senarai rekod</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="small-box bg-default">
                    <div class="inner">
                        <button type="button" class="btn btn-block bg-gradient-success btn-lg" data-toggle="modal" data-target="#keluar-sm">Mohon Keluar</button>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <button type="button" class="btn btn-block bg-gradient-primary btn-lg" data-toggle="modal" data-target="#balik-sm">Mohon Balik</button>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-default">
                    <div class="inner">
                        <button type="button" class="btn btn-block bg-gradient-warning btn-lg" data-toggle="modal" data-target="#klinik-sm">Mohon Klinik</button>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div>


    <div class="card">

        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama pelajar</th>
                        <th>Tujuan</th>
                        <th>Destinasi</th>
                        <th>Status Kelulusan</th>
                        <th>Tindakan</th>
                        <th>Catatan</th>
                        <th>Pegawai Pelulus</th>
                        <th>Tarikh mohon</th>

                    </tr>

                </thead>
                <tbody>
                    @foreach($dataMohon as $pelajar )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pelajar->user->name}}</td>
                        <td>{{$pelajar->tujuanmohon->nama_tujuan}}</td>
                        <td>{{$pelajar->destinasi}}</td>
                        <td>
                            @if($pelajar->statuskebenaran_id == "1")
                            <a href="{{ route('keluarmasuk.editmohon', $pelajar->id) }}"><span class="badge badge-info">Dalam proses</span></a>
                            @elseif($pelajar->statuskebenaran_id == "2")
                            <span class="badge badge-success">Diluluskan</span>
                            @elseif($pelajar->statuskebenaran_id == "3")
                            <span class="badge badge-danger">Ditolak</span>
                            @endif

                        </td>
                        <td>
                            @if($pelajar->statuskebenaran_id == "1")
                            <a href="{{ route('keluarmasuk.editmohon', $pelajar->id) }}"><button class="btn btn-warning btn-sm"> Edit </button></a>
                            @elseif($pelajar->statuskebenaran_id == "2")
                            <a></a>
                            @else
                            <a></a>
                            @endif

                            @if($pelajar->statuskebenaran_id == "1")
                            <form id="deleteData" method="post" action="{{route('keluarmasuk.destroy', $pelajar->id)}}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Batalkan</button>
                            </form>
                            @elseif($pelajar->statuskebenaran_id == "2")
                            <a></a>
                            @else
                            <a></a>
                            @endif

                        </td>
                        <td>{{$pelajar->catatan}}</td>
                        <td>{{$pelajar->pelulus_id}}</td>
                        <td>{{$pelajar->created_at}}</td>

                    </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <!-- /.card-body -->
    </div>

<!-- form modal mula -->
    <div class="modal fade" id="keluar-sm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mohon keluar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('keluarmasuk.simpanmohonkeluar') }}">
                        @csrf
                        <label>
                            <h1>Adakah pasti mohon keluar?</h1>
                        </label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$pelajarData->user_id}}" readonly>
                        <input type="hidden" class="form-control" id="ndp_id" name="ndp_id" value="{{$pelajarData->no_ndp}}" readonly>
                        <input type="hidden" class="form-control" id="tujuan_id" name="tujuan_id" value="1" readonly>
                        <input type="hidden" class="form-control" id="statuskebenaran_id" name="statuskebenaran_id" value="2" readonly>
                        <input type="hidden" class="form-control" id="status_masuk" name="status_masuk" value="0" readonly>
                        <input type="hidden" class="form-control" id="pegawaikeluar_id" name="pegawaikeluar_id" value="0" readonly>
                        <input type="hidden" class="form-control" id="pegawaikeluar_id" name="pegawaimasuk_id" value="0" readonly>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hantar</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="balik-sm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mohon baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('keluarmasuk.simpanmohonkeluar') }}">
                        @csrf

                        <label>
                            <h1>Adakah anda pasti mohon balik?</h1>
                        </label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$pelajarData->user_id}}" readonly>
                        <input type="hidden" class="form-control" id="ndp_id" name="ndp_id" value="{{$pelajarData->no_ndp}}" readonly>
                        <input type="hidden" class="form-control" id="tujuan_id" name="tujuan_id" value="2" readonly>
                        <input type="hidden" class="form-control" id="statuskebenaran_id" name="statuskebenaran_id" value="1" readonly>

                        <div class="mb-3">
                            <label for="destinasi" class="col-form-label">Destinasi(selain alamat rumah)</label>
                            <input type="text" class="form-control" id="destinasi" name="destinasi">

                        </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hantar</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="klinik-sm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Mohon baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('keluarmasuk.simpanmohonkeluar') }}">
                        @csrf

                        <label>
                            <h1>Adakah anda pasti mohon ke klinik?</h1>
                        </label>
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$pelajarData->user_id}}" readonly>
                        <input type="hidden" class="form-control" id="ndp_id" name="ndp_id" value="{{$pelajarData->no_ndp}}" readonly>
                        <input type="hidden" class="form-control" id="tujuan_id" name="tujuan_id" value="3" readonly>
                        <input type="hidden" class="form-control" id="statuskebenaran_id" name="statuskebenaran_id" value="1" readonly>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Hantar</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    @endsection