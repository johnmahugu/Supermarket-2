<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PackageMD extends CI_Model {

  protected static $db;

  function __construct() {
    parent::__construct();
    self::$db = $this->load->database('supermarket', TRUE);
  }

  function getPackage($country, $type) {
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
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
    $this->db->where('tour.tour_type', $type);
    $this->db->where('CURDATE() BETWEEN tour.tour_openBooking AND tour.tour_closeBooking');
    if ($country == 'thailand') {
      $this->db->where('tour.tour_nationality', 'thailand domestic tour');
    } else {
      $this->db->where('tour.tour_nationality !=', 'thailand domestic tour');
    }
    $this->db->group_by('tour.tour_id');
    return $this->db->get();
  }

  function getFilter($type, $country, $region, $province, $continent) {
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'SERIES PACKAGE', 'EASY PACKAGE') AS tour_type,
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
    $this->db->join('continents', 'address.continent_id = continents.continent_id', 'inner');
    $this->db->join('geography', 'address.geography_id = geography.geography_id');
    $this->db->where('image.img_type', 'tour cover');
    $this->db->where('tour.tour_type', $type);
    $this->db->where('CURDATE() BETWEEN tour.tour_openBooking AND tour.tour_closeBooking');

    if ($region != '') {
      $this->db->where('geography.geography_nameEN', $region);
    }
    if ($province != '') {
      $this->db->where('address.address_province', $province);
    }
    if ($continent != '') {
      $this->db->where('continents.continent_name', $continent);
    }
    if ($country != '') {
      if ($country == 'thailand') {
        $this->db->where('tour.tour_nationality', 'thailand domestic tour');
      } else if ($country == 'international') {
        $this->db->where('tour.tour_nationality !=', 'thailand domestic tour');
      } else {
        $this->db->where('countries.country_name', $country);
      }
    }

    return $this->db->get();
  }

  function disablePackage($tour_nameSlug) {
    self::$db->trans_start();
    $query = "UPDATE tour
    SET tour.tour_closeBooking = '2000-01-01'
    WHERE tour.tour_nameSlug = '".$tour_nameSlug."'
    ";
    self::$db->query($query);
    self::$db->trans_complete();
    return self::$db->trans_status();
  }

  function getRegion() {
    self::$db->select("geography.geography_nameTH, geography.geography_nameEN");
    self::$db->from('geography');
    return self::$db->get();
  }

  function getProvince() {
    self::$db->select("province.province_nameTH, province.province_nameEN");
    self::$db->from('province');
    return self::$db->get();
  }

  function getContinent() {
    self::$db->select("continents.continent_name");
    self::$db->from('continents');
    self::$db->order_by('continents.continent_name', 'ASC');
    return self::$db->get();
  }

  function getCountry() {
    self::$db->select("countries.country_name");
    self::$db->from('countries');
    self::$db->order_by('countries.country_name', 'ASC');
    return self::$db->get();
  }

}
