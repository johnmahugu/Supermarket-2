<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogMD extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function insertLog($code,$content,$status,$owner){
    $data = array(
      'log_code' => $code,
      'log_content' => $content,
      'log_status' => $status,
      'log_owner' => $owner
    );
    $this->db->insert('log', $data);
  }

}
