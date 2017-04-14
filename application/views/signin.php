<?php
/*****************Session*****************/
$lang = 'EN';
if(!empty($this->session->userdata('lang'))){
	$lang = $this->session->userdata('lang');
}
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
	<script src="assets/js/md5.js"></script>
</head>
<body class="signin">
	<div class="body-wrapper">
		<header class="">
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
					<a href="tel:0875012500"><div class="contact">
						<h2>Contact Us</h2>
						<p>02-222-2222</p>
					</div></a>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<a href="<?=base_url()?><?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
					</div>
				</div>
			</div>
		</header>
		<div class="login-box-wrapper">
			<div class="title-header">
				<h2>SIGN IN</h2>
				<div class="line">
					<div class="tab"></div>
				</div>
			</div>
			<div class="form-group">
				<form action="signin?from=<?php echo $this->session->flashdata('from')?>" method="post">
				<label for="username">USERNAME</label><br>
				<input name="username" type="text"><br>
				<label for="password">PASSWORD</label><br>
				<input name="password" type="password"><br>
				<p data-toggle="modal" data-target="#forget" >Forget Your Password</p>
				<input type="submit" value="SIGN IN" class="btn bold" >
				</form>
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

	<div class="modal fade" id="forget" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Forget Your Password</h4>
	        </div>
		       <div class="modal-body text-center">
		        <h4>Password is your phone number</h4>
		        <p>When you Booking with sevice from us.</p>
		       </div>
		       <div class="modal-footer">
		       </div>
	      </div>
	    </div>
  	</div>

<!--Modal Message From Server-->
		<div id="popup" class="modal fade" id="forget" role="dialog">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		          <h4 class="modal-title"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign-in failed</h4>
		        </div>
			        <div class="modal-body text-center">
			        	<h4 id="popup-title">Password is your phone number</h4>
			        	<p id="popup-desc">When you Booking with sevice from us.</p>
			        </div>
			        <div class="modal-footer">
			       </div>
		      </div>
		    </div>
	  	</div>

		<input id="msg_title" type="hidden" value="<?=$this->session->flashdata('msg_title');?>">
		<input id="msg_desc" type="hidden" value="<?=$this->session->flashdata('msg_desc');?>">
</body>
<script>
	$(document).ready(function() {
		if($('#msg_title').val() != ''){
			$('#popup-title').html($('#msg_title').val());
			$('#popup-desc').html($('#msg_desc').val());
			$('#popup').modal('show');
		}
	});
</script>
</html>
