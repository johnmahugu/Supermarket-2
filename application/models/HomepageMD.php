<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageMD extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function getPackage($country, $type, $per_page, $offset){
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
		$this->db->join('image','tour.tour_imgCover = image.img_refid','inner');
		$this->db->join('tour_address','tour.tour_id = tour_address.tour_id','inner');
		$this->db->join('address','tour_address.address_id = address.address_id','inner');
		$this->db->join('countries','address.country_id = countries.country_id','inner');
		$this->db->where('image.img_type','tour cover');
		$this->db->where('tour.tour_type',$type);
		$this->db->where('CURDATE() BETWEEN tour.tour_openBooking AND tour.tour_closeBooking');
		if($country == 'thailand'){
			$this->db->where('tour.tour_nationality','thailand domestic tour');
		}else{
			$this->db->where('tour.tour_nationality !=','thailand domestic tour');
		}
		if($per_page != ''){
			if($offset == ''){
				$offset = 0;
			}
			$this->db->limit($per_page, $offset);
		}
		$this->db->group_by('tour.tour_id');
		return $this->db->get();
	}

	function getHiLightPackage(){
		$query = "SELECT
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
				FROM
				tour
				INNER JOIN image ON tour.tour_imgCover = image.img_refid
				INNER JOIN tour_address ON tour.tour_id = tour_address.tour_id
				INNER JOIN address ON tour_address.address_id = address.address_id
				INNER JOIN countries ON address.country_id = countries.country_id
				WHERE
				image.img_type = 'tour cover' AND
				tour.tour_isHilight = 1
				GROUP BY
				tour.tour_id
				";
		return $this->db->query($query);
	}

	function getFilter($type, $country, $region, $province, $continent, $season, $keysearch, $per_page, $offset){
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
		$this->db->join('image','tour.tour_imgCover = image.img_refid','inner');
		$this->db->join('tour_address','tour.tour_id = tour_address.tour_id','inner');
		$this->db->join('address','tour_address.address_id = address.address_id','inner');
		$this->db->join('countries','address.country_id = countries.country_id','inner');
		$this->db->join('continents','address.continent_id = continents.continent_id','inner');
		$this->db->join('geography','address.geography_id = geography.geography_id');
		$this->db->where('image.img_type','tour cover');
		$this->db->where('tour.tour_type',$type);
		$this->db->where('CURDATE() BETWEEN tour.tour_openBooking AND tour.tour_closeBooking');
		if($season != ''){
			$this->db->where('tour.tour_season',$season);
		}
		if($region != ''){
			$this->db->where('geography.geography_nameEN',$region);
		}
		if($province != ''){
			$this->db->where('address.address_province',$province);
		}
		if($continent != ''){
			$this->db->where('continents.continent_name',$continent);
		}
		if($country != ''){
			if($country == 'thailand'){
				$this->db->where('tour.tour_nationality','thailand domestic tour');
			}else if($country == 'international'){
				$this->db->where('tour.tour_nationality !=','thailand domestic tour');
			}else{
				$this->db->where('countries.country_name',$country);
			}
		}
		if($keysearch != ''){
			if($country == 'thailand'){
				$this->db->like('tour.tour_nameTH',$keysearch);
			}else{
				$this->db->like('tour.tour_nameEN',$keysearch);
			}
		}
		$this->db->group_by('tour.tour_id');
		if($per_page != '' AND $offset != ''){
			$this->db->limit($per_page, $offset);
		}
		return $this->db->get();
	}

	function getRegion(){
		$this->db->select("geography.geography_nameTH, geography.geography_nameEN");
		$this->db->from('geography');
		return $this->db->get();
	}

	function getProvince(){
		$this->db->select("province.province_nameTH, province.province_nameEN");
		$this->db->from('province');
		return $this->db->get();
	}

	function getContinent(){
		$this->db->select("continents.continent_name");
		$this->db->from('continents');
		$this->db->order_by('continents.continent_name', 'ASC');
		return $this->db->get();
	}

	function getCountry(){
		$this->db->select("countries.country_name");
		$this->db->from('countries');
		$this->db->order_by('countries.country_name', 'ASC');
		return $this->db->get();
	}
}
?>
