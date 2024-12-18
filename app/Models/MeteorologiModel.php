<?php

namespace App\Models;

use CodeIgniter\Model;

class MeteorologiModel extends Model
{
    protected $table = 'meteorologi'; 
    protected $primaryKey = 'id_data';
    protected $allowedFields = [
        'id_data', 'tanggallokal', 'tanggalutc', 'waktulokal', 'waktuutc', 
        'arahangin', 'kecangin', 'qff', 'qfe', 'bk', 'bb', 'dp', 'rh', 
        'id_station', 'observer'
    ];

    public function filterByTanggalUTC($inputTanggal)
    {
        return $this->where('tanggalutc', $inputTanggal)                  
                    ->findAll() ?? [];  // Ensure it always returns an array
    }
    public function filterByBulan($inputBulan)
    {
    $bulan = date('m', strtotime($inputBulan)); // Get the month part from 'YYYY-MM'
    $tahun = date('Y', strtotime($inputBulan)); // Get the year part from 'YYYY-MM'

    return $this->where('YEAR(tanggallokal)', $tahun)
                ->where('MONTH(tanggallokal)', $bulan)
                ->orderBy('tanggallokal', 'ASC')
                ->findAll() ?? [];  // Ensure it always returns an array
    }

    public function getAllData()
    {
        return $this->findAll() ?? [];  // Ensure it always returns an array
    }
    public function addData($data)
    {
        $builder = $this->db->table($this->table)
            ->insert($data);
        return $builder;
    }


    
}
