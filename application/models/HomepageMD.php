<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageMD extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getPackage($country, $type, $per_page, $offset) {
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
			tour.tour_imgCover,
			tour.tour_pdf,
      tour.tour_word,
			tour.tour_dayNight,
			tour.tour_startPrice,
			tour.tour_priceRange,
			tour.tour_currency,
			image.img_source,
      tour.tour_advanceBooking,
      tour.tour_closeBooking
		");
    $this->db->from('tour');
    $this->db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    $this->db->join('address', 'tour.address_id = address.address_id', 'inner');
    $this->db->where('image.img_type', 'tour cover');
    $this->db->where('tour.tour_type', $type);
    $this->db->where('tour.tour_public','1');
    if ($country == 'thailand') {
      $this->db->where('tour.tour_nationality', 'thailand domestic tour');
    } else {
      $this->db->where('tour.tour_nationality !=', 'thailand domestic tour');
    }
    if ($per_page != '') {
      if ($offset == '') {
        $offset = 0;
      }
      $this->db->limit($per_page, $offset);
    }
    $this->db->group_by('tour.tour_id');
    return $this->db->get();
  }

  function getHiLightPackage() {
    $query = "SELECT
				tour.tour_id,
				tour.tour_nameTH,
				tour.tour_nameEN,
				tour.tour_nameSlug,
				IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
				tour.tour_imgCover,
				tour.tour_pdf,
        tour.tour_word,
				tour.tour_dayNight,
				tour.tour_startPrice,
				tour.tour_priceRange,
				tour.tour_currency,
				image.img_source
				FROM
				tour
				INNER JOIN image ON tour.tour_imgCover = image.img_refid
				INNER JOIN address ON tour.address_id = address.address_id
				WHERE
				image.img_type = 'tour cover' AND
        tour.tour_public = 1 AND
				tour.tour_hilight = 1 AND
        tour.tour_closeBooking >= (SELECT CURDATE())
				GROUP BY
				tour.tour_id
				";
    return $this->db->query($query);
  }

  function getFilter($type, $country, $region, $province, $continent, $season, $keysearch, $per_page, $offset) {
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
			tour.tour_imgCover,
			tour.tour_pdf,
      tour.tour_word,
			tour.tour_dayNight,
			tour.tour_startPrice,
			tour.tour_priceRange,
			tour.tour_currency,
			image.img_source
		");
    $this->db->from('tour');
    $this->db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    $this->db->join('address', 'tour.address_id = address.address_id', 'inner');
    $this->db->where('image.img_type', 'tour cover');
    $this->db->where('tour.tour_type', $type);
    $this->db->where('tour.tour_public','1');
    if ($season != '') {
      $this->db->where('tour.tour_season', $season);
    }
    if ($region != '') {
      $this->db->where('address.region_id', $region);
    }
    if ($province != '') {
      $this->db->where('address.province_id', $province);
    }
    if ($continent != '') {
      $this->db->where('address.continent_id', $continent);
    }
    if ($country != '') {
      if ($country == 'thailand') {
        $this->db->where('tour.tour_nationality', 'thailand domestic tour');
      } else if ($country == 'international') {
        $this->db->where('tour.tour_nationality !=', 'thailand domestic tour');
      } else {
        $this->db->where('address.country_id', $country);
      }
    }
    if ($keysearch != '') {
      if ($country == 'thailand') {
        $this->db->like('tour.tour_nameTH', $keysearch);
      } else {
        $this->db->like('tour.tour_nameEN', $keysearch);
      }
    }
    $this->db->group_by('tour.tour_id');
    if ($per_page != '' AND $offset != '') {
      $this->db->limit($per_page, $offset);
    }
    return $this->db->get();
  }

  function getRegion() {
    $this->db->select("region.*");
    $this->db->from('region');
    return $this->db->get();
  }

  function getProvince() {
    $this->db->select("province.*");
    $this->db->from('province');
    return $this->db->get();
  }

  function getContinent() {
    $this->db->select("continent.*");
    $this->db->from('continent');
    $this->db->order_by('continent.continent_name', 'ASC');
    return $this->db->get();
  }

  function getCountry() {
    $this->db->select("country.*");
    $this->db->from('country');
    $this->db->order_by('country.country_nameEN', 'ASC');
    return $this->db->get();
  }
}
?>
