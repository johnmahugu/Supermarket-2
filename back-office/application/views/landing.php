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

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
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
		<div class="main-wrapper">
			<div class="container-fuild">
				<div class="row">
					<div class="col-md-12">
						<div class="title-line">
							<h3>Tour Program</h3>
							<hr>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 card-menu">
						<?php
						if( substr($_SESSION['allAuth'],0,1) == "T"){
							echo '<a href="mm-std-main" class="card">
								<div class="ico tp"></div>
								<div class="text-box">
									<p>Standard Tours</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],1,1) == "T"){
							echo '<a href="#" class="card">
								<div class="ico tp"></div>
								<div class="text-box">
									<p>Easy Package</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],2,1) == "T"){
							echo '<a href="#" class="card">
								<div class="ico tp"></div>
								<div class="text-box">
									<p>Promotion</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],4,1) == "T"){
							echo '<a href="#" class="card">
								<div class="ico tp"></div>
								<div class="text-box">
									<p>Location Images</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],3,1) == "T"){
							echo '<a href="mm-locationdata" class="card">
								<div class="ico tp"></div>
								<div class="text-box">
									<p>Location Data</p>
								</div>
							</a>';
						}
					 ?>
					</div>
				</div>

				<div class="row top-mg">
					<div class="col-md-12 top-mg">
						<div class="title-line">
							<h3>Shop Travel</h3>
							<hr>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 card-menu">
						<?php
						if( substr($_SESSION['allAuth'],5,1) == "T"){
							echo '<a href="st-hotel" class="card">
								<div class="ico hotel"></div>
								<div class="text-box">
									<p>Hotel</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],6,1) == "T"){
							echo '<a href="st-vehicle" class="card">
								<div class="ico vehicle"></div>
								<div class="text-box">
									<p>Vehicle</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],7,1) == "T"){
							echo '<a href="st-meal" class="card">
								<div class="ico meal"></div>
								<div class="text-box">
									<p>Meal</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],8,1) == "T"){
							echo '<a href="st-ticket" class="card">
								<div class="ico ticket"></div>
								<div class="text-box">
									<p>Ticket</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],9,1) == "T"){
							echo '<a href="st-guide" class="card">
								<div class="ico guide"></div>
								<div class="text-box">
									<p>Guide</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],10,1) == "T"){
							echo '<a href="st-other" class="card">
								<div class="ico other"></div>
								<div class="text-box">
									<p>Other</p>
								</div>
							</a>';
						}
						 ?>
					</div>
				</div>

				<div class="row top-mg">
					<div class="col-md-12 top-mg">
						<div class="title-line">
							<h3>Domestic Tour</h3>
							<hr>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 card-menu">
						<?php
						if( substr($_SESSION['allAuth'],11,1) == "T"){
							echo '<a href="domestic-package?type=ep" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Easy Package</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],12,1) == "T"){
							echo '<a href="domestic-package?type=sp" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Series Package</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],13,1) == "T"){
							echo '<a href="domestic-location-data" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Location Data</p>
								</div>
							</a>';
						}
						 ?>
					</div>
				</div>

				<div class="row top-mg">
					<div class="col-md-12 top-mg">
						<div class="title-line">
							<h3>Outbound Tour</h3>
							<hr>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 card-menu">
						<?php
						if( substr($_SESSION['allAuth'],14,1) == "T"){
							echo '<a href="outbound-package?type=ep" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Easy Package</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],15,1) == "T"){
							echo '<a href="outbound-package?type=sp" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Series Package</p>
								</div>
							</a>';
						}
						if( substr($_SESSION['allAuth'],16,1) == "T"){
							echo '<a href="outbound-location-data" class="card">
								<div class="ico st"></div>
								<div class="text-box">
									<p>Location Data</p>
								</div>
							</a>';
						}
						?>
					</div>
				</div>

			</div>
		</div>

		</main>
	</div>
</body>
<script src="assets/js/script.js"></script>
</html>
