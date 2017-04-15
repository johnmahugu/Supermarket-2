<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EasyBookingMD extends CI_Model {

	function __construct(){
		parent::__construct();
	}

  function getPackage($tour_nameSlug){
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			tour.tour_startPrice,
			tour.tour_priceRange,
			tour.tour_currency,
			countries.country_name
		");
		$this->db->from('tour');
		$this->db->join('tour_address','tour.tour_id = tour_address.tour_id','inner');
		$this->db->join('address','tour_address.address_id = address.address_id','inner');
		$this->db->join('countries','address.country_id = countries.country_id','inner');
		$this->db->where('tour.tour_nameSlug',$tour_nameSlug);
		$this->db->group_by('tour.tour_id');
		return $this->db->get();
  }

  function getNationality(){
		$this->db->select("countries.country_nationality");
		$this->db->from('countries');
		$this->db->where('countries.country_nationality !=','');
		return $this->db->get();
  }
}
