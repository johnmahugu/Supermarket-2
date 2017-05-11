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
							<h1>Location Data</h1>
							<p><?php
							if($city2 != ''){
							foreach ($city2 as $value2) {
							$ctname = $value2->city_name;

							$position = strpos($ctname,"|");
							$eng = substr($ctname,$position+1) ;
							echo $eng ;
							} } ?></p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#addLocation" class="btn">New Location</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="header-card with-btn">
						<div class="col-md-9 col-sm-4">
							<p>Location</p>
						</div>
						<div class="col-md-3 col-sm-3">
							<p>Entrance fee</p>
						</div>
					</div>

					<?php
					if ($place2 != ''){
						foreach ($place2 as $valueq) {
								$entid = $valueq->ent_id;
								$fullname = $valueq->ent_name;
								$entfee = $valueq->ent_cost;
					?>
					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-9 col-xs-12">
									<p><span>EN</span><?php echo $this->AdminMD->cutEng($fullname);?>
									</p>
									<div class="clear"></div>
									<p><span>TH</span><?php echo $this->AdminMD->cutTha($fullname);?></p>
								</div>
								<div class="col-sm-3 col-xs-12">
									<p><?php echo $entfee; ?> USD</p>
								</div>
							</div>

							<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>
								<input type="hidden" value="<?php echo $this->AdminMD->cutEng($fullname); ?>" id="ennameforedit<?php echo $entid ; ?>">
								<input type="hidden" value="<?php echo $this->AdminMD->cutTha($fullname); ?>" id="thnameforedit<?php echo $entid ; ?>">
								<input type="hidden" value="<?php echo $entfee ; ?>" id="costforedit<?php echo $entid ; ?>">

							<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>


							<div class="input-inline">
								<div class="input-box">
									<a href="mm-delPlace?entid=<?php echo $entid ;?>&cityid=<?php echo $this->input->get('cityid');?>" class="btn border light">Delete</a>
									<div class="clear"></div>
									<div data-toggle="modal" data-target="#editPlace" class="btn light" onclick="editPlaceCall('<?php echo $entid ; ?>')">Edit</div>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : - </p>
						</div>
					</div>
					<?php }
							}?>

				</div>

			</div>
		</main>

	</div>

	<div class="modal fade" id="addLocation" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">New Location</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
			<form action="mm-addPlace" method="post" >
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<label>Location Name</label><br>
						<input type="text" placeholder="English Name" name="eng"><br>
						<label>ชื่อสถานที่</label><br>
						<input type="text" placeholder="Thai Name" name="tha">
	        		</div>
	        		<div class="col-md-8">
						<label>Entrance fee</label>
						<input type="number" name="fee">
						<span class="unit selector">
							<select name="currency" >
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
						<input type=hidden name="cityid" value="<?php $viewcity = $this->input->get('cityid'); echo $viewcity ;?>">
					</div>
	        	</div>

	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
							</form>
	        </div>
	      </div>
	    </div>
  	</div>
<div class="modal fade" id="editPlace" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Location</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
				<form action="mm-editPlace" method="post">
	        		<div class="col-sm-12">
	        			<label class="filter">Location Name</label><br>
	        			<input type="text" name="ennameshow" disabled >
	        			<input type="hidden" name="entidedit">
						<input type="hidden" value="<?php echo $this->input->get('cityid');?>" name="cityid">
	        			<input type="hidden" name="ennameedit">
	        		</div>
					<div class="col-sm-12">
	        			<label class="filter">ชื่อสถานที่</label><br>
	        			<input type="text" name="thnameshow" disabled >
	        			<input type="hidden" name="thnameedit">
	        		</div>

	        		<div class="col-sm-12">
						<label>Cost</label>
						<input type="number" name="costedit">
						<span class="unit selector">
							<select name="currencyedit">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>

	        	</div>

	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Edit" class="btn" >
				</form>
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
<script>
function editPlaceCall(dataId) {

	var enName = document.getElementById('ennameforedit'+dataId).value;
	var thName = document.getElementById('thnameforedit'+dataId).value;
	var cost = document.getElementById('costforedit'+dataId).value;

	$('input[name="ennameshow"]').val(enName);
	$('input[name="ennameedit"]').val(enName);
	$('input[name="thnameshow"]').val(thName);
	$('input[name="thnameedit"]').val(thName);
	$('input[name="costedit"]').val(cost);
	$('input[name="entidedit"]').val(dataId);


}


</script>
</html>
