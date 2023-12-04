@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>REKOD PERMOHONAN</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">rekod permohonan</li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Permohonan Baru
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Nama pelajar</th>
                                <th>Tujuan</th>
                                <th>Alamat lain</th>
                                <th>Status</th>
                                <th>Catatan Pegawai</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($statusMohon as $status )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$status->usermohon->name}}</td>
                                <td>{{$status->tujuan->nama_tujuan}}</td>
                                <td>{{$status->alamat_lain}}</td>
                                <td>
                                    @if($status->status_kebenaran == "Dalam proses")
                                    <span class="badge badge-info">Dalam proses</span>
                                    @elseif($status->status_kebenaran == "Diluluskan")
                                    <span class="badge badge-success">Diluluskan</span>
                                    @elseif($status->status_kebenaran == "Ditolak")
                                    <span class="badge badge-danger">Ditolak</span>
                                    @endif

                                </td>
                                <!-- <td>
                                    @if($status->status_kebenaran == "Dalam proses")
                                    <a href="{{ route('statuskebenaran.edit', $status->id) }}"><button class="btn btn-warning btn-sm"> Edit </button></a>
                                    @elseif($status->status_kebenaran == "Diluluskan")
                                    <a></a>
                                    @else
                                    <a></a>
                                    @endif

                                    @if($status->status_kebenaran == "Dalam proses")
                                    <form id="deleteData" method="post" action="{{route('statuskebenaran.destroy', $status->id)}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Buang</button>
                                    </form>
                                    @elseif($status->status_kebenaran == "Diluluskan")
                                    <a></a>
                                    @else
                                    <a></a>
                                    @endif
                                </td> -->
                                <td>{{$status->catatan}}</td>
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
                            <h4 class="modal-title">Mohon baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('statuskebenaran.store') }}">
                                @csrf

                                <input type="text" class="form-control" id="pelajar_id" name="pelajar_id" value="13">
                                <input type="text" class="form-control" id="status_kebenaran" name="status_kebenaran" value="Dalam proses">


                                <div class="mb-3">
                                    <label for="tujuan_id" class="col-sm-2 col-form-label">Tujuan</label>

                                    <select id="tujuan_id" name="tujuan_id" class="form-control" required>
                                        <option value="">-- Pilih Tujuan --</option>
                                        @foreach ($senaraiTujuan as $tujuan)
                                        <option value="{{$tujuan->id}}" {{ old('tujuan_id') == $tujuan->id ? 'selected' : null }}>{{$tujuan->nama_tujuan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lain">Alamat lain(selain alamat rumah)</label>
                                    <input type="text" class="form-control" id="alamat_lain" name="alamat_lain">

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