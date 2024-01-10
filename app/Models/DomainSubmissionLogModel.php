<?php

namespace App\Models;

use CodeIgniter\Model;


class DomainSubmissionLogModel extends Model
{
    protected $table = 'domain_submission_log';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'domain_id', 'action', 'created_at'];
}
