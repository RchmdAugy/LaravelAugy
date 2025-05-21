<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_mahasiswa extends Model
{
    public function allData(){
        return DB::table('tb_mahasiswa')->get();
    }

    public function detailData($nim){
        return DB::table('tb_mahasiswa')->where('nim', $nim)->first();
    }

    public function addData($data){
        return DB::table('tb_mahasiswa')->insert($data);
    }

    public function editData($nim, $data){
        DB::table('tb_mahasiswa')->where('nim', $nim)->update($data);
    }

    public function deleteData($nim){
        DB::table('tb_mahasiswa')->where('nim', $nim)->delete();
    }

}
