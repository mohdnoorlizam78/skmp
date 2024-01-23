@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('kursus_penuh.update',$kemaskiniData->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="nama_kursus">Nama kursus</label>
                            <input type="text" name="nama_kursus" class="form-control" id="nama_kursus" value="{{$kemaskiniData->nama_kursus}}">
                        </div>
                        
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ $kemaskiniData->status == '1' ? 'selected' : '' }} >Aktif</option>
                                    <option value="0" {{ $kemaskiniData->status == '0' ? 'selected' : '' }}>Tidak aktif</option>
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