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
							<h1>Shop Travel <?php //echo $viewdate ; //////// DEBUG ////////////?></h1>
							<p>Flight Start From <?php

							if($city2 != ''){
								foreach ($city2 as $value2) {
									$ctname = $value2->city_name;
									$position = strpos($ctname,"|");
									$eng = substr($ctname,$position+1) ;
									echo $eng ;
									$citynamesss = $eng ; 
								}
							}


							?></p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#newDestination" class="btn">Add Destination City</div>
						</div>
					</div>
					<div class="row top-mg">

						<div class="col-md-4 col-sm-6 col-xs-12">
							<label class="filter">Destination City</label><br>
							<form action="st-flightAll" method="get">
								<select name="descity" onchange="this.form.submit()">
								<option disabled selected >Select City</option>
								<option value ="">All City</option>
								<?php
									foreach ($TicketCity2 as $value) {
										$ctname = $value->city_name;
										$ctid = $value->city_id;
										$ctname = "".$ctname;
										$position = strpos($ctname,"|");
										$eng = substr($ctname,$position+1) ;
										$tha = substr($ctname,0,$position) ;

										echo "<option value =".$ctid.">".$eng."(".$tha.")</option>" ;
									}

								?>

								</select>
								<input type="hidden" name="originid" value="<?php echo $this->input->get('originid');?>">
								<input type="hidden" name="viewdate" value="<?php echo $this->input->get('viewdate');?>">
							</form>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label class="filter">Select Date</label><br>
							<form action="st-flightAll" method="get">
							<input type="text" class="date" value="Select Date" readonly="readonly" onchange="this.form.submit()" name="viewdate">
							<input type="hidden" name="originid" value="<?php echo $this->input->get('originid');?>">
							<input type="hidden" name="descity" value="<?php echo $this->input->get('descity');?>">
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="alert-card">
						<div class="col-xs-12">
							<h2><i class="fa fa-calendar" aria-hidden="true"></i> Select Date : <span><?php
							if($viewdate == ''){
								echo "All Date" ;
							}else{
								echo $viewdate ;
							}?></span> </h2>
							<div class="btn-wrapper">

								<form method=get>
								<input type="submit" class="btn gray" Value="Clear Date">
								<input type="hidden" name="originid" value="<?php echo $this->input->get('originid');?>">
								<input type="hidden" name="descity" value="<?php echo $this->input->get('descity');?>">
								<input type="hidden" name="viewdate" value="">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">


					<?php
					if ($TicketCity2 != ''){
						$viewdes = $this->input->get('descity');
						if($viewdes != ''){
							$TicketCity2 = $TicketCity3 ;
						}
								foreach ($TicketCity2 as $valueq) {
									$cityid = $valueq->city_id ;
									$cityname = $valueq->city_name ;
					?>

					<div class="list-card top card-header">
						<div class="header">
							<h2>to <?php echo $this->AdminMD->cutEng($cityname) ; $tha = $this->AdminMD->cutTha($cityname) ;echo "(".$tha.")";?></h2>

							<?php //// SET Value /// ?>
							<?php $originid = $this->input->get('originid');?>
							<?php $destinationid = $valueq->flight_origin_id; ?>
							<input type="hidden" value="<?php echo $destinationid ; ?>" name="desid">
							<?php /////////////////// ?>

							<div class="btn no-border light" data-toggle="modal" data-target="#addFlight"><i class="fa fa-plus" aria-hidden="true"></i> Add Flight</div>
						</div>
						<div class="header-card with-btn">
							<div class="col-md-5 col-sm-4">
								<p>Airway</p>
							</div>
							<div class="col-md-2 col-sm-5">
								<p>Departure</p>
							</div>
							<div class="col-md-2 col-sm-3">
								<p>Arrival</p>
							</div>
							<div class="col-md-3 col-sm-3">
								<p>Price</p>
							</div>
						</div>
						<hr>
						<div class="col-xs-12 bottom-mg">


						<?php //// SUB LIST CARD //////?>

						<?php
						$vieworigin = $this->input->get('originid');
						$getFlight = $this->AdminMD->getFlight($vieworigin,$destinationid); // All Flight
						if ($getFlight != ''){
						foreach ($getFlight as $valuer) {
								$flightid = $valuer->flight_id ;
								$flightcode = $valuer->flight_code ;
								$airlineid = $valuer->airline_id ;
								$airline = $valuer->airline_name ;
								$via = $valuer->flight_via ;
								$depart = $valuer->flight_depart_time ;
								$duration = $valuer->flight_durationtime ;
								$TimeDiff = $valuer->flight_time_diff ;
								$flightcost = $valuer->flight_cost ;

								$checkdate = $this->AdminMD->countSameFlight($flightcode);
								if($checkdate>1){
									// Having special price
									//$viewdate = $this->input->get('viewdate');
									$checkspecial = $this->AdminMD->getFlight2($flightcode,$viewdate);


									if($checkspecial == ""){
										// Notthing

									}else{

										// Overwrite with new value
										$overwrite = $this->AdminMD->getFlight3($flightcode,$viewdate);
										foreach ($overwrite as $valuew) {
											$flightid = $valuew->flight_id ;
											$flightcode = $valuew->flight_code ;
											$airlineid = $valuew->airline_id ;
											$airline = $valuew->airline_name ;
											$via = $valuew->flight_via ;
											$depart = $valuew->flight_depart_time ;
											$duration = $valuew->flight_durationtime ;
											$TimeDiff = $valuew->flight_time_diff ;
											$flightcost = $valuew->flight_cost ;

										}


									}

								}else{
									// No speical Price
								}
						?>



						<?php ////////// SET HIDDEN VALUE FOR EDIT /////////////?>
						<input type="hidden" value="<?php echo $flightcode ; ?>" id="fcforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $flightid ; ?>" id="fidforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $airlineid ; ?>" id="aidforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $airline ; ?>" id="anameforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $via ; ?>" id="viaforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $depart ; ?>" id="dpforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $duration ; ?>" id="duforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $flightcost ; ?>" id="costforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $viewdate ; ?>" id="dateforedit<?php echo $flightid ; ?>">
						<input type="hidden" value="<?php echo $destinationid ; ?>" id="destiforedit<?php echo $flightid ; ?>">
						<?php /////////////////////////////////////?>


							<div class="list">
								<div class="content flight">
									<div class="col-sm-5 col-xs-12">
										<p><?php echo $airline;?></p>
										<div class="clear"></div>
										<p class="lblue"><i class="fa fa-plane" aria-hidden="true"></i> <?php echo $flightcode ;?></p>
									</div>
									<div class="col-sm-2 col-xs-6"><b>Departure</b><?php echo substr($depart,0,5); ?></div>

									<div class="col-sm-2 col-xs-6"><b>Arrival</b><?php echo substr($duration,0,5);?></div>





									<div class="col-sm-3 col-xs-12">
										<p><span class="tag">Costs</span><?php echo number_format($flightcost,2,'.',',');?> USD</p><br>

									</div>
									<div class="clear"></div>
									<div class="col-xs-12">
										<p><span>Via</span> <?php echo $via ; ?></p>
									</div>
								</div>
								<div class="input-inline">
									<div class="input-box">
										<a href="st-delFlight?flightid=<?php echo $flightid; ?>" class="btn border light">Delete</a>
										<div class="clear"></div>
										<button type="button" class="btn light" data-toggle="modal" data-target="#editFlight" onclick="editCall(<?php echo $flightid ; ?>)" >Edit</div>

									</div>
								</div>





						<?php } }else{
						?>
						<div class="btn-wrapper text-center">
							<div class="btn" data-toggle="modal" data-target="#addFlight">Add Flight (From:<?php echo $citynamesss; echo "->" ; echo $this->AdminMD->cutEng($cityname) ; ?>)</div>

						</div>

						<?php
						}
						//// SUB LIST CARD //////?>




						</div>

					</div>


					<?php } } ?>


				</div>

			</div>
		</main>
	</div>

	<div class="modal fade" id="newDestination" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add a Destination</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">City</label><br>
				<form method="post" action="st-addCityDestination">
				<select name="city">



					<option disabled selected >Select City</option>

				<?php
					foreach ($AllCity as $value) {
						$ctname = $value->city_name;
						$ctid = $value->city_id;
						$ctname = "".$ctname;
						$position = strpos($ctname,"|");
						$eng = substr($ctname,$position+1) ;
						$tha = substr($ctname,0,$position) ;

						echo "<option value =".$ctid.">".$eng."(".$tha.")</option>" ;
					}

				?>




				</select>
	        </div>
	        <div class="modal-footer">
				<input type="hidden" name="originid" value="<?php echo $this->input->get('originid'); ?>">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Add" class="btn" >
				</form>
	        </div>
	      </div>
	    </div>
  	</div>

  	<div class="modal fade" id="addFlight" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Flight <b></b> </h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<label class="filter">Airway</label><br>
						<form action="st-addFlight" method="post">
							<input type="hidden" name="originid" value=""> <?php //// DEBUG ///?>
							<input type="hidden" name="destinationid" value=""> <?php //// DEBUG ///?>
	        			<select name="airlineid">
							<option disabled selected >Select Airway</option>
							<?php
								foreach ($getAirline as $value) {
									$ctname = $value->airline_name;
									$ctid = $value->airline_id;
									$ctname = "".$ctname;

									echo "<option value =".$ctid.">".$ctname."</option>" ;
								}

							?>
						</select>
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Flight Name</label><br>
	        			<input type="text" name="flightcode">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Via</label><br>
	        			<input type="text" name="flightvia">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Departure Time</label><br>
	        			<input type="time" name="departTime">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Arrival Time</label><br>
	        			<input type="time" name="duration">
	        		</div>
	        		<div class="col-sm-6">
						<label>Real Cost</label>
						<input type="number" name="cost">
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>

				<div class="col-sm-6">
	        			<label class="filter">Time Difference</label><br>
	        			<?php include('pagepart/timediffconf.php')?>
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

