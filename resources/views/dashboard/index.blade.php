@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h4 style="text-align: center;">Keseluruhan Pelajar </h4>
                        <p>
                        <h1 style="text-align: center;">{{$data_pelajar->count()}} orang</h1>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <p class="small-box-footer" style="text-align: center;">Lelaki: {{$data_lelaki->count()}} | Perempuan: {{$data_perempuan->count()}}</p>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Keluar </h4>
                        <p>
                        <h1 style="text-align: center;">{{$data_outing->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <p class="small-box-footer" style="text-align: center;"> Lelaki: | Perempuan: </p>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Ke Klinik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$data_klinik->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <p class="small-box-footer" style="text-align: center;"> Lelaki: | Perempuan: </p>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Balik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$data_balik->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <p class="small-box-footer" style="text-align: center;"> Lelaki: | Perempuan: </p>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /second row -->


    @endsection