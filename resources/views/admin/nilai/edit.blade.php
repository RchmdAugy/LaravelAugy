@extends('layout.v_template')
@section('content')
<div class="container">
    <h2>Edit Nilai Mahasiswa</h2>
    <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Dosen</label>
            <select name="dosen_id" class="form-control" required>
                <option value="">Pilih Dosen</option>
                @foreach($dosen as $d)
                <option value="{{ $d->nidn }}" {{ $nilai->dosen_id == $d->nidn ? 'selected' : '' }}>{{ $d->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Mata Kuliah</label>
            <select name="matakuliah_id" class="form-control" required>
                <option value="">Pilih Mata Kuliah</option>
                @foreach($matakuliah as $m)
                <option value="{{ $m->id_matakuliah }}" {{ $nilai->matakuliah_id == $m->id_matakuliah ? 'selected' : '' }}>{{ $m->nama_matakuliah }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" value="{{ $nilai->semester }}" required>
        </div>
        <div class="form-group">
            <label>Tahun Akademik</label>
            <input type="text" name="tahun_akademik" class="form-control" value="{{ $nilai->tahun_akademik }}" required>
        </div>
        <div class="form-group">
            <label>Prodi</label>
            <select name="prodi_id" class="form-control" required>
                <option value="">Pilih Prodi</option>
                @foreach($prodi as $p)
                <option value="{{ $p->id_prodi }}" {{ $nilai->prodi_id == $p->id_prodi ? 'selected' : '' }}>{{ $p->nama_prodi }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan_id" class="form-control" required>
                <option value="">Pilih Jurusan</option>
                @foreach($jurusan as $j)
                <option value="{{ $j->id_jurusan }}" {{ $nilai->jurusan_id == $j->id_jurusan ? 'selected' : '' }}>{{ $j->nama_jurusan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Komposisi Lain</label>
            <input type="number" step="0.01" name="komposisi_lain" class="form-control" value="{{ $nilai->komposisi_lain }}" required>
        </div>
        <div class="form-group">
            <label>Komposisi UTS</label>
            <input type="number" step="0.01" name="komposisi_uts" class="form-control" value="{{ $nilai->komposisi_uts }}" required>
        </div>
        <div class="form-group">
            <label>Komposisi UAS</label>
            <input type="number" step="0.01" name="komposisi_uas" class="form-control" value="{{ $nilai->komposisi_uas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
