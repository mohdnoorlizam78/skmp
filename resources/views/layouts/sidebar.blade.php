<!-- Brand Logo -->
<a href="" class="brand-link">
  <img src="{{asset('/AdminLTE-3.2.0/dist/img/logo_pantau.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">PANTAU</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <!-- <div class="image">
      <img src="" class="img-circle elevation-2" alt="User Image">
    </div> -->
    <div class="info">
      <a href="#" class="d-block">
        @if(Auth::check())
        {{Auth::user()->name}}</a>
      @endif
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if(Auth()->user()->peranan_id == "2" )
      <li class="nav-item">
        <a href="{{url('/dashboard')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Utama
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="{{route('user.infopengguna', Auth()->user()->id)}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Profil pengguna
          </p>
        </a>
      </li>

@if(Auth()->user()->peranan_id == "2" )
      <li class="nav-header">PENGURUSAN PELAJAR</li>
      <li class="nav-item">
        <a href="{{route('pelajar.index')}}" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Senarai pelajar
          </p>
        </a>
      </li>

      <li class="nav-item">
        <!-- <a href="/pelajar/kebenaran/kebenaran_keluar" class="nav-link"> -->
        <a href="{{route('keluarmasuk.semakpermohonan')}}" class="nav-link">

          <i class="nav-icon far fa-image"></i>
          <p>
            Sahkan Permohonan
          </p>
        </a>
      </li>
      <li class="nav-item">
        <!-- <a href="/pelajar/kebenaran/kebenaran_keluar" class="nav-link"> -->
        <a href="{{route('warden.index')}}" class="nav-link">

          <i class="nav-icon far fa-image"></i>
          <p>
            Tindakan Disiplin
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('keluarmasuk.rekodpenuh')}}" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Rekod keluar masuk
          </p>
        </a>
      </li>
      @endif

      <!-- // periksa peranan user. Hanya admin dan warden sahaja.
      @if(Auth::check())
      @if(Auth()->user()->peranan_id == '1' || Auth()->user()->peranan_id == '2') -->

      <!-- @endif
      @endif -->

      
      <li class="nav-header">KELUAR-MASUK</li>

      <li class="nav-item">
        @if(Auth()->user()->peranan_id == 4)
        <a href="{{ route('keluarmasuk.mohonkeluar')}}" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Mohon keluar
          </p>
        </a>
        @endif
      </li>


      <li class="nav-item">
        @if(Auth::user()->peranan_id == "3")
        <a href="{{route('keluarmasuk.index')}} " class="nav-link">
          <i class="nav-icon fas fa-columns"></i>
          <p>
            Sahkan Keluar-Masuk
          </p>
        </a>
@endif
      </li>

      @if(Auth()->user()->peranan_id == "2")
      <li class="nav-header">PENYELENGGARAAN</li>
      
      <li class="nav-item">
        <a href="{{route('user.index')}}" class="nav-link">
          <i class="nav-icon fas fa-ellipsis-h"></i>
          <p>Maklumat Pengguna</p>
        </a>
      </li>
      
      @endif

      @if(Auth()->user()->peranan_id == "1")
      <li class="nav-item">
        <a href="{{route('user.pentadbir')}}" class="nav-link">
          <i class="nav-icon fas fa-ellipsis-h"></i>
          <p>Maklumat Terperinci Pengguna</p>
        </a>
      </li>

      <li class="nav-item">
        <a href="{{route('kursus.index')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Maklumat Kursus</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('sesimasuk.index')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Sesi</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{route('tujuan.index')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Tujuan</p>
        </a>
      </li>
      @endif
      
      <li class="nav-item">
        <a href="{{route('logout')}}" class="nav-link">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <p>
            Log Keluar
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->