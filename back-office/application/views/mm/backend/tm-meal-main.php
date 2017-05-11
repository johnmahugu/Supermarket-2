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
							<p>Meal</p>
						</div>
						<div class="col-sm-4 col-xs-12">
							<div data-toggle="modal" data-target="#newPort" class="btn">Add New City</div>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-sm-4">
							<label class="filter">City</label><br>
							<form method="get" action="st-mealAll">
							<select onchange="this.form.submit()" name="city">
								<option>All City</option>
								<?php
								foreach ($MealCity as $value2) {
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
							</form>
						</div>
						<div class="col-sm-4 col-sm-offset-4 col-xs-12">
							<div href="#" class="btn no-border gray label-level">
								<i class="fa fa-trash-o" aria-hidden="true"></i>
								<span>Delete City</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">


					<?php
							if ($MealCity != ''){
								foreach ($MealCity as $value2) {

					?>
					<div class="list-card">
						<div class="col-sm-3 col-xs-6">
							<h4>Meal in</h4>
							<h2><?php
							$ctname = $value2->city_name;
							$ctid = $value2->city_id;

							$position = strpos($ctname,"|");
							$eng = substr($ctname,$position+1) ;
							echo $eng ; ?></h2>
						</div>
						<div class="input-inline">
							<div class="digi-box">
								<p><?php echo $this->AdminMD->countResturant($ctid) ?>&nbsp;Meal</p>
							</div>
							<div class="input-box btn-inline">
								<a href="st-delMealCity?cityid=<?php echo $ctid ; ?>" class="btn gray hide">Delete</a>
								<a href="st-mealAll?cityid=<?php echo $ctid ; ?>" class="btn border">View <i class="fa fa-angle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>

					<?php
							} 	}
					?>

				</div>

			</div>
		</main>
	</div>

	<div class="modal fade" id="newPort" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add a City</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">City</label><br>
				<form method="post" action="st-addCityMeal">
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
