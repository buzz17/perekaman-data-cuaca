<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MeteorologiModel;
use App\Models\HujanModel;
use App\Models\MatahariModel;
use App\Models\PenguapanModel;
use App\Models\ReportModel;
use Dompdf\Dompdf;
use Dompdf\Options;


class Report extends BaseController
{
    protected $session;
    protected $validation;
    protected $userModel;
    protected $meteoModel;
    protected $matahariModel;
    protected $laporanModel;
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        $this->meteoModel = new MeteorologiModel();
        $this->laporanModel = new ReportModel();
               
        //meload validation
        $this->validation = \Config\Services::validation();
        //meload session
        $this->session = \Config\Services::session();
    }


    public function report()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $inputTanggal = $this->request->getPost('inputTanggal');
        $inputLaporan = $this->request->getPost('inputLaporan');

        $getdataReport = $this->laporanModel->getData()->getResult();
        $data = [
            'tanggal' =>$inputTanggal,
            'laporan' => $inputLaporan,
            'reports' => $getdataReport, 
            'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
            'breadcrumb_title' =>'Report Data dan Laporan',
            'page_content' => 'pages/report/report',

            'module' => 'output data',
            'menu' => 'report',
            'active' =>'active',
            'selected' => $inputLaporan,
            


        ];
        $data['breadcrumb']  =  array(
			array(
				'title' => 'Report',
				'link' => 'administrator/'
			),
			array(
				'title' => 'Report Laporan',
				'link' => null
			)
		);
        
        
        return view('wrapper', $data);
    }
    
    public function add()
    {
        //cek apakah ada session bernama isLogin
        if (!$this->session->has('isLogin')) {
            return redirect()->to('/');
        }
        $periodeReport = $this->request->getPost('inputTanggal');
        $jenisReport = $this->request->getPost('inputLaporan');
        
        if (!$jenisReport || !$periodeReport) {
            return redirect()->back()->with('error', 'Jenis Laporan dan Periode harap diisi');
        }

        switch ($jenisReport) {
            case 'data-meteorologi':
                $modelMeteorologi = new MeteorologiModel();
                $dataFilter = $modelMeteorologi->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/meteo-pdf-view';
                break;
            case 'data-curah-hujan':
                $modelMatahari = new MatahariModel();
                $dataFilter = $modelMatahari->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/mh-pdf-view';
                break;
            case 'data-penguapan':
                $modelMatahari = new MatahariModel();
                $dataFilter = $modelMatahari->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/mh-pdf-view';
                break;    
            case 'data-penyinaran-matahari':
                $modelMatahari = new MatahariModel();
                $dataFilter = $modelMatahari->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/mh-pdf-view';
                break;
           
            default:
                return redirect()->back()->with('error', 'Jenis laporan tidak valid.');
        }
        if (!$dataFilter) {
            return redirect()->to('/report-laporan')->with('error', 'Laporan tidak ditemukan');
        } else {

            $reportdata = [
                'jenis_laporan' => $jenisReport,
                'periode' => $periodeReport,
                'status' => 'pending'
            ];

            if ($this->laporanModel->addData($reportdata)) {
                return redirect()->to('/report-laporan');
            } 

            $getdataReport = $this->laporanModel->getData()->getResult();

            $data = [
                'tanggal' =>$periodeReport,
                'laporan' => $jenisReport,
                'reports' => $getdataReport, 
                'title' => session('namalengkap') . ' | Perekamana Data Cuaca Stamet Sangia Nibandera',
                'breadcrumb_title' =>'Report Data dan Laporan',
                'page_content' => 'pages/report/report',

                'module' => 'output data',
                'menu' => 'report',
                'active' =>'active',
                'selected' => $jenisReport,         
            ];
            $data['breadcrumb']  =  array(
                array(
                    'title' => 'Report',
                    'link' => 'administrator/'
                ),
                array(
                    'title' => 'Report Laporan',
                    'link' => null
                )
            );                  
            return view('wrapper', $data);
        }
    }

    public function downloadreport($reportId)
    {      
        // Fetch the report metadata
        $report = $this->laporanModel->find($reportId);

        if (!$report) {
            return redirect()->to('/report-laporan')->with('error', 'Laporan tidak ditemukan');
        }

        $reportData = $this->laporanModel->getDataById($reportId)->getRow();
        if ($reportData) {
            $jenisReport = $reportData->jenis_laporan;
            $periodeReport = $reportData->periode;
        }
        // Generate PDF
        return $this->generatePdf($jenisReport, $periodeReport);
    }
    private function generatePdf($jenisReport, $periodeReport)
    {
        require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';
        // Load the view for the report
        switch ($jenisReport) {
            case 'data-meteorologi':
                $modelMeteo = new MeteorologiModel();
                $dataFilter = $modelMeteo->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/meteo-pdf-view';
                $judul_laporan = 'Laporan Data Meteorologi';
                $kertas = 'A4';
                $layout_kertas = 'potrait';
                $halaman1 = 250;
                $halaman2 = 810;
                break;
            case 'data-curah-hujan':
                $modelCH = new HujanModel();
                $dataFilter = $modelCH->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/ch-pdf-view';
                $judul_laporan = 'Laporan Intensitas Hujan';
                $kertas = 'legal';
                $layout_kertas = 'landscape';
                $halaman1 = 370;
                $halaman2 = 560;
                break;
            case 'data-penguapan':
                $modelPenguapan = new PenguapanModel();
                $dataFilter = $modelPenguapan->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/ev-pdf-view';
                $judul_laporan = 'Pemeriksaan Penguapan Panci Terbuka';
                $kertas = 'A4';
                $layout_kertas = 'landscape';
                $halaman1 = 370;
                $halaman2 = 560;
                break;    
            case 'data-penyinaran-matahari':
                $modelMatahari = new MatahariModel();
                $dataFilter = $modelMatahari->filterByBulan($periodeReport);
                $pdf_view = 'pages/report/mh-pdf-view';
                $judul_laporan = 'Laporan Lama Penyinaran Matahari';
                $kertas = 'A4';
                $layout_kertas = 'potrait';
                $halaman1 = 250;
                $halaman2 = 810;
                break;
           
            default:
                return redirect()->back()->with('error', 'Jenis laporan tidak valid.');
        }
        if (empty($dataFilter)) {
            return redirect()->back()->with('error', 'Tidak ada data untuk periode yang dipilih.');
        }
           
                      
            $data = [
                'dataFilter' => $dataFilter,  
                'periode' => $periodeReport, 
                'judul_laporan' => $judul_laporan,
            ];
            $html = view($pdf_view,$data);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Enable PHP to use page numbers
        $dompdf = new Dompdf($options);

        // Set HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Atur ukuran kertas dan orientasi
        $dompdf->setPaper($kertas, $layout_kertas);

        // Render PDF
        $dompdf->render();

        $canvas = $dompdf->getCanvas();
        $canvas->page_text($halaman1, $halaman2, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", null, 10, array(0,0,0));

        // Output file PDF ke browser
        $dompdf->stream($judul_laporan."-".$periodeReport.".pdf", ["Attachment" => false]);
    }
    
    
   
}
