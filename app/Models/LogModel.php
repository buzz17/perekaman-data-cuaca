<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table      = 'log';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    

    public function getData()
    {
        $builder = $this->db->table($this->table)
            ->orderBy('log', 'DESC');
        return $builder->get();
    }

    public function getDataByUser($user)
    {
        $builder = $this->db->table($this->table)
            ->where('username', $user);
        return $builder->get();
    }

    public function getDataBy($id)
    {
        $builder = $this->db->table($this->table)
            ->where('id', $id);
        return $builder->get();
    }
    public function addData($data)
    {
        $builder = $this->db->table($this->table)
            ->insert($data);
        return $builder;
    }
    public function updateData($data, $id)
    {
        $builder = $this->db->table($this->table)
            ->update($data, array('id' => $id));
        return $builder;
    }
    public function getCountData()
    {
        $builder = $this->db->table($this->table)
            ->countAllResults(false);
        return $builder;
    }
}
