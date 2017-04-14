<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageCL extends CI_Controller {

	private $country;

	function __construct(){
		parent::__construct();
		$this->session;
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->model('HomepageMD');
	}

	function index(){
		redirect('thai-tour');
	}

	function thai_tour(){
		/********************Initial Variable********************/
		$this->country = 'thailand';
		$this->session->set_userdata('country','thailand');
		/********************Initial Filter**********************/
		$data['province'] = $this->HomepageMD->getProvince();
		$data['region'] = $this->HomepageMD->getRegion();
		/********************Hilight Package*********************/
		$data['hilight_package'] = $this->HomepageMD->getHiLightPackage();
		$data['hilight_price_range'] = $data['hilight_package']->row()->tour_priceRange;
		/**************Pagination Configuration******************/
		$config['base_url'] = base_url().'index.php/'.$this->uri->segment(1);
		$config['per_page'] = 3;
		$config['cur_tag_open'] = '<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$count_allrow = $this->HomepageMD->getPackage($this->country, 'sp', '','');
		$config['total_rows'] = $count_allrow->num_rows();
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();
		$data["pagination_links"] = explode('&nbsp;',$str_links);
		/*********************Normal Package*********************/
		$query = $this->HomepageMD->getPackage($this->session->userdata('country'), 'sp', $config['per_page'], $this->uri->segment(2));
		$data['package'] = $query;
		$count = $query->num_rows();
		for($i=0;$i<=$count;$i++){
			$data['price_range'][$i] = $query->row($i)->tour_priceRange;
		}
		$this->load->view('homepage_thai', $data);
	}

	function international_tour(){
		/********************Initial Variable********************/
		$this->country = 'international';
		$this->session->set_userdata('country','international');
		/********************Initial Filter**********************/
		$data['continent'] = $this->HomepageMD->getContinent();
		$data['country'] = $this->HomepageMD->getCountry();
		/********************Hilight Package*********************/
		$data['hilight_package'] = $this->HomepageMD->getHiLightPackage();
		$data['hilight_price_range'] = $data['hilight_package']->row()->tour_priceRange;
		/**************Pagination Configuration******************/
		$config['base_url'] = base_url().'index.php/'.$this->uri->segment(1);
		$config['per_page'] = 3;
		$config['cur_tag_open'] = '<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$count_allrow = $this->HomepageMD->getPackage($this->country, 'sp', '','');
		$config['total_rows'] = $count_allrow->num_rows();
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();
		$data["pagination_links"] = explode('&nbsp;',$str_links);
		/*********************Normal Package*********************/
		$query = $this->HomepageMD->getPackage($this->session->userdata('country'), 'sp', $config['per_page'], $this->uri->segment(2));
		$data['package'] = $query;
		$count = $query->num_rows();
		for($i=0;$i<=$count;$i++){
			$data['price_range'][$i] = $query->row($i)->tour_priceRange;
		}
		$this->load->view('homepage_international',$data);
	}

	function filter(){
		/********************Initial Variable********************/
		$type = $this->input->post('type');
		$country = $this->input->post('country');
		$region = $this->input->post('region');
		$province = $this->input->post('province');
		$continent = $this->input->post('continent');
		$season = $this->input->post('season');
		$keysearch = $this->input->post('keysearch');
		$ref_url = $this->input->post('ref_url');
		$offset = $this->input->post('offset');
		/**************Pagination Configuration******************/
		$config['base_url'] = $ref_url;
		$config['per_page'] = 3;
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['cur_page'] = $offset;
		$count_allrow = $this->HomepageMD->getFilter($type, $country, $region, $province, $continent, $season, $keysearch, '', '');
		$config['total_rows'] = $count_allrow->num_rows();
		$this->pagination->initialize($config);
		$str_links = $this->pagination->create_links();
		$data["pagination_links"] = explode('&nbsp;',$str_links);
		/*********************Filter Package*********************/
		$query = $this->HomepageMD->getFilter($type, $country, $region, $province, $continent, $season, $keysearch, $config['per_page'], $offset);
		$data['package'] = $query->result();
		echo json_encode($data);
	}

	function gen_priceRange(){
		$result = '[';
		$date = new DateTime('10/01/2016');
		$j = true;
		for($i=0;$i<=160;$i++){
			if($j == true){
		  	$result .= '{"from": "'.$date->format( "Y-m-d" ).'",';
				$date->modify('+2 day');
				$result .= '"to": "'.$date->format( "Y-m-d" ).'","price": 3900},';
				$j = false;
			}else{
				$date->modify('+1 day');
				$j = true;
			}
		}
		$result .= ']';
		echo $result;
	}
}
?>
