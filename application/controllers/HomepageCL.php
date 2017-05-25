<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomepageCL extends CI_Controller {

  private $country;

  function __construct() {
    parent::__construct();
    $this->session;
    $this->load->database();
    $this->load->helper('url');
    $this->load->library('pagination');
    $this->load->library('session');
    $this->load->model('HomepageMD');
  }

  function index() {
    redirect('thai-tour');
  }

  /*function hilight(){
    $tour_nationality = $this->input->post('nationality');
    $query = $this->HomepageMD->getHiLightPackage($tour_nationality);
    $data['package'] = $query->result();
    echo json_encode($data);
  }*/

  function thai_tour() {
    /********************Initial Filter**********************/
    $data['region']              = $this->HomepageMD->getRegion();
    $data['province']            = $this->HomepageMD->getProvince();
    /********************Hilight Package*********************/
    $query = $this->HomepageMD->getHiLightPackage('international tour');
    $data['hilight_package'] = $query;
    $data['c_hilight_package'] = $query->num_rows();
    for($i=0;$i<$query->num_rows();$i++){
      $data['hilight_price_range'][$i] = $query->row($i)->tour_priceRange;
    }
    /*********************Normal Package*********************/
    $query                    = $this->HomepageMD->getLastPackage('thailand', 'sp');
    $data['package']          = $query;
    $count                    = $query->num_rows();
    if($count>0){
      for ($i = 0; $i <= $count; $i++) {
        $data['price_range'][$i] = $query->row($i)->tour_priceRange;
      }
    }
    $this->load->view('homepage_thai', $data);
  }

  function thai_tour_all() {
    /********************Initial Variable********************/
    $type                    = $this->input->get('type');
    $region                  = $this->input->get('region');
    $province                = $this->input->get('province');
    $season                  = $this->input->get('season');
    $keysearch               = $this->input->get('keysearch');
    $offset                  = $this->input->get('per_page');
    if($offset == ''){
      $offset = '0';
    }
    /********************Initial Filter**********************/
    $data['region']           = $this->HomepageMD->getRegion();
    $data['province']             = $this->HomepageMD->getProvince();
    /**************Pagination Configuration******************/
    $cur_url = base_url().'/thai-tour-all';
    $cur_url .= '?type='.$type;
    if($region != ''){
      $cur_url .= '&region='.$region;
    }
    if($province != ''){
      $cur_url .= '&province='.$province;
    }
    if($season != ''){
      $cur_url .= '&season='.$season;
    }
    $config['base_url']          = $cur_url;
    $config['per_page']          = 9;
    $config['cur_tag_open']      = '<a class="current">';
    $config['cur_tag_close']     = '</a>';
    $config['prev_link'] = false;
    $config['next_link'] = false;
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['page_query_string'] = true;
    $count_allrow                = $this->HomepageMD->getPackage($type, '', $region, $province, '', $season, $keysearch, '', '');
    $config['total_rows']        = $count_allrow->num_rows();
    $this->pagination->initialize($config);
    $str_links                = $this->pagination->create_links();
    $data["pagination_links"] = explode('&nbsp;', $str_links);
    $data['c_package']        = $config['total_rows'];
    /*********************Normal Package*********************/
    $query                    = $this->HomepageMD->getPackage($type, '', $region, $province, '', $season, $keysearch, $config['per_page'], $offset);
    $data['package']          = $query;
    $count                    = $query->num_rows();
    if($count>0){
      for ($i = 0; $i <= $count; $i++) {
        $data['price_range'][$i] = $query->row($i)->tour_priceRange;
      }
    }
    $this->load->view('homepage_thai_all', $data);
  }

  function filter_thai() {
    /********************Initial Variable********************/
    $type                    = $this->input->post('type');
    $region                  = $this->input->post('region');
    $province                = $this->input->post('province');
    $season                  = $this->input->post('season');
    $keysearch               = $this->input->post('keysearch');
    $ref_url                 = $this->input->post('ref_url');
    $offset                  = $this->input->post('offset');
    /**************Pagination Configuration******************/
    $config['base_url']      = $ref_url;
    $config['per_page']      = 9;
    $config['cur_tag_open']  = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['cur_page']      = $offset;
    $count_allrow            = $this->HomepageMD->getFilter($type, $region, $province, $continent, $country, $season, $keysearch, '', '');
    $config['total_rows']    = $count_allrow->num_rows();
    $this->pagination->initialize($config);
    $str_links                = $this->pagination->create_links();
    $data["pagination_links"] = explode('&nbsp;', $str_links);
    /*********************Filter Package*********************/
    $query                    = $this->HomepageMD->getFilter($type, $region, $province, $continent, $country, $season, $keysearch, $config['per_page'], $offset);
    $data['package']          = $query->result();
    echo json_encode($data);
  }

  function international_tour() {
    /********************Initial Filter**********************/
    $data['continent']           = $this->HomepageMD->getContinent('');
    $data['country']             = $this->HomepageMD->getCountry('');
    /********************Hilight Package*********************/
    $query = $this->HomepageMD->getHiLightPackage('international tour');
    $data['hilight_package'] = $query;
    $data['c_hilight_package'] = $query->num_rows();
    for($i=0;$i<$query->num_rows();$i++){
      $data['hilight_price_range'][$i] = $query->row($i)->tour_priceRange;
    }
    /*********************Normal Package*********************/
    $query                    = $this->HomepageMD->getLastPackage('international', 'sp');
    $data['package']          = $query;
    $count                    = $query->num_rows();
    if($count>0){
      for ($i = 0; $i <= $count; $i++) {
        $data['price_range'][$i] = $query->row($i)->tour_priceRange;
      }
    }
    $this->load->view('homepage_international', $data);
  }

  function international_tour_all() {
    /********************Initial Variable********************/
    $type                    = $this->input->get('type');
    $continent               = $this->input->get('continent');
    $country                 = $this->input->get('country');
    $season                  = $this->input->get('season');
    $keysearch               = $this->input->get('keysearch');
    $offset                  = $this->input->get('per_page');
    if($offset == ''){
      $offset = '0';
    }
    /********************Initial Filter**********************/
    $data['continent']           = $this->HomepageMD->getContinent($country);
    $data['country']             = $this->HomepageMD->getCountry($continent);
    /**************Pagination Configuration******************/
    $cur_url = base_url().'/international-tour-all';
    $cur_url .= '?type='.$type;
    if($continent != ''){
      $cur_url .= '&continent='.$continent;
    }
    if($country != ''){
      $cur_url .= '&country='.$country;
    }
    if($season != ''){
      $cur_url .= '&season='.$season;
    }
    $config['base_url']          = $cur_url;
    $config['per_page']          = 9;
    $config['cur_tag_open']      = '<a class="current">';
    $config['cur_tag_close']     = '</a>';
    $config['prev_link'] = false;
    $config['next_link'] = false;
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['page_query_string'] = true;
    $count_allrow                = $this->HomepageMD->getPackage($type, $country, '', '', $continent, $season, $keysearch, '', '');
    $config['total_rows']        = $count_allrow->num_rows();
    $this->pagination->initialize($config);
    $str_links                = $this->pagination->create_links();
    $data["pagination_links"] = explode('&nbsp;', $str_links);
    $data['c_package']        = $config['total_rows'];
    /*********************Normal Package*********************/
    $query                    = $this->HomepageMD->getPackage($type, $country, '', '', $continent, $season, $keysearch, $config['per_page'], $offset);
    $data['package']          = $query;
    $count                    = $query->num_rows();
    if($count>0){
      for ($i = 0; $i <= $count; $i++) {
        $data['price_range'][$i] = $query->row($i)->tour_priceRange;
      }
    }
    $this->load->view('homepage_international_all', $data);
  }

  function change_tour_type(){
    /********************Initial Variable********************/
    $country                 = $this->input->post('country');
    $type                    = $this->input->post('type');
    /*********************Normal Package*********************/
    $query                   = $this->HomepageMD->getLastPackage($country, $type);
    $data['package']         = $query->result();
    echo json_encode($data);
  }

  function filter_international() {
    /********************Initial Variable********************/
    $type                    = $this->input->post('type');
    $continent               = $this->input->post('continent');
    $country                 = $this->input->post('country');
    $season                  = $this->input->post('season');
    $keysearch               = $this->input->post('keysearch');
    $ref_url                 = $this->input->post('ref_url');
    $offset                  = $this->input->post('offset');
    /**************Pagination Configuration******************/
    $config['base_url']      = $ref_url;
    $config['per_page']      = 9;
    $config['cur_tag_open']  = '&nbsp;<a class="current">';
    $config['cur_tag_close'] = '</a>';
    $config['cur_page']      = $offset;
    $count_allrow            = $this->HomepageMD->getFilter($type, $region, $province, $continent, $country, $season, $keysearch, '', '');
    $config['total_rows']    = $count_allrow->num_rows();
    $this->pagination->initialize($config);
    $str_links                = $this->pagination->create_links();
    $data["pagination_links"] = explode('&nbsp;', $str_links);
    /*********************Filter Package*********************/
    $query                    = $this->HomepageMD->getFilter($type, $region, $province, $continent, $country, $season, $keysearch, $config['per_page'], $offset);
    $data['package']          = $query->result();
    echo json_encode($data);
  }

  function gen_priceRange() {
    $result = '[';
    $date   = new DateTime('10/01/2016');
    $j      = true;
    for ($i = 0; $i <= 160; $i++) {
      if ($j == true) {
        $result .= '{"from": "' . $date->format("Y-m-d") . '",';
        $date->modify('+2 day');
        $result .= '"to": "' . $date->format("Y-m-d") . '","price": 3900},';
        $j = false;
      } else {
        $date->modify('+1 day');
        $j = true;
      }
    }
    $result .= ']';
    echo $result;
  }
}
?>
