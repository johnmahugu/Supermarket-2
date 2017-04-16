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
			<p><?=date_format(date_create($booking_timerange[0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$last_btr]['to']),"j F Y");?></p>
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
				<a href="#" class="choose-step-box current check">
					<span class="circle"> <i class="fa fa-check" aria-hidden="true"></i> </span>
					Select Nationality And Amount
				</a>
			</div>
			<div class="col-sm-4 no-pd">
				<a href="#" class="choose-step-box current">
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
					<h3>Select Route Ticket</h3>
							<?php
							if(isset($condition)){
								foreach($condition->result_array() as $row){
									if($row['tc_type'] == 'flight schedule'){
										$temp = json_decode($row['tc_data'],true);
										$b_detail = json_decode(json_decode($booking_detail),true);
										$datestart = $b_detail['date'][0]['start'];
										$datefinish = $b_detail['date'][0]['end'];
										$count = count($temp)-1;
										$is_first = true;
										$cur_daytrip = 0;
										for($i=0;$i<=$count;$i++){
											if($cur_daytrip == $temp[$i]['daytrip']){
												echo '<tr><td><input type="radio" name="'.$temp[$i]['daytrip'].'">'.$temp[$i]['airline'].'</td>';
												echo '<td><span>Flight</span>'.$temp[$i]['flight'].'</td>';
												echo '<td><span>Departure</span>'.$temp[$i]['departure'].'</td>';
												echo '<td><span>Arrival</span>'.$temp[$i]['arrival'].'</td></tr>';
											}else{
												if($is_first == false){
													echo '</tbody></table></fieldset></div></div>';
												}else{
													$is_first = false;
												}
												$cur_daytrip = $temp[$i]['daytrip'];
												echo '<div class="flight-box"><div class="col-md-12 clearfix"><fieldset id="'.$temp[$i]['daytrip'].'">';
												echo '<h3 class="location"><i class="fa fa-plane" aria-hidden="true"></i> '.$temp[$i]['route'].'</h3>';
												if($i != $count){
													$date = date_create($datestart);
													$date->modify('+'.$i.' day');
													echo '<h4 class="date">'.date_format($date,"j M Y").'</h4>';
												}else{
													echo '<h4 class="date">'.date_format(date_create($datefinish),"j M Y").'</h4>';
												}
												echo '</div><div class="col-md-12"><table><thead><tr><td>Airway</td><td>Flight</td><td>Departure</td><td>Arrival</td></tr></thead><tbody>';
												echo '<tr><td><input type="radio" name="'.$temp[$i]['daytrip'].'">'.$temp[$i]['airline'].'</td>';
												echo '<td><span>Flight</span>'.$temp[$i]['flight'].'</td>';
												echo '<td><span>Departure</span>'.$temp[$i]['departure'].'</td>';
												echo '<td><span>Arrival</span>'.$temp[$i]['arrival'].'</td></tr>';
												if($i == $count){
													echo '</tbody></table></fieldset></div></div>';
												}
											}
										}
									}
								}
							}
							 ?>
				</div>
				<div class="form-group">
					<h3>Select Hotel</h3>
					<?php
					if(isset($condition)){
						$index = 0;
						$route = json_decode($route,true);
						foreach($condition->result_array() as $row){
							if($row['tc_type'] == 'hotel'){
								$temp = json_decode($row['tc_data'],true);
								$b_detail = json_decode(json_decode($booking_detail),true);
								$datestart = $b_detail['date'][0]['start'];
								$count = count($temp)-1;
								echo '<div class="flight-box"><div class="col-md-12 clearfix">';
								echo '<h3 class="location"><i class="fa fa-bed" aria-hidden="true"></i> '.$route[$index]['route'].'</h3>';
								$date = date_create($datestart);
								$date->modify('+'.$index.' day');
								echo '<h4 class="date">'.date_format($date,"j M Y").'</h4>';
								echo '</div><div class="col-md-12"><fieldset name="'.($index+1).'"><table><thead><tr><td>Hotel Name</td><td>Star</td><td>Location</td></tr></thead><tbody>';
								$index++;
								for($i=0;$i<=$count;$i++){
									echo '<tr><td><input type="radio" name="'.($index+1).'">'.$temp[$i]['name'].'</td>';
									echo '<td><span>Star</span> '.$temp[$i]['star'].' Stars</td>';
									echo '<td><span>Location</span>'.$temp[$i]['location'.$lang].'</td>';
									echo '</tr>';
								}
								echo '</tbody></table></fieldset></div></div>';
							}
						}
					}
					?>
				</div>
				<div class="form-group">
					<h3>เลือกห้องพัก</h3>
					<div class="form-group">
						<div class="list">
							<div class="amount"><p>ทั้งหมด <span><b>0</b> / 2</span> คน</p></div>
						</div>
						<div class="list">
							<div class="col-sm-5"><label>Twin / Tripple room</label></div>
							<div class="col-sm-4 col-xs-7"><p>45,953 บาท / คน</p></div>
							<div class="col-sm-3 col-xs-5"><input type="number" value="0" value="0" min="1" max="2"><span class="unit">คน</span></div>
						</div>
						<div class="list">
							<div class="col-sm-5"><label>Single room</label></div>
							<div class="col-sm-4 col-xs-7"><p>53,168 บาท / คน</p></div>
							<div class="col-sm-3 col-xs-5"><input type="number" value="0" value="0" min="1" max="2"><span class="unit">คน</span></div>
						</div>
						<!-- <div class="list">
							<div class="amount"><p><span> 0</span> Children</p></div>
						</div> -->
						<!-- <div class="list">
							<div class="col-sm-5"><label>Children 2-12 Year old <br><span>(without bed)</span></label><br>
							</div>
							<div class="col-sm-4 col-xs-7"><p>45,953 บาท / คน</p></div>
							<div class="col-sm-3 col-xs-5"><input type="number" value="0" value="0" min="1" max="2"><span class="unit">คน</span></div>
						</div>
						<div class="list">
							<div class="col-sm-5"><label>Children 2-12 Year old <br><span>(with bed)</span></label></div>
							<div class="col-sm-4 col-xs-7"><p>53,168 บาท / คน</p></div>
							<div class="col-sm-3 col-xs-5"><input type="number" value="0" value="0" min="1" max="2"><span class="unit">คน</span></div>
						</div> -->
						<!-- <div class="list">
							<div class="amount"><p><span> 0</span> Infant</p></div>
						</div> -->
						<!-- <div class="list">
							<div class="col-sm-5"><label>Children < 2 year old</label><br>
							</div>
							<div class="col-sm-4 col-xs-7"><p>45,953 บาท / คน</p></div>
							<div class="col-sm-3 col-xs-5"><input type="number" value="0" value="0" min="1" max="2"><span class="unit">คน</span></div>
						</div> -->
						<hr>
						<div class="list total-amount">
							<div class="col-sm-5"><label>รวมทั้งสิ้น</label></div>
							<div class="col-sm-4"><p class="total"> 91,906 บาท</p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="btn-wrapper">
			<div class="col-sm-4 col-sm-offset-4">
				<a href="easypkg-booking3.html" class="btn bold">Next <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
						<a href="#"><img src="assets/images/ico-line.png" alt=""></a>
					</div>
					<div class="contact">
						<h2>Contact Us</h2>
						<p>02-222-2222</p>
					</div>
				</div>
			</div>
		</div>
		<div class="strap"></div>
	</footer>
</body>
<script>
	$('.list input[type=number]').change(function(){
		var total = 0 ;
		$('.list input[type=number]').each(function(){
			total += parseInt($(this).val());
		});
		$('.list .amount b').text(total);
	});

	$('#checkaccount .btn.border').click(function(){
		$(this).closest('#checkaccount').addClass('hide');
		$('#noaccount').fadeIn(500);
	});
</script>
</html>
