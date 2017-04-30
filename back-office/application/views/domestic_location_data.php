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
					<li>Easy Package</li>
				</a>
				<a href="domestic-package?type=sp">
					<li>Series Package</li>
				</a>
				<a href="domestic-location-data">
					<li class="current">Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Outbound Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="outbound-package?type=ep">
					<li>Easy Package</li>
				</a>
				<a href="outbound-package?type=sp">
					<li>Series Package</li>
				</a>
				<a href="outbound-location-data">
					<li>Location Data</li>
				</a>
			</ul>
		</aside>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-sm-8 col-xs-12">
							<h1>Location Data</h1>
							<p>Domestic | Supermarket Tours</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="btn no-border gray">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
								<span>Delete Location</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<?php
					if(isset($region)){
						foreach ($region->result_array() as $row) {
							$index = $row['region_id'];
					?>
					<div class="list-card top card-header">
						<div class="header">
							<h2><?=$row['region_nameEN']?> region</h2>
							<div class="btn no-border light" data-toggle="modal" data-target="#addLocation"><i class="fa fa-plus" aria-hidden="true"></i> Add Location</div>
						</div><hr><br>
					<?php
						foreach($province->result_array() as $row){
							if($index == $row['region_id']){
					?>
						<div class="col-xs-12">
							<div class="list">
								<div class="content no-bottom-mg">
									<div class="col-sm-5 col-xs-8">
										<p><?=$row['province_nameEN']?></p>	<p><?=$row['province_nameTH']?></p>
									</div>
								</div>
								<div class="input-box btn-inline">
									<a class="btn gray hide delete" region="<?=$index?>" province="<?=$row['province_nameEN']?>">Delete</a>
								</div>
							</div>
						</div>
					<?php
								}
							}
							?>
							</div>
							<?php
						}
					}
					 ?>
				</div>
			</div>
		</main>
	</div>

	<div class="modal fade" id="addLocation" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">New Location in <b></b></h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-sm-12">
	        	<label>Location Name</label><br>
						<input id="provinceEN" type="text" placeholder="English Name"><br>
						<label>ชื่อจังหวัด</label><br>
						<input id="provinceTH" type="text" placeholder="Thai Name">
	        		</div>
	        	</div>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input id="addProvince" type="submit" value="Add" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
<script>
	$('.title-bar-wrapper .btn').click(function(){
		$('.list-card .btn.gray').toggleClass('hide');
		if($(this).find('span').text()=='Delete Location'){
			$(this).find('span').text('Hide Buttoms');
		}else if($(this).find('span').text()=='Hide Buttoms'){
			$(this).find('span').text('Delete Location');
		}
	});

	$('.list-card .btn.no-border').click(function() {
		$('.modal-title b').text($(this).closest('.list-card').find('.header h2').text());
	});

	$('#addProvince').click(function(){
		$temp = $('.modal-title').text().split(" ");
		$region = $temp[3];
		$provinceEN = $('#provinceEN').val()
		$provinceTH = $('#provinceTH').val();
		$.ajax({
	    type: 'POST',
	    url:'/insert-domestic-location',
			data:{
				'region': $region,
				'provinceEN': $provinceEN,
				'provinceTH': $provinceTH
				},
	    success:function(data){
				if(data == 1){
					alert('This province is existed');
					$('#provinceEN').val('');
					$('#provinceTH').val('');
				}else{
					$('#addLocation').removeClass('in');
		      $('.modal-backdrop.fade').removeClass('in');
					location.reload();
				}
	    }
	  });
	});

</script>
</html>
