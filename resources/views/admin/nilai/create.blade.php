@extends('layout/v_template')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Tambah Data Nilai Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai Mahasiswa</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header"><h3 class="card-title">Form Tambah Data Nilai</h3></div>
      <div class="card-body">
        <form action="{{ route('nilai.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Dosen</label>
                <select name="dosen_id" class="form-control" required>
                  <option value="">-- Pilih Dosen --</option>
                  @foreach($dosen as $d)
                  <option value="{{ $d->nidn }}">{{ $d->nama_dosen }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Mata Kuliah</label>
                <select name="matakuliah_id" class="form-control" required>
                  <option value="">-- Pilih Mata Kuliah --</option>
                  @foreach($matakuliah as $m)
                  <option value="{{ $m->id_matakuliah }}">{{ $m->nama_matakuliah }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Semester</label>
                <input type="text" name="semester" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" class="form-control" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Program Studi</label>
                <select name="prodi_id" class="form-control" required>
                  <option value="">-- Pilih Prodi --</option>
                  @foreach($prodi as $p)
                  <option value="{{ $p->id_prodi }}">{{ $p->nama_prodi }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Jurusan</label>
                <select name="jurusan_id" class="form-control" required>
                  <option value="">-- Pilih Jurusan --</option>
                  @foreach($jurusan as $j)
                  <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Komposisi Nilai Lain (%)</label>
                <input type="number" step="0.01" name="komposisi_lain" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Komposisi Nilai UTS (%)</label>
                <input type="number" step="0.01" name="komposisi_uts" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Komposisi Nilai UAS (%)</label>
                <input type="number" step="0.01" name="komposisi_uas" class="form-control" required>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
