<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMD extends CI_Model {

	protected static $db;
	protected static $db_auth;

	 function __construct()
	 {
	   parent::__construct();
		 self::$db = $this->load->database('mm', TRUE);
		 self::$db_auth = $this->load->database('supermarket', TRUE);
	 }

	  function getStaffLogin($username,$password){
		self::$db_auth->select('*');
    self::$db_auth->where('staff_username', $username);
    self::$db_auth->where('staff_password', $password);
    $query = self::$db_auth->get('staff');
		if ($query->num_rows() == 0){
			$array = "" ;
		}else{
			$array = array($query->result());
        }
        return $array;

      }

		function getStaffAuth($staffid,$authCode){
			self::$db_auth->select('*');
			self::$db_auth->where('staffauth_code', $authCode);
			self::$db_auth->where('staff_id',$staffid);
			$query = self::$db_auth->get('staff_auth');
				if($query->num_rows() != 0){
					$havingAuth = "T" ;
				}else{
					$havingAuth = "F" ;
				}
			return $havingAuth;

      }


	  function getLastRow($idname,$tablename){

		self::$db->select('*');
		self::$db->order_by($idname,"desc");
        $query = self::$db->get($tablename);

		if ($query->num_rows() == 0){
			$array = "" ;
		}else{
			$array = array($query->result());
        }
        return $array;


      }


	 function getCity(){

			self::$db->select('*');
			self::$db->order_by('city_name'); 
			$query = self::$db->get('city');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }
	  
	   function getCityName($cityid){

			self::$db->select('city_name');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('city');


				if($query->num_rows() != 0){
					$array = $query->result();
					foreach($array as $rr){
						$namestring = $rr->city_name;
						$textreturn = $this->AdminMD->cutEng($namestring);
					}
					
				}else{
					$textreturn = "" ;
				}
			return $textreturn;

      }

	  function getExRate(){

			self::$db->select('*');
			$query = self::$db->get('exchangerate');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }


	   function getCity2($cityid){

			self::$db->select('city_name');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('city');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getCarType(){

			self::$db->select('*');
			$query = self::$db->get('car');

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getAirline(){

			self::$db->select('*');
			self::$db->order_by('airline_name');
			$query = self::$db->get('airline');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getFlight($originid,$destinationid){

			self::$db->select('*');
			self::$db->join('airline','airline.airline_id = flight.airline_id','left');
			self::$db->where('flight_origin_id',$originid);
			self::$db->where('flight_destination_id',$destinationid);
			self::$db->where("flight_code NOT LIKE 'CATEGORY'");
			self::$db->where("flight_code NOT LIKE 'CATEGORY2'");
			self::$db->where('flight_date','0000-00-00');
			$query = self::$db->get('flight');

				if($query->num_rows() != 0){

					$array = $query->result();

				}else{
					$array = "" ;
				}
			return $array;

      }




	  function getFlight2($flightcode,$viewdate){

			self::$db->select('*');
			self::$db->where('flight_code',$flightcode);
			self::$db->where('flight_date',$viewdate);
			$query = self::$db->get('flight');

				if($query->num_rows() != 0){

					$array = $query->result();

				}else{
					$array = "" ;
				}
			return $array;

      }

	  function getFlight3($flightcode,$viewdate){

			self::$db->select('*');
			self::$db->join('airline','airline.airline_id = flight.airline_id','left');
			self::$db->where('flight_code',$flightcode);
			self::$db->where('flight_date',$viewdate);
			$query = self::$db->get('flight');

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
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('entrance');
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }



	  function getOtherItem($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			self::$db->where("other_type NOT LIKE 'CATEGORY'");
			$query = self::$db->get('other');
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}
			return $array;

      }

	  function AddCityHotel($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = hotel.city_id','left');
			self::$db->where('hotel_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('hotel');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'hotel_name' => "CATEGORY",
							'hotel_star' => "999",
							'city_id' => $cityid,
						);
					self::$db->trans_start();
					self::$db->insert('hotel',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  	  function AddCityVehi($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = route.city_id','left');
			self::$db->where('route_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('route');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'route_name' => "CATEGORY",
							//'car_id' => "0",
							'city_id' => $cityid
						);
					self::$db->trans_start();
					self::$db->insert('route',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddCityOther($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = other.city_id','left');
			self::$db->where('other_type','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('other');

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
					self::$db->trans_start();
					self::$db->insert('other',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	    function AddCityDestination($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = flight.flight_origin_id','left');
			self::$db->where('flight_code','CATEGORY2');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('flight');

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
					self::$db->trans_start();
					self::$db->insert('flight',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddCityMeal($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = restaurant.city_id','left');
			self::$db->where('restaurant_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('restaurant');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'restaurant_name' => "CATEGORY",
							'city_id' => $cityid
						);
					self::$db->trans_start();
					self::$db->insert('restaurant',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function AddCityTicket($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = flight.flight_origin_id','left');
			self::$db->where('flight_code','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('flight');

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
					self::$db->trans_start();
					self::$db->insert('flight',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	  function AddPlace($namestring,$fee,$currency,$city){
			self::$db->select('*');
			self::$db->where('ent_name',$namestring);
			$query = self::$db->get('entrance');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					// CALCULATE TO USD
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->insert('entrance',$data);
					self::$db->trans_complete();
					$text = "Finish" ;



					$text = "Finish" ;
					return $text ;
				}

      }

	   function AddOther($namestring,$fee,$currency,$city){
			self::$db->select('*');
			self::$db->where('other_type',$namestring);
			$query = self::$db->get('other');
					// CALCULATE TO USD
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->insert('other',$data);
					self::$db->trans_complete();
					$text = "Finish" ;


					return $text ;
				}

      }

	  function CCexChange($fee,$currency){

						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
			self::$db->select('*');
			self::$db->where('city_name',$namestring);
			$query = self::$db->get('city');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'city_name' => $namestring,
							'city_country' => 'myanmar'
						);
					self::$db->trans_start();
					self::$db->insert('city',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }





	  function addRoute($namestring,$cityid,$guidecostfinal){
			self::$db->select('*');
			self::$db->where('route_name',$namestring);
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('route');

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
					self::$db->trans_start();
					self::$db->insert('route',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	 function getRouteId($namestring,$cityid){
			self::$db->select('*');
			self::$db->where('route_name',$namestring);
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('route');

			if($query->num_rows() != 0){
				return $query->result();
			}else{
				return $query->result();
			}

      }

	  function addRoom($hotelid,$roomType,$roomname,$gitmin,$finalgit,$finalfit,$finalfitinter,$finalfitthai,$finalfitasia,$fitbed){
			self::$db->select('*');
			self::$db->where('hotel_id',$hotelid);
			self::$db->where('room_type',$roomType);
			self::$db->where('room_name',$roomname);
			$query = self::$db->get('room');

			if($query->num_rows() != 0){
					$text = "Already Have This Room" ;
					return $text ;
				}else{

					if($roomType == "STD"){
						//$roomsize = 1;
						//$gitmin = 0;
						//$gitcost = 0;
					}

					$data = array
						(
							'hotel_id' => $hotelid,
							'room_type' => $roomType,
							'room_name' => $roomname,
							'room_detail' => '',
							'room_GIT_min' => $gitmin,
							'room_cost' => $finalfit,
							'room_cost_GIT' => $finalgit,
							'room_cost_inter' => $finalfitinter,
							'room_cost_asia' => $finalfitasia,
							'room_cost_thai' => $finalfitthai,
							'room_cost_extbed' => $fitbed
						);
					self::$db->trans_start();
					self::$db->insert('room',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function addHotel($cityid,$namestring,$hotelstar,$guidecost,$currency,$hotelurl,$hoteladdress){
			self::$db->select('*');
			self::$db->where('hotel_name',$namestring);
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('hotel');

			if($query->num_rows() != 0){
					$text = "Already Have This hotel" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $guidecost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->insert('hotel',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }

	  function addGuideSta($cityid,$cost,$currency){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			self::$db->where('guide_type','STA');
			$query = self::$db->get('guide');

			if($query->num_rows() != 0){
					$text = "Already Have This Guide Then Update" ;
					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->where('city_id', $cityid);
					self::$db->where('guide_type','STA');
					self::$db->update('guide',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->insert('guide',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	    function addGuideAcc($language,$cost,$currency){
			self::$db->select('*');
			self::$db->where('guide_language',$language);
			self::$db->where('guide_type','ACC');
			$query = self::$db->get('guide');

			if($query->num_rows() != 0){
					$text = "Already Have This Guide Then Update" ;
					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->where('guide_language',$language);
					self::$db->where('guide_type','ACC');
					self::$db->update('guide',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}else{

					// CALCULATE TO USD
						$fee = $cost;
						if ($currency == "usd") {
							$finalfee = $fee ;
						}else if($currency == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currency == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->insert('guide',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }



	  function addFullFlight($flightcode,$airlinecode,$flightvia,$originid,$destinationid,$departTime,$duration,$cost,$currency,$timediff){
			self::$db->select('*');
			self::$db->where('flight_code',$flightcode);
			self::$db->where('flight_date','0000-00-00');
			$query = self::$db->get('flight');

			
					$finalfee = $this->AdminMD->CCexChange($cost,$currency);

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
					self::$db->trans_start();
					self::$db->insert('flight',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				

      }



	  function editFullFlight($originidforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit){
			self::$db->select('*');
			self::$db->where('flight_code',$flightcodeedit);
			self::$db->where('flight_date','0000-00-00');
			self::$db->where('flight_origin_id',$originidforedit);
			self::$db->where('flight_destination_id',$destinationidforedit);
			$query = self::$db->get('flight');

			if($query->num_rows() == 0){
					$text = "Some Thing went Wrong it should have this flight" ;
					return $text ;
				}else{
					// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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


					self::$db->trans_start();
					self::$db->where('flight_code',$flightcodeedit);
					self::$db->where('flight_date','0000-00-00');
					self::$db->where('flight_origin_id',$originidforedit);
					self::$db->where('flight_destination_id',$destinationidforedit);
					self::$db->update('flight',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	   function editFlightDate($dateforedit,$airlinecodeforedit,$originidforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit){
			self::$db->select('*');
			self::$db->where('flight_code',$flightcodeedit);
			self::$db->where('flight_date',$dateforedit);
			self::$db->where('flight_origin_id',$originidforedit);
			self::$db->where('flight_destination_id',$destinationidforedit);
			$query = self::$db->get('flight');

			if($query->num_rows() == 0){
				// NOT FOUND
				// SO INSERT
					// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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


					self::$db->trans_start();
					self::$db->insert('flight',$data);
					self::$db->trans_complete();
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
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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


					self::$db->trans_start();
					self::$db->where('flight_code',$flightcodeedit);
					self::$db->where('flight_date',$dateforedit);
					self::$db->where('flight_origin_id',$originidforedit);
					self::$db->where('flight_destination_id',$destinationidforedit);
					self::$db->update('flight',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	  function addAirline($namestring,$picname){
			self::$db->select('*');
			self::$db->where('airline_name',$namestring);
			$query = self::$db->get('airline');

			if($query->num_rows() != 0){
					$text = "Already Have This City" ;
					return $text ;
				}else{
					$data = array
						(
							'airline_name' => $namestring,
							'airline_pic_src' => $picname
						);
					self::$db->trans_start();
					self::$db->insert('airline',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;
				}

      }


	   function addRouteCost($routeID,$carTypeID,$RFinalCost,$type,$rc_from,$rc_to){

					$data = array
						(
							'route_id' => $routeID,
							'car_id' => $carTypeID,
							'rc_cost' => $RFinalCost,
							'rc_type' => $type,
							'rc_from' => $rc_from,
							'rc_to' => $rc_to
						);
					self::$db->trans_start();
					self::$db->insert('route_cost',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }
	  
	   function getPriceCondition($fk_id,$fk_type){
		$this->db->select('*');
		$this->db->where('route_id',$fk_id);
		$this->db->where('rc_type',$fk_type);
		$this->db->order_by('rc_from','ASC');
		$query = $this->db->get('route_cost');
		
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ; 
				}
				
		return $array;
		
      }

	  
	   function updateProfit($profitid,$finalb2c,$b2cCC,$finalb2b,$b2bCC){
			
				$this->db->select('*');
				$this->db->where('pro_id',$profitid);
				$query = $this->db->get('profit');
					if($query->num_rows() != 0){

					$data = array
						(
							'pro_b2b' => $finalb2b,
							'pro_b2b_IsPercent' => $b2bCC,
							'pro_b2c' => $finalb2c,
							'pro_b2c_isPercent' => $b2cCC
							
						);
					$this->db->trans_start();
					$this->db->where('pro_id', $profitid);
					$this->db->update('profit',$data);
					$this->db->trans_complete();
					$text = "Finish" ; 
					return $text ;
						
					
					}else{
					// NO ENT ID / NO EDIT	
						$text = "No Row for edit" ; 
						return $text ;
					}
			
					

				
				
	   
      }
	  
	  
	   function getGroupFlightProfit($season){

	    $this->db->select('fpro_type, COUNT(fpro_type) as total');
		$this->db->group_by('fpro_type'); 
		$this->db->order_by('fpro_id'); 
		$this->db->where('fpro_season',$season);
		$query = $this->db->get('flight_profit');							

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ; 
				}
			return $array;
	   
      }
	  
	  
	    function getCostByLine($typeName,$season){

	    $this->db->select('*');
		$this->db->where('fpro_type',$typeName);
		$this->db->where('fpro_season',$season);
		$query = $this->db->get('flight_profit');							

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ; 
				}
			return $array;
	   
      }
	  
	  
	   function getProfit($season){

			$this->db->select('*');
			$this->db->where('pro_season',$season);
			$query = $this->db->get('profit');
	
		
				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ; 
				}
			return $array;
	   
      }



	    function addVehiSize($VehiName,$minPax,$maxPax){

			if($minPax <= $maxPax){
				self::$db->select('*');
				self::$db->where('car_name',$VehiName);
				$query = self::$db->get('car');
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
							self::$db->trans_start();
							self::$db->insert('car',$data);
							self::$db->trans_complete();
							$text = "Finish" ;
							return $text ;
						}
			}else{
				$text = "min Should less than Max" ;
				return $text ;

			}


      }

	  
	  
	  function editVehiSize($carId,$carName,$minPax,$maxPax){

			if($minPax <= $maxPax){
				self::$db->select('*');
				self::$db->where('car_id',$carId);
				$query = self::$db->get('car');
					if($query->num_rows() == 0){
							$text = "No-ID" ;
							return $text ;
						}else{
							$data = array
								(
									'car_name' => $carName,
									'car_cap_min' => $minPax,
									'car_cap_max' => $maxPax
								);
							self::$db->trans_start();
							self::$db->where('car_id',$carId);
							self::$db->update('car',$data);
							self::$db->trans_complete();
							$text = "Finish" ;
							return $text ;
						}
			}else{
				$text = "min Should less than Max" ;
				return $text ;

			}


      }

	  
	  function getRouteCost($routeid,$type){
			$this->db->select('*');
			$this->db->where('route_id',$routeid);
			$this->db->where('rc_type',$type);
			$this->db->join('car','route_cost.car_id = car.car_id','left');
			$query = $this->db->get('route_cost');
			
			if($query->num_rows() != 0){
				return $query->result();
			}else{
				return '';
			}
	   
      }
	  
	  
	  
	  
	  function UpdateAirline($id,$namestring,$picname){

					$data = array
						(
							'airline_name' => $namestring,
							'airline_pic_src' => $picname
						);
					self::$db->trans_start();
					self::$db->where('airline_id', $id);
					self::$db->update('airline',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	 function updateOther($otheridedit2,$namestring,$feeedit2,$currencyedit){

					// CALCULATE TO USD
						$fee = $feeedit2;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->where('other_id', $otheridedit2);
					self::$db->update('other',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	  function updatePlace($entidedit,$namestring,$costedit,$currencyedit){

				self::$db->select('*');
				self::$db->where('ent_id',$entidedit);
				$query = self::$db->get('entrance');
					if($query->num_rows() != 0){
					// Have & OK FOR EDIT
						// CALCULATE TO USD
						$fee = $costedit;
						if ($currencyedit == "usd") {
							$finalfee = $fee ;
						}else if($currencyedit == "mmk"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','MMK');
							$query2 = self::$db->get('exchangerate');
								foreach ($query2->result() as $rs2) {
									$exrate = $rs2->ex_rate;
								}
							$finalfee = $fee/$exrate ;
						}else if($currencyedit == "thb"){
							self::$db->select('ex_rate');
							self::$db->where('ex_shortcurrency','THB');
							$query2 = self::$db->get('exchangerate');
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
					self::$db->trans_start();
					self::$db->where('ent_id', $entidedit);
					self::$db->update('entrance',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


					}else{
					// NO ENT ID / NO EDIT
						$text = "No Row for edit" ;
						return $text ;
					}






      }

	  
	  
	   function updateCity($cityid,$namestring){

				self::$db->select('*');
				self::$db->where('city_id',$cityid);
				$query = self::$db->get('city');
					if($query->num_rows() != 0){
					// Have & OK FOR EDIT
				
					$data = array
						(
							'city_name' => $namestring
						);
					self::$db->trans_start();
					self::$db->where('city_id',$cityid);
					self::$db->update('city',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


					}else{
					// NO ENT ID / NO EDIT
					
						$text = "No Row for edit" ;
						return $text ;
					}

      }
	  
	  
	   function updateExRate($exIdedit,$exrate){

				self::$db->select('*');
				self::$db->where('ex_id',$exIdedit);
				$query = self::$db->get('exchangerate');
					if($query->num_rows() != 0){

					$data = array
						(
							'ex_rate' => $exrate
						);
					self::$db->trans_start();
					self::$db->where('ex_id', $exIdedit);
					self::$db->update('exchangerate',$data);
					self::$db->trans_complete();
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
					self::$db->trans_start();
					self::$db->where('airline_id', $id);
					self::$db->update('airline',$data);
					self::$db->trans_complete();
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
					self::$db->trans_start();
					self::$db->where('hotel_id', $hotelid);
					self::$db->update('hotel',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;


      }


	   function delCity($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('city');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('city_id',$cityid);
					self::$db->delete('city');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	  function delFreeCon($freeid){
			self::$db->select('*');
			self::$db->where('free_id',$freeid);
			$query = self::$db->get('free_condition');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('free_id',$freeid);
					self::$db->delete('free_condition');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }
	  
	  
	   function delPriceCon($freeid){
			self::$db->select('*');
			self::$db->where('rc_id',$freeid);
			$query = self::$db->get('route_cost');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('rc_id',$freeid);
					self::$db->delete('route_cost');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }


	   function delHotelandRoom($hotelid){
			self::$db->select('*');
			self::$db->where('hotel_id',$hotelid);
			$query = self::$db->get('hotel');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('hotel_id',$hotelid);
					self::$db->delete('hotel');

					self::$db->select('*');
					self::$db->where('hotel_id',$hotelid);
					self::$db->delete('room');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function delGuide($gid){
			self::$db->select('*');
			self::$db->where('guide_id',$gid);
			$query = self::$db->get('guide');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('guide_id',$gid);
					self::$db->delete('guide');
					$text = "Del Finish" ;
					return $text ;
				}else{
					$text = "No this Guide" ;
					return $text ;
				}
      }

	  function delPlace($cityid){
			self::$db->select('*');
			self::$db->where('ent_id',$cityid);
			$query = self::$db->get('entrance');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('ent_id',$cityid);
					self::$db->delete('entrance');

					self::$db->select('*');
					self::$db->where('item_FK_id',$cityid);
					self::$db->where('item_category','entrance');
					self::$db->delete('item');

					$text = "Del Finish ENT&Item" ;
					return $text ;
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }


	    function delRoom($roomid){
			self::$db->select('*');
			self::$db->where('room_id',$roomid);
			$query = self::$db->get('room');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('room_id',$roomid);
					self::$db->delete('room');

					$text = "Del Finish Room" ;
					return $text ;
				}else{
					$text = "No this Room" ;
					return $text ;
				}
      }

	    function delOther($otherid){
			self::$db->select('*');
			self::$db->where('other_id',$otherid);
			$query = self::$db->get('other');

			if($query->num_rows() != 0){
					self::$db->select('*');
					self::$db->where('other_id',$otherid);
					self::$db->delete('other');

					$text = "Del Finish Other" ;
					return $text ;
				}else{
					$text = "No this Other's City" ;
					return $text ;
				}
      }

	  function DeleteCityHotel($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = hotel.city_id','left');
			self::$db->where('hotel_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('hotel');

			if($query->num_rows() != 0){
					self::$db->where('hotel_name','CATEGORY');
					self::$db->where('city_id',$cityid);
					self::$db->delete('hotel');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteFlight($flightid){
			self::$db->select('*');
			self::$db->where('flight_id',$flightid);
			$query = self::$db->get('flight');

			if($query->num_rows() != 0){
					self::$db->where('flight_id',$flightid);
					self::$db->delete('flight');
				}else{
					$text = "No Flight no." ;
					return $text ;
				}
      }



	  function DeleteCityVehi($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = route.city_id','left');
			self::$db->where('route_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('route');

			if($query->num_rows() != 0){
					self::$db->where('route_name','CATEGORY');
					self::$db->where('city_id',$cityid);
					self::$db->delete('route');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteCityOther($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = other.city_id','left');
			self::$db->where('other_type','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('other');

			if($query->num_rows() != 0){
					self::$db->where('other_type','CATEGORY');
					self::$db->where('city_id',$cityid);
					self::$db->delete('other');
				}else{
					$text = "No this Other's Item" ;
					return $text ;
				}
      }


	    function DeleteCityMeal($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = restaurant.city_id','left');
			self::$db->where('restaurant_name','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('restaurant');

			if($query->num_rows() != 0){
					self::$db->where('restaurant_name','CATEGORY');
					self::$db->where('city_id',$cityid);
					self::$db->delete('restaurant');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	   function DeleteCityTicket($cityid){
			self::$db->select('*');
			self::$db->join('city','city.city_id = flight.flight_origin_id','left');
			self::$db->where('flight_code','CATEGORY');
			self::$db->where('city.city_id',$cityid);
			$query = self::$db->get('flight');

			if($query->num_rows() != 0){
					self::$db->where('flight_code','CATEGORY');
					self::$db->where('flight_origin_id',$cityid);
					self::$db->delete('flight');
				}else{
					$text = "No this Hotel's City" ;
					return $text ;
				}
      }

	 function getHotelByCity($cityid,$star){
		self::$db->select('*');
		self::$db->join('city c','c.city_id = hotel.city_id','left');
		self::$db->where('c.city_id',$cityid);

		if($star != ''){
			self::$db->where('hotel.hotel_star',$star);
		}
		self::$db->where("hotel_name NOT LIKE 'CATEGORY'");

		$query = self::$db->get('hotel');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

		return $array;

      }

	  function getHotelRoom($hotelid){
		self::$db->select('*');
		self::$db->where('hotel_id',$hotelid);
		self::$db->order_by('room_type','DESC');
		$query = self::$db->get('room');

				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

		return $array;

      }


	   function getFreeCondition($fk_id,$fk_type){
		self::$db->select('*');
		self::$db->where('free_fk_id',$fk_id);
		self::$db->where('free_category',$fk_type);
		self::$db->order_by('free_upto','ASC');
		$query = self::$db->get('free_condition');

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
					self::$db->trans_start();
					self::$db->insert('free_condition',$data);
					self::$db->trans_complete();
					$text = "Finish" ;
					return $text ;

		return $array;

      }



	  function getHotelCat(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = hotel.city_id','right');
			self::$db->where('hotel_name','CATEGORY');
			$query = self::$db->get('hotel');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }


	 function getVehiCat(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = route.city_id','right');
			self::$db->where('route_name','CATEGORY');
			$query = self::$db->get('route');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	  function getOtherCat(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = other.city_id','right');
			self::$db->where('other_type','CATEGORY');
			$query = self::$db->get('other');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	   function getGuideSta(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = guide.city_id','right');
			self::$db->where('guide_type','STA');
			$query = self::$db->get('guide');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	  function getGuideAcc(){
			self::$db->select('*');
			self::$db->where('guide_type','ACC');
			$query = self::$db->get('guide');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }


	  	 function getMealCat(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = restaurant.city_id','right');
			self::$db->where('restaurant_name','CATEGORY');
			$query = self::$db->get('restaurant');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	  	 function getTicketCat(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = flight.flight_origin_id','right');
			self::$db->where('flight_code','CATEGORY');
			$query = self::$db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	   function getTicketCat2(){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = flight.flight_origin_id','right');
			self::$db->where('flight_code','CATEGORY2');
			$query = self::$db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }

	 	   function getTicketCat3($viewcity){
			self::$db->select('*');
			self::$db->join('city c','c.city_id = flight.flight_origin_id','right');
			self::$db->where('flight_code','CATEGORY2');
			self::$db->where('flight_origin_id',$viewcity);
			$query = self::$db->get('flight');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	 	   function getAirline2(){
			self::$db->select('*');
			self::$db->order_by('airline_name');
			$query = self::$db->get('airline');


				if($query->num_rows() != 0){
					$array = $query->result();
				}else{
					$array = "" ;
				}

			return $array;
      }



	  function countHotel($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('hotel');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	  function countSameFlight($flightcode){
			self::$db->select('*');
			self::$db->where('flight_code',$flightcode);
			$query = self::$db->get('flight');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }



	    function countRoute($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('route');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	    function countOther($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('other');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }


	  function countResturant($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('restaurant');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
					$numrow = $numrow-1;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }

	   function countFlight($cityid){
			self::$db->select('*');
			self::$db->where('flight_origin_id',$cityid);
			self::$db->where("flight_code NOT LIKE 'CATEGORY'");
			self::$db->where("flight_code NOT LIKE 'CATEGORY2'");
			$query = self::$db->get('flight');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
				}else{
					$numrow = "" ;
				}

			return $numrow;
      }

	    function countPlace($cityid){
			self::$db->select('*');
			self::$db->where('city_id',$cityid);
			$query = self::$db->get('entrance');


				if($query->num_rows() != 0){
					$numrow = $query->num_rows() ;
				}else{
					$numrow = "0" ;
				}

			return $numrow;
      }

			function getRouteId2($cityid){
			$this->db->select('*');
			$this->db->where('city_id',$cityid);
			$this->db->where("route_name NOT LIKE 'CATEGORY'");
			$query = $this->db->get('route');

			if($query->num_rows() != 0){
				return $query->result();
			}else{
				return $query->result();
			}

      }
}
