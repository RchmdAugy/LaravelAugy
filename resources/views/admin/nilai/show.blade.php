@extends('layout.v_template')
@section('content')
<div class="container">
    <h2>Detail Nilai Mahasiswa</h2>
    <table class="table table-bordered">
        <tr><th>Dosen</th><td>{{ $nilai->dosen->nama_dosen ?? '-' }}</td></tr>
        <tr><th>Mata Kuliah</th><td>{{ $nilai->matakuliah->nama_matakuliah ?? '-' }}</td></tr>
        <tr><th>Semester</th><td>{{ $nilai->semester }}</td></tr>
        <tr><th>Tahun Akademik</th><td>{{ $nilai->tahun_akademik }}</td></tr>
        <tr><th>Prodi</th><td>{{ $nilai->prodi->nama_prodi ?? '-' }}</td></tr>
        <tr><th>Jurusan</th><td>{{ $nilai->jurusan->nama_jurusan ?? '-' }}</td></tr>
        <tr><th>Komposisi Lain</th><td>{{ $nilai->komposisi_lain }}</td></tr>
        <tr><th>Komposisi UTS</th><td>{{ $nilai->komposisi_uts }}</td></tr>
        <tr><th>Komposisi UAS</th><td>{{ $nilai->komposisi_uas }}</td></tr>
    </table>
    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('nilai.edit', $nilai->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('nilai.destroy', $nilai->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">Hapus</button>
    </form>
</div>
@endsection
