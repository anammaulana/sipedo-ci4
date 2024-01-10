<?php

namespace App\Models;

use CodeIgniter\Model;

class DomainModel extends Model
{
    protected $table = 'domains';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'nama_domain',
        'opd_id',
        'deskripsi',
        'status',
    ];


    // * for katalog method
    public function getAllDomainForKatalog()
    {   
        return $this->findAll();
    }
    // * for katalog method ended

    //* statistik start  
    public function countAll()
    {
        return $this->countAllResults();
    }

    public function countApprovedDomains()
    {
        return $this->where('status', 'approved')->countAllResults();
    }

    public function countRejectedDomains()
    {
        return $this->where('status', 'rejected')->countAllResults();
    }

    public function countPendingDomains()
    {
        return $this->where('status', 'pending')->countAllResults();
    }
    //*statistik end
    public function getDomainDetails()
    {
        return $this->select('domains.*, opd.nama_opd, GROUP_CONCAT(bahasa_program.nama_bahasa_program) AS bahasa_programs')
            ->join('opd', 'opd.id = domains.opd_id')
            ->join('domain_bahasa_program', 'domain_bahasa_program.domain_id = domains.id', 'left')
            ->join('bahasa_program', 'bahasa_program.id = domain_bahasa_program.bahasa_program_id', 'left')
            ->groupBy('domains.id')
            ->get()
            ->getResultArray();
    }

    //*INI METHOD APPROVALL DOMAIN bagian ADMIN TERCINTA

    public function getPendingDomains()
    {
        return $this->select('domains.id, domains.nama_domain, opd.nama_opd, GROUP_CONCAT(bahasa_program.nama_bahasa_program) AS bahasa_programs, domains.deskripsi, domain_detail.jenis_database, domain_detail.versi_php, domain_detail.nama_framework, domain_detail.template_bootstrap')
            ->join('opd', 'opd.id = domains.opd_id')
            ->join('domain_bahasa_program', 'domain_bahasa_program.domain_id = domains.id', 'left')
            ->join('bahasa_program', 'bahasa_program.id = domain_bahasa_program.bahasa_program_id', 'left')
            ->join('domain_detail', 'domain_detail.domain_id = domains.id', 'left')
            ->where('status', 'Pending')
            ->groupBy('domains.id')
            ->get()
            ->getResultArray();
    }

    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }

    // Perbaikan pada method detail di Controller
    public function detail($id)
    {
        $model = new DomainModel();
        $data = [
            'domain' => $model->getDomainById($id),
        ];

        return view('admin/detail', $data);
    }

    //*ENDED

    //*INI METOD USER OKE BRO    
    public function insertBahasaProgram($domainId, $bahasaProgram)
    {
        $data = [];
        foreach ($bahasaProgram as $programId) {
            $data[] = [
                'domain_id' => $domainId,
                'bahasa_program_id' => $programId,
            ];
        }
        $this->db->table('domain_bahasa_program')->insertBatch($data);
    }

    public function insertDomainDetail($data)
    {
        $this->db->table('domain_detail')->insert($data);
    }
    // *ENDED

    // *INI METHOD ALL DOMAIN
    public function getAllDomains()
    {
        return $this->findAll();
    }

    public function DomainById($id)
    {
        return $this->find($id);
    }

    public function insertDomain($data)
    {
        return $this->insert($data);
    }

    public function updateDomain($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteDomain($id)
    {
        return $this->delete($id);
    }

    // ENDED
    // todo ini ngambil semua detail domain
    public function getAllDomainsdetail()
    {
        return $this->select('domains.id, domains.nama_domain, opd.nama_opd, GROUP_CONCAT(bahasa_program.nama_bahasa_program) AS bahasa_programs, domains.deskripsi, domain_detail.jenis_database, domain_detail.versi_php, domain_detail.nama_framework, domain_detail.template_bootstrap')
            ->join('opd', 'opd.id = domains.opd_id')
            ->join('domain_bahasa_program', 'domain_bahasa_program.domain_id = domains.id', 'left')
            ->join('bahasa_program', 'bahasa_program.id = domain_bahasa_program.bahasa_program_id', 'left')
            ->join('domain_detail', 'domain_detail.domain_id = domains.id', 'left')
            // ->where('status', 'Pending') // Hapus kondisi ini untuk mendapatkan semua status
            ->groupBy('domains.id, domains.nama_domain, opd.nama_opd, domains.deskripsi, domain_detail.jenis_database, domain_detail.versi_php, domain_detail.nama_framework, domain_detail.template_bootstrap')
            ->get()
            ->getResultArray();
    }
    // todo ini ngambil semua detail domain ENDED

    // *UNTUK LAPORAN
    public function getDailyReport()
    {
        $today = date('Y-m-d');
        return $this->select('COUNT(*) as total')
            ->where('DATE(created_at)', $today)
            ->groupBy('DATE(created_at)')
            ->get()
            ->getRowArray();
    }

    public function getWeeklyReport()
    {
        $startOfWeek = date('Y-m-d', strtotime('monday this week'));
        $endOfWeek = date('Y-m-d', strtotime('sunday this week'));
        return $this->select('COUNT(*) as total')
            ->where('DATE(created_at) >=', $startOfWeek)
            ->where('DATE(created_at) <=', $endOfWeek)
            ->groupBy('WEEK(created_at)')
            ->get()
            ->getRowArray();
    }

    public function getMonthlyReport()
    {
        $startOfMonth = date('Y-m-01');
        $endOfMonth = date('Y-m-t');
        return $this->select('COUNT(*) as total')
            ->where('DATE(created_at) >=', $startOfMonth)
            ->where('DATE(created_at) <=', $endOfMonth)
            ->groupBy('MONTH(created_at)')
            ->get()
            ->getRowArray();
    }
    // *ENDED

    //TODO BUAT PENINJAUAN PENGAJUAN DOMAIN
  
    //TODO BUAT PENINJAUAN PENGAJUAN DOMAIN

}
