@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DASHBOARD</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Utama</a></li>
                    <li class="breadcrumb-item active">dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="small-box bg-info">
            <div class="inner">
                <h4 style="text-align: center;">Keseluruhan pelajar aktif sehingga kini: </h4>
                <p>
                <h1 style="text-align: center;">{{$pelajar_aktif->count()}} orang</h1>
                </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <p class="small-box-footer" style="text-align: center;">Lelaki: {{$data_lelaki->count()}} | Perempuan: {{$data_perempuan->count()}}</p>
        </div>
        <br>
        <h4>Senarai pelajar keluar hari ini :
            <?php date_default_timezone_set('Asia/Kuala_Lumpur');
                echo date('Y-m-d');  ?></h4>
        <div class="row">
            
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Keluar </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_keluar_sekarang->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Ke Klinik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_klinik_sekarang->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Balik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_balik_sekarang->count()}} orang</h1>
                        </p>

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
<br>
    <h4>Senarai pelajar keluar semalam : <?php date_default_timezone_set('Asia/Kuala_Lumpur');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
echo $yesterday;  ?></h4>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Keluar </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_keluar_semalam->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Ke Klinik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_klinik_semalam->count()}} orang</h1>
                        </p>

                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h4 style="text-align: center;">Jumlah Balik </h4>
                        <p>
                        <h1 style="text-align: center;">{{$rekod_balik_semalam->count()}} orang</h1>
                        </p>

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


    @endsection