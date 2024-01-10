<?php
namespace App\Controllers;

use App\Models\DomainModel;

class Katalog extends BaseController
{
    public function index()
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
