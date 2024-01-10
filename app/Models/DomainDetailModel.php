<?php

namespace App\Models;

use CodeIgniter\Model;

class DomainDetailModel extends Model
{
    protected $table      = 'domain_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['domain_id', 'jenis_database', 'versi_php', 'nama_framework', 'template_bootstrap'];

    protected $useTimestamps = false;
    
    public function getAllDomainDetails()
    {
        return $this->findAll();
    }

    public function getDomainDetailById($id)
    {
        return $this->find($id);
    }

    public function insertDomainDetail($data)
    {
        return $this->insert($data);
    }

    public function updateDomainDetail($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteDomainDetail($id)
    {
        return $this->delete($id);
    }
}
