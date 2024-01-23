@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>SENARAI PERMOHONAN TVET TAHFIZ</h1>
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
                                    <th>Kursus Dipohon</th>
                                    <th>Tarikh Mohon</th>

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
                                        <td>{{ $mohon->kursus->nama_kursus }}</td>
                                        <td>{{ $mohon->created_at }}</td>


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
