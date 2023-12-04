@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Sahkan permohonan</h3>
                </div>

                <form action="{{route('keluarmasuk.updatemohon',$senaraiPermohonan->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">


                        <div class="mb-3">
                            <label for="statuskebenaran_id" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <label for="destinasi" class="col-form-label">Destinasi(selain alamat rumah)</label>
                                <input type="text" class="form-control" id="destinasi" name="destinasi" value="{{$senaraiPermohonan->destinasi}}">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Hantar semula</button>
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