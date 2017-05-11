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
							<h1>Nok Air Packages</h1>
							<p>Promotion</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<a href="tm-mc-promotion-pkg-new.html" class="btn">New Packages</a>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label>Hilight Banner</label><br>
							<select>
								<option>None</option>
								<option>Large Banner</option>
								<option>Small Banner 1</option>
								<option>Small Banner 2</option>
							</select>
						</div>
						<div class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-2 col-xs-12 label-level">
							<div class="btn border light" data-toggle="modal" id="pdf" data-target="#addFile">
								Upload Image Cover
							</div>
						</div>
						<div class="col-md-1 col-sm-2 col-xs-12 label-level">
							<a href="#" class="btn border">
								Edit  <i class="fa fa-angle-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper top-mg">
				<div class="row text-center">
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="assets/images/img-nok-p1.jpg" alt="">
								<div class="img-des">
									<p>เริ่มต้น 14,900 THB<br>
									<span>5 Day 3 Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date">เริ่ม ก.ค. - ก.ย. 59</p>
								<div class="btn-wrapper">
									<a href="#" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="assets/images/img-nok-p2.jpg" alt="">
								<div class="img-des">
									<p>เริ่มต้น 14,900 THB<br>
									<span>5 Day 3 Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date">เริ่ม ก.ค. - ก.ย. 59</p>
								<div class="btn-wrapper">
									<a href="#" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="assets/images/img-nok-p3.jpg" alt="">
								<div class="img-des">
									<p>เริ่มต้น 14,900 THB<br>
									<span>5 Day 3 Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date">เริ่ม ก.ค. - ก.ย. 59</p>
								<div class="btn-wrapper">
									<a href="#" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="assets/images/img-nok-p4.jpg" alt="">
								<div class="img-des">
									<p>เริ่มต้น 14,900 THB<br>
									<span>5 Day 3 Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date">เริ่ม ก.ค. - ก.ย. 59</p>
								<div class="btn-wrapper">
									<a href="#" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="tour-box">
							<div class="img">
								<img src="assets/images/img-nok-p5.jpg" alt="">
								<div class="img-des">
									<p>เริ่มต้น 14,900 THB<br>
									<span>5 Day 3 Night</span></p>
								</div>
							</div>
							<div class="description">
								<p class="date">เริ่ม ก.ค. - ก.ย. 59</p>
								<div class="btn-wrapper">
									<a href="#" class="btn gray">Delete</a>
									<a href="#" class="btn"> Edit </a>
								</div>
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
	          <h4 class="modal-title">Upload Image Cover</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<p><span>Select File</span> Recommend Size 1425px x 420px</p><br>
				<input type="file">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Select" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
</html>



