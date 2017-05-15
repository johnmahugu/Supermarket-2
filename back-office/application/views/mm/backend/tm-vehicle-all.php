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
					<?php  $cityview = $this->input->get('city');  ?>
						<div class="col-sm-8 col-xs-12">
							<h1>Shop Travel</h1>
							<p>Vehicle in <?php echo $this->AdminMD->getCityName($cityview) ?></p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<a href="st-newVehi?city=<?php echo $cityview;?>" class="btn">New Route</a>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-md-10 col-sm-9">
							<div class="input-inline">
								<div class="digi-box">
									<p><?php echo $this->AdminMD->countRoute($cityview) ?>&nbsp;Routes</p>
								</div>
								<div class="input-box">
									<label class="filter">Edit Vehicle Size</label>
									<div class="clear"></div>

									<?php
									$viewcity = $this->input->get('city');

									if($carType != ''){
											foreach ($carType as $value){
											$carID = $value->car_id;
											$carName = $value->car_name;
											$minPax = $value->car_cap_min;
											$maxPax = $value->car_cap_max;
									?>
									<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>
										<input type="hidden" value="<?php echo $carName; ?>" id="ncar<?php echo $carID ; ?>">
										<input type="hidden" value="<?php echo $minPax; ?>" id="nmin<?php echo $carID ; ?>">
										<input type="hidden" value="<?php echo $maxPax; ?>" id="nmax<?php echo $carID ; ?>">

										<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>
									
										<div data-toggle="modal" data-target="#editSize" onclick="editCall('<?php echo $carID ; ?>')" alt="<?=$minPax?>,<?=$maxPax?>" class="tag"><?=$carName?></div>
									<?php 	}
										}else{
											echo "No Car Type yet" ;
										}?>
								</div>

							</div>

						</div>

						<div class="col-md-2 col-sm-3">
							<div data-toggle="modal" data-target="#addSize" class="btn border label-level">Add Vehicle Size</div>
						</div>
					</div>



				</div>
			</div>
			<div class="main-wrapper">

			<div class="row top-mg">

				<div class="row">
					<div class="header-card with-btn">
						<div class="col-md-6 col-sm-4">
							<p>Route</p>
						</div>
						<div class="col-md-6 col-sm-3">
							<p>Price</p>
						</div>
					</div>
					<?php
					////////////// START LOOP ////////////////////
					$cityid = $this->input->get('city');
					$result = $this->AdminMD->getRouteId2($cityid);

						if($result != ''){
							foreach ($result as $valueo){
								$routeid = $valueo->route_id;
								$guidecost = $valueo->route_guide_cost;
								$namestring = $valueo->route_name;
								$eng = $this->AdminMD->cutEng($namestring);
								$tha = $this->AdminMD->cutTha($namestring);

					?>

					<div class="list-card top">
						<div class="list">
							<div class="content">
								<div class="col-sm-6 col-xs-12">
									<p><span>EN</span><?=$eng?></p>
									<div class="clear"></div>
									<p><span>TH</span><?=$tha?></p><br>
									<p><span class="tag">Guide Cost</span><?php if ($guidecost!=0) { echo $guidecost; echo "USD"; }else{ echo "-";}?></p><br>
									<p><span class="tag">Free Pax Condition</span> <i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addFreeCon" onclick="addCall('<?php echo $routeid ; ?>')" ></i></p><br>
									<input type="hidden" value="<?php echo $routeid ; ?>" id="routeidforedit<?php echo $routeid ; ?>">
									<?php
										$getFreeCon = $this->AdminMD->getFreeCondition($routeid,'route');
										if($getFreeCon != ''){
											foreach($getFreeCon as $valuep){
												$freeid = $valuep->free_id;
												$upto = $valuep->free_upto;
												$freeam = $valuep->free_am;
												
												echo "<p>[<a href='DelFreepax?page=vehi&freeid=".$freeid."&city=".$viewcity."'>x</a>] Upto ".$upto." Pax : Free ".$freeam." </p><br>" ;
											}
										}
									?>

								</div>
								<div class="col-sm-6 col-xs-12">
									<?php
										/// SUB LOOP //
										$result2 = $this->AdminMD->getRouteCost($routeid,'BYC');
										if($result2 != ''){
											foreach ($result2 as $valuei){
												$routetype = $valuei->rc_type;
												$carid = $valuei->car_id;
												$carname = $valuei->car_name;
												$routecost = $valuei->rc_cost;
									?>

											<?php
												if($routetype == "BYC"){
													echo "<p><span class='tag'>" ;
													echo $carname;
											?>
												</span><?=$routecost?> USD</p><br>
											<?php

										} } }

									?>
									
									
									<?php
										/// SUB LOOP //
										$result2 = $this->AdminMD->getRouteCost($routeid,'AID');
										if($result2 != ''){
									?>
											<p><span class='tag'>All type(Individual)</span><i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addPriceConIn" onclick="addCall2('<?php echo $routeid ; ?>')" ></i> </p><br>
									<?php		
									
											
											$getPriceCon = $this->AdminMD->getPriceCondition($routeid,'AID');
													if($getPriceCon != ''){
														foreach($getPriceCon as $valuel){
															$routecost = $valuel->rc_cost;
															$pconid = $valuel->rc_id;
															$routestart = $valuel->rc_from ;
															$routeto = $valuel->rc_to;
															echo "[<a href='DelPriceCon?pid=".$pconid."&city=".$viewcity."'>x</a>] " ;
															echo "From ".$routestart." To ".$routeto." : ";
															echo $routecost." USD" ;
															echo "<br>" ;
														}
											}





										}

									?>
									
									
									
									
									
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="#" class="btn border light">Delete</a>
									<div class="clear"></div>
									<!-- <a href="tm-vehicle-edit.html" class="btn light">Edit</a> -->
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : 20 MAR 2017 at 10:10</p>
						</div>
					</div>


					<?php
						} }
					////////////// END LOOP //////////////?>


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
				<form action="addVehiSize" method="post">
		        	<div class="col-xs-12">
		        		<label>New Size</label><br>
						<input type="text" placeholder="Vehicle Size Name" name="VehiName">
		        	</div>
		        	<div class="col-sm-6 col-xs-12">
						<input type="number" min="0" placeholder="Start From" name="minPax">
						<span class="unit">Pax</span>
		        	</div>
					<div class="col-sm-6 col-xs-12">
						<input type="number" min="0" placeholder="To" name="maxPax">
						<span class="unit">Pax</span>
		        	</div>
		        </div>
		        <div class="modal-footer">
					<input type="hidden" value="<?php echo $this->input->get('city'); ?> " name="viewcity">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Submit" class="btn" >
				</form>
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
						
						<form action="editVehi" method="post">
						<input type="text" name="nnsize" placeholder="Vehicle Size Name">
		        	</div>
		        	<div class="col-sm-6 col-xs-12">
						<input type="number" name="nnfrom" placeholder="Start From">
						<span class="unit">Pax</span>
		        	</div>
					<div class="col-sm-6 col-xs-12">
						<input type="number" name="nnto" placeholder="To">
						<input type="hidden" name="nncarid" >
						<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
						<span class="unit">Pax</span>
		        	</div>
		        </div>
		        <div class="modal-footer">
		        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
			        <input type="submit" value="Save" class="btn" >
					</form>
					
		        </div>
		      </div>
		    </div>
	  	</div>

	</div>


	<div class="modal fade" id="addFreeCon" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Free Condition</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">

					<form action="addFreeConVehi" method="post">

					<div class="col-sm-6">
	        			<label class="filter">Up to (Person)</label><br>
	        			<input type="number" name="uptopax" >
						<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
						<input type="hidden" name="routeedit2" >
	        		</div>

					<div class="col-sm-6">
	        			<label class="filter">Free (Person)</label><br>
	        			<input type="number" name="free" >
	        		</div>


	        	</div>

	        </div>
	        <div class="modal-footer">
				<?php ///// HIDDEN SEND DATATO EDIT ////////?>

				<?php //// END HIDDEN /////////////////////?>
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
				</form>
	        </div>
	      </div>
	    </div>
  	</div>




		<div class="modal fade" id="addPriceConIn" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Price Condition(Individual)</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">

					<form action="addPriceConIn" method="post">

					<div class="col-sm-6">
	        			<label class="filter">From (Person)</label><br>
	        			<input type="number" name="frompax" >
						<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
						<input type="hidden" name="routeIdCon" >
	        		</div>

					<div class="col-sm-6">
	        			<label class="filter">To (Person)</label><br>
	        			<input type="number" name="topax" >
	        		</div>
					<div class="col-sm-6">
	        			<label class="filter">Cost </label><br>
	        			<input type="number" name="addcost">
						<span class="unit selector">
						<select name="ccedit">
							<option value="usd">USD</option>
							<option value="mmk">MMK</option>
						</select>
						</span>
	        		</div>

	        	</div>

	        </div>
	        <div class="modal-footer">
				<?php ///// HIDDEN SEND DATATO EDIT ////////?>

				<?php //// END HIDDEN /////////////////////?>
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
				</form>
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


function addCall(dataId) {

	var routeId = document.getElementById('routeidforedit'+dataId).value;

	$('input[name="routeedit2"]').val(routeId);

}


function addCall2(dataId) {
	
	$('input[name="routeIdCon"]').val(dataId);

}



function editCall(dataId) {

	var ncar = document.getElementById('ncar'+dataId).value;
	var nmin = document.getElementById('nmin'+dataId).value;
	var nmax = document.getElementById('nmax'+dataId).value;


	$('input[name="nnsize"]').val(ncar);
	$('input[name="nnfrom"]').val(nmin);
	$('input[name="nnto"]').val(nmax);
	$('input[name="nncarid"]').val(dataId);


}

</script>
</html>
