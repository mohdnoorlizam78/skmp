@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SENARAI PERMOHONAN SEPENUH MASA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Utama</a></li>
                        <li class="breadcrumb-item active">senarai permohonan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- mesej berjaya dipaparkan apabila data dimasukkan -->

    @if (Session::has('success'))
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
                        <table id="tableTahfiz" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bil</th>
                                    <th>Nama Penuh</th>
                                    <th>No. Kad Pengenalan</th>
                                    <th>Alamat</th>
                                    <th>No. Tel</th>
                                    <th>No. Tel Ibubapa</th>
                                    <th>Emel</th>
                                    <th>Pilihan Pertama</th>
                                    <th>Pilihan Kedua</th>
                                    <th>Pilihan Ketiga</th>
                                    <th>Tarikh mohon</th>

                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($senaraiMohon as $mohon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $mohon->nama_penuh }}</td>
                                        <td>{{ $mohon->no_kp }}</td>
                                        <td>{{ $mohon->alamat }}</td>
                                        <td>{{ $mohon->no_tel }}</td>
                                        <td>{{ $mohon->no_tel_ibubapa }}</td>
                                        <td>{{ $mohon->emel }}</td>
                                        @if ($mohon->kursus1->nama_kursus != '')
                                            <td>{{ $mohon->kursus1->nama_kursus }}</td>
                                        @else
                                            <td>Tiada</td>
                                        @endif
                                        @if ($mohon->kursus2->nama_kursus != '')
                                            <td>{{ $mohon->kursus2->nama_kursus }}</td>
                                        @else
                                            <td>"Tiada"</td>
                                        @endif
                                        @if ($mohon->kursus3->nama_kursus != '')
                                            <td>{{ $mohon->kursus3->nama_kursus }}</td>
                                        @else
                                            <td>Tiada</td>
                                        @endif

                                        <td>{{ $mohon->created_at }}</td>


                                    </tr>
                                @endforeach
                            </tbody>

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
                                <form method="POST" action="#">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nama_kursus" class="col-form-label">Nama kursus:</label>
                                        <input type="text" class="form-control" id="nama_kursus" name="nama_kursus"
                                            required>
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
