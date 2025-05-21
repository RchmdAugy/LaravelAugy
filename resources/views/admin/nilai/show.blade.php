@extends('layout.v_template')
@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rincian Data Nilai</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai Mahasiswa</a></li>
          <li class="breadcrumb-item active">Rincian</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card mb-4">
      <div class="card-header bg-primary text-white">
        <b>Nilai Perkuliahan</b>
      </div>
      <div class="card-body pb-2 pt-2">
        <div class="row mb-2">
          <div class="col-md-6">
            <b>Program Studi:</b> {{ $nilai->prodi->nama_prodi ?? '-' }}<br>
            <b>Mata Kuliah:</b> {{ $nilai->matakuliah->nama_matakuliah ?? '-' }}<br>
            <b>Semester:</b> {{ $nilai->semester ?? '-' }}<br>
            <b>Dosen Pengampu:</b> {{ $nilai->dosen->nama_dosen ?? '-' }}<br>
          </div>
          <div class="col-md-6">
            <b>Tahun Akademik:</b> {{ $nilai->tahun_akademik ?? '-' }}<br>
            <b>Kelas:</b> -<br>
            <b>Jurusan:</b> {{ $nilai->jurusan->nama_jurusan ?? '-' }}<br>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header bg-light d-flex justify-content-between align-items-center">
        <b>Rincian Detail Nilai</b>
        <div>
          <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning btn-sm">Edit Nilai</a>
          <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus data ini?')">Hapus Nilai</button>
          </form>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-striped mb-0">
            <thead class="thead-light">
              <tr class="text-center align-middle">
                <th style="width:40px">No</th>
                <th style="width:120px">NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai Lain-lain</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
                <th>Status</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($mahasiswa as $mhs)
              <tr class="text-center align-middle">
                <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $mhs->nim }}</td>
                  <td>{{ $mhs->nama_mahasiswa }}</td>
                  <td>
                    <input type="number" name="nilai_mahasiswa[{{ $mhs->nim }}][komposisi_lain]" value="{{ is_numeric($mhs->komposisi_lain ?? null) ? $mhs->komposisi_lain : 0 }}" class="form-control form-control-sm" style="width:80px; text-align:center;">
                  </td>
                  <td>
                    <input type="number" name="nilai_mahasiswa[{{ $mhs->nim }}][komposisi_uts]" value="{{ is_numeric($mhs->komposisi_uts ?? null) ? $mhs->komposisi_uts : 0 }}" class="form-control form-control-sm" style="width:80px; text-align:center;">
                  </td>
                  <td>
                    <input type="number" name="nilai_mahasiswa[{{ $mhs->nim }}][komposisi_uas]" value="{{ is_numeric($mhs->komposisi_uas ?? null) ? $mhs->komposisi_uas : 0 }}" class="form-control form-control-sm" style="width:80px; text-align:center;">
                  </td>
                  @php
                    $nilaiLain = is_numeric($mhs->komposisi_lain ?? null) ? $mhs->komposisi_lain : 0;
                    $nilaiUTS = is_numeric($mhs->komposisi_uts ?? null) ? $mhs->komposisi_uts : 0;
                    $nilaiUAS = is_numeric($mhs->komposisi_uas ?? null) ? $mhs->komposisi_uas : 0;
                    $nilaiAkhir = $nilaiLain + $nilaiUTS + $nilaiUAS;
                    if ($nilaiAkhir >= 85) { $grade = 'A'; $status = 'Lulus'; }
                    elseif ($nilaiAkhir >= 75) { $grade = 'B'; $status = 'Lulus'; }
                    elseif ($nilaiAkhir >= 65) { $grade = 'C'; $status = 'Lulus'; }
                    elseif ($nilaiAkhir >= 50) { $grade = 'D'; $status = 'Tidak Lulus'; }
                    else { $grade = 'E'; $status = 'Tidak Lulus'; }
                  @endphp
                  <td>{{ $nilaiAkhir }}</td>
                  <td>{{ $grade }}</td>
                  <td>{{ $status }}</td>
                  <td>-</td>
                  <td>
                    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                  </td>
                </form>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <a href="{{ route('nilai.index') }}" class="btn btn-secondary mt-3">Kembali</a>
  </div>
</section>
@endsection
