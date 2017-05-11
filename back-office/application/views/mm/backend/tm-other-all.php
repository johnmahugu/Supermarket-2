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
							<h1>Other Item</h1>
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
							<div data-toggle="modal" data-target="#addOther" class="btn">New Item</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="header-card with-btn">
						<div class="col-md-9 col-sm-4">
							<p>Item Name</p>
						</div>
						<div class="col-md-3 col-sm-3">
							<p>Cost</p>
						</div>
					</div>


					<?php
					if ($place2 != ''){
						foreach ($place2 as $valueq) {
								$entid = $valueq->other_id;
								$fullname = $valueq->other_type;
								$entfee = $valueq->other_cost;
					?>
					<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////
						$cuteng2 = $this->AdminMD->cutEng($fullname);
						$cuttha2 = $this->AdminMD->cutTha($fullname);
					?>
						<input type="hidden" value="<?php echo $entid ; ?>" id="entidedit<?php echo $entid ; ?>">
						<input type="hidden" value="<?php echo $cuteng2 ; ?>" id="engedit<?php echo $entid ; ?>">
						<input type="hidden" value="<?php echo $cuttha2 ; ?>" id="thaedit<?php echo $entid ; ?>">
						<input type="hidden" value="<?php echo $entfee ; ?>" id="costedit<?php echo $entid ; ?>">

						<?php /////////////////////////////////////?>
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
									<p><?php echo number_format($entfee,2,'.',','); ?> USD</p>
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="st-delOther?otherid=<?php echo $entid ;?>&cityid=<?php echo $this->input->get('cityid');?>" class="btn border light">Delete</a>
									<div class="clear"></div>
									<div data-toggle="modal" data-target="#editOther"  class="btn light" onclick="editCall(<?php echo $entid ; ?>)" >Edit</div>
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

	<div class="modal fade" id="addOther" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">New Item</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
			<form action="st-addOther" method="post" >
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<label>Other Item Name</label><br>
						<input type="text" placeholder="English Name" name="eng"><br>
						<label>ชื่อสิ่งอื่นๆ </label><br>
						<input type="text" placeholder="Thai Name" name="tha">
	        		</div>
	        		<div class="col-md-8">
						<label>Cost</label>
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


	<?php ////////////// EDIT MODAL //////////////?>
	<div class="modal fade" id="editOther" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Selected Item</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
			<form action="st-editOther" method="post" >
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<label>Other Item Name</label><br>
						<input type="text" placeholder="English Name" name="engedit2"><br>
						<label>ชื่อสิ่งอื่นๆ </label><br>
						<input type="text" placeholder="Thai Name" name="thaedit2">
	        		</div>
	        		<div class="col-md-8">

						<label>Cost</label>
						<input type="number" step="0.000001" name="feeedit2">
						<span class="unit selector">
							<select name="currencyedit" >
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
						<input type="hidden" name="cityid" value="<?php $viewcity = $this->input->get('cityid'); echo $viewcity ;?>">
						<input type="hidden" name="otheridedit2">
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
function editCall(dataId) {

	var entidedit = document.getElementById('entidedit'+dataId).value;
	var engedit = document.getElementById('engedit'+dataId).value;
	var thaedit = document.getElementById('thaedit'+dataId).value;
	var costedit = document.getElementById('costedit'+dataId).value;


	$('input[name="otheridedit2"]').val(entidedit);
	$('input[name="engedit2"]').val(engedit);
	$('input[name="thaedit2"]').val(thaedit);
	$('input[name="feeedit2"]').val(costedit);
}
</script>

</html>
