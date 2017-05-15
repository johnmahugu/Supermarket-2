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
							<h1>Pricing Setting</h1>
							<p>Myanmar Center</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
				<?php ///////// Exchange ZONE ////////?>
				<?php 	$exrate = $this->AdminMD->getExRate();
						foreach($exrate as $value){	
							$name = $value->ex_currency;
							$shortCC = $value->ex_shortcurrency;
							$exrate = $value->ex_rate;
							$exId = $value->ex_id;
				?>
					<input type="hidden" value="<?=$exrate?>" name="currentExRate<?=$exId?>" id="currentExRate<?=$exId?>">
					<div class="list-card">
						<div class="col-sm-6 col-xs-12">
							<h4>Exchange Rate</h4>
							<h2><?=$name?></h2><br>
						</div>
						<div class="col-sm-2 col-xs-6">
							<p><span class="tag">USD</span><u>1</u></p>
							
						</div>
						<div class="col-sm-2 col-xs-6">
							<p><span class="tag"><?=$shortCC?></span><u><?=$exrate?></u></p>
						</div>

						<div class="input-inline">
							<div class="input-box">
								<div class="btn light" data-toggle="modal" data-target="#editCurrency"  onclick="editCall(<?=$exId?>)" >Edit</div>
							</div>
						</div>
						
					</div>
						<?php } ?>	
					
					
					<?php ///////// Exchange ZONE ////////?>
					
					<?php $profithigh = $this->AdminMD->getProfit('high'); ?>
					
					<div class="list-card card-header">
						<div class="header">
							<h2>High Season(Defult)</h2>
						</div>
						<hr>
						
						<?php if($profithigh != '')
						{
							foreach($profithigh as $value){
								$proId = $value->pro_id;
								$profittype = $value->pro_type;
								$b2b = $value->pro_b2b;
								$b2bP = $value->pro_b2b_IsPercent;
								if($b2bP == 'N'){
									$ccb2b = 'USD' ;
								}else{ $ccb2b = '%' ; }
								
								$b2c = $value->pro_b2c;
								$b2cP = $value->pro_b2c_isPercent;
								
								if($b2cP == 'N'){
									$ccb2c = 'USD' ;
								}else{ $ccb2c = '%' ; }
							
						?>
						
						<div class="col-xs-12">
							<div class="list multi">						
								<div class="content">
									<div class="col-sm-8 col-xs-12">
										<p><?=$profittype?></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2C</span><u><?=$b2c?></u> <b><?=$ccb2c?></b></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2B</span><u><?=$b2b?></u> <b><?=$ccb2b?></b></p>
									</div>
								</div>
								<div class="input-inline">
									<div class="input-box">
										<div class="btn light no-top-mg" data-toggle="modal" data-target="#editPrice" onclick="editCall2(<?php echo $proId ; ?>)">Edit</div>
									</div>
								</div>
							</div>
						</div>

						
							<?php } } ?>
						
						
					</div>
					
					<?php $profithigh = $this->AdminMD->getProfit('low'); ?>
					
					<div class="list-card card-header">
						<div class="header">
							<h2>Low Season</h2>
						</div>
						<hr>
						
						<?php if($profithigh != '')
						{
							foreach($profithigh as $value){
								$proId = $value->pro_id;
								$profittype = $value->pro_type;
								$b2b = $value->pro_b2b;
								$b2bP = $value->pro_b2b_IsPercent;
								if($b2bP == 'N'){
									$ccb2b = 'USD' ;
								}else{ $ccb2b = '%' ; }
								
								$b2c = $value->pro_b2c;
								$b2cP = $value->pro_b2c_isPercent;
								
								if($b2cP == 'N'){
									$ccb2c = 'USD' ;
								}else{ $ccb2c = '%' ; }
							
						?>
						
						<div class="col-xs-12">
							<div class="list multi">						
								<div class="content">
									<div class="col-sm-8 col-xs-12">
										<p><?=$profittype?></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2C</span><u><?=$b2c?></u> <b><?=$ccb2c?></b></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2B</span><u><?=$b2b?></u> <b><?=$ccb2b?></b></p>
									</div>
								</div>
								<div class="input-inline">
									<div class="input-box">
										<div class="btn light no-top-mg" data-toggle="modal" data-target="#editPrice" onclick="editCall2(<?php echo $proId ; ?>)">Edit</div>
									</div>
								</div>
							</div>
						</div>

						
							<?php } } ?>
						
						
					</div>
					
					<?php $profithigh = $this->AdminMD->getProfit('songkarn'); ?>
					
					<div class="list-card card-header">
						<div class="header">
							<h2>Songkarn Festival</h2>
						</div>
						<hr>
						
						<?php if($profithigh != '')
						{
							foreach($profithigh as $value){
								$proId = $value->pro_id;
								$profittype = $value->pro_type;
								$b2b = $value->pro_b2b;
								$b2bP = $value->pro_b2b_IsPercent;
								if($b2bP == 'N'){
									$ccb2b = 'USD' ;
								}else{ $ccb2b = '%' ; }
								
								$b2c = $value->pro_b2c;
								$b2cP = $value->pro_b2c_isPercent;
								
								if($b2cP == 'N'){
									$ccb2c = 'USD' ;
								}else{ $ccb2c = '%' ; }
							
						?>
						
						<div class="col-xs-12">
							<div class="list multi">						
								<div class="content">
									<div class="col-sm-8 col-xs-12">
										<p><?=$profittype?></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2C</span><u><?=$b2c?></u> <b><?=$ccb2c?></b></p>
									</div>
									<div class="col-sm-2 col-xs-6">
										<p><span class="tag">B2B</span><u><?=$b2b?></u> <b><?=$ccb2b?></b></p>
									</div>
								</div>
								<div class="input-inline">
									<div class="input-box">
										<div class="btn light no-top-mg" data-toggle="modal" data-target="#editPrice" onclick="editCall2(<?php echo $proId ; ?>)">Edit</div>
									</div>
								</div>
							</div>
						</div>

						
							<?php } } ?>
						
						
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
			<form action="setProfit" method="post">
			<input type="hidden" name="profitid">
	        <div class="modal-body">
	        	<div class="row">
	        		<div class="col-md-6">
						<label><span class="tag">B2C</span>Price</label>
						<input type="number" name="b2c">
						<span class="unit selector">
							<select name="b2cunit">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
								<option value="%">%</option>
							</select>
						</span>
					</div>
					<div class="col-md-6">
						<label><span class="tag">B2B</span>Price</label>
						<input type="number" name="b2b">
						<span class="unit selector">
							<select name="b2bunit">
								<option value="usd">USD</option>
								<option value="mmk">MMK</option>
								<option value="%">%</option>
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
					<form action="editCurrency" method="post">
						<label><span class="tag">Currency</span>to USD Rate</label>
						<input type="number" name="exrate" value="1200">
						<span class="unit">Currency</span>
					</div>
	        	</div>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
				<input type="hidden" value="" name="exIdedit">
		        <input type="submit" value="Edit" class="btn" >
				</form>
	        </div>
	      </div>
	    </div>
  	</div>

