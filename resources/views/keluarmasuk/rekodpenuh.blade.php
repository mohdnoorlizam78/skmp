@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>REKOD KELUAR-MASUK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">Rekod Keluar-Masuk</li>
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

    <div class="card-header p-2">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#dibenarkan" data-toggle="tab">DIBENARKAN</a></li>
            <li class="nav-item"><a class="nav-link" href="#tidakdibenarkan" data-toggle="tab">TIDAK DIBENARKAN</a></li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="dibenarkan">
                <div class="card">
                    <div class="card-header">
                        <h4>Senarai keseluruhan pelajar dibenarkan keluar</h4>
                    </div>
                    <div class="card-body">
                        <table id="tableRekodPenuh" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Nama Pelajar</th>
                                    <th>NDP</th>
                                    <th>Tujuan</th>
                                    <th>Tarikh Mohon Keluar</th>
                                    <th>Tarikh Keluar</th>
                                    <th>Masa Keluar</th>
                                    <th>Pegawal sahkan keluar</th>
                                    <th>Tarikh Masuk</th>
                                    <th>Masa Masuk</th>
                                    <th>Pengawal sahkan masuk</th>
                                    <th>Status Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataKeluarMasuk as $keluarmasuk )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$keluarmasuk->dibenarkan->name}}</td>
                                    <td>{{$keluarmasuk->ndp_id}}</td>
                                    <td>{{$keluarmasuk->tujuanmohon->nama_tujuan}}</td>
                                    <td>{{$keluarmasuk->created_at}}</td>
                                    <td>
                                        @if($keluarmasuk->tarikh_keluar == Null)
                                        <a href="{{ route('keluarmasuk.editkeluar', $keluarmasuk->id) }}" class="btn btn-warning btn-sm">Sahkan keluar</a>
                                        @else
                                        {{$keluarmasuk->tarikh_keluar}}
                                        @endif
                                    </td>
                                    <td>{{$keluarmasuk->masa_keluar}}</td>
                                    <td>
                                        @if($keluarmasuk->pegawaikeluar_id != 0)
                                        {{$keluarmasuk->pengawalKeluar->name}}
                                        @else
                                        <p></p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($keluarmasuk->tarikh_masuk == Null)
                                        <a href="{{ route('keluarmasuk.editmasuk', $keluarmasuk->id) }}" class="btn btn-danger btn-sm">Sahkan masuk</a>
                                        @else
                                        {{$keluarmasuk->tarikh_masuk}}
                                        @endif
                                    </td>
                                    <td>{{$keluarmasuk->masa_masuk}}</td>
                                    
                                    <td>
                                        @if($keluarmasuk->pegawaimasuk_id != 0)
                                        {{$keluarmasuk->pengawalMasuk->name}}
                                        @else
                                        <p></p>
                                        @endif
                                    </td>
                                    <td>
                                        @if($keluarmasuk->status_masuk == 0)
                                        Belum keluar

                                        @elseif($keluarmasuk->status_masuk == 1)
                                        <p style="background-color: #FFC300;">Pelajar keluar</p>

                                        @elseif($keluarmasuk->status_masuk == 2)
                                        <p>Baik<p>

                                        @else
                                        {{-- {{$keluarmasuk->status_masuk == 3}} --}}
                                        <p style="background-color: #FF4D00;">Lambat</p>
                                        
                                        @endif
                                        </td>

                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="tidakdibenarkan">

                <div class="card">
                    <div class="card-header">
                        <h4>Senarai keseluruhan pelajar dilarang keluar</h4>
                    </div>
                    
                    <div class="card-body">
                        <table id="tableRekodKeseluruhanDitolak" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Nama Pelajar</th>
                                    <th>NDP</th>
                                    <th>Tarikh Mohon Keluar</th>
                                    <th>Status</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach($permohonan_ditolak as $status )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('pelajar.info', $keluarmasuk->id) }}" class="btn btn-warning btn-sm"> {{$status->user->name}}</a>
                                    </td>
                                    <td>{{$status->ndp_id}}</td>
                                    <td>{{$status->created_at}}</td>
                                    <td>
                                        <span class="badge badge-danger">Ditolak</span>
                                     </td>
                                </tr>
                                 @endforeach
                                 @foreach($permohonan_digantung as $status )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('pelajar.info', $keluarmasuk->id) }}" class="btn btn-warning btn-sm"> {{$status->user->name}}</a>
                                    </td>
                                    <td>{{$status->ndp_id}}</td>
                                    <td>{{$status->created_at}}</td>
                                    <td>
                                        <span class="badge badge-danger">Digantung</span>
                                    </td>
                                </tr>
                                 @endforeach

                            
                            </tbody>
                            
                        </table>

                    </div>
                     
                </div>


            </div>

        </div>

    </div>


</div>

@endsection