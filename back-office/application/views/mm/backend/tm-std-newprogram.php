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
			<?php include('pagepart/backtop.php')?>
		</div>
	</header>
	<div class="body-wrapper">
		<?php include('pagepart/backside.php')?>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-sm-8 col-xs-12">
							<h1>New Standard Tour</h1>
							<input type="text" placeholder="Tour Name">
						</div>
						<div class="col-sm-4 col-xs-12">
							<label>Day Night Program</label>
							<select>
								<option disabled selected>Select Day Night</option>
								<option>1 Night / 2 Days</option>
								<option>2 Nights / 3 Days</option>
								<option>3 Nights / 4 Days</option>
								<option>4 Nights / 5 Days</option>
							</select>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-md-4 col-md-push-8 col-sm-6 col-xs-12">
							<label>Program Code</label><br>
							<input type="text">
						</div>
						<div class="col-md-4 col-md-pull-4 col-sm-6 col-xs-12 label-level">
							<div class="btn border light full" data-toggle="modal" id="pdf" data-target="#addFile">
								<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Click Upload pdf file
							</div>
						</div>
						<div class="col-md-4 col-md-pull-4 col-sm-6 col-xs-12 label-level">
							<div class="btn border light full" data-toggle="modal" id="word" data-target="#addFile">
								<i class="fa fa-file-word-o" aria-hidden="true"></i> Click Upload word file
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="list-card card-header day-tour-program">
						<div class="header">
							<h2>Day 1</h2>
							<div class="btn no-border light" data-toggle="modal" data-target="#addWhere"><i class="fa fa-plus" aria-hidden="true"></i> Add Where To Go</div>
						</div>
						<div class="where-to-go">
							<div class="form-group">
								<div class="col-md-10 col-xs-12">
									<div class="form-inline">
										<label for="">Where To Go</label>
										<span>
											<select>
												<option disabled selected>Select City</option>
												<option>Yangon</option>
												<option>Mandalay</option>
												<option>Heho</option>
											</select>
										</span>
									</div>
								</div>
								<div class="location">
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
								</div>
							</div>
							<!-- <div class="form-group">
								<div class="col-md-10 col-xs-12">
									<div class="form-inline">
										<label for="">Where To Go</label>
										<span>
											<select>
												<option disabled selected>Select City</option>
												<option>Yangon</option>
												<option>Mandalay</option>
												<option>Heho</option>
											</select>
										</span>
									</div>
								</div>
								<div class="location hide">
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
									<div class="col-md-3 col-sm-4 col-xs-6">
										<p><input type="checkbox">Location</p>
									</div>
								</div>
							</div> -->
							<div class="clear"></div>
							<hr>
						</div>
						<div class="header-card">
							<div class="col-md-2 text-center no-pd">
								<p>Service</p>
							</div>
							<div class="col-md-10 text-right">
								<p>Price</p>
							</div>
						</div>
						<div class="content">
							<div class="form-group">
								<div class="col-md-2">
									<div class="btn hotel">
										<p>Hotel</p>
									</div>
								</div>
								<div class="col-md-7">
									<select>
										<option disabled selected>Select City</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
									<div class="row">
										<div class="col-md-4">
											<select>
												<option disabled selected>Select Hotel Star</option>
												<option>3 Stars</option>
												<option>4 Stars</option>
												<option>5 Stars</option>
											</select>
										</div>
										<div class="col-md-8">
											<select>
												<option disabled selected>Select Hotel</option>
												<option>Hotel</option>
												<option>Hotel</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="col-sm-12 col-xs-6 bottom-mg">
										<h3>0 USD</h3>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 col-xs-6">
										<div class="btn no-border light">Delete</div>
									</div>
								</div>
								<div class="col-xs-12">
									<hr>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<div class="btn vehicle">
										<p>Vehicle</p>
									</div>
								</div>
								<div class="col-md-7">
									<select>
										<option disabled selected>Select City</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
									<select>
										<option disabled selected>Select Route</option>
										<option>Route</option>
										<option>Route</option>
									</select>
								</div>
								<div class="col-md-3">
									<div class="col-sm-12 col-xs-6 bottom-mg">
										<h3>0 USD</h3>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 col-xs-6">
										<div class="btn no-border light">Delete</div>
									</div>
								</div>
								<div class="col-xs-12">
									<hr>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<div class="btn meal">
										<p>Meal</p>
									</div>
								</div>
								<div class="col-md-7">
									<select>
										<option disabled selected>Select City</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
									<div class="row">
										<div class="col-md-4">
											<select>
												<option disabled selected>Select Mealtime</option>
												<option>Lunch</option>
												<option>Dinner</option>
											</select>
										</div>
										<div class="col-md-8">
											<select>
												<option disabled selected>Select Meal</option>
												<option>Meal</option>
												<option>Meal</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="col-sm-12 col-xs-6 bottom-mg">
										<h3>0 USD</h3>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 col-xs-6">
										<div class="btn no-border light">Delete</div>
									</div>
								</div>
								<div class="col-xs-12">
									<hr>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<div class="btn ticket">
										<p>Ticket</p>
									</div>
								</div>
								<div class="col-md-7">
									<select>
										<option disabled selected>Select City</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
									<select>
										<option disabled selected>Select Destination</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
								</div>
								<div class="col-md-3">
									<div class="col-sm-12 col-xs-6 bottom-mg">
										<h3>0 USD</h3>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 col-xs-6">
										<div class="btn no-border light">Delete</div>
									</div>
								</div>
								<div class="col-xs-12">
									<hr>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<div class="btn other">
										<p>Other</p>
									</div>
								</div>
								<div class="col-md-7">
									<select>
										<option disabled selected>Select City</option>
										<option>Yangon</option>
										<option>Mandalay</option>
										<option>Heho</option>
									</select>
									<select>
										<option disabled selected>Select Item</option>
										<option>Item</option>
										<option>Item</option>
										<option>Item</option>
									</select>
								</div>
								<div class="col-md-3">
									<div class="col-sm-12 col-xs-6 bottom-mg">
										<h3>0 USD</h3>
									</div>
									<div class="clear"></div>
									<div class="col-sm-12 col-xs-6">
										<div class="btn no-border light">Delete</div>
									</div>
								</div>
								<div class="col-xs-12">
									<hr>
								</div>
							</div>
						</div>
						<div class="add-service">
							<p>Click to Insert Service</p>
							<div class="btn-wrapper">
								<div class="btn hotel"></div>
								<div class="btn vehicle"></div>
								<div class="btn meal"></div>
								<div class="clear xs"></div>
								<div class="btn ticket"></div>
								<div class="btn other"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>

	<!-- modal -->
	<div class="modal fade" id="addFile" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Upload <b></b> File</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">Select File</label><br>
				<input type="file">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Select" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>


  	<div class="modal fade" id="addWhere" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add <b></b> Flight</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<label class="filter">Airway</label><br>
	        			<select>
							<option disabled selected >Select Airway</option>
							<option>Airway</option>
							<option>Airway</option>
							<option>Airway</option>
						</select>
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Flight Name</label><br>
	        			<input type="text">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Via</label><br>
	        			<input type="text">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Departure</label><br>
	        			<input type="text">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Arrival</label><br>
	        			<input type="text">
	        		</div>
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
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
<script>
    $('.title-bar-wrapper .btn').click(function(){
    	$('#addFile .modal-header .modal-title b').text($(this).attr('id'));
    });
</script>
</html>
