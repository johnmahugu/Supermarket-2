<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PackageCL extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->database('supermarket',TRUE);
		$this->load->library('session');
		$this->load->library('ftp');
		$this->load->helper('url');
		$this->load->model('PackageMD');
  }

	function domestic_package() {
		/********************Initital valiable*******************/
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		/********************Initial Filter**********************/
		$data['province'] = $this->PackageMD->getProvince();
		$data['region'] = $this->PackageMD->getRegion();
		/*********************Normal Package*********************/
		$query = $this->PackageMD->getPackage('thailand',$tour_type);
		$data['package'] = $query;
		$count = $query->num_rows();
		$data['c_package'] = $count;
		if($count > 0){
			for ($i = 0; $i <= $count; $i++) {
	      $data['price_range'][$i] = $query->row($i)->tour_priceRange;
	    }
		}
		$this->load->view('domestic_package',$data);
	}

	function outbound_package() {
		/********************Initital valiable*******************/
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		/********************Initial Filter**********************/
		$data['continent'] = $this->PackageMD->getContinent();
		$data['country'] = $this->PackageMD->getCountry();
		/*********************Normal Package*********************/
		$query = $this->PackageMD->getPackage('international',$tour_type);
		$data['package'] = $query;
		$count = $query->num_rows();
		$data['c_package'] = $count;
		if($count > 0){
			for ($i = 0; $i <= $count; $i++) {
	      $data['price_range'][$i] = $query->row($i)->tour_priceRange;
	    }
		}
		$this->load->view('outbound_package',$data);
	}

	function filter() {
		/********************Initial Variable********************/
		$type                    = $this->input->post('type');
		$country                 = $this->input->post('country');
		$region                  = $this->input->post('region');
		$province                = $this->input->post('province');
		$continent               = $this->input->post('continent');
		/*********************Filter Package*********************/
		$query                    = $this->PackageMD->getFilter($type, $country, $region, $province, $continent);
		$data['package']          = $query->result();
		echo json_encode($data);
	}

	function delete_package() {
		$tour_nameSlug = $this->input->get('tour');
		$query = $this->PackageMD->disablePackage($tour_nameSlug);
		if($query == 1) {
			$this->series_package();
		}else {
			echo 'Fall';
		}
	}

	function edit_domestic_package() {
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$data['province'] = $this->PackageMD->getProvince();
		$data['region'] = $this->PackageMD->getRegion();
		/*****************Export package data********************/
		$data['agency'] = $this->PackageMD->getAgency();
		$query= $this->PackageMD->editPackage($tour_nameSlug);
		$data['package'] = $query;
		$data['price_range']    = $query->row()->tour_priceRange;
		if($tour_type == 'sp'){
			$this->load->view('edit_domestic_series_package',$data);
		}else{
			echo 'Someting wrong. Please contact to developer.';
		}
	}

	function edit_domestic_package_condition() {
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$data['province'] = $this->PackageMD->getProvince();
		$data['region'] = $this->PackageMD->getRegion();
		$query= $this->PackageMD->editPackageCondition($tour_nameSlug);
		$data['package'] = $query;
		$data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
		if($tour_type == 'sp'){
			$this->load->view('edit_domestic_series_package_condition',$data);
		}else{
			echo 'AA';
		}
	}

	function edit_outbound_package() {
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$data['continent'] = $this->PackageMD->getContinent();
		$data['country'] = $this->PackageMD->getCountry();
		/*****************Export package data********************/
		$data['agency'] = $this->PackageMD->getAgency();
		$query= $this->PackageMD->editPackage($tour_nameSlug);
		$data['package'] = $query;
		$data['price_range']    = $query->row()->tour_priceRange;
		if($tour_type == 'sp'){
			$this->load->view('edit_outbound_series_package',$data);
		}else{
			echo 'AA';
		}
	}

	function edit_outbound_package_condition() {
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$data['continent'] = $this->PackageMD->getContinent();
		$data['country'] = $this->PackageMD->getCountry();
		$query= $this->PackageMD->editPackageCondition($tour_nameSlug);
		$data['package'] = $query;
		$data['condition'] = $this->PackageMD->editCondition($tour_nameSlug);
		if($tour_type == 'sp'){
			$this->load->view('edit_outbound_series_package_condition',$data);
		}else{
			echo 'AA';
		}
	}

	function update_domestic_package(){
		/********************Initial valiable********************/
		$oldNameSlug = $this->input->post('oldNameSlug');
		$newNameSlug = $this->input->post('newNameSlug');
		$type = $this->input->post('type');
		$this->session->set_flashdata('f1', $type);
		$nameTH = $this->input->post('nameTH');
		$nameEN = $this->input->post('nameEN');
		$overviewTH = $this->input->post('overviewTH');
		$overviewEN = $this->input->post('overviewEN');
		$descTH = $this->input->post('descTH');
		$descEN = $this->input->post('descEN');
		$briefTH = $this->input->post('briefTH');
		$briefEN = $this->input->post('briefEN');
		$advanceBooking = $this->input->post('advanceBooking');
		$dayNight = $this->input->post('dayNight');
		$priceRange = $this->input->post('priceRange');
		$result = $this->PackageMD->updatePackage($oldNameSlug,$newNameSlug,$nameTH,$nameEN,$overviewTH,$overviewEN,$descTH,$descEN,$briefTH,$briefEN,$advanceBooking,$dayNight,$priceRange);
		$encoded = $_POST['image-data'];
		$exp = explode(',', $encoded);
		$a = base64_decode($exp[1]);
		$file = $newNameSlug.'.jpg';
		file_put_contents('filestorage/temp/'.$file, $a);
		$this->upload_filestorage($file);
		sleep(3);
		redirect('domestic-package?type='.$type, 'refresh');
	}

	function update_domestic_package_condition(){
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$this->load->view('domestic_package',$data);
	}

	function update_outbound_package(){
		/********************Initial valiable********************/
		$oldNameSlug = $this->input->post('oldNameSlug');
		$newNameSlug = $this->input->post('newNameSlug');
		$type = $this->input->post('type');
		$this->session->set_flashdata('f1', $type);
		$nameTH = $this->input->post('nameTH');
		$nameEN = $this->input->post('nameEN');
		$overviewTH = $this->input->post('overviewTH');
		$overviewEN = $this->input->post('overviewEN');
		$descTH = $this->input->post('descTH');
		$descEN = $this->input->post('descEN');
		$briefTH = $this->input->post('briefTH');
		$briefEN = $this->input->post('briefEN');
		$advanceBooking = $this->input->post('advanceBooking');
		$dayNight = $this->input->post('dayNight');
		$priceRange = $this->input->post('priceRange');
		$result = $this->PackageMD->updatePackage($oldNameSlug,$newNameSlug,$nameTH,$nameEN,$overviewTH,$overviewEN,$descTH,$descEN,$briefTH,$briefEN,$advanceBooking,$dayNight,$priceRange);
		$encoded = $_POST['image-data'];
		$exp = explode(',', $encoded);
		$a = base64_decode($exp[1]);
		$file = $newNameSlug.'.jpg';
		file_put_contents('filestorage/temp/'.$file, $a);
		$this->upload_filestorage($file);
		sleep(3);
		redirect('outbound-package?type='.$type, 'refresh');
	}

	function upload_filestorage($fileName){
		$source = './filestorage/temp/'.$fileName;
		$ftp_config['hostname'] = 'ftp://travelshop-center.tk';
    $ftp_config['username'] = 'travelshop';
    $ftp_config['password'] = 'V2zmx9N33';
    $ftp_config['debug']    = TRUE;
		$this->ftp->connect($ftp_config);
		$destination = '/public_html/filestorage/image/tour/'.$fileName;
		$this->ftp->upload($source, $destination);
		$this->ftp->close();
		@unlink($source);
	}

	function update_outbound_package_condition(){
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		$this->load->view('outbound_package',$data);
	}
}
