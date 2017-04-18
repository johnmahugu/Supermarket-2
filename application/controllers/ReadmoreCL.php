<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReadmoreCL extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->model('ReadmoreMD');
  }

  public function readmore() {
    /********************Initial Variable********************/
    if (!empty($this->input->get('tour'))) {
      $tour_nameSlug = $this->input->get('tour');
    } else {
      $tour_nameSlug = $this->session->flashdata('f1');
    }
    /*********************Set flashdata**********************/
    $this->session->set_flashdata('f1', $tour_nameSlug);
    /********************Get tour detail*********************/
    $query = $this->ReadmoreMD->getPackage($tour_nameSlug);
    if ($query->num_rows() == 0) {
      redirect('');
    }
    $data['package']     = $query;
    $data['price_range'] = $query->row()->tour_priceRange;
    $data['briefing']    = $query->row()->tour_briefing;
    $this->load->view('readmore', $data);
  }
}
