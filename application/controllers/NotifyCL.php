<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotifyCL extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->model('LogMD');
  }

  function notify_message() {
    define('LINE_API',"https://notify-api.line.me/api/notify");
    $token = "MydJwa5QtsmNY2HmUNj7y8a68DYtmMe1MMas3jEpQgr";
    $code = '100';
    $message = $this->input->get('message');
    $owner = $this->input->get('owner');
    
    $queryData = array('message' => $message);
    $queryData = http_build_query($queryData,'','&');
    $headerOptions = array(
      'http'=>array(
        'method'=>'POST',
        'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                  ."Authorization: Bearer ".$token."\r\n"
                  ."Content-Length: ".strlen($queryData)."\r\n",
                  'content' => $queryData
      ),
   );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API,FALSE,$context);
    $response  = json_decode($result);
    print_r($response->status);

  }
}
?>
