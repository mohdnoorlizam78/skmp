<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan Sepenuh Masa</title>
    <!-- Bootstrap CSS -->
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional styles */
        .form-control {
            margin-bottom: 5px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            color: green;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <center style="padding-top: 30px">
                <img src="{{ asset('/gambar/ksm.png') }}" style="width:80px;height:60px" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <img src="{{ asset('/gambar/my.png') }}" style="width:80px;height:60px" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <img src="{{ asset('/gambar/jtm.png') }}" style="width:80px;height:60px" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
            </center><br>
            <h3>BORANG PERMOHONAN KEMASUKAN TVET TAHFIZ</h3>
            <h5>INSTITUT LATIHAN PERINDUSTRIAN SELANDAR, MELAKA</h5>
        </div>

        <!-- periksa data jika ada kesalahan semasa mohon -->
        @if (Session::has('berjaya'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('berjaya') }}
            </div>
        @endif
        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tvet_tahfiz.store') }}" method="post">
            @csrf
            <div class="row">

                <div class="mb-3">
                    <input type="text" value="{{ old('nama_penuh') }}" name="nama_penuh"
                        class="form-control custom-margin" placeholder="Nama penuh">
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ old('no_kp') }}" name="no_kp" class="form-control custom-margin"
                        placeholder="No. Kad Pengenalan. Format: 000000-00-0000">
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ old('alamat') }}" name="alamat" class="form-control custom-margin"
                        placeholder="Alamat rumah">
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ old('no_tel') }}" name="no_tel" class="form-control custom-margin"
                        placeholder="No. Telefon">
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ old('no_tel_ibubapa') }}" name="no_tel_ibubapa"
                        class="form-control custom-margin" placeholder="No. Telefon IbuBapa">
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ old('emel') }}" name="emel" class="form-control custom-margin"
                        placeholder="Emel">

                </div>
                <div class="mb-3">

                    <div class="value">
                        <div class="input-group">
                            <select id="kursus_id" name="kursus_id"
                                class="form-control
                                custom-margin" required>
                                <option value="">-- Kursus Pilihan --</option>
                                @foreach ($senaraiKursus as $kursus)
                                    <option value="{{ $kursus->id }}"
                                        {{ old('kursus_id') == $kursus->id ? 'selected' : null }}>
                                        {{ $kursus->nama_kursus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akuan" id="flexCheckChecked"
                            value="setuju">
                        <label class="form-check-label" for="flexCheckChecked">
                            Saya mengaku bahawa semua keterangan yang diberikan adalah BENAR. Pihak institut berhak
                            membatalkan permohonan saya sekiranya terdapat kenyataan yang tidak benar.
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="akuanjuz" id="flexCheckChecked"
                            value="ya">
                        <label class="form-check-label" for="flexCheckChecked">
                            Hafaz 5 juz.
                        </label>
                    </div>
                </div>
                <div class="mb-3" style="text-align: center">
                    <button name="submit" type="submit" class="btn btn-primary">Hantar permohonan</button>
                </div>
                <div class="mb-3">

                </div>


            </div>
        </form>

    </div>

</body>

</html>
