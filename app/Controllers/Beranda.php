<?php

namespace App\Controllers;

use App\Models\UserModel;


class Beranda extends BaseController
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


    public function administrator()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Selamat Datang '.session('namalengkap'),
            'page_content' => 'pages/administrator/administrator',

            'module' => 'beranda',
            'menu' => 'beranda',
            'active' =>'active',
            'menuopen' =>'',


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Home',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Beranda',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }

    public function observer()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Selamat Datang '.session('namalengkap'),
            'page_content' => 'pages/observer/observer',

            'module' => 'beranda',
            'menu' => 'beranda',
            'active' =>'active',
            'menuopen' =>'',


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Home',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Beranda',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }

   
}
