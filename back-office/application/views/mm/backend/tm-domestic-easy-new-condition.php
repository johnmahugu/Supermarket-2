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
							<p>Domestic | Supermarket Tours</p><br>
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
								<label class="filter">Region</label>
								<select>
									<option>All Region</option>
									<option>Region</option>
									<option>Region</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Province</label>
								<select>
									<option>All Province</option>
									<option>Province</option>
									<option>Province</option>
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
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="option">Tour Options</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="multiple">Multiple Options</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="pv">Private Group</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox">Double Pack Condition</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
						<div class="col-sm-4 no-pd">
							<a href="tm-domestic-easy-new.html" class="btn">TOUR INFO</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-domestic-easy-new-service.html" class="btn">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-domestic-easy-new-condition.html" class="btn current">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header" id="room">
						<div class="header">
							<h2>Room Condition</h2>	
						</div>
						<div class="content">
							<div class="form-group cb-nonselect">
								<div class="col-md-4 col-sm-6">
									<input type="checkbox">
									<p>Single Room</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
										<input type="number" placeholder="Price" disabled>
										<span class="unit">THB</span>
									</span>
								</div>
							</div>
							<div class="form-group cb-nonselect">
								<div class="col-md-4 col-sm-6">
									<input type="checkbox">
									<p>Children 2 - 12 yrs (with bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
										<input type="number" placeholder="Price" disabled>
										<span class="unit">THB</span>
									</span>
								</div>
							</div>
							<div class="form-group cb-nonselect">
								<div class="col-md-4 col-sm-6">
									<input type="checkbox">
									<p>Children 2 - 12 yrs (without bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
										<input type="number" placeholder="Price" disabled>
										<span class="unit">THB</span>
									</span>
								</div>
							</div>
							<div class="form-group cb-nonselect">
								<div class="col-md-4 col-sm-6">
									<input type="checkbox">
									<p>Children < 2 yrs</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
										<input type="number" placeholder="Price" disabled>
										<span class="unit">THB</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="list-card card-header hide" id="option">
						<div class="header">
							<h2>Tour Options</h2>	
						</div>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<input type="text" placeholder="Option Name">
								</div>
								<div class="col-md-3 form-inline">
									<label>Condition</label>
									<span>
										<select>
											<option>Pay increase</option>
											<option>Discount</option>
										</select>
									</span>
								</div>
								<div class="col-md-3">
									<input type="number" placeholder="Price">
									<span class="unit">THB</span>
								</div>
								<div class="col-md-2">
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
					<div class="list-card card-header hide" id="multiple">
						<div class="header">
							<h2>Multiple Options Condition</h2>	
						</div>
						<div class="content">
							<div class="form-group">
								<div class="col-md-9">
									<input type="text" placeholder="Description">
								</div>
								<div class="col-md-3 form-inline">
									<label>Condition</label>
									<span>
										<select>
											<option>Pay increase</option>
											<option>Discount</option>
										</select>
									</span>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-md-6">
									<input type="text" placeholder="Option Name">
								</div>
								<div class="col-md-3">
									<input type="number" placeholder="Price">
									<span class="unit">THB</span>
								</div>
								<div class="col-md-2 col-md-offset-1">
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
					<div class="list-card card-header hide" id="pv">
						<div class="header">
							<h2>Private Group</h2>	
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-6 form-inline">
									<label>Select Private Group</label>
									<span>
										<input type="number" placeholder="Pay increase">
										<span class="unit">THB</span>
									</span>
								</div>
							</div>
							<hr>
							<div class="form-group">
								<div class="col-md-4 form-inline">
									<label>Up to</label>
									<span>
										<input type="number">
										<span class="unit">Pax</span>
									</span>
								</div>
								<div class="col-md-4 form-inline">
									<label>Pay increase</label>
									<span>
										<input type="number">
										<span class="unit">THB</span>
									</span>
								</div>
								<div class="col-md-4">
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



