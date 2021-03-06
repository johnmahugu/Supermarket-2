<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PackageCL extends CI_Controller {

 function __construct() {
  parent::__construct();
  $this->load->database('supermarket', TRUE);
  $this->load->library('session');
  $this->load->library('ftp');
  $this->load->library('upload');
  $this->load->helper('url');
  $this->load->model('PackageMD');
 }

 function domestic_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initital valiable*******************/
  $tour_type = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  /********************Initial Filter**********************/
  $data['province']  = $this->PackageMD->getProvince();
  $data['region']    = $this->PackageMD->getRegion();
  /*********************Normal Package*********************/
  $query             = $this->PackageMD->getPackage('thailand', $tour_type);
  $data['package']   = $query;
  $count             = $query->num_rows();
  $data['c_package'] = $count;
  if ($count > 0) {
   for ($i = 0; $i <= $count; $i++) {
    $data['price_range'][$i] = $query->row($i)->tour_priceRange;
   }
  }
  $this->load->view('domestic_package', $data);
 }

 function outbound_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initital valiable*******************/
  $tour_type = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  /********************Initial Filter**********************/
  $data['continent'] = $this->PackageMD->getContinent();
  $data['country']   = $this->PackageMD->getCountry();
  /*********************Normal Package*********************/
  $query             = $this->PackageMD->getPackage('international', $tour_type);
  $data['package']   = $query;
  $count             = $query->num_rows();
  $data['c_package'] = $count;
  if ($count > 0) {
   for ($i = 0; $i <= $count; $i++) {
    $data['price_range'][$i] = $query->row($i)->tour_priceRange;
   }
  }
  $this->load->view('outbound_package', $data);
 }

 function filter() {
  /********************Initial Variable********************/
  $type            = $this->input->post('type');
  $country         = $this->input->post('country');
  $region          = $this->input->post('region');
  $province        = $this->input->post('province');
  $continent       = $this->input->post('continent');
  /*********************Filter Package*********************/
  $query           = $this->PackageMD->getFilter($type, $country, $region, $province, $continent);
  $data['package'] = $query->result();
  echo json_encode($data);
 }

 function delete_package() {
  $tour_nameSlug = $this->input->get('tour');
  $query         = $this->PackageMD->removePackage($tour_nameSlug);
  redirect($_SERVER['HTTP_REFERER']);
 }

 function change_public() {
  $type = $this->input->get('type');
     $nameSlug = $this->input->get('nameSlug');
     $status   = $this->input->get('status');
     echo $this->PackageMD->changePublic($type, $nameSlug, $status);
 }

 function change_highlight() {
  $nameSlug = $this->input->get('nameSlug');
  $status   = $this->input->get('status');
  $this->PackageMD->changeHighlight($nameSlug, $status);
 }

 function edit_domestic_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['province']    = $this->PackageMD->getProvince();
  $data['region']      = $this->PackageMD->getRegion();
  /*****************Export package data********************/
  $data['agency']      = $this->PackageMD->getAgency();
  $query               = $this->PackageMD->editPackage($tour_nameSlug);
  $data['package']     = $query;
  $data['price_range'] = $query->row()->tour_priceRange;
  if ($tour_type == 'sp') {
   $this->load->view('edit_domestic_series_package', $data);
  } else {
   $this->load->view('edit_domestic_easy_package', $data);
  }
 }

 function edit_domestic_package_condition() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['province']  = $this->PackageMD->getProvince();
  $data['region']    = $this->PackageMD->getRegion();
  $query             = $this->PackageMD->editPackageCondition($tour_nameSlug);
  $data['package']   = $query;
  $data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
  if ($tour_type == 'sp') {
   $this->load->view('edit_domestic_series_package_condition', $data);
  } else {
   $this->load->view('edit_domestic_easy_package_condition', $data);
  }
 }

 function edit_domestic_package_service() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['province']  = $this->PackageMD->getProvince();
  $data['region']    = $this->PackageMD->getRegion();
  $query             = $this->PackageMD->editPackageService($tour_nameSlug);
  $data['package']   = $query;
  $data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
  if ($tour_type == 'sp') {
   $this->load->view('edit_domestic_series_package_service', $data);
  } else {
   $this->load->view('edit_domestic_easy_package_service', $data);
  }
 }

 function edit_outbound_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['continent']   = $this->PackageMD->getContinent();
  $data['country']     = $this->PackageMD->getCountry();
  /*****************Export package data********************/
  $data['agency']      = $this->PackageMD->getAgency();
  $query               = $this->PackageMD->editPackage($tour_nameSlug);
  $data['package']     = $query;
  $data['price_range'] = $query->row()->tour_priceRange;
  if ($tour_type == 'sp') {
   $this->load->view('edit_outbound_series_package', $data);
  } else {
   $this->load->view('edit_outbound_easy_package', $data);
  }
 }

 function edit_outbound_package_condition() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['continent'] = $this->PackageMD->getContinent();
  $data['country']   = $this->PackageMD->getCountry();
  $query             = $this->PackageMD->editPackageCondition($tour_nameSlug);
  $data['package']   = $query;
  $data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
  if ($tour_type == 'sp') {
   $this->load->view('edit_outbound_series_package_condition', $data);
  } else {
   $this->load->view('edit_outbound_easy_package_condition', $data);
  }
 }

 function edit_outbound_package_service() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['continent'] = $this->PackageMD->getContinent();
  $data['country']   = $this->PackageMD->getCountry();
  $query             = $this->PackageMD->editPackageService($tour_nameSlug);
  $data['package']   = $query;
  $data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
  $this->load->view('edit_outbound_easy_package_service', $data);
 }

 function update_outbound_package_service() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH     = $this->input->post('nameTH');
  $nameEN     = $this->input->post('nameEN');
  $country    = $this->input->post('country');
  $continent  = $this->input->post('continent');
  $startPrice = $this->input->post('startPrice');
  $hotel      = $this->input->post('hotel');
  $this->PackageMD->updatePackageService($oldNameSlug, $newNameSlug, $nameTH, $nameEN, $startPrice, $hotel);
  $this->PackageMD->updateOutboundLocation($newNameSlug, $country, $continent);
  redirect('outbound-package?type=' . $type, 'refresh');
 }

 function update_domestic_package() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH         = $this->input->post('nameTH');
  $nameEN         = $this->input->post('nameEN');
  $startPrice     = $this->input->post('startPrice');
  $agent          = $this->input->post('agent');
  $regionId       = $this->input->post('region');
  $province       = $this->input->post('province');
  $overviewTH     = $this->input->post('overviewTH');
  $overviewEN     = $this->input->post('overviewEN');
  $descTH         = $this->input->post('descTH');
  $descEN         = $this->input->post('descEN');
  $briefTH        = $this->input->post('briefTH');
  $briefEN        = $this->input->post('briefEN');
  $advanceBooking = $this->input->post('advanceBooking');
  $dayNight       = $this->input->post('dayNight');
  $priceRange     = $this->input->post('priceRange');
  $result         = $this->PackageMD->updatePackage($oldNameSlug, $newNameSlug, $nameTH, $nameEN, $startPrice, $agent, $overviewTH, $overviewEN, $descTH, $descEN, $briefTH, $briefEN, $advanceBooking, $dayNight, $priceRange);
  $this->PackageMD->updateDomesticLocation($newNameSlug, $regionId, $province);
  $encoded = $_POST['image-data'];
  if ($encoded != '') {
   $exp  = explode(',', $encoded);
   $a    = base64_decode($exp[1]);
   $file = $newNameSlug . '.jpg';
   file_put_contents('filestorage/temp/' . $file, $a);
   $this->upload_cover($file);
   sleep(3);
  }
  redirect('domestic-package?type=' . $type, 'refresh');
 }

 function update_domestic_package_condition() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH          = $this->input->post('nameTH');
  $nameEN          = $this->input->post('nameEN');
  $region          = $this->input->post('region');
  $province        = $this->input->post('province');
  $startPrice      = $this->input->post('startPrice');
  $roomtype        = $this->input->post('roomtype');
  $roomprice       = $this->input->post('roomprice');
  $optionname      = $this->input->post('optionname');
  $optioncond      = $this->input->post('optioncond');
  $optionprice     = $this->input->post('optionprice');
  $multidesc       = $this->input->post('multidesc');
  $multicond       = $this->input->post('multicond');
  $multioption     = $this->input->post('multioption');
  $multiprice      = $this->input->post('multiprice');
  $priincrease     = $this->input->post('priincrease');
  $pridiscountRate = $this->input->post('pridiscountRate');
  $paxdouble       = $this->input->post('paxdouble');
  $paxminimum      = $this->input->post('paxminimum');
  $this->PackageMD->updatePackageCondition($oldNameSlug, $newNameSlug, $type, $nameTH, $nameEN, $startPrice, $roomtype, $roomprice, $optionname, $optioncond, $optionprice, $multidesc, $multicond, $multioption, $multiprice, $priincrease, $pridiscountRate, $paxdouble, $paxminimum);
  $this->PackageMD->updateDomesticLocation($newNameSlug, $region, $province);
  redirect('domestic-package?type=' . $type, 'refresh');
 }

 function update_domestic_package_service() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH     = $this->input->post('nameTH');
  $nameEN     = $this->input->post('nameEN');
  $region     = $this->input->post('region');
  $province   = $this->input->post('province');
  $startPrice = $this->input->post('startPrice');
  $hotel      = $this->input->post('hotel');
  $this->PackageMD->updatePackageService($oldNameSlug, $newNameSlug, $nameTH, $nameEN, $startPrice, $hotel);
  $this->PackageMD->updateDomesticLocation($newNameSlug, $region, $province);
  redirect('domestic-package?type=' . $type, 'refresh');
 }

 function update_outbound_package() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH         = $this->input->post('nameTH');
  $nameEN         = $this->input->post('nameEN');
  $startPrice     = $this->input->post('startPrice');
  $agent          = $this->input->post('agent');
  $country        = $this->input->post('country');
  $continent      = $this->input->post('continent');
  $overviewTH     = $this->input->post('overviewTH');
  $overviewEN     = $this->input->post('overviewEN');
  $descTH         = $this->input->post('descTH');
  $descEN         = $this->input->post('descEN');
  $briefTH        = $this->input->post('briefTH');
  $briefEN        = $this->input->post('briefEN');
  $advanceBooking = $this->input->post('advanceBooking');
  $dayNight       = $this->input->post('dayNight');
  $priceRange     = $this->input->post('priceRange');
  $result         = $this->PackageMD->updatePackage($oldNameSlug, $newNameSlug, $nameTH, $nameEN, $startPrice, $agent, $overviewTH, $overviewEN, $descTH, $descEN, $briefTH, $briefEN, $advanceBooking, $dayNight, $priceRange);
  $this->PackageMD->updateOutboundLocation($newNameSlug, $country, $continent);
  $encoded = $_POST['image-data'];
  if ($encoded != '') {
   $exp  = explode(',', $encoded);
   $a    = base64_decode($exp[1]);
   $file = $newNameSlug . '.jpg';
   file_put_contents('filestorage/temp/' . $file, $a);
   $this->upload_cover($file);
   sleep(3);
  }
  redirect('outbound-package?type=' . $type, 'refresh');
 }

 function update_outbound_package_condition() {
  /********************Initial valiable********************/
  $oldNameSlug = $this->input->post('oldNameSlug');
  $newNameSlug = $this->input->post('newNameSlug');
  $type        = $this->input->post('type');
  $this->session->set_flashdata('f1', $type);
  $nameTH          = $this->input->post('nameTH');
  $nameEN          = $this->input->post('nameEN');
  $continent       = $this->input->post('continent');
  $country         = $this->input->post('country');
  $startPrice      = $this->input->post('startPrice');
  $roomtype        = $this->input->post('roomtype');
  $roomprice       = $this->input->post('roomprice');
  $optionname      = $this->input->post('optionname');
  $optioncond      = $this->input->post('optioncond');
  $optionprice     = $this->input->post('optionprice');
  $multidesc       = $this->input->post('multidesc');
  $multicond       = $this->input->post('multicond');
  $multioption     = $this->input->post('multioption');
  $multiprice      = $this->input->post('multiprice');
  $priincrease     = $this->input->post('priincrease');
  $pridiscountRate = $this->input->post('pridiscountRate');
  $paxdouble       = $this->input->post('paxdouble');
  $paxminimum      = $this->input->post('paxminimum');
  $this->PackageMD->updatePackageCondition($oldNameSlug, $newNameSlug, $type, $nameTH, $nameEN, $startPrice, $roomtype, $roomprice, $optionname, $optioncond, $optionprice, $multidesc, $multicond, $multioption, $multiprice, $priincrease, $pridiscountRate, $paxdouble, $paxminimum);
  $this->PackageMD->updateOutboundLocation($newNameSlug, $country, $continent);
  redirect('outbound-package?type=' . $type, 'refresh');
 }

 function new_domestic_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['province'] = $this->PackageMD->getProvince();
  $data['region']   = $this->PackageMD->getRegion();
  $data['agency']   = $this->PackageMD->getAgency();
  if ($tour_type == 'sp') {
   $this->load->view('new_domestic_series_package', $data);
  } else {
   $this->load->view('new_domestic_easy_package', $data);
  }
 }

 function new_outbound_package() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  /********************Initial valiable********************/
  $tour_nameSlug = $this->input->get('tour');
  $tour_type     = $this->input->get('type');
  $this->session->set_flashdata('f1', $tour_type);
  $data['continent'] = $this->PackageMD->getContinent();
  $data['country']   = $this->PackageMD->getCountry();
  $data['agency']    = $this->PackageMD->getAgency();
  if ($tour_type == 'sp') {
   $this->load->view('new_outbound_series_package', $data);
  } else {
   $this->load->view('new_outbound_easy_package', $data);
  }
 }

 function insert_domestic_package() {
  $newNameSlug    = $this->input->post('nameSlug');
  $type           = $this->input->post('type');
  $agentId        = $this->input->post('agentId');
  $nameTH         = $this->input->post('nameTH');
  $nameEN         = $this->input->post('nameEN');
  $province       = $this->input->post('province');
  $region         = $this->input->post('region');
  $overviewTH     = $this->input->post('overviewTH');
  $overviewEN     = $this->input->post('overviewEN');
  $descTH         = $this->input->post('descTH');
  $descEN         = $this->input->post('descEN');
  $briefTH        = $this->input->post('briefTH');
  $briefEN        = $this->input->post('briefEN');
  $startPrice     = $this->input->post('startPrice');
  $advanceBooking = $this->input->post('advanceBooking');
  $closeBooking   = $this->input->post('closeBooking');
  $dayNight       = $this->input->post('dayNight');
  $priceRange     = $this->input->post('priceRange');
  $this->PackageMD->insertDomesticPackage($newNameSlug, $type, $agentId, $nameTH, $nameEN, $province, $region, $overviewTH, $overviewEN, $descTH, $descEN, $briefTH, $briefEN, $startPrice, $advanceBooking, $dayNight, $priceRange, $closeBooking);
  $encoded = $_POST['image-data'];
  $exp     = explode(',', $encoded);
  $a       = base64_decode($exp[1]);
  $file    = $newNameSlug . '.jpg';
  file_put_contents('filestorage/temp/' . $file, $a);
  $this->upload_cover($file);
  sleep(3);
  redirect('edit-domestic-package?tour=' . $newNameSlug . '&type=' . $type, 'refresh');
 }

 function insert_outbound_package() {
  $newNameSlug    = $this->input->post('nameSlug');
  $type           = $this->input->post('type');
  $agentId        = $this->input->post('agentId');
  $nameTH         = $this->input->post('nameTH');
  $nameEN         = $this->input->post('nameEN');
  $country        = $this->input->post('country');
  $continent      = $this->input->post('continent');
  $overviewTH     = $this->input->post('overviewTH');
  $overviewEN     = $this->input->post('overviewEN');
  $descTH         = $this->input->post('descTH');
  $descEN         = $this->input->post('descEN');
  $briefTH        = $this->input->post('briefTH');
  $briefEN        = $this->input->post('briefEN');
  $startPrice     = $this->input->post('startPrice');
  $advanceBooking = $this->input->post('advanceBooking');
  $closeBooking   = $this->input->post('closeBooking');
  $dayNight       = $this->input->post('dayNight');
  $priceRange     = $this->input->post('priceRange');
  $this->PackageMD->insertOutboundPackage($newNameSlug, $type, $agentId, $nameTH, $nameEN, $country, $continent, $overviewTH, $overviewEN, $descTH, $descEN, $briefTH, $briefEN, $startPrice, $advanceBooking, $dayNight, $priceRange, $closeBooking);
  $encoded = $_POST['image-data'];
  $exp     = explode(',', $encoded);
  $a       = base64_decode($exp[1]);
  $file    = $newNameSlug . '.jpg';
  file_put_contents('filestorage/temp/' . $file, $a);
  $this->upload_cover($file);
  sleep(3);
  redirect('edit-outbound-package?tour=' . $newNameSlug . '&type=' . $type, 'refresh');
 }

 function domestic_location_data() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  $data['region']   = $this->PackageMD->getRegion();
  $data['province'] = $this->PackageMD->getProvince();
  $this->load->view('domestic_location_data', $data);
 }

 function outbound_location_data() {
  /*********************Check session**********************/
  if ($this->session->userdata('admin_id') == '') {
   redirect('');
  }
  $data['continent'] = $this->PackageMD->getContinent();
  $data['country']   = $this->PackageMD->getCountry();
  $this->load->view('outbound_location_data', $data);
 }

 function insert_domestic_location() {
  $region     = $this->input->post('region');
  $provinceEN = $this->input->post('provinceEN');
  $provinceTH = $this->input->post('provinceTH');
  $result     = $this->PackageMD->insertDomesticLocation($region, $provinceEN, $provinceTH);
  echo $result;
 }

 function insert_outbound_location() {
  $continent = $this->input->post('continent');
  $countryEN = $this->input->post('countryEN');
  $countryTH = $this->input->post('countryTH');
  $result    = $this->PackageMD->insertOutboundLocation($continent, $countryEN, $countryTH);
  echo $result;
 }

 function delete_domestic_location() {
  $province = $this->input->get('province');
  $this->PackageMD->deleteLocation('d', $province, '');
  redirect('domestic-location-data');
 }

 function delete_outbound_location() {
  $country = $this->input->get('country');
  $this->PackageMD->deleteLocation('o', '', $country);
  redirect('outbound-location-data');
 }

 function check_nameEN() {
  $nameEN = $this->input->post('nameEN');
  echo $this->PackageMD->checkNameEN($nameEN);
 }

 function update_itinerary() {
  $nameSlug                = $this->input->post('nameSlug');
  $config['upload_path']   = 'filestorage/temp/';
  $config['allowed_types'] = 'pdf|doc|docx';
  $config['file_name']     = $nameSlug;
  $this->upload->initialize($config);
  if ($this->upload->do_upload("file")) {
   $data['upload_data'] = $this->upload->data();
   $filetype            = $data['upload_data']['file_ext'];
   $this->upload_filestorage($nameSlug . $filetype, $filetype);
   $this->PackageMD->updateFile($nameSlug, $filetype);
   echo 100;
  } else {
   echo 200;
  }
 }

 function upload_cover($fileName) {
  $source                 = './filestorage/temp/' . $fileName;
  $ftp_config['hostname'] = 'ftp://travelshop-center.tk';
  $ftp_config['username'] = 'travelshop';
  $ftp_config['password'] = 'V2zmx9N33';
  $ftp_config['debug']    = TRUE;
  $this->ftp->connect($ftp_config);
  $destination = '/public_html/filestorage/image/tour/' . $fileName;
  $this->ftp->upload($source, $destination);
  $this->ftp->close();
  @unlink($source);
 }

 function upload_filestorage($fileName, $filetype) {
  $source                 = './filestorage/temp/' . $fileName;
  $ftp_config['hostname'] = 'ftp://travelshop-center.tk';
  $ftp_config['username'] = 'travelshop';
  $ftp_config['password'] = 'V2zmx9N33';
  $ftp_config['debug']    = TRUE;
  $this->ftp->connect($ftp_config);
  if ($filetype == '.pdf') {
   $destination = '/public_html/filestorage/pdf/' . $fileName;
  } else {
   $destination = '/public_html/filestorage/word/' . $fileName;
  }
  $this->ftp->upload($source, $destination);
  $this->ftp->close();
  @unlink($source);
 }
}
