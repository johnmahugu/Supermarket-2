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
    $tour_nameSlug = $this->input->get('tour');
    /********************Initial Variable********************/
    $data['nationality'] = $this->EasyBookingMD->getNationality();
    $query = $this->EasyBookingMD->getPackage($tour_nameSlug);
    $data['package'] = $query;
		$data['price_range'] = $query->row()->tour_priceRange;
    $this->load->view('easy_booking', $data);
  }

  function easy_booking_ticket_hotel(){
    /********************Initial Variable********************/
  }

  function easy_booking_submit(){
    /********************Initial Variable********************/
  }
}
?>
