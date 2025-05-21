<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiMahasiswa extends Model
{
    protected $table = 'nilai_mahasiswa';
    protected $fillable = [
        'dosen_id', 'matakuliah_id', 'semester', 'tahun_akademik', 'prodi_id', 'jurusan_id',
        'komposisi_lain', 'komposisi_uts', 'komposisi_uas'
    ];

    public $timestamps = true;

    public function dosen() { return $this->belongsTo(Dosen::class, 'dosen_id', 'nidn'); }
    public function matakuliah() { return $this->belongsTo(Matakuliah::class, 'matakuliah_id', 'id_matakuliah'); }
    public function prodi() { return $this->belongsTo(Prodi::class, 'prodi_id', 'id_prodi'); }
    public function jurusan() { return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id_jurusan'); }
}
