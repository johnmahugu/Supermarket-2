<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingListMD extends CI_Model {

  function __construct() {
    parent::__construct();
  }

  function getBookingList($uid) {
    $query = "SELECT
				booking.booking_code,
				booking.booking_detail,
				booking.booking_status,
				tour.tour_nameTH,
				tour.tour_nameEN,
				tour.tour_pdf
				FROM
				booking
				INNER JOIN tour ON booking.tour_id = tour.tour_id
				WHERE
				booking.booking_status != 'cancel' AND
				booking.client_id = '" . $uid . "'";
    return $this->db->query($query);
  }

  function cancelBooking($booking_code, $content) {
    $query          = "SELECT booking_detail FROM booking WHERE booking.booking_code = '" . $booking_code . "';";
    $booking_detail = $this->db->query($query)->row(0)->booking_detail;
    $booking_detail = substr($booking_detail, 0, strlen($booking_detail) - 1);
    $booking_detail .= ',"cancel":"' . $content . '"}';
    $this->db->set('booking_status', 'cancel');
    $this->db->set('booking_detail', $booking_detail);
    $this->db->set('booking_lastupdate', 'DATE_ADD(NOW(), INTERVAL 1 MINUTE)', FALSE);
    $this->db->where("booking_code", $booking_code);
    return $this->db->update("booking");
  }
}
?>
