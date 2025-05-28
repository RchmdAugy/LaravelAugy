<body class="hold-transition sidebar-mini">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link">Beranda</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Kontak Kami</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item mr-2">
        <span class="text-secondary small">Halo, <b>{{ auth()->user()->name ?? 'Pengguna' }}</b></span>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt mr-1"></i>Keluar</button>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Cari..." aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name ?? 'Pengguna' }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Cari menu..." aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

          @if (auth()->user()->hasLevel(1))
          <li class="nav-header text-info">ADMINISTRATOR</li>
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/kelola_dosen" class="nav-link {{ Request::is('admin/kelola_dosen*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>Manajemen Dosen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/mahasiswa" class="nav-link {{ Request::is('admin/mahasiswa*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/nilai" class="nav-link {{ Request::is('admin/nilai*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Nilai Mahasiswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>Manajemen Pengguna</p>
            </a>
          </li>
          </li>
          <li class="nav-item">
            <a href="/admin/chart" class="nav-link {{ Request::is('admin/chart*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Statistik</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/invoice" class="nav-link {{ Request::is('admin/invoice*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>Tagihan & Pembayaran</p>
            </a>
          </li>
          @endif

          @if (auth()->user()->hasLevel(2))
          <li class="nav-header text-success">PENGGUNA UMUM</li>
          <li class="nav-item">
            <a href="/user" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/user" class="nav-link {{ Request::is('user/user*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>Profil Saya</p>
            </a>
          </li>
          @endif

          @if (auth()->user()->hasLevel(3))
          <li class="nav-header text-warning">MAHASISWA</li>
          <li class="nav-item">
            <a href="/mahasiswa" class="nav-link {{ Request::is('mahasiswa') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/mahasiswa/mahasiswa" class="nav-link {{ Request::is('mahasiswa/mahasiswa*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>Data Pribadi</p>
            </a>
          </li>
          @endif

          @if (auth()->user()->hasLevel(4))
          <li class="nav-header text-primary">DOSEN</li>
          <li class="nav-item">
            <a href="/dosen" class="nav-link {{ Request::is('dosen') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dosen/kelola_akun" class="nav-link {{ Request::is('dosen/kelola_akun*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Pengaturan Akun</p>
            </a>
          </li>
          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</body>