@extends('layouts.master')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Kemas kini</h3>
                </div>

                <form action="{{route('user.update',$senaraiPengguna->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama pengguna</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name" value="{{$senaraiPengguna->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Emel</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" value="{{$senaraiPengguna->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Kata laluan</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="password" value="{{$senaraiPengguna->password}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" id="status">
                                    <option value="1" {{ $senaraiPengguna->status == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $senaraiPengguna->status =='0' ? 'selected' : '' }}>Tidak aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="peranan_id" class="col-sm-2 col-form-label">Peranan</label>
                            <div class="col-sm-10">
                                <select id="peranan_id" name="peranan_id" class="form-control">
                                    @foreach ($senaraiPeranan as $peranan)
                                    <option value="{{ $peranan->id }}" {{$senaraiPengguna->peranan_id == $peranan->id ? 'selected' : '' }}>{{ $peranan->nama_peranan }}</option>
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