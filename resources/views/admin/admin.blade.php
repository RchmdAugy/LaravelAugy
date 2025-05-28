@extends('layout/v_template')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><i class="fas fa-home"></i> Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">

    <!-- Welcome Card -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card bg-gradient-primary text-white shadow">
          <div class="card-body">
            <h3 class="card-title"><i class="fas fa-user-shield"></i> Selamat Datang, Admin!</h3>
            <p class="card-text mt-2">
              Anda telah login sebagai <strong>Administrator</strong>. Silakan pilih menu di sebelah kiri untuk mulai mengelola data dosen, mahasiswa, nilai, dan lainnya.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- Summary Boxes -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>25</h3>
            <p>Dosen Aktif</p>
          </div>
          <div class="icon">
            <i class="fas fa-chalkboard-teacher"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>342</h3>
            <p>Mahasiswa Terdaftar</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-graduate"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>89</h3>
            <p>Nilai Belum Diverifikasi</p>
          </div>
          <div class="icon">
            <i class="fas fa-clipboard-list"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>12</h3>
            <p>Tagihan Bermasalah</p>
          </div>
          <div class="icon">
            <i class="fas fa-file-invoice-dollar"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

  </div>
</section>

@endsection
