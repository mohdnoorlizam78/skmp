@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sahkan keluar</h3>
                </div>

                <form action="{{route('keluarmasuk.updatekeluar',$editKeluar->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <input type="hidden" name="pegawaikeluar_id" id="pegawaikeluar_id" value="{{Auth()->user()->id}}">
                        <input type="hidden" name="status_masuk" class="form-control" id="status_masuk" value="1" readonly>

                        <div class="form-group row">
                            <label for="tarikh_keluar" class="col-sm-2 col-form-label">Tarikh keluar</label>
                            <div class="col-sm-10">
                                <input type="text" name="tarikh_keluar" class="form-control" id="tarikh_keluar" value="<?php echo date('Y-m-d');  ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="masa_keluar" class="col-sm-2 col-form-label">Masa keluar</label>
                            <div class="col-sm-10">
                                <input type="text" name="masa_keluar" class="form-control" id="masa_keluar" value=" <?php date_default_timezone_set('Asia/Kuala_Lumpur');
                                                                                                                    echo date('h:i:s A');  ?>" readonly>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
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