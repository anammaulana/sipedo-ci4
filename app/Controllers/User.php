<?php

namespace App\Controllers;

use App\Models\DomainModel;
use App\Models\DomainSubmissionLogModel;
use App\Models\OpdModel;
use App\Models\BahasaProgramModel;
use CodeIgniter\Validation\Validation;


class User extends BaseController
{
    protected  $db, $builder, $auth, $validation;
    public function __construct()
    {
        $this->auth = service('authentication');
        //? Mendapatkan instance dari Query Builder
        $this->db = \Config\Database::connect();

        //? Mendapatkan instance dari query builder untuk tabel auth_groups_users
        $this->builder = $this->db->table('users');
        $this->validation = \Config\Services::validation();
       
    }
    public function index(): string
    {
        $model = new DomainModel();

        // Ambil data domain dengan detail dari model
        $data = [
            // 'domains' => $model->getDomainsWithDetails(),
            // 'model' => $model,
            'title' => 'Sipedo | Pages User '
        ];

        return view('user/user', $data);
    }

    public function pengajuan_domain()
    {
        $userId = user()->id;
    
        $opdModel = new OpdModel();
        $bahasaProgramModel = new BahasaProgramModel();
    
        $data = [
            'opds' => $opdModel->findAll(),
            'bahasa_programs' => $bahasaProgramModel->findAll(),
            'title' => 'Sipedo | Pengajuan Domain',
            'userId' => $userId, // Tambahkan user ID ke data
        ];
    
        return view('user/pengajuan_domain', $data);
    }
    

    // ...

public function store_pengajuan_domain()
{
    $request = service('request');
    $userId = user()->id;
    $domainModel = new DomainModel();

    // Proses menyimpan data ke database tanpa validasi
    $data = [
        'nama_domain' => $request->getPost('nama_domain'),
        'opd_id' => $request->getPost('opd'),
        'deskripsi' => $request->getPost('deskripsi'),
        'status' => 'Pending',
    ];

    $domainId = $domainModel->insert($data);

    // Proses menyimpan data bahasa_program ke tabel domain_bahasa_program
    $bahasaProgram = $request->getPost('bahasa_program');
    if (!empty($bahasaProgram)) {
        $domainModel->insertBahasaProgram($domainId, $bahasaProgram);
    }

    // Proses menyimpan data domain_detail
    $domainDetailData = [
        'domain_id' => $domainId,
        'jenis_database' => $request->getPost('jenis_database'),
        'versi_php' => $request->getPost('versi_php'),
        'nama_framework' => $request->getPost('nama_framework'),
        'template_bootstrap' => $request->getPost('template_bootstrap'),
    ];

    $domainModel->insertDomainDetail($domainDetailData);

    // Simpan log pengajuan
    $this->saveSubmissionLog($userId, $domainId, 'submit');

    // Tampilkan pesan sukses
    return redirect()->to('user/pengajuan_domain')->with('success', 'Pengajuan domain berhasil diajukan!');
}


// ...


    private function saveSubmissionLog($userId, $domainId, $action)
    {
        $logModel = new DomainSubmissionLogModel();
        $logModel->insert([
            'user_id' => $userId,
            'domain_id' => $domainId,
            'action' => $action,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }


    // ...
    
    
    //// INI METHOD PENINJAUAN PENGAJUAN DOMAIN
    // // ...
    // public function review_pengajuan()
    // {   
    
    // $model = new DomainModel();
    // // *Ambil data pengajuan yang perlu ditinjau oleh user yang login
    // $userId = user()->id;
    // $pengajuan = $model->getPengajuanPerluDitinjau($userId);
    
    // $data = [
    //     'pengajuan' => $pengajuan,
    //     'title' => 'Sipedo | Review Pengajuan',
    // ];
    
    // return view('user/review_pengajuan', $data);
    // }
    
    // public function detail_pengajuan($id)
    // {
    // $model = new DomainModel();
    // // Ambil detail pengajuan sesuai dengan ID dan user yang login
    // $userId = user()->id;
    // $pengajuan = $model->getDetailPengajuan($id, $userId);
    
    // $data = [
    //     'pengajuan' => $pengajuan,
    //     'title' => 'Sipedo | Detail Pengajuan',
    // ];
    
    // return view('user/detail_pengajuan', $data);
    // }
    
    // public function riwayat_pengajuan()
    // {   
    // $model = new DomainModel();
    // // Ambil riwayat pengajuan oleh user yang login
    // $userId = service('auth')->id();
    // $riwayatPengajuan = $this->$model->getRiwayatPengajuan($userId);
    
    // $data = [
    //     'riwayatPengajuan' => $riwayatPengajuan,
    //     'title' => 'Sipedo | Riwayat Pengajuan',
    // ];
    
    // return view('user/riwayat_pengajuan', $data);
    // }
    //todo INI METHOD PENINJAUAN PENGAJUAN DOMAIN
}
