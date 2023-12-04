@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sahkan masuk</h3>
                </div>

                <form action="{{route('keluarmasuk.updatemasuk',$editMasuk->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <input type="hidden" name="pegawaimasuk_id" id="pegawaimasuk_id" value="{{Auth()->user()->id}}">
                        <input type="hidden" name="status_masuk" class="form-control" id="status_masuk" value="
                                <?php date_default_timezone_set('Asia/Kuala_Lumpur');
                                // Bandingkan 2 masa
                                $masaMasuk = date('h:i:s A');
                                $masaBenar = '7:00:00 PM';

                                // Tukar masa strings kepada timestamps
                                $masaSebenar = strtotime($masaMasuk);
                                $masaPeraturan = strtotime($masaBenar);

                                // Buat perbandingan
                                if ($masaSebenar > $masaPeraturan) {
                                    // selepas pukul 7.00 = lambat
                                    echo '3';
                                } elseif ($masaSebenar <= $masaPeraturan) {
                                    // masuk sebelum pukul 7.00 ptg = baik
                                    echo '2';
                                } else
                                    // dah keluar
                                    echo '1';
                                ?>" readonly>

                        <div class="form-group row">
                            <label for="tarikh_masuk" class="col-sm-2 col-form-label">Tarikh masuk</label>
                            <div class="col-sm-10">
                                <input type="text" name="tarikh_masuk" class="form-control" id="tarikh_masuk" value="<?php echo date('Y-m-d');  ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masa_masuk" class="col-sm-2 col-form-label">Masa masuk</label>
                            <div class="col-sm-10">
                                <input type="text" name="masa_masuk" class="form-control" id="masa_masuk" value=" <?php date_default_timezone_set('Asia/Kuala_Lumpur');
                                                                                                                    echo date('h:i:s A');  ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-warning">Sahkan</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

                    </div>
                </form>
            </div>

        </div>


        <div class="col-md-6">
        </div>

    </div>

</div>


</form>

@endsection