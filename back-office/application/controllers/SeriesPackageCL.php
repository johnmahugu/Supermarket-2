<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeriesPackageCL extends CI_Controller {

	function __construct() {
    parent::__construct();
    $this->load->database();
  }

	function series_package(){
		$this->load->view('series_package');
	}
}
