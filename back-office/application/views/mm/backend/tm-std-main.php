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
							<h1>Standard Program</h1>
							<p>All Port in - Port out</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#newPort" class="btn">New Port</div>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<label class="filter">Arrival airport</label><br>
							<select>
								<option>All Port</option>
								<option>port</option>
								<option>port</option>
								<option>port</option>
							</select>
						</div>
						<div class="col-md-4 col-sm-6">
							<label class="filter">Departure airport</label><br>
							<select>
								<option>All Port</option>
								<option>port</option>
								<option>port</option>
								<option>port</option>
							</select>
						</div>
						<div class="col-md-4 col-xs-12">
							<div href="#" class="btn no-border gray label-level">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
								<span>Delete Ports</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="list-card">
						<div class="col-sm-3 col-xs-6">
							<h4>Arrival airport</h4>
							<h2>Yangon</h2>
						</div>
						<div class="col-sm-3 col-xs-6">
							<h4>Departure airport</h4>
							<h2>Yangon</h2>
						</div>
						<div class="input-inline">
							<div class="digi-box">
								<p>18&nbsp;Tours</p>
							</div>
							<div class="input-box btn-inline">
								<a href="#" class="btn gray hide">Delete</a>
								<a href="mm-std-programtour" class="btn border">View <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
					<div class="list-card">
						<div class="col-sm-3 col-xs-6">
							<h4>Arrival airport</h4>
							<h2>Yangon</h2>
						</div>
						<div class="col-sm-3 col-xs-6">
							<h4>Departure airport</h4>
							<h2>Mandalay</h2>
						</div>
						<div class="input-inline">
							<div class="digi-box">
								<p>22&nbsp;Tours</p>
							</div>
							<div class="input-box btn-inline">
								<a href="#" class="btn gray hide">Delete</a>
								<a href="mm-std-programtour" class="btn border">View <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</main>
	</div>

	<div class="modal fade" id="newPort" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add New Port</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">Arrival airport</label><br>
				<select>
					<option disabled selected >Select Location Port</option>
					<option>port</option>
					<option>port</option>
					<option>port</option>
				</select><br>
				<label class="filter">Departure airport</label><br>
				<select>
					<option disabled selected >Select Location Port</option>
					<option>port</option>
					<option>port</option>
					<option>port</option>
				</select>
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
	$('.btn.label-level').click(function(){
		$('.list-card .btn.gray').toggleClass('hide');
		if($(this).find('span').text()=='Delete Ports'){
			$(this).find('span').text('Hide Buttoms');
		}else if($(this).find('span').text()=='Hide Buttoms'){
			$(this).find('span').text('Delete Ports');
		}
	});
</script>
</html>
