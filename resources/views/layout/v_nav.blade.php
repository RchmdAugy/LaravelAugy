<body class="hold-transition sidebar-mini">
  <!-- Navbar - Improved -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light shadow-sm" style="background: linear-gradient(135deg, #3a7bd5, #00d2ff);">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/home" class="nav-link text-white">Beranda</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link text-white">Kontak Kami</a>
      </li>
    </ul>

    <!-- Right navbar links - Improved -->
    <ul class="navbar-nav ml-auto align-items-center">
      <li class="nav-item mr-3">
        <span class="text-white small">
          <i class="fas fa-user-circle mr-1"></i>
          <b>{{ auth()->user()->name ?? 'Pengguna' }}</b>
        </span>
      </li>
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-outline-light btn-sm">
            <i class="fas fa-sign-out-alt mr-1"></i>Keluar
          </button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container - Improved -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2c3e50;">
    <!-- Sidebar - Improved -->
    <div class="sidebar">
      <!-- Sidebar user panel - Improved -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="{{asset('AdminLTE-3.2.0')}}/dist/img/user2-160x160.jpg" 
               class="img-circle elevation-2" 
               alt="User Image"
               style="width: 40px; height: 40px; object-fit: cover;">
        </div>
        <div class="info">
          <a href="#" class="d-block text-white">{{ auth()->user()->name ?? 'Pengguna' }}</a>
          <small class="text-light">Admin</small>
        </div>
      </div>

      <!-- Sidebar Menu - Improved -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (auth()->user()->hasLevel(1))
          <li class="nav-header text-uppercase text-light mb-2" style="font-size: 0.8rem; letter-spacing: 1px;">
            <i class="fas fa-user-shield mr-1"></i> ADMINISTRATOR
          </li>
          
          <!-- Menu Items with Improved Icons and Styling -->
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/kelola_dosen" class="nav-link {{ Request::is('admin/kelola_dosen*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>Manajemen Dosen</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/mahasiswa" class="nav-link {{ Request::is('admin/mahasiswa*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Data Mahasiswa</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/nilai" class="nav-link {{ Request::is('admin/nilai*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>Nilai Mahasiswa</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Manajemen Pengguna</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/chart" class="nav-link {{ Request::is('admin/chart*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Statistik</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="/admin/invoice" class="nav-link {{ Request::is('admin/invoice*') ? 'active bg-info' : 'text-light' }}">
              <i class="nav-icon fas fa-receipt"></i>
              <p>Tagihan & Pembayaran</p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
    </div>
  </aside>
</body>