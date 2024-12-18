<?php

namespace App\Controllers;

use App\Models\UserModel;


class User extends BaseController
{
    protected $session;
    protected $validation;
    protected $userModel;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
               
        //meload validation
        $this->validation = \Config\Services::validation();
        //meload session
        $this->session = \Config\Services::session();
    }


    public function monitoring()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $getdataUser = $this->userModel->getData()->getResult();
        $data = [
            'dataUser' => $getdataUser,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Selamat Datang '.session('namalengkap'),
            'page_content' => 'pages/pengguna/monitoring',

            'module' => 'lainnya',
            'menu' => 'kelola pengguna',
            'active' =>'active',
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Home',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Kelola Pengguna',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function add()
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/');
        }
                  
        $data = array(
            'id_station' => $this->request->getPost('inputStation'),
            'nip' => $this->request->getPost('inputNIP'),
            'namalengkap' => strtoupper($this->request->getPost('inputNamaLengkap')),
            'username' => $this->request->getPost('inputEmail'),
            'password' => md5($this->request->getPost('inputSandi')),
            'salt' =>  uniqid('', true),
            'role' => $this->request->getPost('inputRole'),
        );
            if ($this->userModel->addData($data)) {
                return redirect()->to('/administrator/kelola-pengguna')->with('success', 'Data Pengguna Berhasil Diinput');
            } else {
                return redirect()->to('/administrator/kelola-pengguna')->with('error', 'Data Pengguna Gagal Diinput'); 
            }
   
    }

    public function delete($id)
    {
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        //cek role dari session
        if ($this->session->get('role') != 1) {
            return redirect()->to('/user/');
        }
        if ($this->userModel->delete($id)) {
            return redirect()->to('/administrator/kelola-pengguna')->with('success', 'Data Pengguna Berhasil Dihapus');
        } else {
            return redirect()->to('/administrator/kelola-pengguna')->with('error', 'Data Pengguna Gagal Dihapus'); 
        }
        
    }

   
}
