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
				<img src="assets/images/logo.png" alt="">
			</div>
			<div class="menu">
				<ul>
					<li><a class="current" href="#">Tour Management</a></li>
					<li><a href="#">Tour Operation</a></li>
					<li><a href="#">Dashboard</a></li>
					<li><span>Admin</span>
						<ul class="">
							<li><a href="profile.html">
								View Profile
							</a></li>
							<li><a href="member-account.html">
								Account Setting
							</a></li>
							<li><a href="login.html">
								Logout
							</a></li>
						</ul>
					</li>

				</ul>
				<p class="menu-btn">MENU</p>
			</div>
		</div>
	</header>
	<div class="body-wrapper">
		<aside>
			<h2>Myanmar Center</h2>
			<div class="title-line">
				<h3>Tour</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-std-main.html">
					<li>Standard Tours</li>
				</a>
				<a href="tm-mc-easy-main.html">
					<li>Easy Packages</li>
				</a>
				<a href="tm-mc-promotion-main.html">
					<li>Promotion</li>
				</a>
				<a href="tm-mc-locationdata.html">
					<li>Location Data</li>
				</a>
				<a href="tm-mc-locationimages.html">
					<li>Location Images</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Shop Travel</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-hotel-main.html">
					<li>Hotel</li>
				</a>
				<a href="tm-vehicle-main.html">
					<li>Vehicle</li>
				</a>
				<a href="tm-meal-main.html">
					<li>Meal</li>
				</a>
				<a href="tm-ticket-main.html">
					<li>Ticket</li>
				</a>
				<a href="tm-guide-main.html">
					<li>Guide</li>
				</a>
				<a href="tm-other-main.html">
					<li>Others</li>
				</a>
			</ul>
      <h2 class="top-mg">Supermarket Tours</h2>
			<div class="title-line">
				<h3>Domestic Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="domestic-package?type=ep">
					<li>Private Group Tours</li>
				</a>
				<a href="domestic-package?type=sp">
					<li>Join Group Tours</li>
				</a>
				<a href="tm-domestic-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Outbound Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="outbound-package?type=ep">
					<li>Private Group Tours</li>
				</a>
				<a href="outbound-package?type=sp">
					<li>Join Group Tours</li>
				</a>
				<a href="tm-outbound-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Tour Agency</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-touragency-main.html">
					<li>Tour Agency Management</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Tour Agency</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-touragency-main.html">
					<li>Tour Agency Management</li>
				</a>
			</ul>
		</aside>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
							<h1>Edit Private Group Tour</h1>
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
                        echo "<option value=".$row['country_id']." selected>".$row['country_name']."</option>";
                      }else{
                        echo "<option value=".$row['country_id'].">".$row['country_name']."</option>";
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
							<p><input type="checkbox" name="multi">Multiple Hotel Options</p>
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
					<div class="list-card card-header" id="room">
						<div class="header">
							<h2>Room Condition</h2>
						</div>
						<div class="content">
              <?php
              if($sr>0){
                echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox" checked>';
              }else{
                echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox">';
              }
               ?>
									<p>Single Room</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($sr>0){
                      echo '<input class="room" roomtype="Single room" type="number" placeholder="Price"  value="'.$sr_price.'">';
                    }else{
                      echo '<input class="room" roomtype="Single room" type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
              <?php
              if($cwd>0){
                echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox" checked>';
              }else{
                echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox">';
              }
               ?>
									<p>Children 2 - 12 yrs (with bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($cwd>0){
                      echo '<input class="room" roomtype="Children 2 - 12 yrs (with bed)" type="number" placeholder="Price"  value="'.$cwd_price.'">';
                    }else{
                      echo '<input class="room" roomtype="Children 2 - 12 yrs (with bed)" type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
              <?php
              if($cwod>0){
                echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox" checked>';
              }else{
                echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox">';
              }
               ?>
									<p>Children 2 - 12 yrs (without bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($cwod>0){
                      echo '<input class="room" roomtype="Children 2 - 12 yrs (without bed)" type="number" placeholder="Price"  value="'.$cwod_price.'">';
                    }else{
                      echo '<input class="room" roomtype="Children 2 - 12 yrs (without bed)" type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
              <?php
              if($c>0){
                echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox" checked>';
              }else{
                echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                echo '<input class="roomcheck" type="checkbox">';
              }
               ?>
									<p>Children < 2 yrs</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($c>0){
                      echo '<input class="room" roomtype="Children < 2 yrs" type="number" placeholder="Price"  value="'.$c_price.'">';
                    }else{
                      echo '<input class="room" roomtype="Children < 2 yrs" type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
						</div>
					</div>

          <div class="list-card card-header hide" id="multi">
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
                  <label>SGL/TWN</label>
                  <input class="extra-price" type="number" placeholder="PRPN">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-sm-3 col-xs-6">
                  <label>TRP</label>
                  <input type="number" placeholder="PRPN">
                  <span class="unit">
                    <span><?=$package['tour_currency']?></span>
                  </span>
                </div>

                <div class="col-xs-12"><br><hr></div>
              </div>
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
						<input type="submit" value="Add Package" class="btn bold">
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
<script src="assets/js/script.js"></script>
<script>
$(document).ready(function(){
  $('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $startPrice = $('#startPrice').val();
  $('#startPrice').val(numberWithSpaces($startPrice));
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
