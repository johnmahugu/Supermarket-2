<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCL extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->session;
    $this->load->database();
    $this->load->library('session');
    $this->load->model('UserInfoMD');
  }

  function user_edit_profile() {
    $this->session->set_flashdata('f1', $this->input->get('from'));
    if (!empty($this->session->userdata('uid'))) {
      $user_id = $this->session->userdata('uid');
    } else {
      redirect('signin');
    }
    /*******************Get user infomation******************/
    $data['user_data'] = $this->UserInfoMD->getUserInfo($user_id);
    $this->load->view('user_edit_profile', $data);
  }

  function user_update_profile() {
    $from       = $this->session->flashdata('f1');
    $email      = $this->input->post('email');
    $tel        = $this->input->post('tel');
    $fullname   = explode(' ', $this->input->post('fullname'));
    $firstname  = '';
    $middlename = '';
    $lastname   = '';
    $count      = count($fullname);
    for ($i = 0; $i < $count; $i++) {
      switch ($i) {
        case 0:
          $firstname = $fullname[0];
          break;
        case $count - 1:
          $lastname = $fullname[$count - 1];
          break;
        default:
          $middlename .= $fullname[$i] . ' ';
          break;
      }
    }
    $dob                     = $this->input->post('dob');
    $address                 = $this->input->post('address');
    $passportNumber          = $this->input->post('passportNumber');
    $lineId                  = $this->input->post('lineId');
    /**************Replace user passport image*************/
    $files                   = $_FILES['passportImg'];
    $config['upload_path']   = 'filestorage/image/client/passport/';
    $config['allowed_types'] = 'gif|jpg|jpeg|png';
    $config['overwrite']     = TRUE;
    $this->load->library('upload', $config);
    $_FILES['images[]']['name']     = $files['name'][0];
    $_FILES['images[]']['type']     = $files['type'][0];
    $_FILES['images[]']['tmp_name'] = $files['tmp_name'][0];
    $_FILES['images[]']['error']    = $files['error'][0];
    $_FILES['images[]']['size']     = $files['size'][0];
    $config['file_name']            = $this->session->userdata('uid');
    $this->upload->initialize($config);
    if ($this->upload->do_upload('images[]')) {
      /*******************Update user profile******************/
      $query = $this->UserInfoMD->updateUserProfile($email, $tel, $firstname, $middlename, $lastname, $dob, $address, $passportNumber, $lineId);
      /*****************Block resummition***************/
      $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
      $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
      $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
      $this->output->set_header('Pragma: no-cache');
      $this->session->set_flashdata('username', $email);
      $this->session->set_flashdata('password', $tel);
      if ($query == true) {
        switch ($from) {
          case 'bl':
            redirect('signin?from=bl');
            break;
          default:
            redirect('signin');
        }
      } else {
        //Error handle
        echo 'ERROR';
      }
    } else {
      /*******************Update user profile******************/
      $query = $this->UserInfoMD->updateUserProfile($email, $tel, $firstname, $middlename, $lastname, $dob, $address, $passportNumber, $lineId);
      if ($query == true) {
        switch ($from) {
          case 'bl':
            redirect('booking-list');
            break;
          default:
            redirect('');
        }
      } else {
        //Error handle
        echo 'ERROR';
      }
    }
  }
}
?>
