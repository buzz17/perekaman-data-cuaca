<?php

namespace App\Controllers;

use App\Models\MeteorologiModel;

class WeatherDataController extends BaseController
{
    public function index()
    {
        $model = new MeteorologiModel();

        // Ambil parameter filter dari input pengguna (GET request)
        $startDate = $this->request->getPost('start_date');
        $endDate = $this->request->getPost('end_date');

        // Default data tanpa filter
        $data = [];
        if ($startDate && $endDate) {
            // Filter data berdasarkan tanggal UTC
            $data = $model->filterByTanggalUTC($startDate, $endDate);
        }

        return view('pages/monitoring/weather_data_view', ['data' => $data]);
    }
}
