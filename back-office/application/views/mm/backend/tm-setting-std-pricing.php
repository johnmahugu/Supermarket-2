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
							<h1>STD Pricing Setting</h1>
							<p>Myanmar Center</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">					
					<div class="list-card card-header">
						<div class="header">
							<h2>High Season</h2>
						</div>
						<hr>
					

						
						<?php ////////////// LOOP START ////////////////////////// ?>
						<?php
							$loopMain = $this->AdminMD->getGroupFlightProfit('High Season');
							$loopTimeMain = 0;
							if ($loopMain != '') {
								foreach($loopMain as $value1){
									$typeName = $value1->fpro_type;
									$loopTimeMain++ ;
									
						?>
						<form action="UpdateTicketProfit" method="post">
						<div class="table">
							<div class="col-sm-8">
								<h3><i class="fa fa-plane" aria-hidden="true"></i> <?=$typeName?></h3>
							</div>
							<div class="col-sm-4">
								<div class="input-box btn-inline text-right">
									<div class="btn gray">Cancel</div>
									<div class="btn border">Edit</div>
									<input type="submit" class="btn border" value="Save">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="content">
									<table>
										<thead>
											<tr>
												<td>Paxs</td>
												<td colspan="2">Thai/Laos</td>
												<td colspan="2">Asian</td>
												<td colspan="2">International</td>
											</tr>
											<tr>
												<td></td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
											</tr>
										</thead>
										<tbody>
										
										<?php
											//////// SUB LOOP //////////
											$subLoop = $this->AdminMD->getCostByLine($typeName,'High Season');
											$looptimes = 0;
											if ($subLoop != '') {
												foreach($subLoop as $value2){
													$looptimes = $looptimes+1 ;
													
													$lineid = $value2->fpro_id;
													$paxLenght = $value2->fpro_pax_lenght;
													$fpro_b2b_THLAO = $value2->fpro_b2b_THLAO;
													$fpro_b2c_THLAO = $value2->fpro_b2c_THLAO;
													$fpro_b2b_ASIA = $value2->fpro_b2b_ASIA;
													$fpro_b2c_ASIA = $value2->fpro_b2c_ASIA;
													$fpro_b2b_INTER = $value2->fpro_b2b_INTER;
													$fpro_b2c_INTER = $value2->fpro_b2c_INTER;
									
										?>
										
											<tr>
												<td><?=$paxLenght?></td>
												<input type="hidden" name="lineid<?=$looptimes?>" value="<?=$lineid?>">
												<td><input type="number" name="fpro_b2b_THLAO<?=$looptimes?>" value="<?=$fpro_b2b_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2c_THLAO<?=$looptimes?>" value="<?=$fpro_b2c_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2b_ASIA<?=$looptimes?>" value="<?=$fpro_b2b_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2c_ASIA<?=$looptimes?>" value="<?=$fpro_b2c_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2b_INTER<?=$looptimes?>" value="<?=$fpro_b2b_INTER?>" disabled></td>
												<td><input type="number" name="fpro_b2c_INTER<?=$looptimes?>" value="<?=$fpro_b2c_INTER?>" disabled></td>
											</tr>
											
										<?php
												
												} } 
											////// END SUBLOOP /////////?>	
											<input type="hidden" value="<?=$looptimes?>" name="timeloop">
										</tbody>
									</table>
									<div class="date-modified">
										<p>Date Modified : 20 MAR 2017 at 10:10</p>
									</div>	
								</div>
							</div>
						</div>
						</form>	
						
					<?php
					} }
					////////// END MAIN ///////////////////// ?>
					
					</div>

					
					
			
					

					<div class="list-card card-header">
						<div class="header">
							<h2>Low Season</h2>
						</div>
						<hr>
						<?php ////////////// LOOP START ////////////////////////// ?>
						<?php
							$loopMain = $this->AdminMD->getGroupFlightProfit('Low Season');
							$loopTimeMain = 0;
							if ($loopMain != '') {
								foreach($loopMain as $value1){
									$typeName = $value1->fpro_type;
									$loopTimeMain++ ;
									
						?>
						<form action="UpdateTicketProfit" method="post">
						<div class="table">
							<div class="col-sm-8">
								<h3><i class="fa fa-plane" aria-hidden="true"></i> <?=$typeName?></h3>
							</div>
							<div class="col-sm-4">
								<div class="input-box btn-inline text-right">
									<div class="btn gray">Cancel</div>
									<div class="btn border">Edit</div>
									<input type="submit" class="btn border" value="Save">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="content">
									<table>
										<thead>
											<tr>
												<td>Paxs</td>
												<td colspan="2">Thai/Laos</td>
												<td colspan="2">Asian</td>
												<td colspan="2">International</td>
											</tr>
											<tr>
												<td></td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
											</tr>
										</thead>
										<tbody>
										
										<?php
											//////// SUB LOOP //////////
											$subLoop = $this->AdminMD->getCostByLine($typeName,'Low Season');
											$looptimes = 0;
											if ($subLoop != '') {
												foreach($subLoop as $value2){
													$looptimes = $looptimes+1 ;
													
													$lineid = $value2->fpro_id;
													$paxLenght = $value2->fpro_pax_lenght;
													$fpro_b2b_THLAO = $value2->fpro_b2b_THLAO;
													$fpro_b2c_THLAO = $value2->fpro_b2c_THLAO;
													$fpro_b2b_ASIA = $value2->fpro_b2b_ASIA;
													$fpro_b2c_ASIA = $value2->fpro_b2c_ASIA;
													$fpro_b2b_INTER = $value2->fpro_b2b_INTER;
													$fpro_b2c_INTER = $value2->fpro_b2c_INTER;
									
										?>
										
											<tr>
												<td><?=$paxLenght?></td>
												<input type="hidden" name="lineid<?=$looptimes?>" value="<?=$lineid?>">
												<td><input type="number" name="fpro_b2b_THLAO<?=$looptimes?>" value="<?=$fpro_b2b_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2c_THLAO<?=$looptimes?>" value="<?=$fpro_b2c_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2b_ASIA<?=$looptimes?>" value="<?=$fpro_b2b_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2c_ASIA<?=$looptimes?>" value="<?=$fpro_b2c_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2b_INTER<?=$looptimes?>" value="<?=$fpro_b2b_INTER?>" disabled></td>
												<td><input type="number" name="fpro_b2c_INTER<?=$looptimes?>" value="<?=$fpro_b2c_INTER?>" disabled></td>
											</tr>
											
										<?php
												
												} } 
											////// END SUBLOOP /////////?>	
											<input type="hidden" value="<?=$looptimes?>" name="timeloop">
										</tbody>
									</table>
									<div class="date-modified">
										<p>Date Modified : 20 MAR 2017 at 10:10</p>
									</div>	
								</div>
							</div>
						</div>
						</form>	
						
					<?php
					} }
					////////// END MAIN ///////////////////// ?>
					</div>
					
					
					
					<div class="list-card card-header">
						<div class="header">
							<h2>Songkarn Festival</h2>
						</div>
						<hr>
						<?php ////////////// LOOP START ////////////////////////// ?>
						<?php
							$loopMain = $this->AdminMD->getGroupFlightProfit('Songkarn Festival');
							$loopTimeMain = 0;
							if ($loopMain != '') {
								foreach($loopMain as $value1){
									$typeName = $value1->fpro_type;
									$loopTimeMain++ ;
									
						?>
						<form action="UpdateTicketProfit" method="post">
						<div class="table">
							<div class="col-sm-8">
								<h3><i class="fa fa-plane" aria-hidden="true"></i> <?=$typeName?></h3>
							</div>
							<div class="col-sm-4">
								<div class="input-box btn-inline text-right">
									<div class="btn gray">Cancel</div>
									<div class="btn border">Edit</div>
									<input type="submit" class="btn border" value="Save">
								</div>
							</div>
							<div class="col-xs-12">
								<div class="content">
									<table>
										<thead>
											<tr>
												<td>Paxs</td>
												<td colspan="2">Thai/Laos</td>
												<td colspan="2">Asian</td>
												<td colspan="2">International</td>
											</tr>
											<tr>
												<td></td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
												<td>B2B</td>
												<td>B2C</td>
											</tr>
										</thead>
										<tbody>
										
										<?php
											//////// SUB LOOP //////////
											$subLoop = $this->AdminMD->getCostByLine($typeName,'Songkarn Festival');
											$looptimes = 0;
											if ($subLoop != '') {
												foreach($subLoop as $value2){
													$looptimes = $looptimes+1 ;
													
													$lineid = $value2->fpro_id;
													$paxLenght = $value2->fpro_pax_lenght;
													$fpro_b2b_THLAO = $value2->fpro_b2b_THLAO;
													$fpro_b2c_THLAO = $value2->fpro_b2c_THLAO;
													$fpro_b2b_ASIA = $value2->fpro_b2b_ASIA;
													$fpro_b2c_ASIA = $value2->fpro_b2c_ASIA;
													$fpro_b2b_INTER = $value2->fpro_b2b_INTER;
													$fpro_b2c_INTER = $value2->fpro_b2c_INTER;
									
										?>
										
											<tr>
												<td><?=$paxLenght?></td>
												<input type="hidden" name="lineid<?=$looptimes?>" value="<?=$lineid?>">
												<td><input type="number" name="fpro_b2b_THLAO<?=$looptimes?>" value="<?=$fpro_b2b_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2c_THLAO<?=$looptimes?>" value="<?=$fpro_b2c_THLAO?>" disabled></td>
												<td><input type="number" name="fpro_b2b_ASIA<?=$looptimes?>" value="<?=$fpro_b2b_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2c_ASIA<?=$looptimes?>" value="<?=$fpro_b2c_ASIA?>" disabled></td>
												<td><input type="number" name="fpro_b2b_INTER<?=$looptimes?>" value="<?=$fpro_b2b_INTER?>" disabled></td>
												<td><input type="number" name="fpro_b2c_INTER<?=$looptimes?>" value="<?=$fpro_b2c_INTER?>" disabled></td>
											</tr>
											
										<?php
												
												} } 
											////// END SUBLOOP /////////?>	
											<input type="hidden" value="<?=$looptimes?>" name="timeloop">
										</tbody>
									</table>
									<div class="date-modified">
										<p>Date Modified : 20 MAR 2017 at 10:10</p>
									</div>	
								</div>
							</div>
						</div>
						</form>	
						
					<?php
					} }
					////////// END MAIN ///////////////////// ?>
					</div>
					
					
					
				</div>
			</div>
		</main>
	</div>

	<div class="modal fade" id="editPrice" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit <b></b></h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-md-6">
						<label><span class="tag">B2C</span>Price</label>
						<input type="number" name="b2c">
						<span class="unit selector">
							<select name="b2cunit">
								<option value="USD">USD</option>
								<option value="MMK">MMK</option>
								<option value="%">%</option>
							</select>
						</span>
					</div>
					<div class="col-md-6">
						<label><span class="tag">B2B</span>Price</label>
						<input type="number" name="b2b">
						<span class="unit selector">
							<select name="b2bunit">
								<option value="USD">USD</option>
								<option value="MMK">MMK</option>
								<option value="%">%</option>
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

  	<div class="modal fade" id="editCurrency" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Edit <b></b></h4>
	          <hr>
	        </div>
	        <div class="modal-body">
	        	<div class="row">
					<div class="col-md-6">
						<label><span class="tag">MMK</span>to USD Rate</label>
						<input type="number" name="currency" value="1200">
						<span class="unit">MMK</span>
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
	$('div.btn.border').click(function() {
		if($(this).text()=='Edit'){
			$(this).closest('.table').each(function(index, el) {
				$(this).closest('.table').find('input[type=number]').removeAttr('disabled');
			});
			$(this).next('.btn').addClass('show');
			$(this).text('Cancel').removeClass('border').addClass('gray');
		}else{
			$(this).closest('.table').each(function(index, el) {
				$(this).closest('.table').find('input[type=number]').attr('disabled','true');
			});
			$(this).text('Edit').addClass('border').removeClass('gray');			
			$(this).next('.btn').removeClass('show');
		}
	});

	$('.btn.gray').click(function(){
		$(this).removeClass('show');
		$(this).closest('.table').each(function(index, el) {
			$(this).closest('.table').find('input[type=number]').attr('disabled','true');
		});
		$(this).next().text('Edit');
	});
</script>
</html>



