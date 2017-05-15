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
							<p>Hotel in Yangon</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<a href="#" class="btn"  data-toggle="modal" data-target="#newHotel">New Hotel</a>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-sm-6 col-xs-12">
							<div class="input-inline">
								<div class="digi-box">
									<p><?php
									$ctid = $this->input->get('city');
									echo $this->AdminMD->countHotel($ctid); ?>&nbsp;Hotels</p>
								</div>
								<div class="input-box">
									<label class="filter">Hotel Stars</label>

									<form method="get" action='st-hotelAll'>
									<select onchange="this.form.submit()" name="star">
										<option value=''>Filter by Hotel Stars</option>
										<option value=''>All Hotel Stars</option>
										<option value='3'>3 Stars</option>
										<option value='3.5'>3.5 Stars</option>
										<option value='4'>4 Stars</option>
										<option value='5'>5 Stars</option>
									</select>
									<?php ////////////////////////// FOT EDIT ///////////////////////////////?>
									<input type="hidden" name="city" value="<?php $viewcity = $this->input->get('city'); echo $viewcity ;?>">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="header-card with-btn">
						<div class="col-md-4 col-sm-4">
							<p>Hotel Name</p>
						</div>
						<div class="col-md-5 col-sm-5">
							<p>Room</p>
						</div>
						<div class="col-md-3 col-sm-3">
							<p>Price</p>
						</div>
					</div>
<?php ///////////////////// LOOP /////////////////////////////?>
					<?php
					$viewcity = $this->input->get('city');
					$viewstar = $this->input->get('star');
								if ($HotelCityStar != ''){

								foreach ($HotelCityStar as $value) {

					?>
					<div class="list-card top">

						<div class="list multi">

							<div class="content">
								<div class="col-md-4 col-sm-4 col-xs-9">
									<h2><?php
							$hotelid = $value->hotel_id;
							$ctname = $value->hotel_name;
							$issug = $value->hotel_Is_sugguest;
							$guidecost = $value->guide_cost;

							$eng = $this->AdminMD->cutEng($ctname);
							$tha = $this->AdminMD->cutTha($ctname);
							echo $eng ; ?>

							<input type="hidden" value="<?php echo $eng."(".$tha.")" ; ?>" id="hotelnameforshow<?php echo $hotelid ; ?>">
							<input type="hidden" value="<?php echo $hotelid ; ?>" id="hotelidforedit<?php echo $hotelid ; ?>">
							</h2><div class="clear"></div>
									<p><?php
							$star = $value->hotel_star;
							echo $star ;?> Stars</p>
							<form action="ChangeSugguest?city=<?=$viewcity?>&star=<?=$viewstar?>&hotelid=<?=$hotelid?>&issug=<?=$issug?>" method="post">
									<p class="lblue"><input type="checkbox" <?php if($issug==1){ echo "checked"; }?> onchange="this.form.submit()"> Suggestion</p>
									</form>
									<br>
									<p><span class="tag">Guide Cost</span><?php if ($guidecost!=0) { echo $guidecost; echo "USD"; }else{ echo "-";}?></p><br>
									<p><span class="tag">Free Room Condition</span> <i class="fa fa-plus" aria-hidden="true" data-toggle="modal" data-target="#addFreeCon" onclick="addCall('<?php echo $hotelid ; ?>')" ></i></p><br>
									<?php
										$getFreeCon = $this->AdminMD->getFreeCondition($hotelid,'hotel');
										if($getFreeCon != ''){
											foreach($getFreeCon as $valuep){
												$freeid = $valuep->free_id;
												$upto = $valuep->free_upto;
												$freeam = $valuep->free_am;
												echo "<p>[<a href='DelFreepax?freeid=".$freeid."&city=".$viewcity."&star=".$viewstar."'>x</a>] Upto ".$upto." Rooms : Free ".$freeam." </p><br>" ;
											}
										}
									?>


								</div>
								<div class="col-sm-8 col-xs-12 no-pd">
									<ul>

									<?php //////// IN LOOP ///////// ?>

										<?php

											$resultarray = $this->AdminMD->getHotelRoom($hotelid);
											if($resultarray == '') {
												// NO ROOM //
												echo "Currently there is No Room" ;
										?>

												<?php
											}else{
												foreach ($resultarray as $valuex) {
													// HAVE ROOM //

													$roomid = $valuex->room_id;
													$roomname = $valuex->room_name;
													$roomtype = $valuex->room_type;
													$roomcost = $valuex->room_cost;
													$roomGITppl = $valuex->room_GIT_min;
													$roomGITcost = $valuex->room_cost_GIT;
													$roomintercost = $valuex->room_cost_inter;
													$roomthaicost = $valuex->room_cost_thai;
													$roomasiacost = $valuex->room_cost_asia;
													$roomExtra = $valuex->room_cost_extbed;

										?>
										<li>
											<div class="col-sm-7 col-xs-12">
												<p>[<?=$roomtype?>] <?=$roomname?>
												<a href="DelRoom?roomid=<?=$roomid?>&city=<?=$viewcity?>&star=<?=$viewstar?>"><button type="button" class="close"><i class="fa fa-times" aria-hidden="true"></i></button></a>
												
												</p>
												<br>
												<a href="editroom"><span class="tag">Edit This Room</span></a>
											</div>
											<div class="col-sm-5 col-xs-12">
												<p><span class="tag">Normal Cost</span><?=$roomcost?> USD</p><br>
												<?php if($roomintercost ==0){ ?>
												<p><span class="tag">No International Cost </span></p>
												<?php }else{ ?>
												<p><span class="tag">International Cost</span><?=$roomintercost?> USD </p>
												<?php } ?>
												
												<?php if($roomthaicost ==0){ ?>
												<p><span class="tag">No Thai Cost </span></p>
												<?php }else{ ?>
												<p><span class="tag">Thai Cost</span><?=$roomthaicost?> USD </p>
												<?php } ?>
												
												<?php if($roomasiacost ==0){ ?>
												<p><span class="tag">No Asia Cost </span></p>
												<?php }else{ ?>
												<p><span class="tag">Asia Cost</span><?=$roomasiacost?> USD </p>
												<?php } ?>
												
												<?php if($roomGITppl ==0){ ?>
												<br><p><span class="tag">No GIT </span></p>
												<?php }else{ ?>
												<br><p><span class="tag">GIT (Over <?=$roomGITppl?> ppl)</span><?=$roomGITcost?> USD </p>
												<?php } ?>
												
												<?php if($roomExtra ==0){ ?>
												<br><p><span class="tag">No Extra Bed </span></p>
												<?php }else{ ?>
												<br><p><span class="tag">Extra Bed</span><?=$roomExtra?> USD </p>
												<?php } ?>
											</div>
										</li>

											<?php }
											}
											//////// IN LOOP ///////// ?>


									</ul>
								</div>
							</div>
							<div class="input-inline">
								<div class="input-box">
									<a href="#" class="btn border light"  data-toggle="modal" data-target="#addRoom" onclick="editCall(<?php echo $hotelid ; ?>)">Add room</a>
									<a href="#" class="btn light"  data-toggle="modal" data-target="#editHotel" onclick="editCallHotel(<?php echo $hotelid ; ?>)">Edit Hotel</a>
									<div class="clear"></div>
									<a href="st-delHotel?hotelid=<?=$hotelid?>&city=<?=$viewcity?>&star=<?=$viewstar?>" class="btn border light">Delete Hotel</a>
								</div>
							</div>
						</div>
						<div class="date-modified">
							<p>Date Modified : -</p>
						</div>
					</div>
					<?php
								}}
					?>
	<?php ///////////////////// END LOOP /////////////////////////////?>


				</div>

			</div>
		</main>
	</div>


