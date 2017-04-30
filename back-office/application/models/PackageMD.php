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
      tour.tour_public,
      tour.tour_hilight
		");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('countries', 'address.country_id = countries.country_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_type', $type);
    self::$db->where('tour.tour_remove !=', '1');
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
    tour.tour_public,
    tour.tour_hilight
		");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_type', $type);
    self::$db->where('tour.tour_remove !=', '1');
    if ($region != '') {
      self::$db->where('address.geography_id', $region);
    }
    if ($province != '') {
      self::$db->where('address.address_province', $province);
    }
    if ($continent != '') {
      self::$db->where('address.continent_id', $continent);
    }
    if ($country == 'thailand') {
      self::$db->where('tour.tour_nationality', 'thailand domestic tour');
    } else if ($country == 'international') {
      self::$db->where('tour.tour_nationality !=', 'thailand domestic tour');
    } else {
      self::$db->where('address.country_id', $country);
    }
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function removePackage($tour_nameSlug) {
    self::$db->trans_start();
    $query = "UPDATE tour
    SET tour.tour_remove = '1'
    WHERE tour.tour_nameSlug = '".$tour_nameSlug."'
    ";
    self::$db->query($query);
    self::$db->trans_complete();
    return self::$db->trans_status();
  }

  function changePublic($nameSlug,$status){
    $query = "UPDATE tour
    SET tour.tour_public = '".$status."'
    WHERE tour.tour_nameSlug = '".$nameSlug."'";
    self::$db->query($query);
  }

  function changeHighlight($nameSlug,$status){
    $query = "UPDATE tour
    SET tour.tour_hilight = '".$status."'
    WHERE tour.tour_nameSlug = '".$nameSlug."'";
    self::$db->query($query);
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
      tour.tour_privateGroup,
      tour.tour_advanceBooking,
			image.img_source,
      address.*,
      agent.agent_code
		");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('agent', 'tour.tour_agentId = agent.agent_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_nameSlug', $tour_nameSlug);
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function editPackageCondition($tour_nameSlug){
    self::$db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			tour.tour_startPrice,
			tour.tour_priceRange,
      tour.tour_openBooking,
			tour.tour_currency,
      tour.tour_privateGroup,
      address.*,
      agent.agent_code,
      tour.tour_doublePack,
      tour_privateGroupPrice,
      tour_discountRate,
      tour_minimum
		");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('tour_condition', 'tour.tour_id = tour_condition.tour_id','left');
    self::$db->join('agent', 'tour.tour_agentId = agent.agent_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_nameSlug', $tour_nameSlug);
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function editPackageService ($nameSlug){
    self::$db->select("
      tour.tour_id,
      tour.tour_nameTH,
      tour.tour_nameEN,
      tour.tour_nameSlug,
      tour.tour_startPrice,
      tour.tour_priceRange,
      tour.tour_currency,
      tour.tour_dayNight,
      address.*,
      agent.agent_code
    ");
    self::$db->from('tour');
    self::$db->join('image', 'tour.tour_imgCover = image.img_refid', 'inner');
    self::$db->join('tour_address', 'tour.tour_id = tour_address.tour_id', 'inner');
    self::$db->join('address', 'tour_address.address_id = address.address_id', 'inner');
    self::$db->join('tour_condition', 'tour.tour_id = tour_condition.tour_id','left');
    self::$db->join('agent', 'tour.tour_agentId = agent.agent_id', 'inner');
    self::$db->where('image.img_type', 'tour cover');
    self::$db->where('tour.tour_nameSlug', $nameSlug);
    self::$db->group_by('tour.tour_id');
    return self::$db->get();
  }

  function updatePackage($oldNameSlug,$newNameSlug,$nameTH,$nameEN,$startPrice,$agent,$overviewTH,$overviewEN,$descTH,$descEN,$briefTH,$briefEN,$advanceBooking,$dayNight,$priceRange){
    self::$db->trans_begin();
    $data = array(
      'tour_nameSlug' => $newNameSlug,
      'tour_nameTH' => $nameTH,
      'tour_nameEN' => $nameEN,
      'tour_agentId' => $agent,
      'tour_overviewTH' => $overviewTH,
      'tour_overviewEN' => $overviewEN,
      'tour_descTH' => $descTH,
      'tour_descEN' => $descEN,
      'tour_briefingTH' => $briefTH,
      'tour_briefingEN' => $briefEN,
      'tour_advanceBooking' => $advanceBooking,
      'tour_dayNight' => $dayNight,
      'tour_priceRange' => $priceRange,
      'tour_startPrice' => $startPrice
    );
    self::$db->where('tour_nameSlug', $oldNameSlug);
    self::$db->update('tour', $data);
    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function updatePackageCondition($oldNameSlug,$newNameSlug,$type,$nameTH,$nameEN,$startPrice,$roomtype,$roomprice,$optionname,$optioncond,$optionprice,$multidesc,$multicond,$multioption,$multiprice,$priincrease,$pridiscountRate,$paxdouble,$paxminimum){
    self::$db->trans_begin();
    $data = array(
      'tour_nameSlug' => $newNameSlug,
      'tour_nameTH' => $nameTH,
      'tour_nameEN' => $nameEN,
			'tour_startPrice' => $startPrice
    );
    self::$db->where('tour_nameSlug', $oldNameSlug);
    self::$db->update('tour', $data);

    $query = 'SELECT tour_id FROM tour WHERE tour_nameSlug ="'.$newNameSlug.'"';
    $result = self::$db->query($query);
    $result = $result->row_array(0);
    $tour_id = $result['tour_id'];

    $query = 'DELETE FROM tour_condition WHERE tour_id = "'.$tour_id.'" AND tc_type="room"';
    self::$db->query($query);
    $roomtype = explode(",",$roomtype);
    $c_roomtype = count($roomtype);
    $roomprice = explode(",",$roomprice);
    for($i=0;$i<$c_roomtype;$i++){
      if($roomprice[$i] != 0){
        $data = array(
          'tour_id' => $tour_id,
          'tc_condition' => 'increase',
          'tc_price' => $roomprice[$i],
          'tc_type' => 'room',
          'tc_title' => NULL,
          'tc_data' => '[{"roomtype":"'.$roomtype[$i].'","roomdetail":""}]',
          'tc_order' => ($i+1)
        );
        self::$db->insert('tour_condition',$data);
      }
    }

    $query = 'DELETE FROM tour_condition WHERE tour_id = "'.$tour_id.'" AND tc_type="option"';
    self::$db->query($query);
    $optionname = explode(",",$optionname);
    $c_optionname = count($optionname);
    $optioncond = explode(",",$optioncond);
    $optionprice = explode(",",$optionprice);
    for($i=0;$i<$c_optionname;$i++){
      if($optionprice[$i] != 0){
        $data = array(
          'tour_id' => $tour_id,
          'tc_condition' => $optioncond[$i],
          'tc_price' => $optionprice[$i],
          'tc_type' => 'option',
          'tc_title' => NULL,
          'tc_data' => $optionname[$i],
          'tc_order' => ($i+1)
        );
        self::$db->insert('tour_condition',$data);
      }
    }

    $query = 'DELETE FROM tour_condition WHERE tour_id = "'.$tour_id.'" AND tc_type="option activity"';
    self::$db->query($query);
    $multioption = explode(",",$multioption);
    $c_multioption = count($multioption);
    $multicond = explode(",",$multicond);
    $multiprice = explode(",",$multiprice);
    for($i=0;$i<$c_multioption;$i++){
      if($multiprice[$i] != 0){
        $data = array(
          'tour_id' => $tour_id,
          'tc_condition' => $multicond[$i],
          'tc_price' => $multiprice[$i],
          'tc_type' => 'option activity',
          'tc_title' => $multidesc,
          'tc_data' => $multioption[$i],
          'tc_order' => ($i+1)
        );
        self::$db->insert('tour_condition',$data);
      }
    }

    if($priincrease != ''){
      $data = array(
        'tour_privateGroup' => '1',
        'tour_privateGroupPrice' => $priincrease,
        'tour_discountRate' => $pridiscountRate
      );
      self::$db->where('tour_id', $tour_id);
      self::$db->update('tour',$data);
    }

    $data = array(
      'tour_doublePack' => $paxdouble,
      'tour_minimum' => $paxminimum
    );
    self::$db->where('tour_id', $tour_id);
    self::$db->update('tour',$data);

    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function updatePackageService($oldNameSlug,$newNameSlug,$nameTH,$nameEN,$startPrice,$roomtype,$roomprice,$hotel){
    self::$db->trans_begin();
    $data = array(
      'tour_nameSlug' => $newNameSlug,
      'tour_nameTH' => $nameTH,
      'tour_nameEN' => $nameEN,
			'tour_startPrice' => $startPrice
    );
    self::$db->where('tour_nameSlug', $oldNameSlug);
    self::$db->update('tour', $data);

    $query = 'SELECT tour_id FROM tour WHERE tour_nameSlug ="'.$newNameSlug.'"';
    $result = self::$db->query($query);
    $result = $result->row_array(0);
    $tour_id = $result['tour_id'];

    $query = 'DELETE FROM tour_condition WHERE tour_id = "'.$tour_id.'" AND tc_type="room"';
    self::$db->query($query);
    $roomtype = explode(",",$roomtype);
    $c_roomtype = count($roomtype);
    $roomprice = explode(",",$roomprice);
    for($i=0;$i<$c_roomtype;$i++){
      if($roomprice[$i] != 0){
        $data = array(
          'tour_id' => $tour_id,
          'tc_condition' => 'increase',
          'tc_price' => $roomprice[$i],
          'tc_type' => 'room',
          'tc_title' => NULL,
          'tc_data' => '[{"roomtype":"'.$roomtype[$i].'","roomdetail":""}]',
          'tc_order' => ($i+1)
        );
        self::$db->insert('tour_condition',$data);
      }
    }

    $query = 'DELETE FROM tour_condition WHERE tour_id = "'.$tour_id.'" AND tc_type="hotel"';
    self::$db->query($query);
    if(strlen($hotel)>0){
      $data = array(
        'tour_id' => $tour_id,
        'tc_condition' => NULL,
        'tc_price' => NULL,
        'tc_type' => 'hotel',
        'tc_title' => NULL,
        'tc_data' => $hotel,
        'tc_order' => '1'
      );
      self::$db->insert('tour_condition',$data);
    }

    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function updateDomesticLocation($newNameSlug,$regionId,$province){
      self::$db->trans_begin();
      $query = "UPDATE tour_address ta
      JOIN address a ON ta.address_id = a.address_id
      JOIN tour t ON ta.tour_id = t.tour_id
      SET a.address_province = '".$province."', a.geography_id = '".$regionId."'
      WHERE t.tour_nameSlug = '".$newNameSlug."'";
      self::$db->query($query);

      self::$db->trans_complete();
      if (self::$db->trans_status() === FALSE) {
        self::$db->trans_rollback();
        return false;
      } else {
        self::$db->trans_commit();
        return true;
      }
  }

  function updateOutboundLocation($newNameSlug,$country,$continent){
    self::$db->trans_begin();
    $query = "UPDATE tour_address ta
    JOIN address a ON ta.address_id = a.address_id
    JOIN tour t ON ta.tour_id = t.tour_id
    SET a.continent_id = '".$continent."', a.country_id = '".$country."'
    WHERE t.tour_nameSlug = '".$newNameSlug."'";
    self::$db->query($query);

    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function insertDomesticPackage($newNameSlug,$type,$agentId,$nameTH,$nameEN,$province,$regionId,$overviewTH,$overviewEN,$descTH,$descEN,$briefTH,$briefEN,$startPrice,$advanceBooking,$dayNight,$priceRange,$closeBooking){
    self::$db->trans_begin();
    $data = array(
      'address_province' => $province,
      'geography_id' => $regionId,
      'country_id' => '215'
    );
    self::$db->insert('address', $data);
    $addressId = self::$db->insert_id();
    $data = array(
     'tour_nationality' => 'thailand domestic tour' ,
     'tour_agentId' => $agentId,
     'tour_nameTH' => $nameTH ,
     'tour_nameEN' => $nameEN,
     'tour_nameSlug' => $newNameSlug,
     'tour_type' => $type,
     'tour_overviewTH' => $overviewTH,
     'tour_overviewEN' => $overviewEN,
     'tour_descTH' => $descTH,
     'tour_descEN' => $descEN,
     'tour_briefingTH' => $briefTH,
     'tour_briefingEN' => $briefEN,
     'tour_dayNight' => $dayNight,
     'tour_startPrice' => $startPrice,
     'tour_priceRange' => $priceRange,
     'tour_closeBooking' => $closeBooking,
     'tour_advanceBooking' => $advanceBooking,
     'tour_privateGroup' => '0',
     'tour_privateGroupPrice' => '0',
     'tour_minimum' => '0',
     'tour_discountRate' => NULL,
     'tour_doublePack' => '0',
     'tour_currency' => 'THB',
     'tour_season' => '0',
     'tour_hilight' => '0',
     'tour_public' => '0',
     'tour_remove' => '0'
    );
    self::$db->insert('tour', $data);
    $tourId = self::$db->insert_id();
    $data = array(
      'tour_imgCover' => $tourId
    );
    self::$db->where('tour_id', $tourId);
    self::$db->update('tour', $data);
    $data = array(
      'tour_id' => $tourId,
      'address_id' => $addressId
    );
    self::$db->insert('tour_address', $data);
    $data = array(
      'img_type' => 'tour cover',
      'img_refid' => $tourId,
      'img_source' => 'filestorage/image/tour/'.$newNameSlug.'.jpg'
    );
    self::$db->insert('image', $data);

    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function insertOutboundPackage($newNameSlug,$type,$agentId,$nameTH,$nameEN,$countryId,$continentId,$overviewTH,$overviewEN,$descTH,$descEN,$briefTH,$briefEN,$startPrice,$advanceBooking,$dayNight,$priceRange,$closeBooking){
    self::$db->trans_begin();
    $data = array(
      'continent_id' => $continentId,
      'country_id' => $countryId
    );
    self::$db->insert('address', $data);
    $addressId = self::$db->insert_id();
    $data = array(
     'tour_nationality' => 'international tour' ,
     'tour_agentId' => $agentId,
     'tour_nameTH' => $nameTH ,
     'tour_nameEN' => $nameEN,
     'tour_nameSlug' => $newNameSlug,
     'tour_type' => $type,
     'tour_overviewTH' => $overviewTH,
     'tour_overviewEN' => $overviewEN,
     'tour_descTH' => $descTH,
     'tour_descEN' => $descEN,
     'tour_briefingTH' => $briefTH,
     'tour_briefingEN' => $briefEN,
     'tour_dayNight' => $dayNight,
     'tour_startPrice' => $startPrice,
     'tour_priceRange' => $priceRange,
     'tour_closeBooking' => $closeBooking,
     'tour_advanceBooking' => $advanceBooking,
     'tour_privateGroup' => '0',
     'tour_privateGroupPrice' => '0',
     'tour_minimum' => '0',
     'tour_discountRate' => NULL,
     'tour_doublePack' => '0',
     'tour_currency' => 'THB',
     'tour_season' => '0',
     'tour_hilight' => '0',
     'tour_public' => '0',
     'tour_remove' => '0'
    );
    self::$db->insert('tour', $data);
    $tourId = self::$db->insert_id();
    $data = array(
      'tour_imgCover' => $tourId
    );
    self::$db->where('tour_id', $tourId);
    self::$db->update('tour', $data);
    $data = array(
      'tour_id' => $tourId,
      'address_id' => $addressId
    );
    self::$db->insert('tour_address', $data);
    $data = array(
      'img_type' => 'tour cover',
      'img_refid' => $tourId,
      'img_source' => 'filestorage/image/tour/'.$newNameSlug.'.jpg'
    );
    self::$db->insert('image', $data);

    self::$db->trans_complete();
    if (self::$db->trans_status() === FALSE) {
      self::$db->trans_rollback();
      return false;
    } else {
      self::$db->trans_commit();
      return true;
    }
  }

  function updatePDF($nameSlug){
    $data = array(
      'tour_pdf' => $nameSlug.'.pdf'
    );
    self::$db->where('tour_nameSlug', $nameSlug);
    self::$db->update('tour', $data);
  }

  function editCondition($tour_nameSlug){
    self::$db->select("
      tour_condition.*
		");
    self::$db->from('tour');
    self::$db->join('tour_condition', 'tour.tour_id = tour_condition.tour_id', 'inner');
    self::$db->where('tour.tour_nameSlug', $tour_nameSlug);
    return self::$db->get();
  }

  function getAgency() {
    self::$db->select("agent.agent_id, agent.agent_code, agent.agent_compName");
    self::$db->from('agent');
    return self::$db->get();
  }

  function getRegion() {
    self::$db->select("geography.geography_id, geography.geography_nameEN");
    self::$db->from('geography');
    return self::$db->get();
  }

  function getProvince() {
    self::$db->select("province.province_id, province.province_nameEN");
    self::$db->from('province');
    return self::$db->get();
  }

  function getContinent() {
    self::$db->select("continents.continent_id,continents.continent_name");
    self::$db->from('continents');
    self::$db->order_by('continents.continent_name', 'ASC');
    return self::$db->get();
  }

  function getCountry() {
    self::$db->select("countries.country_id,countries.country_name");
    self::$db->from('countries');
    self::$db->order_by('countries.country_name', 'ASC');
    return self::$db->get();
  }

}
