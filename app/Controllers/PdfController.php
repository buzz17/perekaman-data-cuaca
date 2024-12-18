<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function generatePdf()
    {
        // Pastikan path ke Dompdf sudah benar
        require_once APPPATH . 'Libraries/dompdf/autoload.inc.php';

        // Data untuk ditampilkan di view
        $data = [
            'title' => 'Laporan PDF Manual',
            'content' => 'Ini adalah contoh laporan PDF menggunakan Dompdf yang dipasang secara manual.'
        ];

        // Load view ke variabel
        $html = view('pages/report/mh-pdf-view', $data);

        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true); // Enable PHP to use page numbers
        $dompdf = new Dompdf($options);

        // Set HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Atur ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'potrait');

        // Render PDF
        $dompdf->render();

        $canvas = $dompdf->getCanvas();
        $canvas->page_text(250, 810, "Halaman {PAGE_NUM} dari {PAGE_COUNT}", null, 10, array(0,0,0));

        // Output file PDF ke browser
        $dompdf->stream("laporan_manual.pdf", ["Attachment" => false]);
    }
}
