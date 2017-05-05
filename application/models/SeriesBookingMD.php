<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SeriesBookingMD extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getPackage($tour_nameSlug) {
    $this->db->select("
			tour.tour_id,
			tour.tour_nameTH,
			tour.tour_nameEN,
			tour.tour_nameSlug,
			tour.tour_startPrice,
			tour.tour_priceRange,
			tour.tour_currency,
      tour.tour_advanceBooking,
      tour.tour_privateGroup,
      tour.tour_discountRate,
      tour.tour_doublePack,
      tour.tour_privateGroupPrice,
      tour.tour_minimum,
      address.country_id
		");
    $this->db->from('tour');
    $this->db->join('address', 'tour.address_id = address.address_id', 'inner');
    $this->db->where('tour.tour_nameSlug', $tour_nameSlug);
    $this->db->group_by('tour.tour_id');
    return $this->db->get();
  }

  function getRoom($tour_nameSlug) {
    $this->db->select("
			tour_condition.tc_price,
			tour_condition.tc_data
		");
    $this->db->from('tour');
    $this->db->join('tour_condition', 'tour.tour_id = tour_condition.tour_id', 'inner');
    $this->db->where('tour_condition.tc_type', 'room');
    $this->db->where('tour.tour_nameSlug', $tour_nameSlug);
    return $this->db->get();
  }

  function getCondition($tour_nameSlug) {
    $this->db->select("
      tour_condition.*");
    $this->db->from('tour');
    $this->db->join('tour_condition', 'tour.tour_id = tour_condition.tour_id', 'inner');
    $this->db->where('(tour_condition.tc_type = "option" OR tour_condition.tc_type = "option activity")');
    $this->db->where('tour.tour_nameSlug', $tour_nameSlug);
    return $this->db->get();
  }

  function getNationality() {
    $this->db->select("nationality.*");
    $this->db->from('nationality');
    return $this->db->get();
  }

  function getPrepareData($mode, $data) {
    $this->db->trans_begin();
    switch ($mode) {
      case 1:
        $query = "SELECT
					IF(country.country_nameEN = 'thailand', 'T', 'I') AS tour_country,
					tour.tour_currency,
					RIGHT(10000+tour.tour_id,4) AS tour_id,
					agent.agent_code
					FROM
					tour
					INNER JOIN address ON tour.address_id = address.address_id
          INNER JOIN country ON address.country_id = country.country_id
					INNER JOIN agent ON tour.tour_agentId = agent.agent_id
					WHERE
					tour.tour_nameSlug = '" . $data . "'
					GROUP BY
					tour.tour_id
				";
        return $this->db->query($query);
        break;
      case 2:
        $query = "SELECT
					RIGHT(10000+COUNT(booking.booking_id)+1,4) AS booking_lastId
					FROM
					booking
					WHERE
					booking.booking_code LIKE '" . $data . "%'
				";
        return $this->db->query($query);
        break;
    }
  }

  function submitBooking($booking_code, $client_id, $tour_id, $booking_detail, $booking_amount, $booking_currency) {
    $data = array(
      'booking_code' => $booking_code,
      'client_id' => $client_id,
      'tour_id' => $tour_id,
      'booking_detail' => $booking_detail,
      'booking_status' => 'booking',
      'booking_price' => $booking_amount,
      'booking_discount' => 0,
      'booking_paidleft' => 0,
      'booking_currency' => $booking_currency
    );
    $this->db->insert('booking', $data);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
      return false;
    } else {
      $this->db->trans_commit();
      return true;
    }
  }

  function checkEmail($email) {
    $this->db->select("client.client_email");
    $this->db->from('client');
    $this->db->where('client.client_email', $email);
    return $this->db->get()->num_rows();
  }
}
?>
