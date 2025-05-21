<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';
    protected $primaryKey = 'id_matakuliah';
    // public $timestamps = false;

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_matakuliah');
    }
}