@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>SENARAI PENGGUNA</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">senarai pengguna</li>
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
            <div class="card">
                <div class="card-header">
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
                                <th>Nama pengguna</th>
                                <th>Peranan</th>
                                <th>Emel</th>
                                <th>Kata laluan</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($senaraiPengguna as $pengguna )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengguna->name}}  </td>
                                <td>{{$pengguna->peranan->nama_peranan}}</td>
                                <td>{{$pengguna->email}}</td>
                                <td>{{$pengguna->password}}</td>
                                <td>
                                    @if($pengguna->status == 0)
                                    Tidak aktif
                                    @else
                                    Aktif
                                    @endif
                                </td>
                                <td>
                                    <div class="row">

                                        <a href="{{ route('user.edit', $pengguna->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        {{-- &nbsp;

                                        <form action="{{ route('user.destroy', $pengguna->id) }}" method="post">
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
                            <h4 class="modal-title">Tambah pengguna baru</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <input type="hidden" class="form-control" id="status" name="status" value="Aktif">

                                <input type="text" class="form-control" id="id" name="id" value="{{$latestId+1}}">

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
                                <div class="mb-3">
                                    <label for="peranan_id" class="col-sm-2 col-form-label">Peranan</label>
                                    <select id="peranan_id" name="peranan_id" class="form-control">
                                        <option value="">-- Pilih peranan --</option>
                                        @foreach ($senaraiPeranan as $peranan)
                                        <option value="{{$peranan->id}}" {{ ('peranan_id') == $peranan->id ? 'selected' : null }}>{{$peranan->nama_peranan}}</option>
                                        @endforeach
                                    </select>

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
        <!-- /.row -->
    </div>

    @endsection