<?php

namespace App\Controllers;
use DateTime;
use DateTimeZone;
use App\Models\UserModel;

use App\Models\MeteorologiModel;
use App\Models\HujanModel;
use App\Models\PenguapanModel;
use App\Models\MatahariModel;


class Pengamatan extends BaseController
{
    protected $session;
    protected $validation;
    protected $userModel;

    protected $meteorologiModel;
    protected $hujanModel;
    protected $penguapanModel;
    protected $matahariModel;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        $this->meteorologiModel = new MeteorologiModel();
        $this->hujanModel = new HujanModel();
        $this->penguapanModel = new PenguapanModel();
        $this->matahariModel = new MatahariModel();

      
               
        //meload validation
        $this->validation = \Config\Services::validation();
        //meload session
        $this->session = \Config\Services::session();
    }


    public function meteorologi()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Meteorologi',
            'page_content' => 'pages/meteorologi/meteo',

            'module' => 'input data',
            'menu' => 'meteorologi',
            'active' =>'active',
            



        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Meterorologi',
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
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Curah Hujan',
            'page_content' => 'pages/ch/ch',

            'module' => 'input data',
            'menu' => 'curah hujan',
            'active' =>'active',
            



        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Curah Hujan',
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
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Penguapan',
            'page_content' => 'pages/ev/ev',

            'module' => 'input data',
            'menu' => 'penguapan',
            'active' =>'active',
            



        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Penguapan',
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
        
        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Lama Penyinaran Matahari',
            'page_content' => 'pages/mh/mh',

            'module' => 'input data',
            'menu' => 'matahari',
            'active' =>'active',

        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Penyinaran Matahari',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function addmeteorologi()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $inputObserver = $this->request->getPost('inputObserver');
        $inputTanggal = $this->request->getPost('inputTanggal'); //utc
        $inputTime = $this->request->getPost('inputTime'); // utc

        $tanggal_waktu_utc =  $inputTanggal." ".  $inputTime;

        $date = new DateTime($tanggal_waktu_utc, new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone("Asia/Makassar")); // Atur ke zona waktu lokal

        $waktu_lokal = $date->format('Y-m-d H:i');
        $tanggal_waktu_utc = explode(' ', $waktu_lokal);
        $tanggal_lokal = $tanggal_waktu_utc[0];
        $jam_lokal = $tanggal_waktu_utc[1];
        $inputArahAngin = $this->request->getPost('inputArahAngin');
        $inputKecepatanhAngin = $this->request->getPost('inputKecepatanhAngin');
        $inputQFF = $this->request->getPost('inputQFF');
        $inputQFE = $this->request->getPost('inputQFE');
        $inputBK = $this->request->getPost('inputBK');
        $inputBB = $this->request->getPost('inputBB');
        $inputDP = $this->request->getPost('inputDP');
        $inputRH = $this->request->getPost('inputRH');

        $meteorologidata = [
            'tanggallokal' => $tanggal_lokal,
            'tanggalutc' => $inputTanggal,
            'waktulokal' => $jam_lokal,
            'waktuutc' => $inputTime,
            'arahangin' => $inputArahAngin,
            'kecangin' => $inputKecepatanhAngin,
            'qff' => $inputQFF,
            'qfe' => $inputQFE, 
            'bk' => $inputBK,
            'bb' => $inputBB,
            'dp' => $inputDP,
            'rh' => $inputRH,
            'id_station' => '97142',
            'observer' => $inputObserver
        ];

        if ($this->meteorologiModel->addData($meteorologidata)) {
            return redirect()->to('/meteorologi')->with('success', 'Data Berhasil Diinput');;
        } else {
            return redirect()->to('/meteorologi')->with('error', 'Data Gagal Diinput');;   
        }

        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Lama Penyinaran Matahari',
            'page_content' => 'pages/mh/mh',

            'module' => 'input data',
            'menu' => 'matahari',
            'active' =>'active',

        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Penyinaran Matahari',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function addhujan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $inputObserver = $this->request->getPost('inputObserver');
        $inputTanggal = $this->request->getPost('hiddenTanggal');

        $hellman_5m = $this->request->getPost('hellman_5m');
        $hellman_10m = $this->request->getPost('hellman_10m');
        $hellman_15m = $this->request->getPost('hellman_15m');
        $hellman_30m = $this->request->getPost('hellman_30m');
        $hellman_45m = $this->request->getPost('hellman_45m');
        $hellman_60m = $this->request->getPost('hellman_60m');
        $hellman_120m = $this->request->getPost('hellman_120m');
        $hellman_3h = $this->request->getPost('hellman_3h');
        $hellman_6h = $this->request->getPost('hellman_6h');
        $hellman_12h = $this->request->getPost('hellman_12h');
        $hellman_24h = $this->request->getPost('input_hellman_24jam');
        $input_hellman_00_01 = $this->request->getPost('hellman_00_01');
        $input_hellman_01_02 = $this->request->getPost('hellman_01_02');
        $input_hellman_02_03 = $this->request->getPost('hellman_02_03');
        $input_hellman_03_04 = $this->request->getPost('hellman_03_04');
        $input_hellman_04_05 = $this->request->getPost('hellman_04_05');
        $input_hellman_05_06 = $this->request->getPost('hellman_05_06');
        $input_hellman_06_07 = $this->request->getPost('hellman_06_07');
        $input_hellman_07_08 = $this->request->getPost('hellman_07_08');
        $input_hellman_08_09 = $this->request->getPost('hellman_08_09');
        $input_hellman_09_10 = $this->request->getPost('hellman_09_10');
        $input_hellman_10_11 = $this->request->getPost('hellman_10_11');
        $input_hellman_11_12 = $this->request->getPost('hellman_11_12');
        $input_hellman_12_13 = $this->request->getPost('hellman_12_13');
        $input_hellman_13_14 = $this->request->getPost('hellman_13_14');
        $input_hellman_14_15 = $this->request->getPost('hellman_14_15');
        $input_hellman_15_16 = $this->request->getPost('hellman_15_16');
        $input_hellman_16_17 = $this->request->getPost('hellman_16_17');
        $input_hellman_17_18 = $this->request->getPost('hellman_17_18');
        $input_hellman_18_19 = $this->request->getPost('hellman_18_19');
        $input_hellman_19_20 = $this->request->getPost('hellman_19_20');
        $input_hellman_20_21 = $this->request->getPost('hellman_20_21');
        $input_hellman_21_22 = $this->request->getPost('hellman_21_22');
        $input_hellman_22_23 = $this->request->getPost('hellman_22_23');
        $input_hellman_23_24 = $this->request->getPost('hellman_23_24');
       
        
        $hujan = [
            'tanggal' => $inputTanggal,
            'hellman_5m' => $hellman_5m,
            'hellman_10m' => $hellman_10m,
            'hellman_15m' => $hellman_15m,
            'hellman_30m' => $hellman_30m,
            'hellman_45m' => $hellman_45m,
            'hellman_60m' => $hellman_60m,
            'hellman_120m' => $hellman_120m,
            'hellman_3h' => $hellman_3h,
            'hellman_6h' => $hellman_6h,
            'hellman_12h' => $hellman_12h,
            /*'hellman_00_01' => $input_hellman_00_01,*/
            
            'hellman_01_02' => $input_hellman_00_01,
            'hellman_02_03' => $input_hellman_00_01,
            'hellman_03_04' => $input_hellman_00_01,
            'hellman_04_05' => $input_hellman_00_01,
            'hellman_05_06' => $input_hellman_00_01,
            'hellman_06_07' => $input_hellman_00_01,
            'hellman_07_08' => $input_hellman_00_01,
            'hellman_08_09' => $input_hellman_00_01,
            'hellman_09_10' => $input_hellman_00_01,
            'hellman_10_11' => $input_hellman_00_01,
            'hellman_11_12' => $input_hellman_00_01,
            'hellman_12_13' => $input_hellman_00_01,
            'hellman_13_14' => $input_hellman_00_01,
            'hellman_14_15' => $input_hellman_00_01,
            'hellman_15_16' => $input_hellman_00_01,
            'hellman_16_17' => $input_hellman_00_01,
            'hellman_17_18' => $input_hellman_00_01,
            'hellman_18_19' => $input_hellman_00_01,
            'hellman_19_20' => $input_hellman_00_01,
            'hellman_20_21' => $input_hellman_00_01,
            'hellman_21_22' => $input_hellman_00_01,
            'hellman_22_23' => $input_hellman_00_01,
            'hellman_23_24' => $input_hellman_00_01,
            
            'hellman_24h' => $hellman_24h,
            'id_station' => '97142',
            'observer' => $inputObserver
        ];

        if ($this->hujanModel->addData($hujan)) {
            return redirect()->to('/curah-hujan')->with('success', 'Data Berhasil Diinput');
        } else {
            return redirect()->to('/curah-hujan')->with('error', 'Data Gagal Diinput');   
        }

        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Lama Penyinaran Matahari',
            'page_content' => 'pages/mh/mh',

            'module' => 'input data',
            'menu' => 'curah hujan',
            'active' =>'active',

        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Curah Hujan',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function addpenguapan()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $inputObserver = $this->request->getPost('inputObserver');
        $inputTanggal = $this->request->getPost('hiddenTanggal');
        $counter_sebelum = $this->request->getPost('counter_sebelum');
        $counter_dibaca = $this->request->getPost('counter_dibaca');
        $counter_rata_rata = $this->request->getPost('counter_rata_rata');
        $selisih_tinggi_air = $this->request->getPost('selisih_tinggi_air');
        $curah_hujan = $this->request->getPost('curah_hujan');
        $penguapan = $this->request->getPost('penguapan');
        $suhu_air_maks = $this->request->getPost('suhu_air_maks');
        $suhu_air_min = $this->request->getPost('suhu_air_min');
        $suhu_air_rata = $this->request->getPost('suhu_air_rata');
       
        
        $penguapan_ev = [
            'tanggal' => $inputTanggal,
            'counter_sebelum' => $counter_sebelum,
            'counter_dibaca' => $counter_dibaca,
            'counter_rata' => $counter_rata_rata,
            'selisih_air' => $selisih_tinggi_air,
            'curah_hujan' => $curah_hujan,
            'penguapan' => $penguapan,
            'suhu_air_max' => $suhu_air_maks,
            'suhu_air_min' => $suhu_air_min,
            'suhu_air_rata' => $suhu_air_rata,
            'id_station' => '97142',
            'observer' => $inputObserver
        ];

        if ($this->penguapanModel->addData($penguapan_ev)) {
            return redirect()->to('/penguapan')->with('success', 'Data Berhasil Diinput');;
        } else {
            return redirect()->to('/penguapan')->with('error', 'Data Gagal Diinput');;   
        }

        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Lama Penyinaran Matahari',
            'page_content' => 'pages/mh/mh',

            'module' => 'input data',
            'menu' => 'penguapan',
            'active' =>'active',

        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Penyinaran Penguapan',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }
    public function addmatahari()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $inputObserver = $this->request->getPost('inputObserver');
        $inputTanggal = $this->request->getPost('hiddenTanggal');
        $ss_06_07 = $this->request->getPost('ss_06_07');
        $ss_07_08 = $this->request->getPost('ss_07_08');
        $ss_08_09 = $this->request->getPost('ss_08_09');
        $ss_09_10 = $this->request->getPost('ss_09_10');
        $ss_10_11 = $this->request->getPost('ss_10_11');
        $ss_11_12 = $this->request->getPost('ss_11_12');
        $ss_12_13 = $this->request->getPost('ss_12_13');
        $ss_13_14 = $this->request->getPost('ss_13_14');
        $ss_14_15 = $this->request->getPost('ss_14_15');
        $ss_15_16 = $this->request->getPost('ss_15_16');
        $ss_16_17 = $this->request->getPost('ss_16_17');
        $ss_17_18 = $this->request->getPost('ss_17_18');
        $jlm_8_jam = $this->request->getPost('jlm_8_jam');
        $persen_8_jam = $this->request->getPost('persen_8_jam');
        $jlm_12_jam = $this->request->getPost('jlm_12_jam');
        $persen_12_jam = $this->request->getPost('persen_12_jam');
        
        $mataharidata = [
            'tanggal' => $inputTanggal,
            '6_7' => $ss_06_07,
            '7_8' => $ss_07_08,
            '8_9' => $ss_08_09,
            '9_10' => $ss_09_10,
            '10_11' => $ss_10_11,
            '11_12' => $ss_11_12,
            '12_13' => $ss_12_13,
            '13_14' => $ss_13_14,
            '14_15' => $ss_14_15,
            '15_16' => $ss_15_16,
            '16_17' => $ss_16_17,
            '17_18' => $ss_17_18,
            '8jml' => $jlm_8_jam,
            '8persen' => $persen_8_jam,
            '12jml' => $jlm_12_jam,
            '12persen' => $persen_12_jam,
            'id_station' => '97142',
            'observer' => $inputObserver
        ];

        if ($this->matahariModel->addData($mataharidata)) {
            return redirect()->to('/penyinaran-matahari')->with('success', 'Data Berhasil Diinput');;
        } else {
            return redirect()->to('/penyinaran-matahari')->with('error', 'Data Gagal Diinput');;   
        }

        $data = [
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Input Data Lama Penyinaran Matahari',
            'page_content' => 'pages/mh/mh',

            'module' => 'input data',
            'menu' => 'matahari',
            'active' =>'active',

        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Input Data',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Penyinaran Matahari',
				'link' => null
			)
		);
        
        return view('wrapper', $data);
    }

   
}
