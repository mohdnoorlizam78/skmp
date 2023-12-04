<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1 style="text-align: center">Log masuk</h1>

            <!-- periksa data jika ada kesalahan semasa log masuk -->
            @if ($errors -> any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors -> all() as $item)
                    <li>
                        {{$item}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{route('login-proses')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Emel</label>
                    <input type="email" value="{{old('email')}}" name="email" class="form-control">
                    <!-- <input type="email" value="{{Session::get('email')}}" name="email" class="form-control"> -->
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Katalaluan</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   {{-- log masuk  --}}
    @if($message = Session::get('gagal'))
    <script>
    Swal.fire('{{$message}}');
    </script>
    @endif

    {{-- log keluar --}}
    @if($message = Session::get('berjaya'))
    <script>
    Swal.fire('{{$message}}');
    </script>
    @endif
</body>

</html>