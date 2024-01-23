
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
        <a href="{{route('user.index')}}" class="nav-link">
          <i class="nav-icon fas fa-ellipsis-h"></i>
          <p>Maklumat Terperinci Pengguna</p>
        </a>
      </li>

      <li class="nav-header">SEPENUH MASA</li>

      <li class="nav-item">
        <a href="{{route('kursus_penuh.index')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Senarai Kursus</p>
        </a>
      </li>
   
      <li class="nav-item">
        <a href="{{route('tvet.senarai_mohon')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Senarai Permohonan</p>
        </a>
      </li>

      <li class="nav-header">TVET TAHFIZ</li>

      <li class="nav-item">
        <a href="{{route('kursus_tahfiz.index')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Senarai Kursus</p>
        </a>
      </li>
   
      <li class="nav-item">
        <a href="{{route('tvet_tahfiz.senarai_mohon')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Senarai Permohonan</p>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a href="{{route('sepenuh_masa.senarai_mohon')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Permohonan Sepenuh Masa</p>
        </a>
      </li> --}}
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