<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function StandardProgram()
	{
		$this->load->view('mm/std-showtour.php');
	}

	public function ShopTravel()
	{
		$this->load->view('mm/member-ss-selectservice.php');
	}

	public function EasyPackages()
	{
		$this->load->view('mm/easypkg.php');
	}

	public function Interested()
	{
		$this->load->view('mm/member-interested.php');
	}

	public function BookingStat()
	{
		$this->load->view('mm/member-bookingservice.php');
	}

	public function TourProgram()
	{
		$this->load->view('mm/member-bookingtour.php');
	}

	public function SepService()
	{
		$this->load->view('mm/member-ss-selectservice.php');
	}

}
