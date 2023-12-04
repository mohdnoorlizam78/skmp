@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('sesimasuk.update',$senaraiSesi->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="nama_tujuan" class="col-sm-2 col-form-label">Sesi</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_sesi" class="form-control" id="nama_sesi" value="{{$senaraiSesi->nama_sesi}}">
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