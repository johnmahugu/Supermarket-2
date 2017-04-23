<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PackageMD extends CI_Model {

  protected static $db;

  function __construct() {
    parent::__construct();
    self::$db = $this->load->database('supermarket', TRUE);
  }

  function getPackage($country, $type) {
    self::$db->select("
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
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('countries', 'address.country_id = countries.country_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_type', $type);
    self::$db->where('tour.tour_closeBooking >=', 'CURDATE()', FALSE);
    if ($country == 'thailand') {
      self::$db->where('tour.tour_nationality', 'thailand domestic tour');
    } else {
      self::$db->where('tour.tour_nationality !=', 'thailand domestic tour');
    }
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function getFilter($type, $country, $region, $province, $continent) {
    self::$db->select("
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
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('countries', 'address.country_id = countries.country_id', 'inner');
    self::$db->join('continents', 'address.continent_id = continents.continent_id', 'inner');
    self::$db->join('geography', 'address.geography_id = geography.geography_id');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_type', $type);
    self::$db->where('tour.tour_closeBooking >=', 'CURDATE()', FALSE);
    if ($region != '') {
      self::$db->where('geography.geography_nameEN', $region);
    }
    if ($province != '') {
      self::$db->where('address.address_province', $province);
    }
    if ($continent != '') {
      self::$db->where('continents.continent_name', $continent);
    }
    if ($country == 'thailand') {
      self::$db->where('tour.tour_nationality', 'thailand domestic tour');
    } else if ($country == 'international') {
      self::$db->where('tour.tour_nationality !=', 'thailand domestic tour');
    } else {
      self::$db->where('countries.country_name', $country);
    }
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
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

  function editPackage($tour_nameSlug) {
    self::$db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			IF(tour.tour_type = 'sp', 'Series Package', 'Easy Package') AS tour_type,
      tour.tour_overviewEN,
      tour.tour_overviewTH,
      tour.tour_descEN,
      tour.tour_briefingEN,
      tour.tour_descTH,
      tour.tour_briefingTH,
			tour.tour_imgCover,
			tour.tour_pdf,
			tour.tour_dayNight,
			tour.tour_startPrice,
			tour.tour_priceRange,
      tour.tour_openBooking,
			tour.tour_currency,
			image.img_source,
			countries.country_name,
      continents.continent_name,
      address.address_province,
      geography.geography_nameEN,
      agent.agent_code
		");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('countries', 'address.country_id = countries.country_id', 'inner');
    self::$db->join('geography', 'address.geography_id = geography.geography_id', 'inner');
    self::$db->join('continents', 'address.continent_id = continents.continent_id', 'inner');
    self::$db->join('agent', 'tour.tour_agentId = agent.agent_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_nameSlug', $tour_nameSlug);
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function getAgency() {
    self::$db->select("agent.agent_code, agent.agent_compName");
    self::$db->from('agent');
    return self::$db->get();
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