<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReadmoreMD extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getPackage($tour_nameSlug) {
    $this->db->select("
			tour.tour_id,
			tour.tour_type,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
			tour.tour_overview,
			tour.tour_desc,
			tour.tour_briefing,
			tour.tour_imgCover,
			tour.tour_pdf,
			tour.tour_dayNight,
			tour.tour_startPrice,
			tour.tour_priceRange,
			tour.tour_currency,
			image.img_source,
			countries.country_name
		");
    $this->db->from('tour');
    $this->db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    $this->db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    $this->db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    $this->db->join('countries', 'address.country_id = countries.country_id', 'inner');
    $this->db->where('image.img_type', 'tour cover');
    $this->db->where('tour.tour_nameSlug', $tour_nameSlug);
    $this->db->group_by('tour.tour_id');
    return $this->db->get();
  }
}
?>
