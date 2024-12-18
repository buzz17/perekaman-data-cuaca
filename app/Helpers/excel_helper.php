<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!function_exists('exportToExcel')) {
    /**
     * Fungsi untuk mengekspor data ke Excel
     *
     * @param array $data Data yang akan diekspor (array of associative arrays)
     * @param string $filename Nama file output
     * @param array $headers Header kolom (opsional)
     */
    function exportToExcel(array $data, string $filename = 'Laporan.xlsx', array $headers = [])
    {
        // Inisialisasi Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set Header Kolom
        if (!empty($headers)) {
            $colIndex = 'A';
            foreach ($headers as $header) {
                $sheet->setCellValue($colIndex . '1', $header);
                $colIndex++;
            }
        }

        // Isi Data ke dalam Excel
        $rowNumber = 2; // Baris mulai data
        foreach ($data as $row) {
            $colIndex = 'A';
            foreach ($row as $value) {
                $sheet->setCellValue($colIndex . $rowNumber, $value);
                $colIndex++;
            }
            $rowNumber++;
        }

        // Atur Header untuk Unduh File
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Tulis dan Unduh File
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
