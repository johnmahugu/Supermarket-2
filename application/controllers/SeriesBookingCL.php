<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeriesBookingCL extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->library('session');
    $this->load->library('upload');
    $this->load->library('image_lib');
    $this->load->model('UserInfoMD');
    $this->load->model('SeriesBookingMD');
  }

  function series_booking() {
    if (!empty($this->input->get('tour'))) {
      $tour_nameSlug = $this->input->get('tour');
    }
    $this->session->set_flashdata('f1', $tour_nameSlug);
    $query = $this->SeriesBookingMD->getPackage($tour_nameSlug);
    if ($query->num_rows() == 0) {
      redirect('');
    }
    $data['package']     = $query;
    $data['price_range'] = $query->row()->tour_priceRange;
    $data['room']        = $this->SeriesBookingMD->getRoom($tour_nameSlug);
    $data['condition']   = $this->SeriesBookingMD->getCondition($tour_nameSlug);
    $this->load->view('series_booking', $data);
  }

  function series_booking_info() {
    $user_id = $this->session->userdata('uid');
    if (!empty($this->input->post('tour-nameSlug'))) {
      $tour_nameSlug = $this->input->post('tour-nameSlug');
    } else {
      $tour_nameSlug = $this->session->flashdata('f1');
    }
    if (!empty($this->input->post('booking-detail'))) {
      $booking_detail = $this->input->post('booking-detail');
    } else {
      $booking_detail = $this->session->flashdata('f2');
    }
    $this->session->set_flashdata('f1', $tour_nameSlug);
    $this->session->set_flashdata('f2', $booking_detail);
    $data['user_data']   = $this->UserInfoMD->getUserInfo($user_id);
    $data['nationality'] = $this->SeriesBookingMD->getNationality();
    $query               = $this->SeriesBookingMD->getPackage($tour_nameSlug);
    if ($query->num_rows() == 0) {
      redirect('');
    }
    $data['package']        = $query;
    $data['price_range']    = $query->row()->tour_priceRange;
    $data['booking_detail'] = json_decode($booking_detail);
    $this->load->view('series_booking_info', $data);
  }

  function series_booking_submit() {
    $user_id                = $this->session->userdata('uid');
    $tour_nameSlug          = $this->input->post('tour-nameSlug');
    $booking_room_detail    = json_decode($this->input->post('booking-room-detail'), TRUE);
    $temp                   = $this->input->post('booking-tourist-detail');
    $temp                   = str_replace('\\', '\/', $temp);
    $temp                   = str_replace('/', '\/', $temp);
    $booking_tourist_detail = json_decode($temp, TRUE);
    $total_amount           = $booking_room_detail['total_amount'];
    $total_tourist          = $this->input->post('total-tourist');
    $data['user_data']      = $this->UserInfoMD->getUserInfo($user_id);
    $query                  = $this->SeriesBookingMD->getPrepareData(1, $tour_nameSlug);
    if ($query->num_rows() == 0) {
      redirect('');
    }
    $tour_country   = $query->row()->tour_country;
    $tour_currency  = $query->row()->tour_currency;
    $tour_id        = $query->row()->tour_id;
    $agent_code     = $query->row()->agent_code;
    $booking_code   = $tour_country . $agent_code . $tour_id;
    $query          = $this->SeriesBookingMD->getPrepareData(2, $booking_code);
    $booking_lastId = $query->row()->booking_lastId;
    $booking_code .= $booking_lastId;
    $booking_mode = $this->input->post('booking-mode');
    $path         = 'filestorage/image/client/passport/';
    if (!is_dir($path . $booking_code . '/')) {
      mkdir($path . $booking_code . '/', 0755, TRUE);
    }
    if ($booking_mode == 1) {
      $images = array();
      $files  = $_FILES['passportImg'];
      $cpt    = count($files['name']);
      for ($i = 0; $i < $cpt; $i++) {
        $_FILES['images[]']['name']     = $files['name'][$i];
        $_FILES['images[]']['type']     = $files['type'][$i];
        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['images[]']['error']    = $files['error'][$i];
        $_FILES['images[]']['size']     = $files['size'][$i];
        $config                         = array(
          'upload_path' => 'filestorage/image/client/passport/' . $booking_code . '/',
          'allowed_types' => 'gif|jpg|jpeg|png',
          'file_name' => $i
        );
        $this->upload->initialize($config);
        if ($this->upload->do_upload('images[]')) {
          $image                                                    = $this->upload->data();
          $booking_tourist_detail['touristinfo'][$i]['passportImg'] = $i . '.' . $image['image_type'];
          $this->resize($image['full_path']);
          $this->watermark($image['full_path']);
        }
      }
      $booking_tourist_detail = json_encode($booking_tourist_detail);
      $booking_room_detail    = json_encode($booking_room_detail);
      $b_detail               = substr($booking_room_detail, 0, -1) . ',' . substr($booking_tourist_detail, 1, strlen($booking_tourist_detail));
      $status_booking         = $this->SeriesBookingMD->submitBooking($booking_code, $user_id, $tour_id, $b_detail, $total_amount, $tour_currency);
      if ($status_booking) {
        $this->session->set_flashdata('f1', 'Thinks for booking with us.');
        $this->session->set_flashdata('f2', 'We will contact you in 24 hours via email.');
        redirect('booking-list');
      } else {
        $this->series_booking_submit();
      }
    } else {
      $tel        = $this->input->post('nac-tel');
      $email      = $this->input->post('nac-email');
      $password   = $this->input->post('nac-tel');
      $fullname   = explode(' ', $this->input->post('nac-fullname'));
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
      $dob                            = $this->input->post('nac-dob');
      $address                        = $this->input->post('nac-address');
      $nationality                    = $this->input->post('nac-nationality');
      $passportNumber                 = $this->input->post('nac-passportNumber');
      $lineId                         = $this->input->post('nac-lineId');
      $user_id                        = $this->UserInfoMD->signup($tel, $email, $password, $firstname, $middlename, $lastname, $dob, $address, $nationality, $passportNumber, $lineId);
      $images                         = array();
      $files                          = $_FILES['nac-passportImg'];
      $_FILES['images[]']['name']     = $files['name'][0];
      $_FILES['images[]']['type']     = $files['type'][0];
      $_FILES['images[]']['tmp_name'] = $files['tmp_name'][0];
      $_FILES['images[]']['error']    = $files['error'][0];
      $_FILES['images[]']['size']     = $files['size'][0];
      $config                         = array(
        'upload_path' => 'filestorage/image/client/passport/',
        'allowed_types' => 'gif|jpg|jpeg|png',
        'file_name' => $user_id
      );
      $this->upload->initialize($config);
      if ($this->upload->do_upload('images[]')) {
        $image                                                   = $this->upload->data();
        $booking_tourist_detail['touristinfo'][0]['passportImg'] = '0.' . $image['image_type'];
        $this->resize($image['full_path']);
        $this->watermark($image['full_path']);
      }
      $images = array();
      $files  = $_FILES['passportImg'];
      $cpt    = count($files['name']);
      for ($i = 0; $i < $cpt; $i++) {
        $_FILES['images[]']['name']     = $files['name'][$i];
        $_FILES['images[]']['type']     = $files['type'][$i];
        $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$i];
        $_FILES['images[]']['error']    = $files['error'][$i];
        $_FILES['images[]']['size']     = $files['size'][$i];
        $config                         = array(
          'upload_path' => 'filestorage/image/client/passport/' . $booking_code . '/',
          'allowed_types' => 'gif|jpg|jpeg|png',
          'file_name' => $index
        );
        $this->upload->initialize($config);
        $index = $i + 1;
        if ($this->upload->do_upload('images[]')) {
          $image                                                        = $this->upload->data();
          $booking_tourist_detail['touristinfo'][$index]['passportImg'] = $index . '.' . $image['image_type'];
          $this->resize($image['full_path']);
          $this->watermark($image['full_path']);
        }
      }
      $update_status          = $this->UserInfoMD->updatePassportImg($user_id, $user_id);
      $booking_tourist_detail = json_encode($booking_tourist_detail);
      $booking_room_detail    = json_encode($booking_room_detail);
      $b_detail               = substr($booking_room_detail, 0, -1) . ',' . substr($booking_tourist_detail, 1, strlen($booking_tourist_detail));
      $status_booking         = $this->SeriesBookingMD->submitBooking($booking_code, $user_id, $tour_id, $b_detail, $total_amount, $tour_currency);
      if ($status_booking) {
        $this->session->set_flashdata('f1', 'Thinks for booking with us.');
        $this->session->set_flashdata('f2', 'We will contact you in 24 hours via email.');
        $this->session->set_flashdata('username', $email);
        $this->session->set_flashdata('password', $tel);
        redirect('signin?from=bl');
      } else {
        $this->series_booking_submit();
      }
    }
  }

  function check_email() {
    $email = $this->input->post('email');
    echo $this->SeriesBookingMD->checkEmail($email);
  }

  function resize($img_path) {
    $this->load->library('image_lib');
    $config = array(
      'image_library' => 'GD2',
      'source_image' => $img_path,
      'maintain_ratio' => TRUE,
      'width' => 600,
      'heigth' => 400
    );
    $this->image_lib->clear();
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
  }

  function watermark($img_path) {
    $config = array(
      'source_image' => $img_path,
      'wm_text' => 'SUPERMARKET.COM',
      'wm_type' => 'text',
      'wm_font_size' => '16',
      'wm_font_color' => 'ffffff',
      'wm_vrt_alignment' => 'bottom',
      'wm_hor_alignment' => 'right'
    );
    $this->image_lib->clear();
    $this->image_lib->initialize($config);
    $this->image_lib->watermark();
  }
}
?>
