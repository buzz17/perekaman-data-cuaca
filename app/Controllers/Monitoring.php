<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MeteorologiModel;
use App\Models\MatahariModel;
use App\Models\HujanModel;
use App\Models\MonitoringModel;
use App\Models\PenguapanModel;

class Monitoring extends BaseController
{
    protected $session;
    protected $validation;
    protected $userModel;
    protected $meteoModel;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        $this->meteoModel = new MeteorologiModel();
               
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
        $inputTanggal = $this->request->getPost('inputTanggal');
        $data = [
            'tanggal' =>$inputTanggal,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/monitoring',

            'module' => 'output data',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'monitoring'
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function meteorologi()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $model = new MeteorologiModel();
        $inputTanggal = $this->request->getPost('inputTanggal');
        $dataFilter = $model->filterByTanggalUTC($inputTanggal);
        $data = [
            'tanggal' =>$inputTanggal,
            'dataMeteo' => $dataFilter,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/meteo',

            'module' => 'output data',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'meteorologi'
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => '#'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => 'monitoring-laporan/'
            ),
            array(
				'title' => 'Laporan Meteorologi',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function hujan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $model = new HujanModel();
        $inputTanggal = $this->request->getPost('inputTanggal');
        $dataFilter = $model->filterByBulan($inputTanggal);
        $data = [
            'tanggal' =>$inputTanggal,
            'dataCH' => $dataFilter,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/ch',

            'module' => 'output data',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'curah-hujan'
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => '#'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => 'monitoring-laporan/'
            ),
            array(
				'title' => 'Laporan Curah Hujan',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function penguapan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $model = new PenguapanModel();
        $inputTanggal = $this->request->getPost('inputTanggal');
        $dataFilter = $model->filterByBulan($inputTanggal);

        $data = [
            'tanggal' =>$inputTanggal,
            'dataEV' => $dataFilter,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/ev',

            'module' => 'output data',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'penguapan'
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => '#'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => 'monitoring-laporan/'
            ),
            array(
				'title' => 'Laporan Penguapan',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function matahari()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $model = new MatahariModel();
        $inputTanggal = $this->request->getPost('inputTanggal');
        $dataFilter = $model->filterByBulan($inputTanggal);

        $data = [
            'tanggal' =>$inputTanggal,
            'dataMH' => $dataFilter,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/mh',

            'module' => 'output data',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'penyinaran-matahari'
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => '#'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => 'monitoring-laporan/'
            ),
            array(
				'title' => 'Laporan Penyinaran Matahari',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }

    public function filter()
    {
        $start_date = $this->request->getVar('inputTanggalAwal');
        $end_date = $this->request->getVar('inputTanggalAkhir');
        $selected_report = $this->request->getVar('inputLaporan');

        // Filter the data based on the selected report type and date range
        $model = new MonitoringModel();
        $getDataMeteoByDate = $this->meteoModel->getDataMeteoByDate1('2024-11-18','2024-11-18')->getResult();

        // Pass filtered data to the view
       $data = [
            'filteredData' => $getDataMeteoByDate,
            'start_date'   => $start_date,
            'end_date'     => $end_date,
            'selected_report' => $selected_report,
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Monitoring Data dan Laporan',
            'page_content' => 'pages/monitoring/monitoring',

            'module' => 'monitoring',
            'menu' => 'monitoring',
            'active' =>'active',
            'selected' => 'meteorologi'
            
        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Monitoring',
				'link' => '#'
			),
			array(
				'title' => 'Monitoring Laporan',
				'link' => 'monitoring-laporan/'
            ),
            array(
				'title' => 'Laporan Data Meteorologi',
				'link' => null
			)
		);
        return view('wrapper', $data);
    }

}
