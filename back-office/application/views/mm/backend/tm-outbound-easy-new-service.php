<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PB Agency Office</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="<?=base_url()?>assets2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?=base_url()?>assets2/css/dropzone.css">
	<script src="<?=base_url()?>assets2/js/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url()?>assets2/js/jquery.cropit.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets2/css/style.css">
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
			<?php include('pagepart/backtop.php')?>
		</div>
	</header>
	<div class="body-wrapper">
		<?php include('pagepart/backside.php')?>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
							<h1>New Easy Package</h1>
							<p>Outbound | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="Thai Tour Name">
						</div>	
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="English Tour Name">
						</div>					
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Continent</label>
								<select>
									<option>All Continent</option>
									<option>Continent</option>
									<option>Continent</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Country</label>
								<select>
									<option>All Country</option>
									<option>Country</option>
									<option>Country</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Starter Price</label><br>
							<input type="number"><span class="unit">THB</span>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6">
							<label class="filter">Day Night Program : </label> 3 Nights 2 Day
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new.html" class="btn">TOUR INFO</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new-service.html" class="btn current">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new-condition.html" class="btn no-setting">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header">
						<div class="header">
							<h2>Air Ticket</h2>
						</div>
						<div class="header-card no-pd">
							<div class="col-sm-4">
								<p>Airway</p>
							</div>
							<div class="col-sm-3">
								<p>Departure</p>
							</div>
							<div class="col-sm-2">
								<p>Arrival</p>
							</div>
							<div class="col-sm-2">
								<p>Price</p>
							</div>
						</div>
						<hr>
						<div class="content">
							<div class="col-xs-12">
								<h3>Day 1</h3><br>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" placeholder="Airway Name">
								</div>
								<div class="col-sm-3">
									<input type="text" placeholder="Flight Name">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Departure">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Arrival">
								</div>
								<div class="col-sm-1">
									<div class="btn no-border gray">Delete</div>
								</div>
							</div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
						<div class="content">
							<div class="col-xs-12">
								<hr><h3>Day 2</h3><br>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" placeholder="Airway Name">
								</div>
								<div class="col-sm-3">
									<input type="text" placeholder="Flight Name">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Departure">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Arrival">
								</div>
								<div class="col-sm-1">
									<div class="btn no-border gray">Delete</div>
								</div>
							</div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
						<div class="content">
							<div class="col-xs-12">
								<hr><h3>Day 3</h3><br>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" placeholder="Airway Name">
								</div>
								<div class="col-sm-3">
									<input type="text" placeholder="Flight Name">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Departure">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="text" placeholder="Arrival">
								</div>
								<div class="col-sm-1">
									<div class="btn no-border gray">Delete</div>
								</div>
							</div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
					</div>

					<div class="list-card card-header">
						<div class="header">
							<h2>Hotel</h2>
						</div>
						<div class="header-card no-pd">
							<div class="col-sm-4">
								<p>Hotel Name</p>
							</div>
							<div class="col-sm-2">
								<p>Stars</p>
							</div>
							<div class="col-sm-3">
								<p>Location</p>
							</div>
							<div class="col-sm-2">
								<p>Price</p>
							</div>
						</div>
						<hr>
						<div class="content">
							<div class="col-xs-12">
								<h3>Day 1</h3><br>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" placeholder="Hotel Name">
								</div>
								<div class="col-sm-2">
									<select>
										<option>3 Stars</option>
										<option>4 Stars</option>
										<option>5 Stars</option>
									</select>
								</div>
								<div class="col-sm-3 col-xs-6">
									<input type="text" placeholder="Location">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="number" placeholder="Price">
								</div>
								<div class="col-sm-1">
									<div class="btn no-border gray">Delete</div>
								</div>
							</div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
						<div class="content">
							<div class="col-xs-12">
								<hr><h3>Day 2</h3><br>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<input type="text" placeholder="Hotel Name">
								</div>
								<div class="col-sm-2">
									<select>
										<option>3 Stars</option>
										<option>4 Stars</option>
										<option>5 Stars</option>
									</select>
								</div>
								<div class="col-sm-3 col-xs-6">
									<input type="text" placeholder="Location">
								</div>
								<div class="col-sm-2 col-xs-6">
									<input type="number" placeholder="Price">
								</div>
								<div class="col-sm-1">
									<div class="btn no-border gray">Delete</div>
								</div>
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

	$('.title-bar-wrapper input[type="checkbox"]').change(function() {
		var checkname = this.name;
		if($(this).is(':checked')){
			$('#'+checkname+',.'+checkname).removeClass('hide');
		}else{
			$('#'+checkname+',.'+checkname).addClass('hide');
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



