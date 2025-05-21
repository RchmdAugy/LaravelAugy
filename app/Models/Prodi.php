<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodi'; // sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id_prodi'; // jika primary key bukan 'id'
    // public $timestamps = false; // jika tidak ada kolom created_at & updated_at

    // Optional: relasi ke dosen
    public function dosen()
    {
        return $this->hasMany(Dosen::class, 'id_prodi');
    }
}