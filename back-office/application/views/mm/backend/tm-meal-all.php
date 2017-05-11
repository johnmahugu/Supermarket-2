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
							<h1>Shop Travel</h1>
							<p>Meal in Yangon</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<a href="st-addMeal?cityid=<?php echo $this->input->get('cityid');?>" class="btn">New Meal</a>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-md-4 col-sm-9">
							<div class="input-inline">
								<div class="digi-box">
									<p>17&nbsp;Meal</p>
								</div>
								<div class="input-box">
									<label class="filter">Mealtime</label>
									<select>
										<option>All Mealtime</option>
										<option>Lunch</option>
										<option>Dinner</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="header-card with-btn">
						<div class="col-md-9 col-sm-4">
							<p>Restaurant</p>
						</div>
						<div class="col-md-3 col-sm-3">
							<p>Price</p>
						</div>
					</div>
					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-9 col-xs-12">
									<p>Bangkok Kitchen </p>
									<div class="clear"></div>
									<p><span> Lunch / Dinner </span></p>
								</div>
								<div class="col-sm-3 col-xs-12">
									<p><span class="tag">B2C</span>15 USD</p><br>
									<p><span class="tag">B2B</span>12 USD</p>
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="#" class="btn border light">Delete</a>
									<div class="clear"></div>
									<a href="tm-meal-edit.html" class="btn light">Edit</a>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : 20 MAR 2017 at 10:10</p>
						</div>
					</div>
					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-9 col-xs-12">
									<p>Bangkok Kitchen </p>
									<div class="clear"></div>
									<p><span> Dinner </span></p>
								</div>
								<div class="col-sm-3 col-xs-12">
									<p><span class="tag">B2C</span>15 USD</p><br>
									<p><span class="tag">B2B</span>12 USD</p>
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="#" class="btn border light">Delete</a>
									<div class="clear"></div>
									<a href="tm-meal-edit.html" class="btn light">Edit</a>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : 20 MAR 2017 at 10:10</p>
						</div>
					</div>
					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-9 col-xs-12">
									<p>Bangkok Kitchen </p>
									<div class="clear"></div>
									<p><span> Lunch </span></p>
								</div>
								<div class="col-sm-3 col-xs-12">
									<p><span class="tag">B2C</span>15 USD</p><br>
									<p><span class="tag">B2B</span>12 USD</p>
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="#" class="btn border light">Delete</a>
									<div class="clear"></div>
									<a href="tm-meal-edit.html" class="btn light">Edit</a>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : 20 MAR 2017 at 10:10</p>
						</div>
					</div>
				</div>

			</div>
		</main>

		<!-- modal -->
		<div class="modal fade" id="addSize" role="dialog">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		          <h4 class="modal-title">Add Vehicle Size</h4>
		          <hr>
		        </div>
		        <div class="modal-body">
		        	<div class="col-xs-12">
		        		<label>New Size</label><br>
						<input type="text" placeholder="Vehicle Size Name">
		        	</div>
		        	<div class="col-sm-6 col-xs-12">
						<input type="number" min="0" placeholder="Start From">
						<span class="unit">Pax</span>
		        	</div>
					<div class="col-sm-6 col-xs-12">
						<input type="number" min="0" placeholder="To">
						<span class="unit">Pax</span>
		        	</div>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Submit" class="btn" >
		        </div>
		      </div>
		    </div>
	  	</div>

	  	<div class="modal fade" id="editSize" role="dialog">
		    <div class="modal-dialog modal-md">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		          <h4 class="modal-title">Edit Vehicle Size</h4>
		          <hr>
		        </div>
		        <div class="modal-body">
		        	<div class="col-xs-12">
		        		<label>Edit Size</label><br>
						<input type="text" name="size" placeholder="Vehicle Size Name">
		        	</div>
		        	<div class="col-sm-6 col-xs-12">
						<input type="number" name="from" placeholder="Start From">
						<span class="unit">Pax</span>
		        	</div>
					<div class="col-sm-6 col-xs-12">
						<input type="number" name="to" placeholder="To">
						<span class="unit">Pax</span>
		        	</div>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Save" class="btn" >
		        </div>
		      </div>
		    </div>
	  	</div>

	</div>
</body>
<script src="assets/js/script.js"></script>
<script>
	$('.title-bar-wrapper .tag').click(function() {
		$('#editSize input[name="size"]').val($(this).text());
		var comma = ($(this).attr('alt')).indexOf(",");
		var from = ($(this).attr('alt')).substring(0,comma);
		var to = ($(this).attr('alt')).substring((comma+1),($(this).attr('alt')).length);
		$('#editSize input[name="from"]').val(from);
		$('#editSize input[name="to"]').val(to);
	});
</script>
</html>
