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
						<div class="col-sm-9 col-xs-12">
							<h1>Shop Travel</h1>
							<p>All Airline List</p>
						</div>
						<div class="col-sm-3 col-xs-12">
							<div data-toggle="modal" data-target="#newAirline" class="btn">Add New Airline</div>
						</div>
					</div>
					<div class="row top-mg">
						<div class="col-xs-12">
							<a href="st-ticket" class="btn no-border label-level">
								Airway Ticket <i class="fa fa-angle-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">



					<?php
							if ($Airline != ''){
								foreach ($Airline as $value2) {

					?>

					<div class="list-card">
						<img src="assets/images/<?php echo $value2->airline_pic_src;?>" alt="" class="icon">
						<h2><?php echo $value2->airline_name;?></h2>
						<?php $curr = $value2->airline_id;?>
						<div class="input-inline">
							<div class="input-box">
								<div data-toggle="modal" data-target="#newAirline" class="btn light border" onclick="addCall('<?php echo $curr ; ?>')">Edit</div>
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

	<div class="modal fade" id="newAirline" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Add New Airline</h4>
	          <hr>
	        </div>

		<?php
			echo form_open_multipart('st-addAirline');
		?>
		   <div class="modal-body">
	        	<div class="row">
	        		<div class="col-xs-12 form-inline">
	        			<div class="icon">
	        				<img src="" alt="">
	        				<input type="file" name="filesss">
	        				<input type="hidden" name="action" value="add">
	        				<input type="hidden" name="editid" value="">
	        			</div>
	        			<span>
	        				<label class="filter">Airline Name</label><br>
							<input type="text" name="airlineName">
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

</body>
<script src="assets/js/script.js"></script>
<script>


	$('.list-card .btn.light.border').click(function() {
		$('.modal-title').text('Edit Airline');
		$('input[name="airlineName"]').val($(this).closest('.list-card').find('h2').text());
		$('input[name="action"]').val('edit');
		$('.modal-body .icon img').attr('src',$(this).closest('.list-card').find('img').attr('src'));
		$('.modal-footer input').val('Save');
	});

	$('.title-bar-wrapper .btn').click(function(){
		$('.modal-title').text('Add New Airline');
		$('input[name="airlineName"]').val(' ');
		$('.modal-body .icon img').attr('src','');
		$('.modal-footer input').val('Add');
	});

	$('.modal-body .icon img').click(function(){
		$(this).siblings('input').click();
	});

	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('.modal-body .icon img').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }

	}

	$(".modal-body .icon input").change(function(){
	    readURL(this);

	});

function addCall(dataId) {
	//window.alert(dataId);
	$('input[name="editid"]').val(dataId);

}
</script>
</html>
