@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>REKOD PERMOHONAN KELUAR</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">rekod permohonan keluar</li>
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

                <div class="card-body">
                    
                    <table id="tableMohon" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Nama pelajar</th>
                                <th>Tujuan</th>
                                <th>Destinasi</th>
                                <th>Status</th>
                                {{-- <th>Catatan Pegawai</th>
                                <th>Tarikh mohon</th>
                                <th>Tarikh pengesahan</th> --}}

                            </tr>

                        </thead>
                        <tbody>
                            @foreach($semakStatus as $pelajar )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pelajar->user->name}}</td>
                                <td>{{$pelajar->tujuanmohon->nama_tujuan}}</td>
                                <td>{{$pelajar->destinasi}}</td>
                                <td>
                                    @if($pelajar->statuskebenaran_id == "1" )
                                    <a href="{{ route('keluarmasuk.sahkanmohon', $pelajar->id) }}"><span class="badge badge-info">Dalam proses</span></a>
                                    @elseif($pelajar->statuskebenaran_id == "2")
                                    <span class="badge badge-success">Diluluskan</span>
                                    @elseif($pelajar->statuskebenaran_id == "3")
                                    <span class="badge badge-danger">Ditolak</span>
                                    @else
                                    <span class="badge badge-danger">Digantung</span>
                                    @endif

                                </td>
                                {{-- <td>{{$pelajar->catatan}}</td>
                                <td>{{$pelajar->created_at}}</td>
                                <td>{{$pelajar->updated_at}}</td> --}}
                             
                            </tr>
                            
                            @endforeach
                           
                           
                        </tbody>

                    </table>


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