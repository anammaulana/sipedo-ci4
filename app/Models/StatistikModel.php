<?php
namespace App\Models;

use CodeIgniter\Model;

class StatistikModel extends Model
{
    protected $table = 'domains'; // Sesuaikan dengan nama tabel yang sesuai dengan struktur database Anda

    public function getStatistik()
    {
        // Contoh pengambilan data statistik berdasarkan status
        $dataStatistik = [
            'pending' => $this->where('status', 'Pending')->countAllResults(),
            'approved' => $this->where('status', 'Approved')->countAllResults(),
            'rejected' => $this->where('status', 'Rejected')->countAllResults(),
        ];

        return $dataStatistik;
    }
}
