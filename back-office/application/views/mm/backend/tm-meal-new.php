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
			<?php include('pagepart/backtop.php')?>
		</div>
	</header>
	<div class="body-wrapper">
		<?php include('pagepart/backside.php')?>
		<main>

			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-sm-8 col-xs-12 text-inline">
							<h1>New Meal</h1>
							<p>in <?php
							if ($city2 != ''){
								foreach ($city2 as $value2) {
								$ctname = $value2->city_name;
								$eng = $this->AdminMD->cutEng($ctname);
								echo $eng;
							}} ?></p>
							<input type="hidden" name="cityid" value="<?php echo $cityid;?>">
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#duplicateFrom" class="btn">Duplicate From ...</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 col-sm-6 col-xs-12">
							<label>Restaurant</label>
							<input type="text" placeholder="EN Name" name="resEngName">
						</div>
						<div class="col-md-4 col-sm-6 col-xs-12">
							<label class="filter">Season</label>
							<select disabled>
								<option selected>All Season</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="Lunch" value="IsLunch" checked>Lunch</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="Dinner" value="IsDinner" >Dinner</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="guidePrice" value="GuidePrice">Guide Price</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<!-- <p><input type="checkbox" name="free" value="IsFreeCondition">Free Condition</p> -->
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="list-card card-header">
						<div class="header">
							<h2>Pricing</h2>
							<span class="tag">
								<b id="Lunch">Lunch</b><b id="Dinner">Dinner</b>
							</span>
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<!-- <label>Menu Image</label> -->
									<!-- <form action="" class="dropzone dz-clickable uploadimg"></form> -->
								</div>
								<div class="col-md-8">
									<label>English <span class="tag">Menu</span></label><br><br>
									<textarea name="menuen" required></textarea><br>
									<label>Thai <span class="tag">Menu</span></label><br><br>
									<textarea name="menuth" required></textarea>
								</div>
							</div>
							<div class="form-group">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							</div>
								<div class="col-md-4">
									<label>Cost</label>
									<input type="number" name="cost">
									<span class="unit selector">
										<select name="CostCurrency">
											<option value="USD">USD</option>
											<option value="MMK">MMK</option>
										</select>
									</span>
								</div>

								<div class="col-xs-12">
									<hr>
								</div>
							</div>
						</div>
					</div>

					<div class="list-card card-header hide" id="free">
						<div class="header">
							<h2>Free Condition</h2>
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4 form-inline">
									<label>Up to</label>
									<span>
										<input type="number" name="FreeConStart">
										<span class="unit">Pax</span>
									</span>
								</div>
								<div class="col-md-4 form-inline">
									<label>Free</label>
									<span>
										<input type="number" name="Freepax">
										<span class="unit">Pax</span>
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
					<div class="list-card card-header hide" id="guidePrice">
						<div class="header">
							<h2>Guide Price</h2>
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<label><span class="tag">Guide</span>Price</label>
									<input type="number">
									<span class="unit selector">
										<select>
											<option>USD</option>
											<option>MMK</option>
										</select>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="btn-wrapper text-center">
						<input type="submit" value="Add Meal" class="btn bold">

					</div>
				</div>
			</div>
		</main>

		<!-- modal -->
		<div class="modal fade" id="duplicateFrom" role="dialog">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		          <h4 class="modal-title">Duplicate Meal Info</h4>
		          <hr>
		        </div>
		        <div class="modal-body">
					<label class="filter">City</label><br>
					<select>
						<option disabled selected >Select City</option>
						<option>location</option>
						<option>location</option>
						<option>location</option>
					</select>
					<label class="filter">Meal Name</label><br>
					<select>
						<option disabled selected >Select Meal</option>
						<option>Meal</option>
						<option>Meal</option>
						<option>Meal</option>
					</select>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Submit" class="btn" >
		        </div>
		      </div>
		    </div>
	  	</div>
	</div>
</body>
<script src="assets/js/dropzone.js"></script>
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

	CKEDITOR.replace( 'menuen',{
		toolbar :[{ name: 'paragraph', items : [ 'BulletedList']}],
	});
	CKEDITOR.replace( 'menuth',{
		toolbar :[{ name: 'paragraph', items : [ 'BulletedList']}],
	});

</script>
</html>
