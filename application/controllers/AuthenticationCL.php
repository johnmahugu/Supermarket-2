<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticationCL extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->session;
		$this->load->model('UserInfoMD');
	}

	function signin_page(){
		$this->session->keep_flashdata('f1');
		$this->session->keep_flashdata('f2');
		$this->session->set_flashdata('from', $this->input->get('from'));
		/*************Clear session**************/
		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
		    if ($key!='__ci_last_regenerate' && $key != '__ci_vars')
		       $this->session->unset_userdata($key);
		}
		$this->load->view('signin');
	}

	function signin(){
		if(!empty($this->input->post('username'))){
			$username = $this->input->post('username');
		}else{
			$username = $this->session->flashdata('username');
		}
		if(!empty($this->input->post('password'))){
			$password = $this->input->post('password');
		}else{
			$password = $this->session->flashdata('password');
		}
		$data = $this->UserInfoMD->authentication($username, $password);
		if($data->num_rows() > 0){
			/*******************Set session******************/
			$row = $data->row_array(0);
			$this->session->set_userdata('uid', $row['client_id']);
			$this->session->set_userdata('firstname', $row['client_firstName']);
			$this->session->set_userdata('nationality', $row['client_nationality']);
			/*****************Block resummition***************/
			$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
			$this->output->set_header('Pragma: no-cache');
			/****************Switch redirect*****************/
			$from = $this->input->get('from');
			switch($from){
				case 'tt':
					redirect('thai-tour');
				break;
				case 'it':
					redirect('international-tour');
				break;
				case 'rm':
					$this->session->keep_flashdata('f1');
					redirect('readmore');
				break;
				case 'sb':
					$this->session->keep_flashdata('f1');
					redirect('series-booking');
				break;
				case 'sbi':
					$this->session->keep_flashdata('f1');
					$this->session->keep_flashdata('f2');
					redirect('series-booking-info');
				break;
				case 'bl':
					$this->session->keep_flashdata('f1');
					$this->session->keep_flashdata('f2');
					redirect('booking-list');
				break;
				case 'ab':
					redirect('about');
				break;
			}
		}else{
			/***************Switch to signin*****************/
			$this->load->view('signin');
			$this->session->set_flashdata('msg_title','Something wrong');
			$this->session->set_flashdata('msg_content','Username or password incorrect');
		}
	}

	function signout(){
		$this->session->sess_destroy();
		$from = $this->input->get('from');
		redirect('');
	}
}
?>