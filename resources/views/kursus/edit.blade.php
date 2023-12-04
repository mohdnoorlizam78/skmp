@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('kursus.update',$kemaskiniData->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <select id="nama_kursus" name="nama_kursus" class="form-control">
                                <option value="">-- Pilih Kursus --</option>
                                @foreach ($senaraiKursus as $kursus)
                                <option value="{{$kursus->id}}" {{($kemaskiniData->id == $kursus->id) ?'selected' : '' }}>{{$kursus->nama_kursus}}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="nama_kursus">Nama kursus</label>
                            <input type="text" name="nama_kursus" class="form-control" id="nama_kursus" value="{{$kemaskiniData->nama_kursus}}">
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