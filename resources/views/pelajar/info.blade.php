@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Maklumat pelajar</h3>
                </div>


                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_pelajar" class="col-sm-2 col-form-label">Nama pelajar </label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="nama_pelajar" value="{{$kemaskiniPelajar->nama_pelajar}}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="kursus_id" value="{{$kemaskiniPelajar->kursus->nama_kursus}}">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_ndp" class="col-sm-2 col-form-label">NDP</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="no_ndp" class="form-control-plaintext" id="no_ndp" value="{{$kemaskiniPelajar->no_ndp}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="semester" class="form-control-plaintext" id="semester" value="{{$kemaskiniPelajar->semester}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat rumah</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="alamat_rumah" class="form-control-plaintext" id="alamat_rumah" value="{{$kemaskiniPelajar->alamat_rumah}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat_lain" class="col-sm-2 col-form-label">Alamat lain</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="alamat_lain" class="form-control-plaintext" id="alamat_lain" value="{{$kemaskiniPelajar->alamat_lain}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_tel" class="col-sm-2 col-form-label">No. Tel.</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="no_tel" class="form-control-plaintext" id="no_tel" value="{{$kemaskiniPelajar->no_tel}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_tel_penjaga" class="col-sm-2 col-form-label">No. Tel. Penjaga</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="no_tel_penjaga" class="form-control-plaintext" id="no_tel_penjaga" value="{{$kemaskiniPelajar->no_tel_penjaga}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" readonly name="status" class="form-control-plaintext" id="status" value="{{$kemaskiniPelajar->status}}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="nama_kursus" class="col-sm-2 col-form-label">Kursus</label>
                        <div class="col-sm-10">
                            <select id="nama_kursus" readonly name="nama_kursus" class="form-control-plaintext">
                                @foreach ($senaraiKursus as $kursus)
                                <option value="{{$kursus->id}}" {{old($kemaskiniPelajar->id == $kursus->id) ?'selected' : '' }}>{{$kursus->nama_kursus}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>


        <div class="col-md-6">
        </div>

    </div>

</div>


</form>

@endsection