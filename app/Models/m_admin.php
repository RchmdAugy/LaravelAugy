<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Matakuliah;


class Dosen extends Model
{

    use HasFactory;

    protected $table = 'tb_dosen';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'id_matakuliah');
    }
}

class Mahasiswa extends Model
{

    use HasFactory;

    protected $table = 'tb_mahasiswa';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }
    
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'id_prodi');
    }
}

class m_admin extends Model
{
    #DOSEN
    public function allData_dosen() {
        return Dosen::with(['prodi', 'jurusan', 'matakuliah'])
                    ->orderBy('nama_dosen', 'asc')
                    ->get();
    }

    public function detailData_dosen($nidn){
        return Dosen::with(['prodi', 'jurusan', 'matakuliah'])
                    ->where('nidn', $nidn)
                    ->first();
    }

    public function addData_dosen($data){
        return DB::table('tb_dosen')->insert($data);
    }

    public function editData_dosen($nidn, $data){
        DB::table('tb_dosen')->where('nidn', $nidn)->update($data);
    }

    public function deleteData_dosen($nidn){
        DB::table('tb_dosen')->where('nidn', $nidn)->delete();
    }


    #MAHASISWA
    public function allData_mahasiswa(){
        return Mahasiswa::with(['prodi', 'jurusan'])
                    ->orderBy('nama_mahasiswa', 'asc')
                    ->get();
    }

    public function detailData_mahasiswa($nim){
        return Mahasiswa::with(['prodi', 'jurusan'])
                    ->where('nim', $nim)
                    ->first();
    }

    public function addData_mahasiswa($data){
        return DB::table('tb_mahasiswa')->insert($data);
    }

    public function editData_mahasiswa($nim, $data){
        DB::table('tb_mahasiswa')->where('nim', $nim)->update($data);
    }

    public function deleteData_mahasiswa($nim){
        DB::table('tb_mahasiswa')->where('nim', $nim)->delete();
    }

    #USER
    public function allData_user(){
        return DB::table('users')->get();
    }

    public function detailData_user($id){
        return DB::table('users')->where('id', $id)->first();
    }

    public function addData_user($data){
        return DB::table('users')->insert($data);
    }

    public function editData_user($id, $data){
        DB::table('users')->where('id', $id)->update($data);
    }

    public function deleteData_user($id){
        DB::table('users')->where('id', $id)->delete();
    }

}
