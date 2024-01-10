<?php

namespace App\Models;

use CodeIgniter\Model;

class OpdModel extends Model
{
    protected $table      = 'opd';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_opd'];
    protected $useTimestamps = false;

    public function getAllOpd()
    {
        return $this->findAll();
    }
    public function getAllOpds()
    {
        return $this->findAll();
    }

    public function getOpdById($id)
    {
        return $this->find($id);
    }

    public function insertOpd($data)
    {
        return $this->insert($data);
    }

    public function updateOpd($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteOpd($id)
    {
        return $this->delete($id);
    }
}


