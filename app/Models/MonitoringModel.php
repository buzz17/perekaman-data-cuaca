<?php

namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
    protected $table = 'meteorologi'; // Assuming your data is in this table
    protected $primaryKey = 'id_data';
    
    public function getFilteredData($start_date, $end_date)
    {
        // Building the query
        $builder = $this->builder();
        // Filter by date range
        $builder->where('tanggalutc >=', $start_date);
        $builder->where('tanggalutc <=', $end_date);
        
        return $builder->get()->getResult();
    }
}
