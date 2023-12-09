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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-sm">
                        Tambah pelajar
                    </button>
                    {{-- <a href="{{ route('pelajar.create') }}" class="btn btn-primary">Tambah pelajar</a> --}}
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
                                <td>
                                    @if($pelajar->kursus_id == null)
                                    <p></p>
                                    @else
                                    {{$pelajar->kursus->nama_kursus}}
                                    @endif
                                </td>
                                <td>{{$pelajar->no_ndp}}</td>
                                <td>
                                    @if($pelajar->sesimasuk_id == null)
                                    <p></p>
                                    @else
                                    {{$pelajar->sesimasuk->nama_sesi}}
                                    @endif
                                </td>
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

                                        <a href="{{ route('pelajar.edit', $pelajar->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        {{-- &nbsp;
                                        <form action="{{ route('pelajar.destroy', $pelajar->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti untuk buang?')">Buang</button>
                                        </form> --}}

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
                            <h4 class="modal-title">Tambah pelajar baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('pelajar.storePengguna') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="status" name="status" value="1">
                                <input type="hidden" class="form-control" id="status" name="peranan_id" value="4">
                                <input type="hidden" class="form-control" id="id" name="id" value="{{$latestId+1}}">

                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Nama pengguna:</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">Emel:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="col-form-label">Kata laluan:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="peranan_id" class="col-sm-2 col-form-label">Peranan</label>
                                    <select id="peranan_id" name="peranan_id" class="form-control">
                                        <option value="">-- Pilih peranan --</option>
                                        @foreach ($senaraiPeranan as $peranan)
                                        <option value="{{$peranan->id}}" {{ ('peranan_id') == $peranan->id ? 'selected' : null }}>{{$peranan->nama_peranan}}</option>
                                        @endforeach
                                    </select>

                                </div> --}}

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