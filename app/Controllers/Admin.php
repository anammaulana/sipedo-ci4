<?php

namespace App\Controllers;

use App\Models\OpdModel;
use App\Models\DomainDetailModel;
use App\Models\DomainModel;
use App\Models\BahasaProgramModel;
use App\Models\StatistikModel;

class Admin extends BaseController
{
    protected  $db, $builder;

    public function __construct()
    {
        //? Mendapatkan instance dari Query Builder
        $this->db = \Config\Database::connect();

        //? Mendapatkan instance dari query builder untuk tabel auth_groups_users
        $this->builder = $this->db->table('users');
    }
    public function index(): string
    {
        $data = [
            "title" => "Sipedo | Panel Admin",

        ];
        return view('admin/index', $data);
    }
    //todo buat Crud Users
    public function datausers()
    {

        // ? Menentukan kolom yang ingin diambil
        $this->builder->select('users.id as userid, username, email, name');

        //? Melakukan join dengan tabel auth_groups_users dam auth_groups
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

        //? Eksekusi query
        $query = $this->builder->get();

        // todo Mengambil hasil query
        $results = $query->getResult();

        // Tampilkan view dengan data 
        $data = [
            "title" => "Sipedo | Data Users",
            'users' => $query->getResult()
        ];
        return view('admin/data_users', $data);
    }
  // Admin.php
// ... (kode lain) ...

public function edit_user($id)
{
    $this->builder->select('users.id as user_id, username, email, name, user_image, auth_groups_users.group_id');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
    $this->builder->where('users.id', $id);

    // Eksekusi query
    $query = $this->builder->get();

    // Mengambil hasil query
    $user = $query->getRow();

    // Mengambil daftar grup dari hasil query
    $groupsModel = new \Myth\Auth\Models\GroupModel();
    $groups = $groupsModel->findAll();

    $data = [
        "title" => "Sipedo | Edit User",
        'user' => $user,
        'groups' => $groups, // Menggunakan variabel $groups yang berisi daftar grup
    ];

    return view('admin/edit_user', $data);
}


public function update_user($id)
{
    // Mengambil data dari formulir
    $newGroupId = $this->request->getPost('group_id');

    // Memperbarui peran pengguna hanya jika peran yang dipilih adalah admin
    $data = [
        'group_id' => $newGroupId,
    ];

    // Menggunakan Query Builder untuk melakukan UPDATE ke tabel 'auth_groups_users'
    $this->db->table('auth_groups_users')
        ->where('user_id', $id)
        ->update($data);

    return redirect()->to(base_url('admin/datausers'))->with('success', 'User role updated successfully.');
}

    
    // Metode untuk menentukan apakah peran adalah admin
    private function isAdminRole($groupId)
    {
        // Menggunakan Query Builder untuk mencari informasi peran
        $query = $this->db->table('auth_groups')
            ->select('name')
            ->where('id', $groupId)
            ->get();
    
        $group = $query->getRow();
    
        // Menentukan apakah peran adalah admin (sesuaikan dengan struktur tabel dan data peran Anda)
        return ($group && $group->name == 'admin');
    }
    
    

    public function detail_user($id)
    {
        $this->builder->select('users.id as userid, username, email, name, fullname, user_image');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);

        //? Eksekusi query
        $query = $this->builder->get();

