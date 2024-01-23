@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('warden.update',$gantungPelajar->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama_pelajar" class="col-sm-2 col-form-label">Nama pelajar</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_pelajar" class="form-control" id="nama_pelajar" value="{{$gantungPelajar->nama_pelajar}}">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="kursus_id" class="col-sm-2 col-form-label">Kursus</label>
                            <div class="col-sm-10">
                                <select id="kursus_id" name="kursus_id" class="form-control">
                                    @foreach ($senaraiKursus as $kursus)
                                    <option value="{{ $kursus->id }}" {{$gantungPelajar->kursus_id == $kursus->id ? 'selected' : '' }}>{{ $kursus->nama_kursus }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_ndp" class="col-sm-2 col-form-label">NDP</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_ndp" class="form-control" id="no_ndp" value="{{$gantungPelajar->no_ndp}}">
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="gantung" class="col-sm-2 col-form-label">Tindakan</label>
                            <div class="col-sm-10">
                                <select name="gantung" class="form-control" id="gantung">
                                    <option value="0" {{ $gantungPelajar->gantung == '0' ? 'selected' : '' }}>Digantung</option>
                                    <option value="1" {{ $gantungPelajar->gantung == '1' ? 'selected' : '' }}>Dibenarkan</option>
                               </select>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Kemas kini</button>
                        <a href="{{route('warden.index')}}" class="btn btn-primary">Batal</a>
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