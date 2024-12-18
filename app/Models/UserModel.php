<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id_user";
    protected $allowedFields = ["nip", "username", "password", "salt", "role"];
    protected $useTimestamps = false;

    public function getData()
    {
        $builder = $this->db->table($this->table)
            ->select('*');
        return $builder->get();
    }
    public function getDataBy($id)
    {
        $builder = $this->db->table($this->table)
            ->where('id_user', $id);
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
            ->update($data, array('id_user' => $id));
        return $builder;
    }

    public function getCountData()
    {
        $builder = $this->db->table($this->table)
            ->countAllResults(false);
        return $builder;
    }
}
