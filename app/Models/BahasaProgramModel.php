<?php
namespace App\Models;

use CodeIgniter\Model;

class BahasaProgramModel extends Model
{
    protected $table      = 'bahasa_program';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_bahasa_program'];

    protected $useTimestamps = false;
    public function getAllBahasaProgram()
    {
        return $this->findAll();
    }

    public function getBahasaProgramById($id)
    {
        return $this->find($id);
    }

    public function insertBahasaProgram($data)
    {
        return $this->insert($data);
    }

    public function updateBahasaProgram($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBahasaProgram($id)
    {
        return $this->delete($id);
    }
}

