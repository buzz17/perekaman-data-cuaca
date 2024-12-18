<?php 
namespace App\Controllers;

use App\Models\UserModel;

use App\Models\LogModel;

class Auth extends BaseController
{
    protected $session;
    protected $validation;
    protected $userModel;
    protected $logModel;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        //meload validation
        $this->validation = \Config\Services::validation();
        //meload session
        $this->session = \Config\Services::session();

        $this->logModel = new LogModel();
    }
    
	public function login()
	{	
        if ($this->session->get('role') == 1) {
            return redirect()->to('/administrator/');
        } elseif ($this->session->get('role') == 2) {
            return redirect()->to('/user/');
        }
		$data = [
            'title' => 'Login | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'page_content' => 'pages/login/login',
        ];
    	return view('login', $data);
	}
    public function valid_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        if (empty($username)) {
            session()->setFlashdata('username', 'Username tidak boleh kosong');
            return redirect()->to('/');
        }
    
        if (empty($password)) {
            session()->setFlashdata('password', 'Password tidak boleh kosong');
            return redirect()->to('/');
        }
        //ambil data user di database yang usernamenya sama 
        $user = $this->userModel->where('username', $username)->first();
        

        if ($user) {
            //cek password
            //jika salah arahkan lagi ke halaman login           
            if ($user['password'] != md5($password)) {
                session()->setFlashdata('password', 'Password salah ');
                return redirect()->to('/');
            } else {
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'username' => $user['username'],
                    'role' => $user['role'],                   
                    'namalengkap' => $user['namalengkap'],                    
                    'id_user' => $user['id_user'],
                    'password' => $user['password'],
                    'login' => $user['login'],
                    'logout' => $user['logout'],
                ];
                $this->session->set($sessLogin);
                $datalog = array(
                    'login' => date('Y-m-d G:i:s'),
                );
               
                $data = array(                    
                    'namalengkap' => session('namalengkap'),
                    'username' => session('username'),
                    'status' => 'in',
                    'log' => date('Y-m-d G:i:s'),
                    //'ipaddress' => getClientIpAddress(),                    
                );
                $this->userModel->updateData($datalog, session('id'));
                $this->logModel->addData($data);
                if ($user['role'] == '1') {
                    return redirect()->to('/administrator/');
                } elseif ($user['role'] == '2') {
                    return redirect()->to('/user/');
                } elseif ($user['role'] == '3') {
                    return redirect()->to('/observer/');
                }
            }
        } else {
            //jika username tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('username', 'Username tidak ditemukan');
            return redirect()->to('/');
        } 
    }
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');

    }

}