<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/datausers', 'Admin::datausers', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail_user/$1', ['filter' => 'role:admin']);
$routes->get('/admin/edit_user/(:num)', 'Admin::edit_user/$1', ['filter' => 'role:admin']);
$routes->post('/admin/update_user/(:num)', 'Admin::update_user/$1', ['filter' => 'role:admin']);


$routes->get('/', 'Katalog::index');
$routes->get('user', 'User::index');
$routes->get('user/pengajuan_domain', 'User::pengajuan_domain');
$routes->post('user/store_pengajuan_domain', 'User::store_pengajuan_domain');
$routes->get('review_pengajuan', 'User::review_pengajuan');
$routes->get('detail_pengajuan/(:num)', 'User::detail_pengajuan/$1');
$routes->get('riwayat_pengajuan', 'User::riwayat_pengajuan');


$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/report', 'Admin::reports');
$routes->get('admin/statistic', 'Admin::statistics');
$routes->get('admin/approvedDomainsReport', 'Admin::approvedDomainsReport');
$routes->get('admin/printApprovedDomainsReport', 'Admin::printApprovedDomainsReport');

//todo INI ROUTES APPROVAL
$routes->get('admin/approval', 'Admin::approval');
$routes->get('admin/approve/(:num)', 'Admin::approve/$1');
$routes->get('admin/reject/(:num)', 'Admin::reject/$1');
$routes->get('admin/detail/(:num)', 'Admin::detail/$1');
$routes->get('admin/all_domains', 'Admin::allDomains');
// !ENDED

// ?INI ROUTES OPD
$routes->post('admin/opd', 'Admin::opd');
$routes->get('admin/opd', 'Admin::opd');
$routes->get('adminaddOpd', 'Admin::addOpd');
$routes->post('admin/storeOpd', 'Admin::storeOpd');
$routes->get('admin/editOpd/(:num)', 'Admin::editOpd/$1');
$routes->post('admin/updateOpd/(:num)', 'Admin::updateOpd/$1');
$routes->get('admin/deleteOpd/(:num)', 'Admin::deleteOpd/$1');
// !ENDED
//todo ini routes bahasa program
$routes->get('admin/bahasaProgram', 'Admin::bahasaProgram');
$routes->get('admin/addBahasaProgram', 'Admin::addBahasaProgram');
$routes->post('admin/storeBahasaProgram', 'Admin::storeBahasaProgram');
$routes->get('admin/editBahasaProgram/(:num)', 'Admin::editBahasaProgram/$1');
$routes->post('admin/updateBahasaProgram/(:num)', 'Admin::updateBahasaProgram/$1');
$routes->get('admin/deleteBahasaProgram/(:num)', 'Admin::deleteBahasaProgram/$1');
//! ended
//todo ini routes domain all
$routes->get('admin/domains', 'Admin::domains');
$routes->get('admin/addDomain', 'Admin::addDomain');
$routes->post('admin/storeDomain', 'Admin::storeDomain');
$routes->get('admin/editDomain/(:num)', 'Admin::editDomain/$1');
$routes->post('admin/updateDomain/(:num)', 'Admin::updateDomain/$1');
$routes->get('admin/deleteDomain/(:num)', 'Admin::deleteDomain/$1');
// ended

//todo Manage Domain Details
$routes->get('admin/domainDetails', 'Admin::domainDetails');
$routes->get('admin/addDomainDetail', 'Admin::addDomainDetail');
$routes->post('admin/storeDomainDetail', 'Admin::storeDomainDetail');
$routes->get('admin/editDomainDetail/(:num)', 'Admin::editDomainDetail/$1');
$routes->post('admin/updateDomainDetail/(:num)', 'Admin::updateDomainDetail/$1');
$routes->get('admin/deleteDomainDetail/(:num)', 'Admin::deleteDomainDetail/$1');
// ended
