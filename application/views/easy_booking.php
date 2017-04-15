<?php
/*************Clear POST&GET**************/
unset($_POST, $_GET);
/*****************Session*****************/
$lang = 'EN';
if(!empty($this->session->userdata('lang'))){
	$lang = $this->session->userdata('lang');
}
$country = $this->session->userdata('country');
/***************List package**************/
$package = $package->row_array(0);
if(isset($price_range)){
	$booking_timerange = json_decode($price_range,true);
	$last_btr = count($booking_timerange)-1;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUPERMARKET TOURS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="readmore outbouce">
    <div class="container-fulid clearfix">
			<div class="header-box">
				<div class="language-box">
					<a class="current" href="#">
						<img src="<?=base_url()?>assets/images/ico-en.png" alt="">
					</a>
					<a href="#">
						<img src="<?=base_url()?>assets/images/ico-th.png" alt="">
					</a>
				</div>
				<div class="contact">
					<h2>Add Line</h2>
					<a href="http://line.me/ti/p/~bankzahaplus"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
				</div>
				<div class="contact">
					<h2>Contact Us</h2>
					<p><a href="tel:0875012500">02-222-2222</a></p>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<a href="<?=base_url()?><?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
				</div>
				<div class="col-sm-10">
					<div class="menu-burger">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<ul class="menu-list">
						<li><a href="<?=base_url()?>thai-tour">THAILAND DOMESTIC TOURS</a></li>
						<li><a href="<?=base_url()?>international-tour">INTERNATIONAL TOURS</a></li>
						<li><a href="<?=base_url()?>about">ABOUT</a></li>
						<?php if(empty($this->session->userdata('firstname'))){?>
							<li><a href="_signin?from=sb" class="btn">Sign In</a></li>
						<?php
						}else{
						?>
							<li class="user-profile">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
							<ul>
								<li><a href="<?=base_url()?>booking-list">BOOKING LIST</a></li>
								<li><a href="<?=base_url()?>user-edit-profile">EDIT PROFILE</a></li>
								<li><a href="signout">LOG OUT</a></li>
							</ul>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<?php if($package['country_name'] == 'Thailand'){ ?>
						<h1>THAILAND DOMESTIC TOURS<br>
					<?php }else{ ?>
						<h1>INTERNATIONAL TOURS<br>
					<?php
					}
					?>
				</div>
			</div>
		</div>
	</header>
	<div class="title-bar readmore">
		<div class="container">
			<div class="col-sm-6">
        <h1>
        <?php
					if(empty($package['tour_name'.$lang])){
						echo strtoupper($package['tour_name'.$lang]);
					}else{
						if($lang == 'TH'){
							echo strtoupper($package['tour_nameTH']);
						}else{
							echo strtoupper($package['tour_nameEN']);
						}
					}
				?>
      </h1>
			</div>
		</div>
	</div>
	<div class="container content">
		<div class="row top-mg">
			<div class="col-xs-12">
				<div class="title-header">
					<h2>BOOKING FORM</h2>
					<div class="line">
						<div class="tab"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row top-mg">
			<div class="col-sm-4 no-pd">
				<a href="#" class="choose-step-box current">
					<span class="circle"> 1 </span>
					Select Nationality And Amount
				</a>
			</div>
			<div class="col-sm-4 no-pd">
				<a href="#" class="choose-step-box">
					<span class="circle"> 2 </span>
					Select Ticket And Hotel
				</a>
			</div>
			<div class="col-sm-4 no-pd">
				<a href="#" class="choose-step-box">
					<span class="circle"> 3 </span>
					Fill Tourist Infomation
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<h3>Nationality</h3>
					<div class="col-md-12">
						<label for="">Tourist Nationality</label><br>
						<select>
							<option disabled selected>Select Tourist Nationality </option>
              <?php
  						foreach($nationality->result_array() as $row){
                echo '<option value="'.$row['country_nationality'].'">'.$row['country_nationality'].'</option>';
              }
              ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<h3>Tour Booking</h3>
					<div class="col-md-6">
						<label for="">Day Trip</label><br>
						<select name="daytrip">
							<option disabled selected>Select Day Trip</option>
              <?php
  						for($i=0;$i<=$last_btr;$i++){
                //if(date('Y-m-d') <= $booking_timerange[$i]['to']){
  								echo '<option datestart="'.$booking_timerange[$i]['from'].'" datefinish="'.$booking_timerange[$i]['to'].'" value="'.$booking_timerange[$i]['price'].'">';
  								$open_booking = date_format(date_create($booking_timerange[$i]['from']),"d M Y");
  								$close_booking = date_format(date_create($booking_timerange[$i]['to']),"d M Y");
  								echo '<td>'.$open_booking." - ".$close_booking.'</td>';
  								if($package['tour_currency'] == 'THB'){
  									echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($booking_timerange[$i]['price']).' Baht</td>';
  								}else{
  									echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$'.number_format($booking_timerange[$i]['price']).'</td>';
  								}
  								echo '</option>';
  							//}
              }
              ?>
						</select>
					</div>
					<div class="col-md-6">
						<label for="">Tourist</label><br>
						<input type="number" min="1" value="1" required>
						<span class="unit">prople</span>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="btn-wrapper">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="easypkg-booking2.html" class="btn bold">Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
  <footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<h3>SUPERMARKET Tours</h3>
					<p>by P.B Travel Agency</p>
					<hr>
					<a href="http://www.myanmar-center.in.th/">Myanmar Center</a>
				</div>
				<div class="col-sm-4 col-sm-offset-4 col-xs-12">
					<div class="contact">
						<h2>Add Line</h2>
						<a href="http://line.me/ti/p/~bankzahaplus"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
					</div>
					<div class="contact">
						<h2>Contact Us</h2>
						<p><a href="tel:0875012500">02-222-2222</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="strap"></div>
		<form id="to-booking-info" action="series-booking-info" method="post">
			<input name="tour-nameSlug" type="hidden" value="<?php echo $package['tour_nameSlug']?>" required>
			<input name="booking-detail" type="hidden" value="" required>
		</form>
	</footer>
</body>
<script>

</script>
</html>
