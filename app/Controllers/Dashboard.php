<?php

namespace App\Controllers;

use App\Models\OpdModel;
use App\Models\DomainDetailModel;
use App\Models\DomainModel;
use App\Models\BahasaProgramModel;
use App\Models\StatistikModel;


class Dashboard extends BaseController
{
    public function index()
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

        return view('dashboard/approval', $data);
    }

    public function approve($id)
    {
        $model = new DomainModel();
        $model->updateStatus($id, 'Approved');

        return redirect()->to(base_url('dashboard/approval'));
    }

    public function reject($id)
    {
        $model = new DomainModel();
        $model->updateStatus($id, 'Rejected');

        return redirect()->to(base_url('dashboard/approval'));
    }


    public function detail($id)
    {
        $model = new DomainModel();
        $data = [
            'domains' => $model->getPendingDomains(),
            'domains' => $model->getAllDomainsdetail()
        ];

        return view('dashboard/detail', $data);
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

        return view('dashboard/all_data_pengajuan', $data);
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

        return view('dashboard/manage_opd', $data);
    }

    public function addOpd()
    {
        return view('dashboard/add_opd');
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

        return redirect()->to('/dashboard/opd');
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

        return redirect()->to('/dashboard/opd');
    }

    public function deleteOpd($id)
    {
        $model = new OpdModel();
        $model->deleteOpd($id);

        // Tambahkan Flashdata
        $this->setFlashdata('success', 'OPD deleted successfully');

        return redirect()->to('/dashboard/opd');
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

        return view('dashboard/manage_bahasa_program', $data);
    }

    public function addBahasaProgram()
    {
        return view('dashboard/add_bahasa_program');
    }

    public function storeBahasaProgram()
    {
        $model = new BahasaProgramModel();
        $data = [
            'nama_bahasa_program' => $this->request->getPost('nama_bahasa_program'),
        ];
        $model->insertBahasaProgram($data);

        $this->setFlashdata('success', 'Programming Language added successfully');

        return redirect()->to('/dashboard/bahasaProgram');
    }

    public function editBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $data['bahasaProgram'] = $model->getBahasaProgramById($id);

        return view('dashboard/edit_bahasa_program', $data);
    }

    public function updateBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $data = [
            'nama_bahasa_program' => $this->request->getPost('nama_bahasa_program'),
        ];
        $model->updateBahasaProgram($id, $data);

        $this->setFlashdata('success', 'Programming Language updated successfully');

        return redirect()->to('/dashboard/bahasaProgram');
    }

    public function deleteBahasaProgram($id)
    {
        $model = new BahasaProgramModel();
        $model->deleteBahasaProgram($id);

        $this->setFlashdata('success', 'Programming Language deleted successfully');

        return redirect()->to('/dashboard/bahasaProgram');
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

        return view('dashboard/manage_domains', $data);
    }

    public function addDomain()
    {
        // Mendapatkan data OPD untuk dropdown
        $opdModel = new OpdModel();
        $data['opds'] = $opdModel->getAllOpds();

        return view('dashboard/add_domain', $data);
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
            return redirect()->to('/dashboard/domains');
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

        return view('dashboard/edit_domain', $data);
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
            return redirect()->to('/dashboard/domains');
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
        return redirect()->to('/dashboard/domains');
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

        return view('dashboard/manage_domain_detail', $data);
    }

    public function addDomainDetail()
    {
        $domainModel = new DomainModel();
        $data['domains'] = $domainModel->findAll();

        return view('dashboard/add_domain_detail', $data);
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
            return redirect()->to('/dashboard/domainDetails');
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
            return redirect()->to('/dashboard/domainDetails');
        } else {
            // Jika validasi gagal, kembalikan dengan Flashdata error
            $this->setFlashdata('error', 'Invalid input. Please check your data.');
            return redirect()->back()->withInput();
        }
    }

    public function deleteDomainDetail($id)
    {
        $domainDetailModel = new DomainDetailModel();
        $domainDetailModel->deleteDomainDetail($id);

        $this->setFlashdata('success', 'Domain detail deleted successfully');
        return redirect()->to('/dashboard/domainDetails');
    }
    // *ENDED

    // ?untuk statistik
    public function statistics()
    {
        $domainModel = new DomainModel();
        // !Logika untuk mengambil data statistik dari model
        $data = [
            'totalDomains' => $domainModel->countAll(),
            'totalApprovedDomains' => $domainModel->countApprovedDomains(),
            'totalRejectedDomains' => $domainModel->countRejectedDomains(),
            'totalPendingDomains' => $domainModel->countPendingDomains(),
            'title' => 'Sipedo | Statistik'
        ];

        //! Kirim data ke tampilan
        return view('dashboard/dashboard', $data);
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

        return view('dashboard/report', $data);
    }
    
}
