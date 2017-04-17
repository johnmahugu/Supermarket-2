<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EasyBookingCL extends CI_Controller {

  function __construct(){
		parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('EasyBookingMD');
  }

  function easy_booking(){
    /********************Initial Variable********************/
    if(!empty($this->input->get('tour'))){
			$tour_nameSlug = $this->input->get('tour');
		}
		/**********************Set flashdata*********************/
		$this->session->set_flashdata('f1',$tour_nameSlug);
    /********************Get nationality*********************/
    $data['nationality'] = $this->EasyBookingMD->getNationality();
    /**********************Set Package***********************/
    $query = $this->EasyBookingMD->getPackage($tour_nameSlug);
    if($query->num_rows() == 0){
			redirect('');
		}
    $data['package'] = $query;
    $data['condition_option'] = $this->EasyBookingMD->getConditionOption($tour_nameSlug);
		$data['price_range'] = $query->row()->tour_priceRange;
    $query = $this->EasyBookingMD->getConditionHotel($tour_nameSlug);
    $data['condition_hotel'] = $query->row()->tc_data;
    $this->load->view('easy_booking', $data);
  }

  function easy_booking_info(){
    $this->load->view('easy_booking_info');
  }

  function get_hotel_room(){
    $slug = $this->input->post('slug');
    $index = $this->input->post('index');
    $query = $this->EasyBookingMD->getHotelRoom($slug);
    $temp = json_decode($query->row()->tc_data,true);
    $data['room'] = $temp[$index]['room'];
    echo json_encode($data['room']);
  }

  function easy_booking_fill_tourist(){
    /********************Initial Variable********************/
    $b_detail = $this->input->post('booking-detail');
    /*********************Set Package************************/
    $this->load->view('easy_booking_info');
  }

  function easy_booking_submit(){
    /********************Initial Variable********************/
  }
}
?>