</body>
<script src="assets/js/script.js"></script>
<script>
	$('.btn.light').click(function() {
		var title = $(this).closest('.list-card').find('h4').text();
		var b2b = $(this).closest('.list-card').find('.tag:contains("B2B")').siblings('u').text();
		var b2c = $(this).closest('.list-card').find('.tag:contains("B2C")').siblings('u').text();
		var b2bUnit = $(this).closest('.list-card').find('.tag:contains("B2B")').siblings('b').text();
		var b2cUnit = $(this).closest('.list-card').find('.tag:contains("B2C")').siblings('b').text();

		if($(this).closest('.list-card').hasClass('card-header')){
			title = $(this).closest('.list').find('.content > div:eq(0) p').text();
			b2b = $(this).closest('.list').find('.tag:contains("B2B")').siblings('u').text();
			b2c = $(this).closest('.list').find('.tag:contains("B2C")').siblings('u').text();
			b2bUnit = $(this).closest('.list').find('.tag:contains("B2B")').siblings('b').text();
			b2cUnit = $(this).closest('.list').find('.tag:contains("B2C")').siblings('b').text();
		}
		$('.modal-title b').text($(this).closest('.list-card').find('h2').text()+' '+title);

		$('.modal input[name="b2b"]').val(b2b);
		$('.modal input[name="b2c"]').val(b2c);
		$('select[name="b2bunit"] option[value="'+b2bUnit+'"]').prop('selected', true);
		$('select[name="b2cunit"] option[value="'+b2cUnit+'"]').prop('selected', true);
	});
	
	function editCall(dataId) {


	var currentExRate = document.getElementById('currentExRate'+dataId).value;
	
	$('input[name="exIdedit"]').val(dataId);
	$('input[name="exrate"]').val(currentExRate);


}


function editCall2(dataId) {
	//window.alert(dataId);
	$('input[name="profitid"]').val(dataId);

}
	
	
</script>
</html>



