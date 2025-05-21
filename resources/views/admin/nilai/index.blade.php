@extends('layout/v_template')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data Nilai Mahasiswa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item active">Nilai Mahasiswa</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Kelola Data Nilai</h3>
        <div>
          <a href="{{ route('nilai.create') }}" class="btn btn-primary">Add Data Nilai</a>
        </div>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID Nilai</th>
              <th>Dosen</th>
              <th>Mata Kuliah</th>
              <th>Semester</th>
              <th>Tahun Akademik</th>
              <th>Program Studi</th>
              <th>Jurusan</th>
              <th>Komposisi Nilai Lain(%)</th>
              <th>Komposisi Nilai UTS(%)</th>
              <th>Komposisi Nilai UAS(%)</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($nilai as $n)
            <tr>
              <td>{{ $n->id }}</td>
              <td>{{ $n->dosen->nama_dosen ?? '-' }}</td>
              <td>{{ $n->matakuliah->nama_matakuliah ?? '-' }}</td>
              <td>{{ $n->semester }}</td>
              <td>{{ $n->tahun_akademik }}</td>
              <td>{{ $n->prodi->nama_prodi ?? '-' }}</td>
              <td>{{ $n->jurusan->nama_jurusan ?? '-' }}</td>
              <td>{{ $n->komposisi_lain }}</td>
              <td>{{ $n->komposisi_uts }}</td>
              <td>{{ $n->komposisi_uas }}</td>
              <td style="display:flex; gap:2px; border:none;">
                <a href="{{ route('nilai.show', $n->id) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('nilai.edit', $n->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('nilai.destroy', $n->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