<div class="modal fade" id="addRoom" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Room</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
					<form action="st-addRoom" method="post">
	        		<div class="col-xs-12">
	        			<label class="filter"> Add to Hotel </label><br>
						<input type="text" name="hotelnamenew" disabled>
						<input type="hidden" name="hotelidedit" >
						<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
						<input type="hidden" name="viewstar" value="<?php echo $this->input->get('star') ?>" >
	        		</div>


					<div class="col-sm-6">
	        			<label class="filter">Room Type</label><br>
	        			<select name="roomType" id="selectSource" onchange="rType()">
							<option value="STD">Standard Tour</option>
							<option value="SHP">Shop Travel</option>
						</select>
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">Room Name</label><br>
	        			<input type="text" name="roomname">
	        		</div>

					<div class="col-sm-6">
	        			<label class="filter">GIT minimum (Room)</label><br>
	        			<input type="number" name="gitmin" id="gitmin" >
	        		</div>
	        		<div class="col-sm-6">
	        			<label class="filter">GIT Cost</label><br>
	        			<input type="number" name="gitcost" id="gitcost" value="" >
						<span class="unit selector">
							<select name="currencyedit" id="currencyedit"  >
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
	        		</div>

					
	        		<div class="col-sm-6">
						<label>FIT Base Cost</label>
						<input type="number" name="cost" value="" >
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>
					<div class="col-sm-6">
						<label>FIT International Cost(No = 0)</label>
						<input type="number" name="fitinter" value="0" >
						<span class="unit selector">
							<select name="currencyinter">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>
				
				<div class="col-sm-6">
						<label>FIT Thai Cost(No = 0)</label>
						<input type="number" name="fitthai" value="0" >
						<span class="unit selector">
							<select name="currencythai">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>
					<div class="col-sm-6">
						<label>FIT ASIA Cost(No = 0)</label>
						<input type="number" name="fitasia" value="0" >
						<span class="unit selector">
							<select name="currencyinterasia">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>
					
					<div class="col-sm-6">
						<label>Extra Bed Cost(No = 0)</label>
						<input type="number" name="fitbed" value="0" >
						<span class="unit selector">
							<select name="currencybed">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
					</div>
					
				<div class="col-sm-12">
						<span class="tag">Noted : 1 Room Cost and Size is for 2 Person <br> (If 3 Pax => Cost = 1.5 | Free Condi Count 2 | Tour's Head count 1 )</span>
						
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

					<form action="addFreeCon" method="post">

					<div class="col-sm-6">
	        			<label class="filter">Up to (Person)</label><br>
	        			<input type="number" name="uptopax" >
						<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
						<input type="hidden" name="viewstar" value="<?php echo $this->input->get('star') ?>" >
						<input type="hidden" name="hotelidedit2" >
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



	<div class="modal fade" id="newHotel" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add Hotel</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<form action="st-addHotel" method="post">
				<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
				<input type="hidden" name="viewstar" value="<?php echo $this->input->get('star') ?>" >
				<label>Hotel Name</label><br>
				<input type="text" placeholder="English Name" name="eng"><br>
				<label>ชื่อโรงแรม</label><br>
				<input type="text" placeholder="Thai Name" name="tha">

			<div class="col-sm-6">
						<label>Hotel Stars</label>
						<select name="hotelstar">
							<option value="5"> 5 Star </option>
							<option value="4"> 4 Star </option>
							<option value="3"> 3 Star </option>
							<option value="3.5"> 3.5 Star </option>
							<option value="2"> 2 Star </option>
							<option value="1"> 1 Star </option>
						</select>
			</div>
			<div class="col-sm-6">
						<label>Guide Cost</label>
						<input type="number" name="guidecost" value="" >
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
			</div>
			<div class="col-sm-12">
						<label>Hotel Website(URL)</label>
						<input type="text" name="hotelurl" value=""  >
			</div>
			<div class="col-sm-12">
						<label>Hotel Address (eng)</label>
						<input type="text" name="hoteladdress" value=""  >
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
<!----- EDIT HOTEL ----->
<div class="modal fade" id="editHotel" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit Hotel</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<form action="st-addHotel" method="post">
				<input type="hidden" name="viewcity" value="<?php echo $this->input->get('city') ?>" >
				<input type="hidden" name="viewstar" value="<?php echo $this->input->get('star') ?>" >
				<label>Hotel Name</label><br>
				<input type="text" placeholder="English Name" name="eng"><br>
				<label>ชื่อโรงแรม</label><br>
				<input type="text" placeholder="Thai Name" name="tha">

			<div class="col-sm-6">
						<label>Hotel Stars</label>
						<select name="hotelstar">
							<option value="5"> 5 Star </option>
							<option value="4"> 4 Star </option>
							<option value="3"> 3 Star </option>
							<option value="3.5"> 3.5 Star </option>
							<option value="2"> 2 Star </option>
							<option value="1"> 1 Star </option>
						</select>
			</div>
			<div class="col-sm-6">
						<label>Guide Cost</label>
						<input type="number" name="guidecost" value="" >
						<span class="unit selector">
							<select name="currency">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
							</select>
						</span>
			</div>
			<div class="col-sm-12">
						<label>Hotel Website(URL)</label>
						<input type="text" name="hotelurl" value=""  >
			</div>
			<div class="col-sm-12">
						<label>Hotel Address (eng)</label>
						<input type="text" name="hoteladdress" value=""  >
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
</html>

<script>
function editCall(dataId) {
	//window.alert('555');

	var hotelName = document.getElementById('hotelnameforshow'+dataId).value;
	var hotelId = document.getElementById('hotelidforedit'+dataId).value;

	$('input[name="hotelnamenew"]').val(hotelName);
	$('input[name="hotelidedit"]').val(hotelId);

}

function addCall(dataId) {

	var hotelId = document.getElementById('hotelidforedit'+dataId).value;

	$('input[name="hotelidedit2"]').val(hotelId);

}

function rType() {
	if($('#selectSource').val() === 'STD') {
		 //document.getElementById("gitmin").disabled = true;
		 //document.getElementById("gitcost").disabled = true;
		 //document.getElementById("currencyedit").disabled = true;
		 //document.getElementById("person").disabled = true;
	} else {
		 //document.getElementById("gitmin").disabled = false;
		 //document.getElementById("gitcost").disabled = false;
		 //document.getElementById("currencyedit").disabled = false;
		 //document.getElementById("person").disabled = false;
	}
}
</script>
