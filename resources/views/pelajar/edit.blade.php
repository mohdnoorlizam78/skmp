@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('pelajar.update',$kemaskiniPelajar->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_pelajar" class="col-sm-2 col-form-label">Nama pelajar</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pelajar" class="form-control" id="nama_pelajar" value="{{$kemaskiniPelajar->nama_pelajar}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jantina" class="col-sm-2 col-form-label">Jantina</label>
                            <div class="col-sm-10">
                                <select name="jantina" class="form-control" id="jantina">
                                    <option value="1" {{ $kemaskiniPelajar->jantina == '1' ? 'selected' : '' }}>Lelaki</option>
                                    <option value="2" {{ $kemaskiniPelajar->jantina =='2' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                            <div class="col-sm-10">
                                <input type="text" name="kursus_id" class="form-control" id="kursus_id" value="{{$kemaskiniPelajar->kursus_id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ndp" class="col-sm-2 col-form-label">NDP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_ndp" class="form-control" id="no_ndp" value="{{$kemaskiniPelajar->no_ndp}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-10">
                                <input type="text" name="semester" class="form-control" id="semester" value="{{$kemaskiniPelajar->semester}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat rumah</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_rumah" class="form-control" id="alamat_rumah" value="{{$kemaskiniPelajar->alamat_rumah}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat_lain" class="col-sm-2 col-form-label">Alamat lain</label>
                            <div class="col-sm-10">
                                <input type="text" name="alamat_lain" class="form-control" id="alamat_lain" value="{{$kemaskiniPelajar->alamat_lain}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tel" class="col-sm-2 col-form-label">No. Tel.</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_tel" class="form-control" id="no_tel" value="{{$kemaskiniPelajar->no_tel}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_tel_penjaga" class="col-sm-2 col-form-label">No. Tel. Penjaga</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_tel_penjaga" class="form-control" id="no_tel_penjaga" value="{{$kemaskiniPelajar->no_tel_penjaga}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ $kemaskiniPelajar->status == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $kemaskiniPelajar->status =='0' ? 'selected' : '' }}>Berhenti</option>
                                    <option value="2" {{ $kemaskiniPelajar->status == '2' ? 'selected' : '' }}>Tangguh</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                            <div class="col-sm-10">
                                <select id="kursus_id" name="kursus_id" class="form-control">
                                    @foreach ($senaraiKursus as $kursus)
                                    <option value="{{ $kursus->id }}" {{$kemaskiniPelajar->kursus_id == $kursus->id ? 'selected' : '' }}>{{ $kursus->nama_kursus }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Kemas kini</button>
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