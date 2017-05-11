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
				<img src="<?=base_url()?>assets2/images/logo.png" alt="">
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
							<h1>New Hotel</h1>
							<p>in <?php 
							foreach ($city2 as $value) {
								$ctname = $value->city_name ; 
								$ctname = "".$ctname;
								$position = strpos($ctname,"|");
								$eng = substr($ctname,$position+1) ;
								echo $eng ;
							}?></p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#duplicateFrom" class="btn">Duplicate From ...</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="English Name">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="Thai Name">
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Hotel Stars</label>
							<select>
								<option disabled selected >Select Hotel Stars</option>
								<option>3 Stars</option>
								<option>4 Stars</option>
								<option>5 Stars</option>
							</select>
						</div>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<label>Hotel Website</label>
							<input type="text" placeholder="Website Url">
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label class="filter">Season</label>
							<select>
								<option selected>High Season</option>
								<option >Low Season</option>
								<option >Songkran Festival</option>
							</select>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="guidePrice">Guide Price</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="GIT">G.I.T</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="free">Free Condition</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p><input type="checkbox" name="interRate">International Rate</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper start-item">
				<div class="row">
					<div class="col-xs-12">
						<div class="btn-wrapper text-right">
							<div data-toggle="modal" data-target="#addRoom" class="btn light bottom-mg">Add Room</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header price interRate hide">
						<div class="header">
							<h2>Pricing</h2> <span class="tag">THAI</span> 		
						</div>
						<hr>
						<div class="content"></div>
					</div>
					<div class="list-card card-header price interRate hide">
						<div class="header">
							<h2>Pricing</h2> <span class="tag">ASIAN</span> 
						</div>
						<hr>
						<div class="content"></div>
					</div>
					<div class="list-card card-header price">
						<div class="header">
							<h2>Pricing</h2> <span class="tag">All</span> 		
						</div>
						<hr>
						<div class="content"></div>
					</div>		
					<div class="list-card card-header hide" id="GIT">
						<div class="header">
							<h2>Group Individual Travellers (G.I.T)</h2>	
						</div>
						<hr>
						<div class="content"></div>
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
										<input type="number">
										<span class="unit">Pax</span>
									</span>
								</div>
								<div class="col-md-4 form-inline">
									<label>Free</label>
									<span>
										<input type="number">
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

					<div class="list-card card-header hide">
						<div class="header">
							<h2>Pricing</h2> <span class="tag">THAI</span> 		
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<label>Cost</label>
									<input type="number">
									<span class="unit selector">
										<select>
											<option>USD</option>
											<option>MMK</option>
										</select>
									</span>
								</div>
								<div class="col-md-4">
									<label><span class="tag">B2B</span>Price</label>
									<input type="number">
									<span class="unit selector">
										<select>
											<option>USD</option>
											<option>MMK</option>
										</select>
									</span>
								</div>
								<div class="col-md-4">
									<label><span class="tag">B2C</span>Price</label>
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
						<input type="submit" value="Add Hotel" class="btn bold">
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
		          <h4 class="modal-title">Duplicate Hotel Info</h4>
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
					<label class="filter">Hotel Name</label><br>
					<select>
						<option disabled selected >Select Hotel</option>
						<option>hotel</option>
						<option>hotel</option>
						<option>hotel</option>
					</select>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Submit" class="btn" >
		        </div>
		      </div>
		    </div>
	  	</div>

	  	<div class="modal fade" id="addRoom" role="dialog">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		          <h4 class="modal-title">Add Hotel Room</h4>
		          <hr>
		        </div>
		        <div class="modal-body">
					<label class="filter">Room Type</label><br>
					<input type="text" name="room">
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        	<div class="btn add" data-dismiss="modal">Add</div>
		        </div>
		      </div>
		    </div>
	  	</div>
	</div>
</body>
<script src="<?=base_url()?>assets2/js/script.js"></script>
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

	$('#addRoom .btn.add').click(function(){
		var room = $('#addRoom input[name="room"]').val();
		$('#addRoom input[name="room"]').val('');

		$('.main-wrapper').removeClass('start-item');

		$('.price .content').append('<div class="form-group">'+
		'<div class="col-md-4"><label><span class="tag room">'+room+'</span>Cost</label>'+
		'<input type="number"><span class="unit selector">'+
		'<select><option>USD</option><option>MMK</option></select></span></div>'+
		'<div class="col-md-3 col-sm-6"><label>B2B Price</label><input type="number">'+
		'<span class="unit selector"><select><option>USD</option><option>MMK</option></select></span></div>'+
		'<div class="col-md-3 col-sm-6"><label>B2C Price</label><input type="number">'+
		'<span class="unit selector"><select><option>USD</option><option>MMK</option></select></span></div>'+
		'<div class="col-md-2"><div class="btn no-border gray label-level">Delete</div></div></div>');

		$('#GIT .content').append('<div class="form-group"><div class="col-xs-12"><span class="tag room">'+room+'</span></div><div class="col-md-4 form-inline"><label>Up to</label><span><input type="number"><span class="unit">Room</span></span></div><div class="col-md-4 form-inline"><label>Cost</label><span><input type="number"><span class="unit selector"><select><option>USD</option><option>MMK</option></select></span></span></div></div>')

	});

</script>
</html>



