<?php

namespace App\Http\Controllers;

use App\Models\M_mahasiswa;
use Illuminate\Http\Request;

class C_mahasiswa extends Controller
{
    protected $M_mahasiswa;
    
    public function __construct(){
        $this->M_mahasiswa = new M_mahasiswa();
    }

    public function index(){
        $data = ['mahasiswa' => $this->M_mahasiswa->allData()];
        return view('v_mahasiswa', $data);
    }
    
    public function add(){
        return view('v_addmahasiswa');
    }

    public function detail($nim){
        if(!$this->M_mahasiswa->detailData($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->M_mahasiswa->detailData($nim)];
        return view('v_detailmahasiswa', $data);
    }

    public function edit($nim){
        if(!$this->M_mahasiswa->detailData($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->M_mahasiswa->detailData($nim)];
        return view('v_editmahasiswa', $data);
    }

    public function delete($nim){
        if(!$this->M_mahasiswa->detailData($nim))
        {abort(404);}
        $mahasiswa = $this->M_mahasiswa->detailData($nim);
        $this->M_mahasiswa->deleteData($nim);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil dihapus !');
    }

    public function insert(){

        // validasi form
        Request()->validate([
            'nim' => 'required|unique:tb_mahasiswa,nim|min:6|max:18',
            'nama_mahasiswa' => 'required',
            'jurusan_mahasiswa' => 'required',
            'prodi_mahasiswa' => 'required',
            'ttl_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required',
            'agama_mahasiswa' => 'required',
            'tingkat_mahasiswa' => 'required',
            'semester_mahasiswa' => 'required',
            'nomor_handphone_mahasiswa' => 'required',
            'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nim.required' => 'NIM wajib diisi !',
            'nim.unique' => 'NIM ini sudah terdaftar di database !',
            'nim.min' => 'NIM minimal 6 karakter',
            'nim.max' => 'NIM maksimal 18 karakter',
            'nama_mahasiswa.required' => 'Nama Wajib diisi !',
            'jurusan_mahasiswa.required' => 'Jurusan Wajib diisi !',
            'prodi_mahasiswa.required' => 'Prodi Wajib diisi !',
            'ttl_mahasiswa.required' => 'Tempat Tanggal Lahir Wajib diisi !',
            'alamat_mahasiswa.required' => 'Alamat Wajib diisi !',
            'agama_mahasiswa.required' => 'Agama Wajib diisi !',
            'tingkat_mahasiswa.required' => 'Tingkat Wajib diisi !',
            'semester_mahasiswa.required' => 'Semester Wajib diisi !',
            'nomor_handphone_mahasiswa.required' =>'No HP Wajib diisi !',
            'foto_mahasiswa.required' => 'Foto Mahasiswa Wajib diisi !'
        ]);

        // upload gambar
        $file = Request()->foto_mahasiswa;
        $fileName = request()->nim .'.'. $file->extension();
        $file->move(public_path('assets/foto_mahasiswa'),$fileName);

        $data = [
            'nim' => request()->nim,
            'nama_mahasiswa' => request()->nama_mahasiswa,
            'jurusan_mahasiswa' => request()->jurusan_mahasiswa,
            'prodi_mahasiswa' => request()->prodi_mahasiswa,
            'ttl_mahasiswa' => request()->ttl_mahasiswa,
            'alamat_mahasiswa' => request()->alamat_mahasiswa,
            'agama_mahasiswa' => request()->agama_mahasiswa,
            'tingkat_mahasiswa' => request()->tingkat_mahasiswa,
            'semester_mahasiswa' => request()->semester_mahasiswa,
            'nomor_handphone_mahasiswa' => request()->nomor_handphone_mahasiswa,
            'foto_mahasiswa' => $fileName,
        ];
        $this->M_mahasiswa->addData($data);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function update($nim){
        
        // validasi form
        Request()->validate([
            'nama_mahasiswa' => 'required',
            'jurusan_mahasiswa' => 'required',
            'prodi_mahasiswa' => 'required',
            'ttl_mahasiswa' => 'required',
            'alamat_mahasiswa' => 'required',
            'agama_mahasiswa' => 'required',
            'tingkat_mahasiswa' => 'required',
            'semester_mahasiswa' => 'required',
            'nomor_handphone_mahasiswa' => 'required',
            'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_mahasiswa.required' => 'Nama Wajib diisi !',
            'jurusan_mahasiswa.required' => 'Jurusan Wajib diisi !',
            'prodi_mahasiswa.required' => 'Prodi Wajib diisi !',
            'ttl_mahasiswa.required' => 'Tempat Tanggal Lahir Wajib diisi !',
            'alamat_mahasiswa.required' => 'Alamat Wajib diisi !',
            'agama_mahasiswa.required' => 'Agama Wajib diisi !',
            'tingkat_mahasiswa.required' => 'Tingkat Wajib diisi !',
            'semester_mahasiswa.required' => 'Semester Wajib diisi !',
            'nomor_handphone_mahasiswa.required' =>'No HP Wajib diisi !',
            'foto_mahasiswa.required' => 'Foto Mahasiswa Wajib diisi !'
        ]);

        // upload gambar
        if (request()->foto_mahasiswa != ""){
            $file = Request()->foto_mahasiswa;
            $fileName = request()->nim .'.'. $file->extension();
            $file->move(public_path('assets/foto_mahasiswa'),$fileName);

            $data = [
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'jurusan_mahasiswa' => request()->jurusan_mahasiswa,
                'prodi_mahasiswa' => request()->prodi_mahasiswa,
                'ttl_mahasiswa' => request()->ttl_mahasiswa,
                'alamat_mahasiswa' => request()->alamat_mahasiswa,
                'agama_mahasiswa' => request()->agama_mahasiswa,
                'tingkat_mahasiswa' => request()->tingkat_mahasiswa,
                'semester_mahasiswa' => request()->semester_mahasiswa,
                'nomor_handphone_mahasiswa' => request()->nomor_handphone_mahasiswa,
                'foto_mahasiswa' => $fileName,
            ];
            $this->M_mahasiswa->editData($nim, $data);
        }
        else {
            $data = [
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'jurusan_mahasiswa' => request()->jurusan_mahasiswa,
                'prodi_mahasiswa' => request()->prodi_mahasiswa,
                'ttl_mahasiswa' => request()->ttl_mahasiswa,
                'alamat_mahasiswa' => request()->alamat_mahasiswa,
                'agama_mahasiswa' => request()->agama_mahasiswa,
                'tingkat_mahasiswa' => request()->tingkat_mahasiswa,
                'semester_mahasiswa' => request()->semester_mahasiswa,
                'nomor_handphone_mahasiswa' => request()->nomor_handphone_mahasiswa,
            ];
            $this->M_mahasiswa->editData($nim, $data);
        }
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil diedit !');
    }

}
