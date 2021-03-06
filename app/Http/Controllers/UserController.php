<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'user' => $this->UserModel->alldata(),
        ];
        return view('v_user', $data);
   
    }

    public function indexmaster()
    {
        $data = [
            'masterdata' => $this->UserModel->alldata(),
        ];
        return view('v_masterdata', $data);
   
    }

    public function add()
    {
        return view('v_adduser');
    }

    public function addmaster()
    {
        return view('v_addmaster');
    }


    public function tambah()
    {
        //validasi form 
        Request()->validate([
            'username' => 'required|unique:tbl_user,username|min:5|max:10', //sesuaikan dengan nama element di form tambah
            'password' => 'required',
            'level' => 'required',
            'foto_user' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ],[
            //untuk custom pesan
            'username.required' => 'username Wajib di isi !!!',
            'username.unique' => 'username sudah terdaftar, gunakan yang lain',
            'password.required' => 'Password wajib di isi !!!',
            'username.min' => 'username minimal 5 karakter',
            'username.max' => 'username maximal 10 karakter',
            'foto_user.required' => 'Foto wajib di isi !!!',
        ]);

        //simpan data
        //upload file foto
        $foto = Request()->foto_user;
        $namafile = Request()->username . '.' . $foto->extension();
        $foto->move(public_path('foto_user'), $namafile);

        //masukan ke database
        $data = [
            'username' => Request()->username,
            'password' => Request()->password,
            'level' => Request()->level,
            'foto' => $namafile,
        ];
    
       $this->UserModel->tambahdata($data);
        //cara menambahkan pesan saat data sudah di simpan
       return redirect()->route('user')->with('Pesan','Data telah berhasil disimpan !!!');
    }

    public function tambahMaster()
    {
        //simpan data
        //upload file foto
        $foto = Request()->foto_user;
        $namafile = Request()->username . '.' . $foto->extension();
        $foto->move(public_path('foto_user'), $namafile);

        //masukan ke database
        $data = [
            'username' => Request()->username,
            'password' => Request()->password,
            'level' => Request()->level,
            'foto' => $namafile,
        ];
    
       $this->UserModel->tambahdataMaster($data);
        //cara menambahkan pesan saat data sudah di simpan
       return redirect()->route('user')->with('Pesan','Data telah berhasil disimpan !!!');
    }

    //fungsi detail
    public function detail($id)
    {

        //antisipasi kesalahan data tidak ditemukan
        if(!$this->UserModel->detailuser($id)){
            abort(404);
        }

        $data =[
            'user' =>$this->UserModel->detailuser($id),
        ];
        return view('v_detailuser',$data);
    }

    //fungsi edit
    public function edit($id) {
        if(!$this->UserModel->detailuser($id)) {
            abort(404);
        }

        $data = [
            'user' => $this->UserModel->detailuser($id),
      ];
      return view('v_edituser', $data);
    }

    public function update($id)
    {

        //update data
        if (Request()-> foto <> "")
        {
            //upload gambar
            $foto = Request()->foto;
            $namafile = Request()->username . '.' . $foto->extension();
            $foto->move(public_path('foto_user'), $namafile);

            //masukan data ke DB
            $data = [
                'username' => Request()->username,
                'password' => Request()->password,
                'level' => Request()->level,
                'foto' => $namafile,
            ];
            $this->UserModel->updatedata($id,$data);
        } else {
            $data = [
                'username' => Request()->username,
                'password' => Request()->password,
                'level' => Request()->level,
            ];
            $this->UserModel->updatedata($id,$data);

        }
        return redirect()->route('user')->with('Pesan', 'Data telah berhasil di Update');
    }

    public function delete($id)
    {
        $data = [
            'user' => $this->UserModel->deleteuser($id),
      ];
        return redirect()->route('user')->with('Pesan', 'Data telah berhasil di hapus');
    }
}