<?php /////////////// EDIT HERE  /////////////// ?>
	<div class="modal fade" id="editFlight" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Flight <?php echo $viewdate;?></h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-xs-12">
	        			<label class="filter">Airway</label><br>
					<form action="st-editFlight" method="post">

	        			<input type="text" name="Airlineforeidt" disabled>
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Flight Name</label><br>
	        			<input type="text" name="flightcodeedit" disabled>
	        			<input type="hidden" name="flightcodeedit2" >
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Via</label><br>
	        			<input type="text" name="flightviaedit">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Departure Time</label><br>
	        			<input type="time" name="departTimeedit">
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Arrival Time</label><br>
	        			<input type="time" name="durationedit">
	        		</div>
	        		<div class="col-sm-6">
						<label>Real Cost</label>
						<input type="number" name="costedit" value="" >
						<span class="unit selector">
							<select name="currencyedit">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>

				<div class="col-sm-6">
	        			<label class="filter">Time Difference</label><br>
	        			<?php include('pagepart/timediffconf.php')?>
	        		</div>

	        	</div>

	        </div>
	        <div class="modal-footer">
				<?php ///// HIDDEN SEND DATATO EDIT ////////?>
				<input type="hidden" value="<?php echo $viewdate;?>" name="dateforedit">
				<input type="hidden" value="<?php echo $viewdateold;?>" name="dateforgoback">
				<input type="hidden" name="flightidforedit">
				<input type="hidden" name="destinationidforedit">
				<input type="hidden" name="originidforedit" value="<?php echo $originid;?>">
				<input type="hidden" name="airlinecodeforedit">
				<?php //// END HIDDEN /////////////////////?>
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Edit" class="btn" >
				</form>
	        </div>
	      </div>
	    </div>
  	</div>
