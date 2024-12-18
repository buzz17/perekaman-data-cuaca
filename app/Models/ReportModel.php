<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportModel extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'id_report';
    protected $allowedFields = ['jenis_laporan', 'periode', 'status', 'download'];
    protected $useTimestamps = true;

    public function getData()
    {
        $builder = $this->db->table($this->table)
            ->select('*')
            ->orderBy('created_at', 'DESC');
        return $builder->get();
    }
    public function getDataById($id_report)
    {
        $builder = $this->db->table($this->table)
            ->select('*')
            ->where('id_report', $id_report);
        return $builder->get();
    }
    public function addData($data)
    {
        $builder = $this->db->table($this->table)
            ->insert($data);
        return $builder;
    }
}
