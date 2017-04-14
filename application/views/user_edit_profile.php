<?php
/*****************Session*****************/
$lang = $this->session->userdata('lang');
$session = $user_data->row_array(0);
$country = $this->session->userdata('country');
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
	<header class="user edit">
		<div class="container-fulid clearfix">
			<div class="header-box">
				<div class="language-box">
					<a class="current" href="#">
						<img src="assets/images/ico-en.png" alt="">
					</a>
					<a href="#">
						<img src="assets/images/ico-th.png" alt="">
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
					<a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
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
							<li><a href="_signin?from=tt" class="btn">Sign In</a></li>
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
			<div class="row profile">
				<div class="col-xs-12">
					<h1><span>Edit Profile</span>
					<?=$session['client_firstName']." ".$session['client_middleName']." ".$session['client_lastName']?></h1>
				</div>
			</div>
		</div>
	</header>
	<div class="container content">
		<div class="row top-mg">
			<div class="col-xs-12">
				<div class="title-header">
					<h2>Personal information</h2>
					<div class="line">
						<div class="tab"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="form-group">
					<form id="submmituserupdate" action="user-update-profile" method="post" enctype="multipart/form-data">
					<div>
						<div class="col-md-6">
							<label for="">Name - Surname * (eg. Peter Smith)</label><br>
							<?php
							if($session['client_middleName'] == ''){
								echo '<input type="text" name="fullname" value="'.$session['client_firstName'].' '.$session['client_lastName'].'" required><br>';
							}else{
								echo '<input type="text" name="fullname" value="'.$session['client_firstName'].' '.$session['client_middleName'].' '.$session['client_lastName'].'" required><br>';
							}
							 ?>
						</div>
						<div class="col-md-6">
							<label for="">LINE ID *</label><br>
							<input type="text" name="lineId" value="<?=$session['client_lineId']?>" required><br>
						</div>
						<div class="col-md-6 used">
							<label for="">Email *
							</label><br>
							<input type="text" placeholder="Use a Username" value="<?=$session['client_email']?>" disabled><br>
							<input type="hidden" name="email" value="<?=$session['client_email']?>">
						</div>
						<div class="col-md-6">
							<label for="">Telephone Number *</label><br>
							<input type="text" name="tel" placeholder="Use a Password" value="<?=$session['client_tel']?>" required><br>
						</div>
						<div class="col-md-6">
							<label for="">Passport Image *</label><br>
							<div class="upload">
								<img id="session-passportImg" src="<?=base_url()?>filestorage/image/client/passport/<?=$session['client_passportRefImg']?>.jpg" alt="passport image" session-path="<?=$session['client_passportRefImg']?>">
								<input pointer="img1" name="passportImg[]" class="img" type="file"><br>
							</div>
						</div>
						<div class="col-md-6">
							<label for="">Passport No. *</label><br>
							<input type="text" name="passportNumber" value="<?=$session['client_passportNumber']?>" required><br>
						</div>
						<div class="col-md-6">
							<label for="">Date of Brith *</label><br>
							<input type="text" name="dob" class="dob-picker" value="<?=date_format(date_create($session['client_dob']),"Y-m-d")?>" required><br>
						</div>
						<div class="col-md-12">
							<label for="">Current Address</label><br>
							<textarea name="address" class="address"><?=$session['client_address']?></textarea>
						</div>
						<div class="col-md-12">
						<hr>
							<p class="note"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
							If you change your<span> telephonum number.</span> it will change your password accordingly.</p>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="btn-wrapper">
			<div class="col-sm-4 col-sm-offset-4">
				<button id="submitupdatebutton" class="btn bold">SAVE</button>
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
	</footer>
</body>
<script>
	$(document).ready(function(){
	});

	$('.upload img').click(function(){
		$(this).siblings('.img').click();
	});

	$(".img").change(function(){
		readURL(this,$(this).attr('pointer'));
	});

	$('.dob-picker').datepicker({
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true,
		maxDate: "0D",
		monthNamesShort: $.datepicker.regional["en"].monthNames
	});

	$('#submitupdatebutton').click(function(){
		document.forms['submmituserupdate'].submit();
	});

	function readURL(input,pointer) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('.upload input[pointer="'+pointer+'"]').siblings('img').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}
</script>
</html>
