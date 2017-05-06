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
						<div class="col-sm-8 col-xs-12">
							<h1>Location Data</h1>
							<p>Outbound | Supermarket Tours</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div class="btn no-border gray">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
								<span>Delete Country</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<?php
					if(isset($continent)){
						foreach ($continent->result_array() as $row) {
							$index = $row['continent_id'];
					?>
					<div class="list-card top card-header">
						<div class="header">
							<h2><?=$row['continent_name']?></h2>
							<div class="btn no-border light" data-toggle="modal" data-target="#addLocation"><i class="fa fa-plus" aria-hidden="true"></i> Add Location</div>
						</div><hr><br>
					<?php
						foreach($country->result_array() as $row){
							if($index == $row['continent_id']){
					?>
						<div class="col-xs-12">
							<div class="list">
								<div class="content no-bottom-mg">
									<div class="col-sm-5 col-xs-8">
										<p><?=$row['country_nameEN']?></p> <p><?=$row['country_nameTH']?></p>
									</div>
								</div>
								<div class="input-box btn-inline">
									<a class="btn gray hide delete" region="<?=$index?>" province="<?=$row['country_nameEN']?>">Delete</a>
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
	          <h4 class="modal-title">New Country in <b></b></h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<label>Country Name</label><br>
						<input id="countryEN" type="text" placeholder="English Name"><br>
						<label>ชื่อประเทศ</label><br>
						<input id="countryTH" type="text" placeholder="Thai Name">
	        		</div>
	        	</div>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input id="addCountry" type="submit" value="Add" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
<script>
	$(document).ready(function(){
		$('a[href="outbound-location-data"]').find('li').eq(0).addClass('current');
	});

	$('.title-bar-wrapper .btn').click(function(){
		$('.list-card .btn.gray').toggleClass('hide');
		if($(this).find('span').text()=='Delete Country'){
			$(this).find('span').text('Hide Buttoms');
		}else if($(this).find('span').text()=='Hide Buttoms'){
			$(this).find('span').text('Delete Country');
		}
	});

	$('.list-card .btn.no-border').click(function() {
		$('.modal-title b').text($(this).closest('.list-card').find('.header h2').text());
	});

	$('#addCountry').click(function(){
		$temp = $('.modal-title').text().split(" ");
		$continent = $temp[3];
		$countryEN = $('#countryEN').val()
		$countryTH = $('#countryTH').val();
		$.ajax({
	    type: 'POST',
	    url:'/insert-outbound-location',
			data:{
				'continent': $continent,
				'countryEN': $countryEN,
				'countryTH': $countryTH
				},
	    success:function(data){
				if(data == 1){
					alert('This country is existed');
					$('#countryEN').val('');
					$('#countryTH').val('');
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
