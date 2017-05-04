<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMD extends CI_Model {

	 function __construct()
	 {
	   parent::__construct();
	 }

	  function getStaffLogin($username,$password){
		$this->db->select('*');
        $this->db->where('staff_username', $username);
        $this->db->where('staff_password', $password);
        $query = $this->db->get('staff');
		if ($query->num_rows() == 0){
			$array = "" ;
		}else{
			$array = array($query->result());
        }
        return $array;

      }

		function getStaffAuth($staffid,$authCode){
			$this->db->select('*');
			$this->db->where('staffauth_code', $authCode);
			$this->db->where('staff_id',$staffid);
			$query = $this->db->get('staff_auth');
				if($query->num_rows() != 0){
					$havingAuth = "T" ;
				}else{
					$havingAuth = "F" ;
				}
			return $havingAuth;

      }


	  function getLastRow($idname,$tablename){

		$this->db->select('*');
		$this->db->order_by($idname,"desc");
        $query = $this->db->get($tablename);

		if ($query->num_rows() == 0){
			$array = "" ;
		}else{
			$array = array($query->result());
        }
        return $array;


      }


	 function getCity(){

			$this->db->select('*');
			$query = $this->db->get('city');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getExRate(){

			$this->db->select('*');
			$query = $this->db->get('exchangerate');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }


	   function getCity2($cityid){

			$this->db->select('city_name');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('city');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getCarType(){

			$this->db->select('*');
			$query = $this->db->get('car');

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getAirline(){

			$this->db->select('*');
			$query = $this->db->get('airline');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getFlight($originid,$destinationid){

			$this->db->select('*');
			$this->db->join('airline','airline.airline_id = flight.airline_id','left');
			$this->db->where('flight_origin_id',$originid);
			$this->db->where('flight_destination_id',$destinationid);
			$this->db->where("flight_code NOT LIKE 'CATEGORY'");
			$this->db->where("flight_code NOT LIKE 'CATEGORY2'");
			$this->db->where('flight_date','0000-00-00');
			$query = $this->db->get('flight');

				if($query->num_rows() != 0){

					$array = $query->result();

				}else{
					$array = "" ;
				}
			return $array;

      }




	  function getFlight2($flightcode,$viewdate){

			$this->db->select('*');
			$this->db->where('flight_code',$flightcode);
			$this->db->where('flight_date',$viewdate);
			$query = $this->db->get('flight');

				if($query->num_rows() != 0){

					$array = $query->result();

				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getFlight3($flightcode,$viewdate){

			$this->db->select('*');
			$this->db->join('airline','airline.airline_id = flight.airline_id','left');
			$this->db->where('flight_code',$flightcode);
			$this->db->where('flight_date',$viewdate);
			$query = $this->db->get('flight');

				if($query->num_rows() != 0){

					$array = $query->result();

				}else{
					$array = "" ;
				}
			return $array;

      }



	  function cutEng($fullname){

		$position = strpos($fullname,"|");
		$eng = substr($fullname,$position+1) ;
		return $eng ;
	  }

	   function cutTha($fullname){

		$position = strpos($fullname,"|");
		$tha  = substr($fullname,0,$position);
		return $tha ;
	  }

	  function changeViewDate($viewdate){

		$year = substr($viewdate,0,4);
		$mm = substr($viewdate,8,2);
		$dd = substr($viewdate,10,2);

		$fulldate = ''.$year.'-'.$mm.'-'.$dd ;

		return $fulldate ;
	  }


	   function getPlace2($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('entrance');
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }



	  function getOtherItem($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$this->db->where("other_type NOT LIKE 'CATEGORY'");
			$query = $this->db->get('other');
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function AddCityHotel($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = hotel.city_id','left');
			$this->db->where('hotel_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('hotel');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'hotel_name' => "CATEGORY",
							'hotel_star' => "999",
							'city_id' => $cityid,
							'hotel_IsGIT' => '0'
						);
					$this->db->trans_start();
					$this->db->insert('hotel',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  	  function AddCityVehi($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = route.city_id','left');
			$this->db->where('route_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('route');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'route_name' => "CATEGORY",
							'car_id' => "0",
							'city_id' => $cityid
						);
					$this->db->trans_start();
					$this->db->insert('route',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddCityOther($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = other.city_id','left');
			$this->db->where('other_type','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('other');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'other_type' => "CATEGORY",
							'other_cost' => "0",
							'city_id' => $cityid
						);
					$this->db->trans_start();
					$this->db->insert('other',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	    function AddCityDestination($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = flight.flight_origin_id','left');
			$this->db->where('flight_code','CATEGORY2');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('flight');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'flight_code' => "CATEGORY2",
							'airline_id' => "0",
							'flight_origin_id' => $cityid
						);
					$this->db->trans_start();
					$this->db->insert('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddCityMeal($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = restaurant.city_id','left');
			$this->db->where('restaurant_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('restaurant');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'restaurant_name' => "CATEGORY",
							'city_id' => $cityid
						);
					$this->db->trans_start();
					$this->db->insert('restaurant',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function AddCityTicket($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = flight.flight_origin_id','left');
			$this->db->where('flight_code','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('flight');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'flight_code' => "CATEGORY",
							'airline_id' => "0",
							'flight_origin_id' => $cityid
						);
					$this->db->trans_start();
					$this->db->insert('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	  function AddPlace($namestring,$fee,$currency,$city){
			$this->db->select('*');
			$this->db->where('ent_name',$namestring);
			$query = $this->db->get('entrance');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					// CALCULATE TO USD
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

					$data = array
						(
							'ent_name' => $namestring,
							'ent_cost' => $finalfee,
							'city_id' => $city
						);
					$this->db->trans_start();
					$this->db->insert('entrance',$data);
					$this->db->trans_complete();
					$text = "Finish" ;



					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddOther($namestring,$fee,$currency,$city){
			$this->db->select('*');
			$this->db->where('other_type',$namestring);
			$query = $this->db->get('other');
					// CALCULATE TO USD
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'other_type' => $namestring,
							'city_id' => $city,
							'other_cost' => $finalfee
						);
					$this->db->trans_start();
					$this->db->insert('other',$data);
					$this->db->trans_complete();
					$text = "Finish" ;


					return $text ;
				}

      }

	  function CCexChange($fee,$currency){

						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

						return $finalfee ;


      }


	    function addCity($namestring){
			$this->db->select('*');
			$this->db->where('city_name',$namestring);
			$query = $this->db->get('city');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'city_name' => $namestring,
							'city_country' => 'myanmar'
						);
					$this->db->trans_start();
					$this->db->insert('city',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }





	  function addRoute($namestring,$cityid,$guidecostfinal){
			$this->db->select('*');
			$this->db->where('route_name',$namestring);
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('route');

			if($query->num_rows() != 0){
					$text = "Already Have This Route" ;
					return $text ;
				}else{
					$data = array
						(
							'route_name' => $namestring,
							'city_id' => $cityid,
							'route_guide_cost' => $guidecostfinal
						);
					$this->db->trans_start();
					$this->db->insert('route',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	 function getRouteId($namestring,$cityid){
			$this->db->select('*');
			$this->db->where('route_name',$namestring);
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('route');

			if($query->num_rows() != 0){
				return $query->result();
			}else{
				return $query->result();
			}

      }

	  function addRoom($hotelid,$roomType,$roomname,$gitmin,$gitcost,$currencyedit,$cost,$roomsize,$intercost,$currencyinter){
			$this->db->select('*');
			$this->db->where('hotel_id',$hotelid);
			$this->db->where('room_type',$roomType);
			$this->db->where('room_name',$roomname);
			$query = $this->db->get('room');

			if($query->num_rows() != 0){
					$text = "Already Have This Room" ;
					return $text ;
				}else{

					if($roomType == "STD"){
						$roomsize = 1;
						$gitmin = 0;
						$gitcost = 0;
					}


					// CALCULATE TO USD
						$fee = $cost;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}
					// CALCULATE TO USD
						$fee2 = $gitcost;
						if ($currencyedit == "usd") {
							$finalfee2 = $fee2 ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee2 = $fee2/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee2 = $fee2/$exrate ;
						}else{
							$finalfee2 = $fee2 ;
						}

					// CALCULATE TO USD
						$fee3 = $intercost;
						if ($currencyinter == "usd") {
							$finalfee3 = $fee3 ;
						}else if($currencyinter == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee3 = $fee3/$exrate ;
						}else if($currencyinter == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee3 = $fee3/$exrate ;
						}else{
							$finalfee3 = $fee3 ;
						}


					$data = array
						(
							'hotel_id' => $hotelid,
							'room_type' => $roomType,
							'room_name' => $roomname,
							'room_detail' => '',
							'room_size' => $roomsize,
							'room_GIT_min' => $gitmin,
							'room_cost' => $finalfee,
							'room_cost_GIT' => $finalfee2,
							'room_cost_inter' => $finalfee3
						);
					$this->db->trans_start();
					$this->db->insert('room',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function addHotel($cityid,$namestring,$hotelstar,$guidecost,$currency,$hotelurl,$hoteladdress){
			$this->db->select('*');
			$this->db->where('hotel_name',$namestring);
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('hotel');

			if($query->num_rows() != 0){
					$text = "Already Have This hotel" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $guidecost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

					$fixurl = addslashes($hotelurl) ;

					$data = array
						(
							'hotel_name' => $namestring,
							'hotel_star' => $hotelstar,
							'city_id' => $cityid,
							'hotel_fulladdress' => $hoteladdress,
							'guide_cost' => $finalfee,
							'hotel_Is_sugguest' => '0',
							'hotel_url'  => $fixurl

						);
					$this->db->trans_start();
					$this->db->insert('hotel',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function addGuideSta($cityid,$cost,$currency){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$this->db->where('guide_type','STA');
			$query = $this->db->get('guide');

			if($query->num_rows() != 0){
					$text = "Already Have This Guide Then Update" ;
					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(
							'city_id' => $cityid,
							'guide_type' => 'STA',
							'guide_cost' => $fee
						);
					$this->db->trans_start();
					$this->db->where('city_id', $cityid);
					$this->db->where('guide_type','STA');
					$this->db->update('guide',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(
							'city_id' => $cityid,
							'guide_type' => 'STA',
							'guide_cost' => $fee
						);
					$this->db->trans_start();
					$this->db->insert('guide',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	    function addGuideAcc($language,$cost,$currency){
			$this->db->select('*');
			$this->db->where('guide_language',$language);
			$this->db->where('guide_type','ACC');
			$query = $this->db->get('guide');

			if($query->num_rows() != 0){
					$text = "Already Have This Guide Then Update" ;
					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(
							'guide_type' => 'ACC',
							'guide_cost' => $fee
						);
					$this->db->trans_start();
					$this->db->where('guide_language',$language);
					$this->db->where('guide_type','ACC');
					$this->db->update('guide',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(
							'guide_language' => $language,
							'city_id' => '0',
							'guide_type' => 'ACC',
							'guide_cost' => $fee
						);
					$this->db->trans_start();
					$this->db->insert('guide',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }



	  function addFullFlight($flightcode,$airlinecode,$flightvia,$originid,$destinationid,$departTime,$duration,$cost,$currency,$timediff){
			$this->db->select('*');
			$this->db->where('flight_code',$flightcode);
			$this->db->where('flight_date','0000-00-00');
			$query = $this->db->get('flight');

			if($query->num_rows() != 0){
					$text = "Already Have This flight" ;
					return $text ;
				}else{
					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}




					$data = array
						(
							'airline_id' => $airlinecode,
							'flight_code' => $flightcode,
							'flight_origin_id' => $originid,
							'flight_destination_id' => $destinationid,
							'flight_via' => $flightvia,
							'flight_durationtime' => $duration,
							'flight_depart_time' => $departTime,
							'flight_cost' => $finalfee,
							'flight_date' => '0000-00-00',
							'flight_time_diff' => $timediff
						);
					$this->db->trans_start();
					$this->db->insert('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }



	  function editFullFlight($originidforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit){
			$this->db->select('*');
			$this->db->where('flight_code',$flightcodeedit);
			$this->db->where('flight_date','0000-00-00');
			$this->db->where('flight_origin_id',$originidforedit);
			$this->db->where('flight_destination_id',$destinationidforedit);
			$query = $this->db->get('flight');

			if($query->num_rows() == 0){
					$text = "Some Thing went Wrong it should have this flight" ;
					return $text ;
				}else{
					// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(

							'flight_via' => $flightviaedit,
							'flight_durationtime' => $durationedit,
							'flight_depart_time' => $departTimeedit,
							'flight_cost' => $finalfee,
						);


					$this->db->trans_start();
					$this->db->where('flight_code',$flightcodeedit);
					$this->db->where('flight_date','0000-00-00');
					$this->db->where('flight_origin_id',$originidforedit);
					$this->db->where('flight_destination_id',$destinationidforedit);
					$this->db->update('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	   function editFlightDate($dateforedit,$airlinecodeforedit,$originidforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit){
			$this->db->select('*');
			$this->db->where('flight_code',$flightcodeedit);
			$this->db->where('flight_date',$dateforedit);
			$this->db->where('flight_origin_id',$originidforedit);
			$this->db->where('flight_destination_id',$destinationidforedit);
			$query = $this->db->get('flight');

			if($query->num_rows() == 0){
				// NOT FOUND
				// SO INSERT
					// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(
							'airline_id' => $airlinecodeforedit,
							'flight_code' => $flightcodeedit,
							'flight_via' => $flightviaedit,
							'flight_durationtime' => $durationedit,
							'flight_depart_time' => $departTimeedit,
							'flight_cost' => $finalfee,
							'flight_date' => $dateforedit,
							'flight_origin_id' => $originidforedit,
							'flight_destination_id' => $destinationidforedit,
							'flight_cost' => $finalfee,
						);


					$this->db->trans_start();
					$this->db->insert('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}else{
					// FOUND
					// SO UPDATE

					// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}


					$data = array
						(

							'flight_via' => $flightviaedit,
							'flight_durationtime' => $durationedit,
							'flight_depart_time' => $departTimeedit,
							'flight_cost' => $finalfee,
						);


					$this->db->trans_start();
					$this->db->where('flight_code',$flightcodeedit);
					$this->db->where('flight_date',$dateforedit);
					$this->db->where('flight_origin_id',$originidforedit);
					$this->db->where('flight_destination_id',$destinationidforedit);
					$this->db->update('flight',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	  function addAirline($namestring,$picname){
			$this->db->select('*');
			$this->db->where('airline_name',$namestring);
			$query = $this->db->get('airline');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'airline_name' => $namestring,
							'airline_pic_src' => $picname
						);
					$this->db->trans_start();
					$this->db->insert('airline',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	   function addRouteCost($cityid,$routeID,$namestring,$carTypeID,$RFinalCost,$type,$rc_from,$rc_to){

					$data = array
						(
							'route_id' => $routeID,
							'car_id' => $carTypeID,
							'rc_cost' => $RFinalCost,
							'rc_type' => $type,
							'rc_from' => $rc_from,
							'rc_to' => $rc_to
						);
					$this->db->trans_start();
					$this->db->insert('route_cost',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }




	    function addVehiSize($VehiName,$minPax,$maxPax){

			if($minPax <= $maxPax){
				$this->db->select('*');
				$this->db->where('car_name',$VehiName);
				$query = $this->db->get('car');
					if($query->num_rows() != 0){
							$text = "Already Have This Car Type" ;
							return $text ;
						}else{
							$data = array
								(
									'car_name' => $VehiName,
									'car_cap_min' => $minPax,
									'car_cap_max' => $maxPax
								);
							$this->db->trans_start();
							$this->db->insert('car',$data);
							$this->db->trans_complete();
							$text = "Finish" ;
							return $text ;
						}
			}else{
				$text = "min Should less than Max" ;
				return $text ;

			}


      }

	  function UpdateAirline($id,$namestring,$picname){

					$data = array
						(
							'airline_name' => $namestring,
							'airline_pic_src' => $picname
						);
					$this->db->trans_start();
					$this->db->where('airline_id', $id);
					$this->db->update('airline',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	 function updateOther($otheridedit2,$namestring,$feeedit2,$currencyedit){

					// CALCULATE TO USD
						$fee = $feeedit2;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

					$data = array
						(
							'other_type' => $namestring,
							'other_cost' => $finalfee
						);
					$this->db->trans_start();
					$this->db->where('other_id', $otheridedit2);
					$this->db->update('other',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	  function updatePlace($entidedit,$namestring,$costedit,$currencyedit){

				$this->db->select('*');
				$this->db->where('ent_id',$entidedit);
				$query = $this->db->get('entrance');
					if($query->num_rows() != 0){
					// Have & OK FOR EDIT
						// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','MMK');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							$this->db->select('ex_rate');
							$this->db->where('ex_shortcurrency','THB');
							$query2 = $this->db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else{
							$finalfee = $fee ;
						}

					$data = array
						(
							'ent_name' => $namestring,
							'ent_cost' => $finalfee
						);
					$this->db->trans_start();
					$this->db->where('ent_id', $entidedit);
					$this->db->update('entrance',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


					}else{
					// NO ENT ID / NO EDIT
						$text = "No Row for edit" ;
						return $text ;
					}






      }

	   function updateExRate($exIdedit,$exrate){

				$this->db->select('*');
				$this->db->where('ex_id',$exIdedit);
				$query = $this->db->get('exchangerate');
					if($query->num_rows() != 0){

					$data = array
						(
							'ex_rate' => $exrate
						);
					$this->db->trans_start();
					$this->db->where('ex_id', $exIdedit);
					$this->db->update('exchangerate',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


					}else{
					// NO ENT ID / NO EDIT
						$text = "No Row for edit" ;
						return $text ;
					}






      }

	 function UpdateAirline2($id,$namestring){

					$data = array
						(
							'airline_name' => $namestring
						);
					$this->db->trans_start();
					$this->db->where('airline_id', $id);
					$this->db->update('airline',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	  function editSugHotel($hotelid,$issug){

				if($issug==1){
					$issug = 0;
				}else{
					$issug = 1;
				}

					$data = array
						(
							'hotel_Is_sugguest' => $issug
						);
					$this->db->trans_start();
					$this->db->where('hotel_id', $hotelid);
					$this->db->update('hotel',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	   function delCity($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('city');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('city_id',$cityid);
					$this->db->delete('city');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	  function delFreeCon($freeid){
			$this->db->select('*');
			$this->db->where('free_id',$freeid);
			$query = $this->db->get('free_condition');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('free_id',$freeid);
					$this->db->delete('free_condition');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }


	   function delHotelandRoom($hotelid){
			$this->db->select('*');
			$this->db->where('hotel_id',$hotelid);
			$query = $this->db->get('hotel');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('hotel_id',$hotelid);
					$this->db->delete('hotel');

					$this->db->select('*');
					$this->db->where('hotel_id',$hotelid);
					$this->db->delete('room');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function delGuide($gid){
			$this->db->select('*');
			$this->db->where('guide_id',$gid);
			$query = $this->db->get('guide');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('guide_id',$gid);
					$this->db->delete('guide');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Guide" ;
					return $text ;
				}
      }

	  function delPlace($cityid){
			$this->db->select('*');
			$this->db->where('ent_id',$cityid);
			$query = $this->db->get('entrance');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('ent_id',$cityid);
					$this->db->delete('entrance');

					$this->db->select('*');
					$this->db->where('item_FK_id',$cityid);
					$this->db->where('item_category','entrance');
					$this->db->delete('item');

					$text = "Del Finish ENT&Item" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }


	    function delRoom($roomid){
			$this->db->select('*');
			$this->db->where('room_id',$roomid);
			$query = $this->db->get('room');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('room_id',$roomid);
					$this->db->delete('room');

					$text = "Del Finish Room" ;
					return $text ;
				}else{
					$text = "No this Room" ;
					return $text ;
				}
      }

	    function delOther($otherid){
			$this->db->select('*');
			$this->db->where('other_id',$otherid);
			$query = $this->db->get('other');

			if($query->num_rows() != 0){
					$this->db->select('*');
					$this->db->where('other_id',$otherid);
					$this->db->delete('other');

					$text = "Del Finish Other" ;
					return $text ;
				}else{
					$text = "No this Other's City" ;
					return $text ;
				}
      }

	  function DeleteCityHotel($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = hotel.city_id','left');
			$this->db->where('hotel_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('hotel');

			if($query->num_rows() != 0){
					$this->db->where('hotel_name','CATEGORY');
					$this->db->where('city_id',$cityid);
					$this->db->delete('hotel');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteFlight($flightid){
			$this->db->select('*');
			$this->db->where('flight_id',$flightid);
			$query = $this->db->get('flight');

			if($query->num_rows() != 0){
					$this->db->where('flight_id',$flightid);
					$this->db->delete('flight');
				}else{
					$text = "No Flight no." ;
					return $text ;
				}
      }



	  function DeleteCityVehi($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = route.city_id','left');
			$this->db->where('route_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('route');

			if($query->num_rows() != 0){
					$this->db->where('route_name','CATEGORY');
					$this->db->where('city_id',$cityid);
					$this->db->delete('route');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteCityOther($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = other.city_id','left');
			$this->db->where('other_type','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('other');

			if($query->num_rows() != 0){
					$this->db->where('other_type','CATEGORY');
					$this->db->where('city_id',$cityid);
					$this->db->delete('other');
				}else{
					$text = "No this Other's Item" ;
					return $text ;
				}
      }


	    function DeleteCityMeal($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = restaurant.city_id','left');
			$this->db->where('restaurant_name','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('restaurant');

			if($query->num_rows() != 0){
					$this->db->where('restaurant_name','CATEGORY');
					$this->db->where('city_id',$cityid);
					$this->db->delete('restaurant');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteCityTicket($cityid){
			$this->db->select('*');
			$this->db->join('city','city.city_id = flight.flight_origin_id','left');
			$this->db->where('flight_code','CATEGORY');
			$this->db->where('city.city_id',$cityid);
			$query = $this->db->get('flight');

			if($query->num_rows() != 0){
					$this->db->where('flight_code','CATEGORY');
					$this->db->where('flight_origin_id',$cityid);
					$this->db->delete('flight');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	 function getHotelByCity($cityid,$star){
		$this->db->select('*');
		$this->db->join('city c','c.city_id = hotel.city_id','left');
		$this->db->where('c.city_id',$cityid);

		if($star != ''){
			$this->db->where('hotel.hotel_star',$star);
		}
		$this->db->where("hotel_name NOT LIKE 'CATEGORY'");

		$query = $this->db->get('hotel');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

		return $array;

      }

	  function getHotelRoom($hotelid){
		$this->db->select('*');
		$this->db->where('hotel_id',$hotelid);
		$this->db->order_by('room_type','DESC');
		$query = $this->db->get('room');

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

		return $array;

      }


	   function getFreeCondition($fk_id,$fk_type){
		$this->db->select('*');
		$this->db->where('free_fk_id',$fk_id);
		$this->db->where('free_category',$fk_type);
		$this->db->order_by('free_upto','ASC');
		$query = $this->db->get('free_condition');

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

		return $array;

      }

	   function addFreeCondition($fk_id,$fk_type,$upto,$freepax){
			$data = array
						(
							'free_fk_id' => $fk_id,
							'free_category' => $fk_type,
							'free_upto' => $upto,
							'free_am' => $freepax
						);
					$this->db->trans_start();
					$this->db->insert('free_condition',$data);
					$this->db->trans_complete();
					$text = "Finish" ;
					return $text ;

		return $array;

      }



	  function getHotelCat(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = hotel.city_id','right');
			$this->db->where('hotel_name','CATEGORY');
			$query = $this->db->get('hotel');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }


	 function getVehiCat(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = route.city_id','right');
			$this->db->where('route_name','CATEGORY');
			$query = $this->db->get('route');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	  function getOtherCat(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = other.city_id','right');
			$this->db->where('other_type','CATEGORY');
			$query = $this->db->get('other');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	   function getGuideSta(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = guide.city_id','right');
			$this->db->where('guide_type','STA');
			$query = $this->db->get('guide');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	  function getGuideAcc(){
			$this->db->select('*');
			$this->db->where('guide_type','ACC');
			$query = $this->db->get('guide');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }


	  	 function getMealCat(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = restaurant.city_id','right');
			$this->db->where('restaurant_name','CATEGORY');
			$query = $this->db->get('restaurant');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	  	 function getTicketCat(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = flight.flight_origin_id','right');
			$this->db->where('flight_code','CATEGORY');
			$query = $this->db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	   function getTicketCat2(){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = flight.flight_origin_id','right');
			$this->db->where('flight_code','CATEGORY2');
			$query = $this->db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	 	   function getTicketCat3($viewcity){
			$this->db->select('*');
			$this->db->join('city c','c.city_id = flight.flight_origin_id','right');
			$this->db->where('flight_code','CATEGORY2');
			$this->db->where('flight_origin_id',$viewcity);
			$query = $this->db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	 	   function getAirline2(){
			$this->db->select('*');
			$query = $this->db->get('airline');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	  function countHotel($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('hotel');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	  function countSameFlight($flightcode){
			$this->db->select('*');
			$this->db->where('flight_code',$flightcode);
			$query = $this->db->get('flight');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }



	    function countRoute($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('route');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	    function countOther($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('other');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	  function countResturant($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('restaurant');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }

	   function countFlight($cityid){
			$this->db->select('*');
			$this->db->group_by('flight_code');
			$this->db->where('flight_origin_id',$cityid);
			$query = $this->db->get('flight');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-2;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }

	    function countPlace($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$query = $this->db->get('entrance');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
				}else{
					$numrow = "0" ;
				}

			return $numrow;
      }


}
