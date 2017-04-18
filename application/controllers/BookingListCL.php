<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingListCL extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->model('UserInfoMD');
    $this->load->model('BookingListMD');
  }

  function booking_list() {
    /*******************Initial valiable*********************/
    if (!empty($this->session->userdata('uid'))) {
      $user_id = $this->session->userdata('uid');
    } else {
      redirect('signin');
    }
    $this->session->keep_flashdata('f1');
    $this->session->keep_flashdata('f2');
    /*******************Get user infomation******************/
    $data['user_data']      = $this->UserInfoMD->getUserInfo($user_id);
    /*******************Get booking list*********************/
    $query                  = $this->BookingListMD->getBookingList($user_id);
    $data['package_detail'] = $query;
    $count                  = $query->num_rows();
    for ($i = 0; $i < $count; $i++) {
      $temp                       = $query->row($i);
      $data['booking_detail'][$i] = $temp->booking_detail;
    }
    $this->load->view('booking_list', $data);
  }

  function cancel_booking() {
    $booking_code = $this->input->post('cancel-booking_code');
    $content      = $this->input->post('cancel-content');
    if ($this->BookingListMD->cancelBooking($booking_code, $content)) {
      redirect('booking-list');
    } else {
      // Error handle
      echo 'ERROR';
    }
  }
}
?>
