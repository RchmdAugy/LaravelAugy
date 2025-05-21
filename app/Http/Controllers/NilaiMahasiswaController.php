<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NilaiMahasiswa;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\Jurusan;

class NilaiMahasiswaController extends Controller
{
    public function index() {
        $nilai = NilaiMahasiswa::with(['dosen','matakuliah','prodi','jurusan'])->get();
        return view('admin.nilai.index', compact('nilai'));
    }

    public function create() {
        return view('admin.nilai.create', [
            'dosen' => Dosen::all(),
            'matakuliah' => Matakuliah::all(),
            'prodi' => Prodi::all(),
            'jurusan' => Jurusan::all(),
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'dosen_id' => 'required',
            'matakuliah_id' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'prodi_id' => 'required',
            'jurusan_id' => 'required',
            'komposisi_lain' => 'required|numeric',
            'komposisi_uts' => 'required|numeric',
            'komposisi_uas' => 'required|numeric',
        ]);
        NilaiMahasiswa::create($request->all());
        return redirect()->route('nilai.index')->with('success','Data nilai berhasil ditambahkan!');
    }

    public function show($id) {
        $nilai = NilaiMahasiswa::with(['dosen','matakuliah','prodi','jurusan'])->findOrFail($id);
        return view('admin.nilai.show', compact('nilai'));
    }

    public function edit($id) {
        $nilai = NilaiMahasiswa::findOrFail($id);
        return view('admin.nilai.edit', [
            'nilai' => $nilai,
            'dosen' => Dosen::all(),
            'matakuliah' => Matakuliah::all(),
            'prodi' => Prodi::all(),
            'jurusan' => Jurusan::all(),
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'dosen_id' => 'required',
            'matakuliah_id' => 'required',
            'semester' => 'required',
            'tahun_akademik' => 'required',
            'prodi_id' => 'required',
            'jurusan_id' => 'required',
            'komposisi_lain' => 'required|numeric',
            'komposisi_uts' => 'required|numeric',
            'komposisi_uas' => 'required|numeric',
        ]);
        $nilai = NilaiMahasiswa::findOrFail($id);
        $nilai->update($request->all());
        return redirect()->route('nilai.index')->with('success','Data nilai berhasil diupdate!');
    }

    public function destroy($id) {
        $nilai = NilaiMahasiswa::findOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('success','Data nilai berhasil dihapus!');
    }
}
