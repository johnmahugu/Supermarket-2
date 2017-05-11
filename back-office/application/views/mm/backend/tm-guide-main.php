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
							<p>Guide</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#addCity" class="btn">Add Stationary Guide City</div>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-sm-4">
							<label class="filter">Guide Type</label><br>
							<form method="get" action="st-guide">
							<select onchange="this.form.submit()" name="filtertype">
								<option value="">All Type</option>
								<option value="acc" <?php if($filtertype == 'acc'){ echo "selected" ; } ?>>Accompany Guide</option>
								<option value="sta" <?php if($filtertype == 'sta'){ echo "selected" ; } ?>>Stationary Guide</option>
							</select>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">

					<?php if($getGuide!= ''){
							if($filtertype == '' || $filtertype =='sta'){
								foreach($getGuide as $value){
									$guideid = $value->guide_id;
									$cityname = $value->city_name;
									$cost = $value->guide_cost;
					?>
					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-9 col-xs-12">
									<p><?php echo $this->AdminMD->cutEng($cityname) ;echo "(".$this->AdminMD->cutTha($cityname).")" ; ?></p>
									<div class="clear"></div>
									<p> <span> Stationary Guide </span> </p>
								</div>
								<div class="col-sm-3 col-xs-12">
									<p><span class="tag">Cost</span><?php echo $cost ; ?> USD</p>

								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="st-delGuide?gid=<?php echo $guideid;?>" class="btn border light">Delete</a>
									<div class="clear"></div>
									<div data-toggle="modal" data-target="#editCity" class="btn light">Edit</div>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : -</p>
						</div>
					</div>
					<?php } } } ?>



					<?php 	if($filtertype == '' || $filtertype =='acc'){?>
					<div class="list-card top card-header">
						<div class="header">
							<h2>Accompany Guide</h2>
							<div class="btn no-border light" data-toggle="modal" data-target="#addLanguage"><i class="fa fa-plus" aria-hidden="true"></i> Add Language</div>
						</div>
						<div class="header-card with-btn">
							<div class="col-md-9 col-sm-4">
								<p>Language</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<p>Price</p>
							</div>
						</div>
						<hr>


							<?php if($getGuide2!= ''){

										foreach($getGuide2 as $valueq){
											$guideid = $valueq->guide_id;
											$language = $valueq->guide_language;
											$cost = $valueq->guide_cost;
							?>


								<div class="col-xs-12">
								<div class="list multi">
								<div class="content">
									<div class="col-sm-9 col-xs-12">
										<p><?php echo $language;?></p>
									</div>
									<div class="col-sm-3 col-xs-12">
										<p><span class="tag">Cost</span><?php echo $cost;?> USD</p>
									</div>
								</div>
								<div class="input-inline">
									<div class="input-box">
										<a href="delGuide?gid=<?php echo $guideid;?>" class="btn border light">Delete</a>
										<div data-toggle="modal" data-target="#editAcc" class="btn light" onclick="editAccCall('<?php echo $guideid ; ?>')">Edit</div>
									</div>
								</div>
							<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>
								<input type="hidden" value="<?php echo $language ; ?>" id="langforedit<?php echo $guideid ; ?>">
								<input type="hidden" value="<?php echo $guideid ; ?>" id="gidedit<?php echo $guideid ; ?>">
								<input type="hidden" value="<?php echo $cost ; ?>" id="costforeidt<?php echo $guideid ; ?>">
							<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>

							</div>
						</div>

							<?php }  }	?>


					</div>
					<?php } ?>

				</div>

			</div>
		</main>
	</div>

	<div class="modal fade" id="addLanguage" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Accompany Guide Language</h4>
	          <hr>
	        </div>
			<form action="addGuideAcc" method="post">
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-sm-12">
	        			<label class="filter">Language</label><br>
	        			<input type="text" name="language">
	        		</div>
	        		<div class="col-md-12">
						<label>Cost</label>
						<input type="number" name="cost">
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>

	        	</div>

	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
	        </div>
			</form>
	      </div>
	    </div>
  	</div>

	<div class="modal fade" id="addCity" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Stationary Guide City</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
				<form action="st-addGuideSta" method="post">
	        		<div class="col-sm-12">
	        			<label class="filter">City</label><br>
	        			<select name="cityid">
							<option disabled selected >Select City</option>
							<?php
								foreach ($city as $value2) {
									$ctname = $value2->city_name;
									$ctid = $value2->city_id;
									$ctname = "".$ctname;
									$position = strpos($ctname,"|");
									$eng = substr($ctname,$position+1) ;
									$tha = substr($ctname,0,$position) ;

									echo "<option value =".$ctid.">".$eng."(".$tha.")</option>" ;
								}

								?>
						</select>
	        		</div>
	        		<div class="col-sm-12">
						<label>Cost</label>
						<input type="number" name="cost">
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
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



	<div class="modal fade" id="editCity" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Stationary Guide City</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
				<form action="st-addGuideSta" method="post">
	        		<div class="col-sm-12">
	        			<label class="filter">City</label><br>
	        			<select name="cityid">
							<option disabled selected >Select City</option>
							<?php
								foreach ($city as $value2) {
									$ctname = $value2->city_name;
									$ctid = $value2->city_id;
									$ctname = "".$ctname;
									$position = strpos($ctname,"|");
									$eng = substr($ctname,$position+1) ;
									$tha = substr($ctname,0,$position) ;

									echo "<option value =".$ctid.">".$eng."(".$tha.")</option>" ;
								}

								?>
						</select>
	        		</div>
	        		<div class="col-sm-12">
						<label>Cost</label>
						<input type="number" name="cost">
						<span class="unit selector">
							<select name="currency">
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



	<div class="modal fade" id="editAcc" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Accompany Guide City</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
				<form action="editGuideAcc" method="post">
	        		<div class="col-sm-12">
	        			<label class="filter">Language</label><br>
	        			<input type="text" name="langshow" disabled >
	        			<input type="hidden" name="guideidedit">
	        			<input type="hidden" name="languageedit">
	        		</div>
	        		<div class="col-sm-12">
						<label>Cost</label>
						<input type="number" name="costedit2">
						<span class="unit selector">
							<select name="currency">
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
function editAccCall(dataId) {

	var guideId = document.getElementById('gidedit'+dataId).value;
	var langEdit = document.getElementById('langforedit'+dataId).value;
	var costEdit = document.getElementById('costforeidt'+dataId).value;


	$('input[name="guideidedit"]').val(guideId);
	$('input[name="langshow"]').val(langEdit);
	$('input[name="languageedit"]').val(langEdit);
	$('input[name="costedit2"]').val(costEdit);

}


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
