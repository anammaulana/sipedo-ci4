<?php
namespace App\Controllers;

use App\Models\DomainModel;

class Katalog extends BaseController
{
    public function index()
    {
      
        $data = [
          
            "title" => "Sipedo | Hallo User"
        ];
        return view('katalog/index',$data);
    }
    public function profile()
    {
      
        $data = [
          
            "title" => "Sipedo | Profile Singkat"
        ];
        return view('katalog/profil_diskominfo',$data);
    }
    public function katalog()
    {
        $model = new DomainModel();
        $data = [
            'domainsForKatalog' => $model->getAllDomainForKatalog(),
            'domaindetail' => $model->getAllDomainsdetail(),
            'allDomains' => $model->getAllDomains(),
          
            "title" => "Sipedo | Domain Katalog"
        ];
        return view('katalog/katalog_domain',$data);
    }

}
