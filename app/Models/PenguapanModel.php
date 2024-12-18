<?php

namespace App\Models;

use CodeIgniter\Model;

class PenguapanModel extends Model
{
    protected $table = 'penguapan'; 
    protected $primaryKey = 'id_data';
    protected $allowedFields = [
        'id_data', 'id_station', 'observer'
    ];

    public function filterByTanggalUTC($inputTanggal)
    {
        return $this->where('tanggal', $inputTanggal)                  
                    ->findAll() ?? [];  // Ensure it always returns an array
    }
    public function filterByBulan($inputBulan)
    {
    $bulan = date('m', strtotime($inputBulan)); // Get the month part from 'YYYY-MM'
    $tahun = date('Y', strtotime($inputBulan)); // Get the year part from 'YYYY-MM'

    return $this->where('YEAR(tanggal)', $tahun)
                ->where('MONTH(tanggal)', $bulan)
                ->orderBy('tanggal', 'ASC')
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
