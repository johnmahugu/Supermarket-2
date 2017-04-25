<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PackageCL extends CI_Controller {

	function __construct() {
    parent::__construct();
		$this->load->database('supermarket',TRUE);
		$this->load->library('session');
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
		/********************Initial Filter**********************/
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
			echo 'AA';
		}
	}

	function edit_domestic_package_condition() {
		/********************Initial valiable********************/
		$tour_nameSlug = $this->input->get('tour');
		$tour_type = $this->input->get('type');
		$this->session->set_flashdata('f1', $tour_type);
		/********************Initial Filter**********************/
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
		/********************Initial Filter**********************/
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
		/********************Initial Filter**********************/
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
}