<?php /////////////// EDIT HERE  /////////////// ?>
</body>
<script src="assets/js/script.js"></script>
<script>
function editCall(dataId) {
	//window.alert('555');

	var flightId = document.getElementById('fidforedit'+dataId).value;
	var flightCode = document.getElementById('fcforedit'+dataId).value;
	var AirlineName = document.getElementById('anameforedit'+dataId).value;
	var AirlineCode = document.getElementById('aidforedit'+dataId).value;
	var viaValue = document.getElementById('viaforedit'+dataId).value;
	var costValue = document.getElementById('costforedit'+dataId).value;
	var duforedit = document.getElementById('duforedit'+dataId).value;
	var dpforedit = document.getElementById('dpforedit'+dataId).value;
	var desforedit = document.getElementById('destiforedit'+dataId).value;




	$('input[name="flightidforedit"]').val(flightId);
	$('input[name="flightcodeedit"]').val(flightCode);
	$('input[name="flightcodeedit2"]').val(flightCode);
	$('input[name="Airlineforeidt"]').val(AirlineName);
	$('input[name="airlinecodeforedit"]').val(AirlineCode);
	$('input[name="flightviaedit"]').val(viaValue);
	$('input[name="costedit"]').val(costValue);
	$('input[name="departTimeedit"]').val(dpforedit);
	$('input[name="durationedit"]').val(duforedit);
	$('input[name="destinationidforedit"]').val(desforedit);

}
</script>

<script>
	$( ".date" ).datepicker({
      	buttonText: "Select date",
      	dateFormat: 'yyyymmdd'
    });

    $('.date').change(function(){
    	$('.alert-card h2 span').text($(this).val());
    	$('.alert-card').removeClass('hide')
    });

    $('.alert-card .btn.change').click(function(){
    	$('.date').datepicker('show');
    });

    $('.alert-card .btn.gray').click(function(){
    	$('.alert-card').addClass('hide');
    	$('.date').val('Select Date');
    });

$('.btn[data-target="#addFlight"]').click(function(){
    	$('#addFlight .modal-header .modal-title b').text($(this).closest('.list-card').find('.header h2').text());
		$('input[name="originid"]').val('<?php echo $originid;?>');
		$('input[name="destinationid"]').val($(this).closest('.list-card').find('input[name="desid"]').val());
    });


</script>
</html>
