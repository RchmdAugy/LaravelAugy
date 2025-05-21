<?php

namespace App\Http\Controllers;

use App\Models\m_admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_admin extends Controller
{

    protected $m_admin;
    
    public function __construct(){
        $this->m_admin = new m_admin();
    }

    public function about(){
        return view('admin/about');
    }

    public function invoice(){
        return view('admin/invoice');
    }

    public function chart(){
        // Query jumlah mahasiswa per jurusan
        $statistik = DB::table('tb_mahasiswa')
            ->join('jurusan', 'tb_mahasiswa.id_jurusan', '=', 'jurusan.id_jurusan')
            ->select('jurusan.nama_jurusan', DB::raw('count(*) as total'))
            ->groupBy('jurusan.nama_jurusan')
            ->orderBy('jurusan.nama_jurusan')
            ->get();
        return view('admin/chart', compact('statistik'));
    }
    
    public function user(){
        $data = ['user' => $this->m_admin->allData_user()];
        return view('admin/user', $data);
    }
    
    #DOSEN
    public function kelola_dosen(){
        $data = ['dosen' => $this->m_admin->allData_dosen()];
        return view('admin/kelola_dosen', $data);
    }

    public function detail_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData_dosen($nidn)];
        return view('admin/dosen_detail', $data);
    }

    public function add_dosen(){

        $data = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
        ];
        return view('admin/dosen_add', $data);
    }

    public function insert_dosen(){

        // validasi form
        Request()->validate([
            'nidn' => 'required|unique:tb_dosen,nidn',
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'id_matakuliah' => 'required',
            'id_prodi' => 'required',
            'id_jurusan' => 'required',
            'foto_dosen' => 'required',
        ],[
            'nidn.required' => 'NIDN wajib diisi !',
            'nidn.unique' => 'NIDN ini sudah terdaftar di database !',
            'nidn.min' => 'NIDN minimal 5 karakter',
            'nidn.max' => 'NIDN maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'bidang_keahlian.required' => 'Nama Bidang Wajib diisi !',
            'id_matakuliah.required' => 'Nama Matakuliah wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_jurusan.required' => 'Nama Jurusan wajib diisi !',
            'foto_dosen.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        $file = Request()->foto_dosen;
        $fileName = request()->nidn .'.'. $file->extension();
        $file->move(public_path('assets/foto_dosen'),$fileName);

        $data = [
            'nidn' => request()->nidn,
            'nama_dosen' => request()->nama_dosen,
            'bidang_keahlian' => request()->bidang_keahlian,
            'id_matakuliah' => request()->id_matakuliah,
            'foto_dosen' => $fileName,
            'id_prodi' => request()->id_prodi,
            'id_jurusan' => request()->id_jurusan,
        ];
        $this->m_admin->addData_dosen($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData_dosen($nidn)];
        
        $data2 = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
            'matakuliah' => DB::table('mata_kuliah')->get(),
        ];
        return view('admin/dosen_edit', $data, $data2);
    }

    public function update_dosen($nidn){
        
        // validasi form
        Request()->validate([
            'nama_dosen' => 'required',
            'bidang_keahlian' => 'required',
            'id_prodi' => 'required',
            'id_jurusan' => 'required',
            // 'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'bidang_keahlian.required' => 'Nama Bidang wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'id_jurusan.required' => 'Nama jurusan wajib diisi !',
            // 'foto_dosen.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_dosen != ""){
            $file = Request()->foto_dosen;
            $fileName = request()->nidn .'.'. $file->extension();
            $file->move(public_path('assets/foto_dosen'),$fileName);

            $data = [
                'nidn' => request()->nidn,
                'nama_dosen' => request()->nama_dosen,
                'bidang_keahlian' => request()->bidang_keahlian,
                'foto_dosen' => $fileName,
                'id_prodi' => request()->id_prodi,
                'id_jurusan' => request()->id_jurusan,
            ];
            $this->m_admin->editData_dosen($nidn, $data);
        }
        else {
            $data = [
                'nidn' => request()->nidn,
                'nama_dosen' => request()->nama_dosen,
                'bidang_keahlian' => request()->bidang_keahlian,
                'id_prodi' => request()->id_prodi,
                'id_jurusan' => request()->id_jurusan,
            ];
            $this->m_admin->editData_dosen($nidn, $data);
        }
        return redirect()->route('dosen')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_dosen($nidn){
        if(!$this->m_admin->detailData_dosen($nidn))
        {abort(404);}
        $dosen = $this->m_admin->detailData_dosen($nidn);
        if($dosen->foto_dosen != ""){
            unlink(public_path('assets/foto_dosen').'/'.$dosen->foto_dosen);
        }
        $this->m_admin->deleteData_dosen($nidn);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
    }

    #----------------------------------------------------------------------------
    
    #MAHASISWA

    public function mahasiswa(){
        $data = ['mahasiswa' => $this->m_admin->allData_mahasiswa()];
        return view('admin/mahasiswa', $data);
    }

    public function detail_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->m_admin->detailData_mahasiswa($nim)];
        return view('admin/mahasiswa_detail', $data);
    }

    public function add_mahasiswa(){

        $data = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('admin/mahasiswa_add', $data);
    }

    public function insert_mahasiswa(){

        // validasi form
        Request()->validate([
            'nim' => 'required|unique:tb_mahasiswa,nim',
            'nama_mahasiswa' => 'required',
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'semester' => 'required',
            'nomor_handphone' => 'required',
            'foto_mahasiswa' => 'required',
        ],[
            'nim.required' => 'NIM wajib diisi !',
            'nim.unique' => 'NIM ini sudah terdaftar di database !',
            'nim.min' => 'NIM minimal 5 karakter',
            'nim.max' => 'NIM maksimal 18 karakter',
            'nama_mahasiswa.required' => 'Nama Mahasiswa Wajib diisi !',
            'id_jurusan.required' => 'Nama Jurusan wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'ttl.required' => 'Tempat, Tanggal Lahir Wajib diisi !',
            'alamat.required' => 'Alamat Wajib diisi !',
            'agama.required' => 'Agama Wajib diisi !',
            'tingkat.required' => 'Tingkatan Wajib diisi !',
            'semester.required' => 'Semester Wajib diisi !',
            'nomor_handphone.required' => 'No Handphone Wajib diisi !',
            'foto_mahasiswa.required' => 'Foto Mahasiswa Wajib diisi !',
        ]);

        // upload gambar
        $file = Request()->foto_mahasiswa;
        $fileName = request()->nim .'.'. $file->extension();
        $file->move(public_path('assets/foto_mahasiswa'),$fileName);

        $data = [
            'nim' => request()->nim,
            'nama_mahasiswa' => request()->nama_mahasiswa,
            'id_jurusan' => request()->id_jurusan,
            'id_prodi' => request()->id_prodi,
            'ttl' => request()->ttl,
            'alamat' => request()->alamat,
            'agama' => request()->agama,
            'tingkat' => request()->tingkat,
            'semester' => request()->semester,
            'nomor_handphone' => request()->nomor_handphone,
            'foto_mahasiswa' => $fileName,
        ];
        $this->m_admin->addData_mahasiswa($data);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function edit_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $data = ['mahasiswa' => $this->m_admin->detailData_mahasiswa($nim)];
        
        $data2 = [
            'prodi' => DB::table('prodi')->get(),
            'jurusan' => DB::table('jurusan')->get(),
        ];
        return view('admin/mahasiswa_edit', $data, $data2);
    }

    public function update_mahasiswa($nim){
        
        // validasi form
        Request()->validate([
            'nama_mahasiswa' => 'required',
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'tingkat' => 'required',
            'semester' => 'required',
            'nomor_handphone' => 'required',
            // 'foto_mahasiswa' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_mahasiswa.required' => 'Nama Mahasiswa Wajib diisi !',
            'id_jurusan.required' => 'Nama jurusan wajib diisi !',
            'id_prodi.required' => 'Nama Prodi wajib diisi !',
            'ttl.required' => 'Tempat, Tanggal Lahir wajib diisi !',
            'alamat.required' => 'Alamat wajib diisi !',
            'agama.required' => 'Agama wajib diisi !',
            'tingkat.required' => 'Tingkatan wajib diisi !',
            'semester.required' => 'Semester wajib diisi !',
            'nomor_handphone.required' => 'No Handphone wajib diisi !',
            // 'foto_mahasiswa.required' => 'Foto Dosen Wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_mahasiswa != ""){
            $file = Request()->foto_mahasiswa;
            $fileName = request()->nim .'.'. $file->extension();
            $file->move(public_path('assets/foto_mahasiswa'),$fileName);

            $data = [
                'nim' => request()->nim,
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'id_jurusan' => request()->id_jurusan,
                'id_prodi' => request()->id_prodi,
                'ttl' => request()->ttl,
                'alamat' => request()->alamat,
                'agama' => request()->agama,
                'tingkat' => request()->tingkat,
                'semester' => request()->semester,
                'nomor_handphone' => request()->nomor_handphone,
                'foto_mahasiswa' => $fileName,
            ];
            $this->m_admin->editData_mahasiswa($nim, $data);
        }
        else {
            $data = [
                'nim' => request()->nim,
                'nama_mahasiswa' => request()->nama_mahasiswa,
                'id_jurusan' => request()->id_jurusan,
                'id_prodi' => request()->id_prodi,
                'ttl' => request()->ttl,
                'alamat' => request()->alamat,
                'agama' => request()->agama,
                'tingkat' => request()->tingkat,
                'semester' => request()->semester,
                'nomor_handphone' => request()->nomor_handphone,
            ];
            $this->m_admin->editData_mahasiswa($nim, $data);
        }
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil diedit !');
    }

    public function delete_mahasiswa($nim){
        if(!$this->m_admin->detailData_mahasiswa($nim))
        {abort(404);}
        $mahasiswa = $this->m_admin->detailData_mahasiswa($nim);
        if($mahasiswa->foto_mahasiswa != ""){
            unlink(public_path('assets/foto_mahasiswa').'/'.$mahasiswa->foto_mahasiswa);
        }
        $this->m_admin->deleteData_mahasiswa($nim);
        return redirect()->route('mahasiswa')->with('pesan', 'Data berhasil dihapus !');
    } 
    
    #----------------------------------------------------------------------------

    #END NEW

    public function add(){
        return view('v_adddosen');
    }

    public function detail($id_dosen){
        if(!$this->m_admin->detailData($id_dosen))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData($id_dosen)];
        return view('v_detaildosen', $data);
    }

    public function edit($id_dosen){
        if(!$this->m_admin->detailData($id_dosen))
        {abort(404);}
        $data = ['dosen' => $this->m_admin->detailData($id_dosen)];
        return view('v_editdosen', $data);
    }

    public function delete($id_dosen){
        if(!$this->m_admin->detailData($id_dosen))
        {abort(404);}
        $dosen = $this->m_admin->detailData($id_dosen);
        $this->m_admin->deleteData($id_dosen);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil dihapus !');
    }

    public function insert(){

        // validasi form
        Request()->validate([
            'nip' => 'required|unique:tb_dosen,nip|min:17|max:18',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => 'required|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nip.required' => 'NIP wajib diisi !',
            'nip.unique' => 'NIP ini sudah terdaftar di database !',
            'nip.min' => 'NIP minimal 17 karakter',
            'nip.max' => 'NIP maksimal 18 karakter',
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
            'foto_dosen.requirede' => 'Foto Dosen Wajib diisi !'
        ]);

        // upload gambar
        $file = Request()->foto_dosen;
        $fileName = request()->nip .'.'. $file->extension();
        $file->move(public_path('assets/foto_dosen'),$fileName);

        $data = [
            'nip' => request()->nip,
            'nama_dosen' => request()->nama_dosen,
            'mata_kuliah' => request()->mata_kuliah,
            'foto_dosen' => $fileName,
        ];
        $this->m_admin->addData($data);
        return redirect()->route('dosen')->with('pesan', 'Data berhasil ditambahkan !');
    }

    public function update($id_dosen){
        
        // validasi form
        Request()->validate([
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'foto_dosen' => '|mimes:jpg,jpeg,png,bmp|max:10240',
        ],[
            'nama_dosen.required' => 'Nama Dosen Wajib diisi !',
            'mata_kuliah.required' => 'Nama Mata Kuliah wajib diisi !',
        ]);

        // upload gambar
        if (request()->foto_dosen != ""){
            $file = Request()->foto_dosen;
            $fileName = request()->nip .'.'. $file->extension();
            $file->move(public_path('assets/foto_dosen'),$fileName);

            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
                'foto_dosen' => $fileName,
            ];
            $this->m_admin->editData($id_dosen, $data);
        }
        else {
            $data = [
                'nip' => request()->nip,
                'nama_dosen' => request()->nama_dosen,
                'mata_kuliah' => request()->mata_kuliah,
            ];
            $this->m_admin->editData($id_dosen, $data);
        }
        return redirect()->route('dosen')->with('pesan', 'Data berhasil diedit !');
    }

}
