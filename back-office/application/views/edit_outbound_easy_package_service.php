<?php
/*****************Initial*****************/
$filestorage = 'http://travelshop-center.tk:80/';
/*************List package****************/
$package = $package->row_array(0);
if(isset($price_range)){
  $booking_timerange = json_decode($price_range,true);
  $last_btr = count($booking_timerange)-1;
}
$sr = 0;
$sr_price = '';
$cwd = 0;
$cwd_price = '';
$cwod = 0;
$cwod_price = '';
$c = 0;
$c_price = '';
foreach($condition->result_array() as $row){
	if($row['tc_type'] == 'room'){
    $temp = json_decode($row['tc_data'],true);
		switch($temp[0]['roomtype']){
			case 'Single room':
			$sr++;
      $sr_price = intval($row['tc_price']);
			break;
			case 'Children 2 - 12 yrs (with bed)':
			$cwd++;
      $cwd_price = intval($row['tc_price']);
			break;
			case 'Children 2 - 12 yrs (without bed)':
			$cwod++;
      $cwod_price = intval($row['tc_price']);
			break;
			case 'Children < 2 yrs':
			$c++;
      $c_price = intval($row['tc_price']);
			break;
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PB Agency Office</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/dropzone.css">
	<script src="assets/js/ckeditor/ckeditor.js"></script>
	<script src="assets/js/jquery.cropit.js"></script>

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="">
	<header>
		<div class="header-bar">
			<div class="logo">
				<div class="burger">
					<span></span>
					<span></span>
					<span></span>
				</div>
        <a href="http://back-office.travelshop-center.tk/mainmenu">
					<img src="assets/images/logo.png" alt="">
				</a>
			</div>
      <?php include('pagepart/backtop.php') ;?>
		</div>
	</header>
	<div class="body-wrapper">
    <?php include('pagepart/backside.php') ; ?>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
              <h1>Edit
                <?php
                if($this->session->flashdata('f1') == 'ep'){
									echo 'Easy Package';
								}else{
									echo 'Series Package';
								}
                 ?>
              </h1>
							<p>Outbound | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameTH" type="text" value="<?=$package['tour_nameTH']?>">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameEN" type="text" value="<?=$package['tour_nameEN']?>">
						</div>
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Continent</label>
                <select name="continent">
                <?php
                  if(isset($continent)){
                    foreach($continent->result_array() as $row){
                      if($package['continent_id'] == $row['continent_id']){
                        echo "<option value=".$row['continent_id']." selected>".$row['continent_name']."</option>";
                      }else{
                        echo "<option value=".$row['continent_id'].">".$row['continent_name']."</option>";
                      }
                    }
                  }
                  ?>
                </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Country</label>
                <select name="country">
	              <?php
	                if(isset($country)){
	                	foreach($country->result_array() as $row){
                      if($package['country_id'] == $row['country_id']){
                        echo "<option value=".$row['country_id']." selected>".$row['country_nameEN']."</option>";
                      }else{
                        echo "<option value=".$row['country_id'].">".$row['country_nameEN']."</option>";
                      }
	                	}
	                }
	                ?>
	              </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Starter Price</label><br>
							<input id="startPrice" type="text" value="<?=intval($package['tour_startPrice'])?>"><span class="unit"><?=$package['tour_currency']?></span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4">
              <?php
                $est_date = explode(",",$package['tour_dayNight']);
              ?>
							<label class="filter">Day Night Program : </label> <?=$est_date[0]?> Day <?=$est_date[1]?> Night
						</div>
						<div class="col-md-4 col-sm-4 col-xs-6">
              <p>
              <?php
              $count = 0;
              foreach($condition->result_array() as $row){
                if($row['tc_type'] == 'hotel'){
                  $count++;
                }
              }
               ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
            <div class="col-sm-4 no-pd">
							<a href="edit-outbound-package?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">TOUR INFO</a>
						</div>
            <div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-service?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn current">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-condition?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
          <div class="list-card card-header" id="multi">
            <div class="header">
              <h2>Hotel</h2>
            </div>
            <div class="header-card no-pd">
              <div class="col-sm-4">
                <p>Hotel Name</p>
              </div>
              <div class="col-sm-1">
                <p>Stars</p>
              </div>
              <div class="col-sm-2">
                <p>Location</p>
              </div>
              <div class="col-sm-2">
                <p>Price / Pax</p>
              </div>
              <div class="col-sm-2">
                <p>Single Room</p>
              </div>
            </div>
            <hr>
            <div class="content">
              <?php
              $count = 0;
              foreach($condition->result_array() as $row){
                if($row['tc_type'] == 'hotel'){
                  $count++;
                }
              }
              if($count > 0){
                foreach($condition->result_array() as $row){
                  if($row['tc_type'] == 'hotel'){
                  $hotel = json_decode($row['tc_data'],true);
                  $c_hotel = count($hotel);
                  for($i=0;$i<$c_hotel;$i++){
                    $twin_price = '';
                    $extra_twin_price = '';
                    $single_price = '';
                    $extra_single_price = '';
                    $cwb_price = '';
                    $cwob_price = '';
                    $c_price = '';
                    for($k=0;$k<count($hotel[$i]['room']);$k++){
                      switch($hotel[$i]['room'][$k]['roomtype']){
                        case 'Twin room':
                        $twin_price = $hotel[$i]['room'][$k]['price'];
                        $extra_twin_price = $hotel[$i]['room'][$k]['extension'];
                        break;
                        case 'Single room':
                        $single_price = $hotel[$i]['room'][$k]['price'];
                        $extra_single_price = $hotel[$i]['room'][$k]['extension'];
                        break;
                        case 'Children 2 - 12 yrs (with bed)':
                        $cwb_price = $hotel[$i]['room'][$k]['price'];
                        break;
                        case 'Children 2 - 12 yrs (without bed)':
                        $cwob_price = $hotel[$i]['room'][$k]['price'];
                        break;
                        case 'Children < 2 yrs':
                        $c_price =  $hotel[$i]['room'][$k]['price'];
                        break;
                      }
                    }
              ?>
              <div class="form-group">
                <div class="col-sm-4">
                  <input class="hotelname" type="text" placeholder="Hotel Name" value="<?=$hotel[$i]['name']?>">
                </div>
                <div class="col-sm-1 col-xs-3">
                  <select name="star">
                    <?php
                    for($j=3;$j<6;$j++){
                      if($j == $hotel[$i]['star']){
                        echo '<option selected>'.$j.'</option>';
                      }else{
                        echo '<option>'.$j.'</option>';
                      }
                    } ?>
                  </select>
                </div>
                <div class="col-sm-2 col-xs-9">
                  <input class="location" type="text" placeholder="Location" value="<?=$hotel[$i]['locationEN']?>">
                </div>
                <div class="col-sm-2 col-xs-6">
                  <input class="twin-price" type="number" placeholder="Price" value="<?=$twin_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>
                <div class="col-sm-2 col-xs-6">
                  <input class="single-price" type="number" placeholder="SGL" value="<?=$single_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>
                <div class="col-sm-1 col-xs-12">
                  <div class="btn no-border gray">Delete</div>
                </div>
                <div class="clear xs"></div>
                <div class="col-sm-2 col-xs-6">
                  <label>CWB</label>
                  <input class="cwb-price" type="number" value="<?=$cwb_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-sm-2 col-xs-6">
                  <label>CWOB</label>
                  <input class="cwob-price" type="number" value="<?=$cwob_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-sm-2 col-xs-6">
                  <label>Infant</label>
                  <input class="infant-price" type="number" value="<?=$c_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-sm-3 col-xs-6">
                  <label>SGL</label>
                  <input class="extra-single-price" type="number" placeholder="PRPN" value="<?=$extra_single_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-sm-3 col-xs-6">
                  <label>TWN/TRP</label>
                  <input class="extra-twin-price" type="number" placeholder="PRPN" value="<?=$extra_twin_price?>">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-xs-12"><br><hr></div>
              </div>
              <?php
                }
              }
            }
          }else{
                ?>
                <div class="form-group">
                  <div class="col-sm-4">
                    <input class="hotelname" type="text" placeholder="Hotel Name">
                  </div>
                  <div class="col-sm-1 col-xs-3">
                    <select name="star">
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="col-sm-2 col-xs-9">
                    <input class="location" type="text" placeholder="Location">
                  </div>
                  <div class="col-sm-2 col-xs-6">
                    <input class="twin-price" type="number" placeholder="Price">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>
                  <div class="col-sm-2 col-xs-6">
                    <input class="single-price" type="number" placeholder="SGL">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>
                  <div class="col-sm-1 col-xs-12">
                    <div class="btn no-border gray">Delete</div>
                  </div>
                  <div class="clear xs"></div>
                  <div class="col-sm-2 col-xs-6">
                    <label>CWB</label>
                    <input class="cwb-price" type="number">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>

                  <div class="col-sm-2 col-xs-6">
                    <label>CWOB</label>
                    <input class="cwob-price" type="number">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>

                  <div class="col-sm-2 col-xs-6">
                    <label>Infant</label>
                    <input class="infant-price" type="number">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>

                  <div class="col-sm-3 col-xs-6">
                    <label>SGL</label>
                    <input class="extra-single-price" type="number" placeholder="PRPN">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>

                  <div class="col-sm-3 col-xs-6">
                    <label>TWN/TRP</label>
                    <input class="extra-twin-price" type="number" placeholder="PRPN">
                    <span class="unit">
                      <span><?=$package['tour_currency']?></span>
                    </span>
                  </div>

                  <div class="col-xs-12"><br><hr></div>
                </div>
                <?
              }
               ?>
              <div class="btn-wrapper">
                <div class="col-xs-12">
                  <div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
                </div>
              </div>
            </div>
          </div>
          </div>
				<div class="row">
					<div class="btn-wrapper text-center">
            <form action="update-outbound-package-service" method="POST">
              <input name="oldNameSlug" type="hidden" required>
              <input name="newNameSlug" type="hidden" required>
              <input name="type" type="hidden" value="<?=$this->session->flashdata('f1')?>" required>
              <input name="continent" type="hidden" required>
              <input name="country" type="hidden" required>
              <input name="nameTH" type="hidden" required>
              <input name="nameEN" type="hidden" required>
              <input name="startPrice" type="hidden" required>
              <input name="hotel" type="hidden" required>
  						<button id="submit" type="submit" class="btn bold">Update Package</button>
            </form>
					</div>
				</div>
			</div>
		</main>
	</div>
  <input id="nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>">
  <input id="isTourType" type="hidden" value="<?=$this->session->flashdata('f1')?>">
</body>
<script src="assets/js/script.js"></script>
<script>
$(document).ready(function(){
  $('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $startPrice = $('#startPrice').val();
  $('#startPrice').val(numberWithSpaces($startPrice));
});

$('#submit').click(function(){
  $nameSlug = $('#nameSlug').val();
  $nameTH = $('#nameTH').val();
  $nameEN = $('#nameEN').val();
  $newNameSlug = $nameEN.toLowerCase()
    .replace(/\s+/g, '-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
  $continent = $('select[name=continent]').val();
  $country = $('select[name=country]').val();
  $startPrice = $('#startPrice').val().replace(' ','');

  $hotelname = $('.hotelname');
  $c_hotel = $hotelname.length;
  $star = $('select[name=star]');
  $location = $('.location');
  $twin_price = $('.twin-price');
  $single_price = $('.single-price');
  $cwb_price = $('.cwb-price');
  $cwob_price = $('.cwob-price');
  $infant_price = $('.infant-price');
  $extra_twin_price = $('.extra-twin-price');
  $extra_single_price = $('.extra-single-price');
  $hotel = '[';
  $is_first = true;
  for($i=0;$i<$c_hotel;$i++){
    if($hotelname.eq($i).val() != ''){
      if($is_first == true){
        $is_first = false;
        $hotel += '{"name":"'+$hotelname.eq($i).val()+'","star":'+$star.eq($i).val()+',"locationEN":"'+$location.eq($i).val()+'","locationTH":"'+$location.eq($i).val()+'","room":[';
        $tprice = 0;
        if($twin_price.eq($i).val() != ''){
          $tprice = $twin_price.eq($i).val();
        }
        $extension = 0;
        if($extra_twin_price.eq($i).val() != ''){
          $extension = $extra_twin_price.eq($i).val();
        }
        if($tprice != 0 || $extension != 0){
          $hotel += '{"roomtype":"Twin room","price":'+$tprice+',"extension":'+$extension+'},';
        }
        $sprice = 0;
        if($single_price.eq($i).val() != ''){
          $sprice = $single_price.eq($i).val();
        }
        $extension = 0;
        if($extra_single_price.eq($i).val() != ''){
          $extension = $extra_single_price.eq($i).val();
        }
        if($sprice != 0 || $extension != 0){
          $hotel += '{"roomtype":"Single room","price":'+$sprice+',"extension":'+$extension+'},';
        }
        if($cwb_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children 2 - 12 yrs (with bed)","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        if($cwob_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children 2 - 12 yrs (without bed)","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        if($infant_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children < 2 yrs","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        $hotel = $hotel.substr(0,$hotel.length-1);
        $hotel += ']}';
      }else{
        $hotel += ',{"name":"'+$hotelname.eq($i).val()+'","star":'+$star.eq($i).val()+',"locationEN":"'+$location.eq($i).val()+'","locationTH":"'+$location.eq($i).val()+'","room":[';
        $tprice = 0;
        if($twin_price.eq($i).val() != ''){
          $tprice = $twin_price.eq($i).val();
        }
        $extension = 0;
        if($extra_twin_price.eq($i).val() != ''){
          $extension = $extra_twin_price.eq($i).val();
        }
        if($tprice != 0 || $extension != 0){
          $hotel += '{"roomtype":"Twin room","price":'+$tprice+',"extension":'+$extension+'},';
        }
        $sprice = 0;
        if($single_price.eq($i).val() != ''){
          $sprice = $single_price.eq($i).val();
        }
        $extension = 0;
        if($extra_single_price.eq($i).val() != ''){
          $extension = $extra_single_price.eq($i).val();
        }
        if($sprice != 0 || $extension != 0){
          $hotel += '{"roomtype":"Single room","price":'+$sprice+',"extension":'+$extension+'},';
        }
        if($cwb_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children 2 - 12 yrs (with bed)","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        if($cwob_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children 2 - 12 yrs (without bed)","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        if($infant_price.eq($i).val() != ''){
          $hotel += '{"roomtype":"Children < 2 yrs","price":'+$cwb_price.eq($i).val()+',"extension":0},';
        }
        $hotel = $hotel.substr(0,$hotel.length-1);
        $hotel += ']}';
      }
    }
  }
  $hotel += ']';

  $('input[name=oldNameSlug]').val($nameSlug);
  $('input[name=newNameSlug]').val($newNameSlug);
  $('input[name=nameTH]').val($nameTH);
  $('input[name=nameEN]').val($nameEN);
  $('input[name=continent]').val($continent);
  $('input[name=country]').val($country);
  $('input[name=startPrice]').val($startPrice);
  if($hotel != '[]'){
    $('input[name=hotel]').val($hotel);
  }
});

$('#startPrice').click(function(){
  $startPrice = $(this).val().replace(' ','');
  $('#startPrice').val($startPrice);
});

$('#startPrice').blur(function(){
  $startPrice = $('#startPrice').val();
  if($.isNumeric($startPrice.replace(' ',''))){
    $('#startPrice').val(numberWithSpaces($startPrice));
  }else{
    alert('Invalid number');
    $('#startPrice').val(this.defaultValue);
    $('#startPrice').focus();
  }
});

function numberWithSpaces(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

	$('.title-bar-wrapper input[name="multi"]').change(function() {
		var checkname = this.name;
		if($(this).is(':checked')){
			$('#room').addClass('hide');
			$('#multi').removeClass('hide');
		}else{
			$('#room').removeClass('hide');
			$('#multi').addClass('hide');
		}
	});

	$('.title-bar-wrapper input[type="checkbox"]').each(function(){
		var checkname = this.name;
		if($(this).is(':checked')){
			$('#'+checkname).removeClass('hide');
		}else{
			$('#'+checkname).addClass('hide');
		}
	});

	$('.list-card .btn.no-border.light').click(function() {
		var addform = $(this).closest('.content').find('.form-group').last().html();
		$(this).closest('.content').find('.form-group').last().after("<div class='form-group'>"+addform+"</div>");
	});

	$('#room input[type="checkbox"]').change(function() {
		if($(this).is(':checked')){
			$(this).closest('.form-group').removeClass('cb-nonselect').find('input[type="number"]').prop("disabled", false);
		}else{
			$(this).closest('.form-group').addClass('cb-nonselect').find('input[type="number"]').prop("disabled", true);
		}
	});

</script>
</html>
