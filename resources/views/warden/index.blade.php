@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
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
                    <h3>REKOD PELAJAR DIGANTUNG KELUAR DAN BALIK KAMPUNG</h3>
                    {{-- <a href="{{ route('pelajar.create') }}" class="btn btn-primary">Tambah pelajar</a> --}}
                </div>
                <div class="card-body">
                    <table id="tablePelajar" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bil</th>
                                <th>Nama pelajar</th>
                                <th>Kursus</th>
                                <th>NDP</th>
                                <th>Status</th>
                                
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($data as $gantung )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <a href="{{ route('warden.edit', $gantung->id) }}">{{$gantung->nama_pelajar}}</a>
                                    
                                </td>
                                <td>
                                    @if($gantung->kursus_id == null)
                                    <p></p>
                                    @else
                                    {{$gantung->kursus->nama_kursus}}
                                    @endif
                                </td>
                                <td>{{$gantung->no_ndp}}</td>
                                
                                <td>
                                    @if($gantung->gantung == 1)
                                    Dibenarkan
                                    @else
                                    Digantung
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

    </div>
    <!-- /.row -->
</div>


@endsection