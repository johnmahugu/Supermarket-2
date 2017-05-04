<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
	  parent::__construct();
    $this->load->database();
	  $this->load->library('session');
		$this->load->helper(array('form','url'));
    $this->load->model('AdminMD');
	}


	function index(){
		$this->checkuser();
		$this->load->view('landing');
	}

	function mainmenu(){
		$this->checkuser();
		$this->load->view('landing');

	}

	function hotel(){
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getHotelCat = $this->AdminMD->getHotelCat();
				$data['AllCity'] = $getCity ;
				$data['HotelCity'] = $getHotelCat ;

				$this->load->view('/Backend/tm-hotel-main.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

		public function Ticket()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getTicketCat = $this->AdminMD->getTicketCat();
				$data['AllCity'] = $getCity ;
				$data['TicketCity'] = $getTicketCat ;
			$this->load->view('/Backend/tm-ticket-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}


	public function HotelAll()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$viewcity = $this->input->get('city');
				$viewstar = '';
				$viewstar = $this->input->get('star');
				$getHotel = $this->AdminMD->getHotelByCity($viewcity,$viewstar);
				$data['HotelCityStar'] = $getHotel ;
				$this->load->view('/Backend/tm-hotel-all.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function VehiAll()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,107);

			if($checkAuth == "T") {
				$getCarType = $this->AdminMD->getCarType();

				$data['carType'] = $getCarType ;
				$this->load->view('/Backend/tm-vehicle-all.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function OtherAll()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

		if($checkAuth == "T") {
			//GET ZONE//
			$cityid = $this->input->get('cityid');
			//AdminMD ZONE//
			$getCity = $this->AdminMD->getCity2($cityid);
			$getOther = $this->AdminMD->getOtherItem($cityid);
			//DATA SEND ZONE//
			$data['city2'] = $getCity ;
			$data['place2'] = $getOther ;
			$this->load->view('/Backend/tm-other-all.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}
	}

	public function MealAll()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,108);

			if($checkAuth == "T") {

				$this->load->view('/Backend/tm-meal-all.php');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function FlightAll()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {

				$vieworigin = $this->input->get('originid');
				$viewdate = $this->input->get('viewdate');
				$descity = $this->input->get('descity');

				$getCity = $this->AdminMD->getCity();
				$getTicketCat = $this->AdminMD->getTicketCat(); // Origin
				$getTicketCat2 = $this->AdminMD->getTicketCat2(); // Destination
				$getTicketCat3 = $this->AdminMD->getTicketCat3($descity); // ifview
				$getCity2 = $this->AdminMD->getCity2($vieworigin);
				$getAirline = $this->AdminMD->getAirline2();
				$viewdatenew = $this->AdminMD->changeViewDate($viewdate);
				$viewdateold = $viewdate;


				$data['city2'] = $getCity2 ;
				$data['AllCity'] = $getCity ;
				$data['TicketCity'] = $getTicketCat;
				$data['TicketCity2'] = $getTicketCat2;
				$data['TicketCity3'] = $getTicketCat3;
				$data['getAirline'] = $getAirline;
				$data['viewdate'] = $viewdatenew;
				$data['viewdateold'] = $viewdateold;

				$this->load->view('/Backend/tm-ticket-all.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function Airline()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {

				$getAirline = $this->AdminMD->getAirline();
				$data['Airline'] = $getAirline ;
				$this->load->view('/Backend/tm-airline-list.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function newVehi()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,107);

			if($checkAuth == "T") {

				$this->load->view('/Backend/tm-vehicle-new.php');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}



	public function addHotel()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$cityid = $this->input->post('viewcity');
				$star = $this->input->post('viewstar');

				$eng = $this->input->post('eng');
				$tha = $this->input->post('tha');
				$namestring = $tha."|".$eng;
				$hotelstar = $this->input->post('hotelstar');
				$guidecost = $this->input->post('guidecost');
				$currency = $this->input->post('currency');
				$hotelurl = $this->input->post('hotelurl');
				$hoteladdress = $this->input->post('hoteladdress');

				$resultAdd = $this->AdminMD->addHotel($cityid,$namestring,$hotelstar,$guidecost,$currency,$hotelurl,$hoteladdress);

				redirect('admin/HotelAll?star='.$star.'&city='.$cityid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addVehiRoute()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$cityid = $this->input->post('cityid');

				$eng = $this->input->post('engname');
				$tha = $this->input->post('thaname');
				$namestring = $tha."|".$eng;
				$guideprice = $this->input->post('guideprice');
				$CCGuide = $this->input->post('CCGuide');

				$guidecostfinal = $this->AdminMD->CCexChange($guideprice,$CCGuide);
				//echo "Guide:".$guidecostfinal ;

				// ADD ROUTE FIRST//
				$resultRoute = $this->AdminMD->addRoute($namestring,$cityid,$guidecostfinal);
				// GET ROUTE_ID //
				$resultID = $this->AdminMD->getRouteId($namestring,$cityid);
				foreach ($resultID as $rs){ $routeID = $rs->route_id; }
				/// ROUTE_ID DEFINE AS $route_id ///
				/// CHECK IF PRICE ALL OR PRICE BY VEHICLE ///
				$priceCondition = $this->input->post('vehicleSize');

				if($priceCondition == 'Size'){
					//Price by Car Type
					$loopCarType = $this->input->post('loopCount');
						while($loopCarType > 0){
							// GET ITEM and ADD !
							$carTypeID = $this->input->post('carId'.$loopCarType.'');
							$cost = $this->input->post('costByCarType'.$loopCarType.'');
							$currency = $this->input->post('currencyofCarNo'.$loopCarType.'');
							$rc_from = 0;
							$rc_to = 0;
							$RFinalCost = $this->AdminMD->CCexChange($cost,$currency);
							$type = "BYC" ;

							if($cost != 0){
								$resultLine = $this->AdminMD->addRouteCost($cityid,$routeID,$namestring,$carTypeID,$RFinalCost,$type,$rc_from,$rc_to);
							}
							$loopCarType-- ;
						}

				}else{
					// Price Scale
				}

				//redirect('admin/VehiAll?city='.$cityid.'','refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addRoom()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$cityid = $this->input->post('viewcity');
				$star = $this->input->post('viewstar');

				$hotelid = $this->input->post('hotelidedit');
				$roomType = $this->input->post('roomType');
				$roomname = $this->input->post('roomname');
				$gitmin = $this->input->post('gitmin');
				$gitcost = $this->input->post('gitcost');
				$currencyedit = $this->input->post('currencyedit');
				$roomsize = $this->input->post('person');
				$cost = $this->input->post('cost');
				$intercost = $this->input->post('intercost');
				$currencyinter = $this->input->post('currencyinter');


				$resultAdd = $this->AdminMD->addRoom($hotelid,$roomType,$roomname,$gitmin,$gitcost,$currencyedit,$cost,$roomsize,$intercost,$currencyinter);

				redirect('admin/HotelAll?star='.$star.'&city='.$cityid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addVehiSize()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,107);

			if($checkAuth == "T") {
				$cityid = $this->input->post('viewcity');
				$VehiName = $this->input->post('VehiName');
				$minPax = $this->input->post('minPax');
				$maxPax = $this->input->post('maxPax');
				$resultadd = $this->AdminMD->addVehiSize($VehiName,$minPax,$maxPax) ;

				redirect('admin/VehiAll?city='.$cityid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function addFreeCon()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$viewcity = $this->input->post('viewcity');
				$viewstar = $this->input->post('viewstar');
				$uptopax = $this->input->post('uptopax');
				$free = $this->input->post('free');
				$hotelid = $this->input->post('hotelidedit2');

				$resultadd = $this->AdminMD->addFreeCondition($hotelid,'hotel',$uptopax,$free) ;

				redirect('admin/HotelAll?star='.$viewstar.'&city='.$viewcity.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelFreepax()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$viewcity = $this->input->get('city');
				$viewstar = $this->input->get('star');
				$freeid = $this->input->get('freeid');


				$resultadd = $this->AdminMD->delFreeCon($freeid) ;

				redirect('admin/HotelAll?star='.$viewstar.'&city='.$viewcity.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addFlight()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$flightcode = $this->input->post('flightcode');
				$airlinecode = $this->input->post('airlineid');

				$flightvia = $this->input->post('flightvia');
				$originid = $this->input->post('originid');
				$destinationid = $this->input->post('destinationid');
				$departTime = $this->input->post('departTime');
				$duration = $this->input->post('duration');
				$cost = $this->input->post('cost');
				$currency = $this->input->post('currency');
				$timediff = $this->input->post('timediff');


				$resultadd = $this->AdminMD->addFullFlight($flightcode,$airlinecode,$flightvia,$originid,$destinationid,$departTime,$duration,$cost,$currency,$timediff);
				redirect('admin/FlightAll?originid='.$originid.'','refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function editFlight()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$Airlineforedit = $this->input->post('Airlineforeidt');
				$airlinecodeforedit = $this->input->post('airlinecodeforedit');
				$flightcodeedit = $this->input->post('flightcodeedit2');
				$flightviaedit = $this->input->post('flightviaedit');
				$departTimeedit = $this->input->post('departTimeedit');
				$durationedit = $this->input->post('durationedit');
				$costedit = $this->input->post('costedit');
				$currencyedit = $this->input->post('currencyedit');
				$dateforedit = $this->input->post('dateforedit');
				$dateforgoback = $this->input->post('dateforgoback');
				$flightidforedit = $this->input->post('flightidforedit');
				$destinationidforedit = $this->input->post('destinationidforedit');
				$originidforedit = $this->input->post('originidforedit');

				if($dateforedit == "--" || $dateforedit == ""){
					//EDIT Main SO call editFullFlight
					$resultadd = $this->AdminMD->editFullFlight($originidforedit,$airlinecodeforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit);
					redirect('admin/FlightAll?originid='.$originidforedit.'&viewdate='.$dateforgoback,'refresh');

				}else{
					//EDIT That Date or ADD Date
					$resultadd = $this->AdminMD->editFlightDate($dateforedit,$airlinecodeforedit,$originidforedit,$destinationidforedit,$flightcodeedit,$costedit,$currencyedit,$flightviaedit,$durationedit,$departTimeedit);
					redirect('admin/FlightAll?originid='.$originidforedit.'&viewdate='.$dateforgoback,'refresh');
				}





			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function editOther()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

			if($checkAuth == "T") {
				$engedit2 = $this->input->post('engedit2');
				$thaedit2 = $this->input->post('thaedit2');
				$namestring = $thaedit2."|".$engedit2 ;
				$feeedit2 = $this->input->post('feeedit2');
				$currencyedit = $this->input->post('currencyedit');
				$otheridedit2 = $this->input->post('otheridedit2');
				$cityid = $this->input->post('cityid');



					//EDIT That Date or ADD Date
					$resultadd = $this->AdminMD->updateOther($otheridedit2,$namestring,$feeedit2,$currencyedit);
					redirect('admin/OtherAll?cityid='.$cityid,'refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function ChangeSugguest()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$city = $this->input->get('city');
				$star = $this->input->get('star');
				$hotelid = $this->input->get('hotelid');
				$issug = $this->input->get('issug');



					$resultadd = $this->AdminMD->editSugHotel($hotelid,$issug);
					redirect('admin/HotelAll?star='.$star.'&city='.$city.'','refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelHotel()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$city = $this->input->get('city');
				$star = $this->input->get('star');
				$hotelid = $this->input->get('hotelid');

					$resultadd = $this->AdminMD->delHotelandRoom($hotelid);
					redirect('admin/HotelAll?star='.$star.'&city='.$city.'','refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function editPlace()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$cityid = $this->input->post('cityid');
				$ennameedit = $this->input->post('ennameedit');
				$thnameedit = $this->input->post('thnameedit');
				$namestring = $thnameedit."|".$ennameedit ;

				$costedit = $this->input->post('costedit');
				$currencyedit = $this->input->post('currencyedit');

				$entidedit = $this->input->post('entidedit');


				$resultadd = $this->AdminMD->updatePlace($entidedit,$namestring,$costedit,$currencyedit);
				redirect('admin/Place?cityid='.$cityid,'refresh');

			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function addMeal()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,108);

			if($checkAuth == "T") {
				$cityid = $this->input->get('cityid');
				$data['cityid'] = $cityid ;
				$getCity = $this->AdminMD->getCity2($cityid);
				$data['city2'] = $getCity ;
				$this->load->view('/Backend/tm-meal-new.php',$data);
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function Meal()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,108);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getMealCat = $this->AdminMD->getMealCat();
				$data['AllCity'] = $getCity ;
				$data['MealCity'] = $getMealCat ;
			$this->load->view('/Backend/tm-meal-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function Location()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

		if($checkAuth == "T") {
			$getCity = $this->AdminMD->getCity();
			$data['city'] = $getCity ;
			$this->load->view('/Backend/tm-mc-locationdata.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function Other()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

		if($checkAuth == "T") {
			$getCity = $this->AdminMD->getCity();
			$getOtherCat = $this->AdminMD->getOtherCat();
			$data['AllCity'] = $getCity ;
			$data['OtherCity'] = $getOtherCat ;
			$this->load->view('/Backend/tm-other-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function Guide()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,110);

		if($checkAuth == "T") {
			$getCity = $this->AdminMD->getCity();
			$filtertype = $this->input->get('filtertype');
			$getGuide = $this->AdminMD->getGuideSta();
			$getGuide2 = $this->AdminMD->getGuideAcc();

			$data['city'] = $getCity ;
			$data['filtertype'] = $filtertype ;
			$data['getGuide'] = $getGuide ;
			$data['getGuide2'] = $getGuide2 ;
			$this->load->view('/Backend/tm-guide-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}




	public function Vehicle()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,107);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getVehiCat = $this->AdminMD->getVehiCat();
				$data['AllCity'] = $getCity ;
				$data['VehiCity'] = $getVehiCat ;
			$this->load->view('/Backend/tm-vehicle-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}


	public function PriceAll()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,301);

		if($checkAuth == "T") {

			$this->load->view('/Backend/tm-setting-pricing.php');
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function PriceFlight()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,302);

		if($checkAuth == "T") {

			$this->load->view('/Backend/tm-setting-std-pricing');
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}



		public function StdTour()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,101);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getVehiCat = $this->AdminMD->getVehiCat();
				$data['AllCity'] = $getCity ;
				$data['VehiCity'] = $getVehiCat ;
			$this->load->view('/Backend/tm-std-main.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function StdTourDetail()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,101);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getVehiCat = $this->AdminMD->getVehiCat();
				$data['AllCity'] = $getCity ;
				$data['VehiCity'] = $getVehiCat ;
			$this->load->view('/Backend/tm-std-programtour.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}


		public function StdTourNew()
	{
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,101);

		if($checkAuth == "T") {
				$getCity = $this->AdminMD->getCity();
				$getVehiCat = $this->AdminMD->getVehiCat();
				$data['AllCity'] = $getCity ;
				$data['VehiCity'] = $getVehiCat ;
			$this->load->view('/Backend/tm-std-newprogram.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}






	public function addCity()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$tha = $this->input->post('tha');
				$eng = $this->input->post('eng');
				$namestring = $tha.'|'.$eng ;
				$result = "".$this->AdminMD->addCity($namestring);
				redirect('admin/Location','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addGuideSta()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,110);

			if($checkAuth == "T") {
				$cityid = $this->input->post('cityid');
				$cost = $this->input->post('cost');
				$currency = $this->input->post('currency');
				$result = "".$this->AdminMD->addGuideSta($cityid,$cost,$currency);
				redirect('admin/Guide','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addGuideAcc()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,110);

			if($checkAuth == "T") {
				$language = $this->input->post('language');
				$cost = $this->input->post('cost');
				$currency = $this->input->post('currency');
				$result = "".$this->AdminMD->addGuideAcc($language,$cost,$currency);
				redirect('admin/Guide','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function editGuideAcc()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,110);

			if($checkAuth == "T") {
				$guideid = $this->input->post('guideidedit');
				$lang = $this->input->post('languageedit');
				$cost = $this->input->post('costedit2');
				$currency = $this->input->post('costedit2');

				$result = "".$this->AdminMD->addGuideAcc($lang,$cost,$currency);
				redirect('admin/Guide','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function editCurrency()
	{
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,301);

			if($checkAuth == "T") {
				$exIdedit = $this->input->post('exIdedit');
				$exrate = $this->input->post('exrate');


				$result = "".$this->AdminMD->updateExRate($exIdedit,$exrate);
				redirect('admin/PriceAll','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}




	public function addAirline()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
			$action = $this->input->post('action');
			if($action == "edit"){
			//////////////EDIT////////////////////////////////
				$editId = $this->input->post('editid');
				$newName = $this->input->post('airlineName');
				$picname = "0000".$editId."airline";

				$config['upload_path']          = 'assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100;
                $config['max_width']            = 500;
                $config['max_height']           = 500;
                $config['file_name']           = $picname;

                $this->load->library('upload', $config);

				  if ($this->upload->do_upload('filesss')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
					$inserts = $this->AdminMD->UpdateAirline($editId,$newName,$file_name);
					redirect('admin/Airline','refresh');

					} else {
					// Files Upload Not Success!!
					$errors = $this->upload->display_errors();


						$inserts = $this->AdminMD->UpdateAirline2($editId,$newName);
						redirect('admin/Airline','refresh');

						echo "<a href='Airline'>Back to Airline Page</a> " ;

					} // End else



			}else{

			//////////////INSERT////////////////////////////////
				// GET LAST ROW +1
				 $rs = $this->AdminMD->getLastRow('airline_id','airline');
				 foreach ($rs as $value) {
							$lastrow = $value[0]->airline_id;
				 }
				$lastrow = $lastrow+1;

				 //echo $getzero;
				//CREATE STRING FOR FILES NAME
				 $picname = "0000".$lastrow."airline";

				$airlinename = $this->input->post('airlineName');
				$filesss = $this->input->post('filesss');

				//$airlineicon = $this->input->post('airlineIcon');

				$config['upload_path']          = 'assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 100;
                $config['max_width']            = 500;
                $config['max_height']           = 500;
                $config['file_name']           = $picname;

                $this->load->library('upload', $config);

				  if ($this->upload->do_upload('filesss')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
					$inserts = $this->AdminMD->addAirline($airlinename,$file_name);
					redirect('admin/Airline','refresh');

					} else {
					// Files Upload Not Success!!
					$errors = $this->upload->display_errors();
					echo $errors;
					echo "<a href='Airline'>Back to Airline Page</a> " ;
					}

			}



			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function addPlace()
	{
		$tha = $this->input->post('tha');
		$eng = $this->input->post('eng');
		$fee = $this->input->post('fee');
		$city = $this->input->post('cityid');
		$currency  = $this->input->post('currency');

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$tha = $this->input->post('tha');
				$eng = $this->input->post('eng');
				$namestring = $tha.'|'.$eng ;
				$result = "".$this->AdminMD->addPlace($namestring,$fee,$currency,$city);
				redirect('admin/Place?cityid='.$city.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addOther()
	{


		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$tha = $this->input->post('tha');
				$eng = $this->input->post('eng');
				$fee = $this->input->post('fee');
				$city = $this->input->post('cityid');
				$currency  = $this->input->post('currency');
				$namestring = $tha.'|'.$eng ;
				$result = "".$this->AdminMD->AddOther($namestring,$fee,$currency,$city);
				redirect('admin/OtherAll?cityid='.$city.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function delCity()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$cityid = $this->input->get('cityid');
				$result = "".$this->AdminMD->delCity($cityid);
				redirect('admin/Location','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function delGuide()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,110);

			if($checkAuth == "T") {
				$gid = $this->input->get('gid');
				$result = "".$this->AdminMD->delGuide($gid);
				redirect('admin/Guide','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	 public function Place()
	{

		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

		if($checkAuth == "T") {
			$cityid = $this->input->get('cityid');
			$getCity = $this->AdminMD->getCity2($cityid);
			$getPlace = $this->AdminMD->getPlace2($cityid);
			$data['city2'] = $getCity ;
			$data['place2'] = $getPlace ;
			$this->load->view('/Backend/tm-mc-citydata.php',$data);
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

		 public function LocationImg()
	{

		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');

			$checkAuth = "".$this->AdminMD->getStaffAuth($id,105);

		if($checkAuth == "T") {
		//////////////// ON WORING ////////////////////
			$this->load->view('/Backend/tm-mc-locationimage.php');
		}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
		}

	}

	public function DelPlace()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,104);

			if($checkAuth == "T") {
				$entid = $this->input->get('entid');
				$cityid = $this->input->get('cityid');
				$result = "".$this->AdminMD->delPlace($entid);
				redirect('admin/Place?cityid='.$cityid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function DelRoom()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$roomid = $this->input->get('roomid');
				$cityid = $this->input->get('city');
				$star = $this->input->get('star');

				$result = "".$this->AdminMD->delRoom($roomid);
				redirect('admin/HotelAll?city='.$cityid.'&star='.$star.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function delOther()
	{

		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

			if($checkAuth == "T") {
				$otherid = $this->input->get('otherid');
				$cityid = $this->input->get('cityid');
				$result = "".$this->AdminMD->delOther($otherid);
				redirect('admin/OtherAll?cityid='.$cityid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function Test()
	{

		$this->load->view('/Backend/tm-setting-std-pricing.php');


	}




	public function addCityHotel()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityHotel($cityid);
				redirect('admin/hotel','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

		public function addCityVehi()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityVehi($cityid);
				redirect('admin/Vehicle','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addCityOther()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityOther($cityid);
				redirect('admin/Other','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addCityDestination()
	{
		$cityid = $this->input->post('city');
		$originid = $this->input->post('originid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityDestination($cityid);
				redirect('admin/FlightAll?originid='.$originid.'','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function addCityMeal()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,108);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityMeal($cityid);
				redirect('admin/Meal','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


		public function addCityTicket()
	{
		$cityid = $this->input->post('city');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->AddCityTicket($cityid);
				redirect('admin/Ticket','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelHotelCity()
	{
		$cityid = $this->input->get('cityid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,106);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteCityHotel($cityid);
				redirect('admin/hotel','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelFlight()
	{
		$flightid = $this->input->get('flightid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteFlight($flightid);
				redirect('admin/Ticket','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}





		public function DelVehiCity()
	{
		$cityid = $this->input->get('cityid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,107);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteCityVehi($cityid);
				redirect('admin/Vehicle','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelOtherCity()
	{
		$cityid = $this->input->get('cityid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,111);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteCityOther($cityid);
				redirect('admin/Other','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelMealCity()
	{
		$cityid = $this->input->get('cityid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,108);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteCityMeal($cityid);
				redirect('admin/Meal','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}

	public function DelTicketCity()
	{
		$cityid = $this->input->get('cityid');
		$this->checkuser();
		////// CHECK PERMISSION //////
			$id = $this->session->userdata('admin_id');
			$checkAuth = "".$this->AdminMD->getStaffAuth($id,109);

			if($checkAuth == "T") {
				$result = "".$this->AdminMD->DeleteCityTicket($cityid);
				redirect('admin/Ticket','refresh');
			}else{
				// NO PERMISSION
				$this->load->view('/Backend/tm-landing.php');
			}

	}


	public function logout()
	{
		$this->session->sess_destroy('admin_id');
		//$this->session->sess_destroy('admin_name');
		//$this->session->sess_destroy('admin_user');
		//$this->session->sess_destroy('allAuth');
		$data['text'] = "Welcome to Login Pannel";
		$data['rs'] = "";
		$data['ispass'] = "";
		$this->load->view('login',$data);
	// ON WORKING
	}


	public function login()
	{
		$data['text'] = "Welcome to Login Pannel";
		$data['rs'] = "";
		$data['ispass'] = "";
		$this->load->view('login',$data);
	}

	public function logincheck()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username != null&& $password != null ) {
			$rs =  $this->AdminMD->getStaffLogin($username,$password);
				if(is_array($rs) && count($rs)>0){
					$data['text'] = "pass" ;
					$data['rs'] = $rs ;
						foreach ($rs as $value) {
							$username = $value[0]->staff_username;
							$id = $value[0]->staff_id;
							$firstname = $value[0]->staff_firstname;
						}
					$this->session->set_userdata('admin_id',$id);
					$this->session->set_userdata('admin_name',$firstname);
					$this->session->set_userdata('admin_user',$username);
					$data['ispass'] = "T" ;

					// CHECK AUTH (HARD CODE)//
					/*
					101	Tour - Standard Tour
					102	Tour - Easy Package
					103	Tour - Promotion
					104	Tour - Location Data
					105	Tour - Location Image
					106	Shop Travel - Hotel
					107	Shop Travel - Vehicle
					108	Shop Travel - Meal
					109	Shop Travel - Ticket
					110	Shop Travel - Guide
					111	Shop Travel - Others

					201	Super Demestic - Easy Package
					202	Super Demestic - Series Package
					203	Super Demestic - Location Data
					204	Super OutB - Easy Package
					205	Super OutB -Series Package
					206	Super OutB - Location Data

					999	Tour Agency Management

					+Add ON
					301 All Price Setting
					302 Flight Price Setting

					*/
					////////////////
					$a101 = "".$this->AdminMD->getStaffAuth($id,101);
					$allAuth = "".$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,102);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,103);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,104);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,105);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,106);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,107);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,108);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,109);
					$allAuth = $allAuth.$a101 ;

					$a101 = "".$this->AdminMD->getStaffAuth($id,110);
					$allAuth = $allAuth.$a101 ;

					$a101 = "".$this->AdminMD->getStaffAuth($id,111);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,201);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,202);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,203);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,204);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,205);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,206);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,999);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,301);
					$allAuth = $allAuth.$a101;

					$a101 = "".$this->AdminMD->getStaffAuth($id,302);
					$allAuth = $allAuth.$a101;

					$this->session->set_userdata('allAuth',$allAuth);

					redirect('mainmenu','refresh');
				}else{
					$data['text'] = "ID or Password is not exist" ;
					$data['rs'] = "" ;
					$data['ispass'] = "F" ;
				}
		}else{
			$data['text'] = "Please input User&Pass before login" ;
			$data['rs'] = "" ;
			$data['ispass'] = "F" ;
		}
		$this->load->view('login',$data);
	}

	function checkuser(){
	  if(!$this->session->userdata('admin_id')){
	   	redirect('login','refresh');
	 	}
  }

	function checkauth(){
	  $currentsession = $this->session->userdata('admin_id');
  }

}
