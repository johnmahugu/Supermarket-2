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
    $this->load->view('easy_booking2', $data);
  }

  function easy_booking_ticket_hotel(){
    /********************Initial Variable********************/
    if(!empty($this->input->post('tour-nameSlug'))){
			$tour_nameSlug = $this->input->post('tour-nameSlug');
		}else{
			$tour_nameSlug = $this->session->flashdata('f1');
		}
		if(!empty($this->input->post('booking-detail'))){
			$booking_detail = $this->input->post('booking-detail');
		}else{
			$booking_detail = $this->session->flashdata('f2');
		}
    /***********************Set flashdata***********************/
		$this->session->set_flashdata('f1',$tour_nameSlug);
		$this->session->set_flashdata('f2',$booking_detail);
    /*********************Set Package************************/
    $query = $this->EasyBookingMD->getPackage($tour_nameSlug);
    if($query->num_rows() == 0){
			redirect('');
		}
    $data['package'] = $query;
    $data['route'] = $query->row()->tour_briefing;
    $data['price_range'] = $query->row()->tour_priceRange;
    $data['condition'] = $this->EasyBookingMD->getCondition($tour_nameSlug);
    $data['booking_detail'] = json_encode($booking_detail);
    $this->load->view('easy_booking_ticket_hotel',$data);
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
