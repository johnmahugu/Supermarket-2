<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserInfoMD extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function authentication($uid, $password){
		$query = "SELECT client_id, client_firstName, client_nationality FROM client WHERE client_email = '".$uid."' AND client_password = '".$password."';";
		return $this->db->query($query);
	}

	function signup($tel, $email, $password, $firstname, $middlename, $lastname, $dob, $address, $nationality, $passportNumber, $lineId){
		$query = "SELECT
			MAX(client.client_id)+1 AS max_client_id
			FROM
			client";
		$max_client_id = $this->db->query($query)->row()->max_client_id;
		$data = array(
			'client_type' => 'normal',
			'client_tel' => $tel,
			'client_email' => $email,
			'client_password' => $password,
			'client_firstName' => $firstname,
			'client_middleName' => $middlename,
			'client_lastName' => $lastname,
			'client_gender' => '',
			'client_dob' => $dob,
			'client_address' => $address,
			'client_nationality' => $nationality,
			'client_passportNumber' => $passportNumber,
			'client_lineId' => $lineId
			);
		$this->db->insert('client', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}

	function updatePassportImg($uid,$file){
		$this->db->set('client_passportRefImg',$file);
		$this->db->where("client_id",$uid);
		return $this->db->update("client");
	}

	function getUserInfo($uid){
		$query = "SELECT
				client.client_id,
				client.client_tel,
				client.client_firstName,
				client.client_middleName,
				client.client_lastName,
				client.client_tel,
				client.client_dob,
				client.client_passportNumber,
				client.client_identificationNumber,
				client.client_email,
				client.client_imgMain,
				client.client_nationality,
				client.client_passportRefImg,
				client.client_address,
				client.client_gender,
				client.client_type,
				client.client_lineId
				FROM
				client
				WHERE
				client.client_id = '".$uid."' AND
				client.client_type = 'normal'
			";
		return $this->db->query($query);
	}

	function updateUserProfile($email,$tel,$firstname,$middlename,$lastname,$dob,$address,$passportNumber,$lineId){
		if($middlename == ' '){
			$middlename = '';
		}
		$this->db->trans_start();
		$data = array(
               'client_tel' => $tel,
               'client_firstName' => $firstname,
							 'client_middleName' => $middlename,
							 'client_lastName' => $lastname,
							 'client_dob' => $dob,
							 'client_address' => $address,
							 'client_passportNumber' => $passportNumber,
							 'client_lineId' => $lineId
            );
	  $this->db->where('client_email', $email);
		$this->db->update('client', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){
			return false;
		}else{
			return true;
		}
	}
}
?>
