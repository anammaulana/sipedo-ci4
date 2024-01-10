<?php

namespace App\Models;

use CodeIgniter\Model;

class DomainBahasaProgramModel extends Model
{
    protected $table      = 'domain_bahasa_program';
    protected $primaryKey = 'id';
    protected $allowedFields = ['domain_id', 'bahasa_program_id'];

    protected $useTimestamps = false;
}