        // todo Mengambil hasil query
        $results = $query->getRow();
        $data =
            [
                "title" => "Sipedo | Detail User",
                'user' => $query->getRow()
            ];
        return view('admin/detail_users', $data);
    }

    //todo buat Crud Users ended

    public function dashboard()
    {
        $model = new DomainModel();
        $model = new StatistikModel();


        // Tampilkan view dengan data statistik
        $data = [
            'statistik' => $model->getStatistik(),
            "title" => "Sipedo | Dashboard Admin"
        ];
        return view('admin/dashboard', $data);
    }




    //*INI METHOD DOMAIN Approval
    public function approval()
    {
        $model = new DomainModel();
        $data = [
            'domains' => $model->getPendingDomains(),
            "title" => "Sipedo | Domain Approval"
        ];

        return view('admin/approval', $data);
    }

    public function approve($id)
    {
        // Tambahkan validasi apakah pengguna memiliki otoritas untuk menyetujui
        if (!in_groups('admin')) {
            // Redirect atau berikan pesan error
            return redirect()->back()->with('error', 'You do not have permission to approve.');
        }

        $model = new DomainModel();
        $model->update($id, ['status' => 'Approved']);

        return redirect()->to(base_url('admin/approval'));
    }

    public function reject($id)
    {
        // Tambahkan validasi apakah pengguna memiliki otoritas untuk menolak
        if (!in_groups('admin')) {
            // Redirect atau berikan pesan error
            return redirect()->back()->with('error', 'You do not have permission to reject.');
        }

        $model = new DomainModel();
        $model->update($id, ['status' => 'Rejected']);

        return redirect()->to(base_url('admin/approval'));
    }


    public function detail($id)
    {
        $model = new DomainModel();
        $data = [
            'domains' => $model->getPendingDomains(),
            'domains' => $model->getAllDomainsdetail()
        ];

        return view('admin/detail', $data);
    }
    // *SAMPAI SINI METHOD APPROVAL

    // *INI METHOD DATA PENGAJUAN DOMAIN ALL
    public function allDomains()
    {
        $model = new DomainModel();
        $data = [
            'domains' => $model->getPendingDomains(),
            'domains' => $model->getAllDomainsdetail(),
            "title" => "Sipedo | Data Pengajuan"
        ];

        return view('admin/all_data_pengajuan', $data);
    }
    //* ENDED

    // * INI METHOD BUAT OPD

    public function opd()
    {
        $model = new OpdModel();
        $data =
            [

                'opds' => $model->getAllOpd(),
                'title' => 'Sipedo | Manage OPD'
            ];

        return view('admin/manage_opd', $data);
    }

    public function addOpd()
    {
        return view('admin/add_opd');
    }

    public function storeOpd()
    {
        $model = new OpdModel();
        $data = [
            'nama_opd' => $this->request->getPost('nama_opd'),
        ];
        $model->insertOpd($data);

        // Tambahkan Flashdata
        $this->setFlashdata('success', 'OPD added successfully');

        return redirect()->to('/admin/opd');
    }

    public function updateOpd($id)
    {
        $model = new OpdModel();
        $data = [
            'nama_opd' => $this->request->getPost('nama_opd'),
        ];
        $model->updateOpd($id, $data);

        // Tambahkan Flashdata
        $this->setFlashdata('success', 'OPD updated successfully');

        return redirect()->to('/admin/opd');
    }

    public function deleteOpd($id)
    {
        $model = new OpdModel();
        $model->deleteOpd($id);

        // Tambahkan Flashdata
        $this->setFlashdata('success', 'OPD deleted successfully');

        return redirect()->to('/admin/opd');
    }

    // ?Fungsi untuk menetapkan Flashdata
    protected function setFlashdata($type, $message)
    {
        session()->setFlashdata($type, $message);
    }
    //* ENDED

    // *INI METHOD BUAT BAHASA PROGRAMS
    public function bahasaProgram()
    {
        $model = new BahasaProgramModel();
        $data = [
            'bahasaPrograms' => $model->getAllBahasaProgram(),
            'title' => 'Sipedo | Manage Bahasa Program'
        ];

        return view('admin/manage_bahasa_program', $data);
    }

    public function addBahasaProgram()
    {
        return view('admin/add_bahasa_program');
    }

    public function storeBahasaProgram()
    {
        $model = new BahasaProgramModel();
        $data = [
            'nama_bahasa_program' => $this->request->getPost('nama_bahasa_program'),
        ];
        $model->insertBahasaProgram($data);

        $this->setFlashdata('success', 'Programming Language added successfully');

        return redirect()->to('/admin/bahasaProgram');
    }

    public function editBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $data['bahasaProgram'] = $model->getBahasaProgramById($id);

        return view('admin/edit_bahasa_program', $data);
    }

    public function updateBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $data = [
            'nama_bahasa_program' => $this->request->getPost('nama_bahasa_program'),
        ];
        $model->updateBahasaProgram($id, $data);

        $this->setFlashdata('success', 'Programming Language updated successfully');

        return redirect()->to('/admin/bahasaProgram');
    }

    public function deleteBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $model->deleteBahasaProgram($id);

        $this->setFlashdata('success', 'Programming Language deleted successfully');

        return redirect()->to('/admin/bahasaProgram');
    }
    // *ENDED

    // *INI METHOD  DOMAINS
    public function domains()
    {
        $model = new DomainModel();
        $opdModel = new OpdModel();

        $data = [
            'domains' => $model->getAllDomains(),
            'opds' => $opdModel->getAllOpds(),

            'title' => 'Sipedo | Manage Domains'
        ];

        return view('admin/manage_domains', $data);
    }

    public function addDomain()
    {
        // Mendapatkan data OPD untuk dropdown
        $opdModel = new OpdModel();
        $data['opds'] = $opdModel->getAllOpds();

        return view('admin/add_domain', $data);
    }

    public function storeDomain()
    {
        $validationRules = [
            'nama_domain' => 'required',
            'opd_id' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $model = new DomainModel();
            $data = [
                'nama_domain' => $this->request->getPost('nama_domain'),
                'opd_id' => $this->request->getPost('opd_id'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $model->insertDomain($data);

            $this->setFlashdata('success', 'Domain added successfully');
            return redirect()->to('/admin/domains');
        } else {
            // Jika validasi gagal, kembalikan dengan Flashdata error
            $this->setFlashdata('error', 'Invalid input. Please check your data.');
            return redirect()->back()->withInput();
        }
    }

    public function editDomain($id)
    {
        $model = new DomainModel();
        $opdModel = new OpdModel();

        $data['domain'] = $model->DomainById($id);
        $data['opds'] = $opdModel->getAllOpds();

        return view('admin/edit_domain', $data);
    }

    public function updateDomain($id)
    {
        $validationRules = [
            'nama_domain' => 'required',
            'opd_id' => 'required|numeric',
        ];

        if ($this->validate($validationRules)) {
            $model = new DomainModel();
            $data = [
                'nama_domain' => $this->request->getPost('nama_domain'),
                'opd_id' => $this->request->getPost('opd_id'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $model->updateDomain($id, $data);

            $this->setFlashdata('success', 'Domain updated successfully');
            return redirect()->to('/admin/domains');
        } else {
            // Jika validasi gagal, kembalikan dengan Flashdata error
            $this->setFlashdata('error', 'Invalid input. Please check your data.');
            return redirect()->back()->withInput();
        }
    }

    public function deleteDomain($id)
    {
        $model = new DomainModel();
        $model->deleteDomain($id);

        $this->setFlashdata('success', 'Domain deleted successfully');
        return redirect()->to('/admin/domains');
    }

    // *ENDED
    // *METHOD DOMAINS DETAIL
    public function domainDetails()
    {
        $domainDetailModel = new DomainDetailModel();
        $domainModel = new DomainModel();
        $data = [
            'domainDetails' => $domainDetailModel->getAllDomainDetails(),
            'domains' => $domainModel->findAll(),
            'title' => 'Sipedo | Manage Domain Detail'
        ];

        return view('admin/manage_domain_detail', $data);
    }

    public function addDomainDetail()
    {
        $domainModel = new DomainModel();
        $data['domains'] = $domainModel->findAll();

        return view('admin/add_domain_detail', $data);
    }

    public function storeDomainDetail()
    {
        $validationRules = [
            'domain_id' => 'required|numeric',
            'jenis_database' => 'required',
            'versi_php' => 'required',
            'nama_framework' => 'permit_empty',
            'template_bootstrap' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $domainDetailModel = new DomainDetailModel();
            $data = [
                'domain_id' => $this->request->getPost('domain_id'),
                'jenis_database' => $this->request->getPost('jenis_database'),
                'versi_php' => $this->request->getPost('versi_php'),
                'nama_framework' => $this->request->getPost('nama_framework'),
                'template_bootstrap' => $this->request->getPost('template_bootstrap'),
            ];
            $domainDetailModel->insertDomainDetail($data);

            $this->setFlashdata('success', 'Domain detail added successfully');
            return redirect()->to('/admin/domainDetails');
        } else {
            // Jika validasi gagal, kembalikan dengan Flashdata error
            $this->setFlashdata('error', 'Invalid input. Please check your data.');
            return redirect()->back()->withInput();
        }
    }
    public function editDomainDetail($id)
    {
        $domainDetailModel = new DomainDetailModel();
        $domainModel = new DomainModel();

        $data['domainDetail'] = $domainDetailModel->getDomainDetailById($id);
        $data['domains'] = $domainModel->findAll();

        return view('admin/edit_domain_detail', $data);
    }

    public function updateDomainDetail($id)
    {
        $validationRules = [
            'domain_id' => 'required|numeric',
            'jenis_database' => 'required',
            'versi_php' => 'required',
            'nama_framework' => 'permit_empty',
            'template_bootstrap' => 'required',
        ];

        if ($this->validate($validationRules)) {
            $domainDetailModel = new DomainDetailModel();
            $data = [
                'domain_id' => $this->request->getPost('domain_id'),
                'jenis_database' => $this->request->getPost('jenis_database'),
                'versi_php' => $this->request->getPost('versi_php'),
                'nama_framework' => $this->request->getPost('nama_framework'),
                'template_bootstrap' => $this->request->getPost('template_bootstrap'),
            ];
            $domainDetailModel->updateDomainDetail($id, $data);

            $this->setFlashdata('success', 'Domain detail updated successfully');
            return redirect()->to('/admin/domainDetails');
        } else {
            // todo Jika validasi gagal, kembalikan dengan Flashdata error
            $this->setFlashdata('error', 'Invalid input. Please check your data.');
            return redirect()->back()->withInput();
        }
    }

    public function deleteDomainDetail($id)
    {
        $domainDetailModel = new DomainDetailModel();
        $domainDetailModel->deleteDomainDetail($id);

        $this->setFlashdata('success', 'Domain detail deleted successfully');
        return redirect()->to('/admin/domainDetails');
    }
    // *ENDED

    // ?untuk statistik
    public function statistics()
    {
        $domainModel = new DomainModel();
        //todo Logika untuk mengambil data statistik dari model
        $data = [
            'totalDomains' => $domainModel->countAll(),
            'totalApprovedDomains' => $domainModel->countApprovedDomains(),
            'totalRejectedDomains' => $domainModel->countRejectedDomains(),
            'totalPendingDomains' => $domainModel->countPendingDomains(),
            'title' => 'Sipedo | Statistik'
        ];

        //todo Kirim data ke tampilan
        return view('admin/dashboard', $data);
    }

    // ? Untuk laporan
    public function reports()
    {
        $model = new DomainModel();

        $data = [
            'dailyReport' => $model->getDailyReport(),
            'weeklyReport' => $model->getWeeklyReport(),
            'monthlyReport' => $model->getMonthlyReport(),
            'title' => 'Sipedo | Report'
            // Tambahkan method lain untuk laporan yang berbeda
        ];

        return view('admin/report', $data);
    }
}
