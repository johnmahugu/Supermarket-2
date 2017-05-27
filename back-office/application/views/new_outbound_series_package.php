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

	<link rel="stylesheet" href="assets/css/dropzone.css">
	<script src="assets/js/ckeditor/ckeditor.js"></script>
	<script src="assets/js/jquery.cropit.js"></script>
  <script src="assets/js/date.js"></script>
	<script src="assets/js/date.format.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="">
  <form id="insert-outbound-package" action="insert-outbound-package" method="post" enctype="multipart/form-data" onsubmit="return submitform();">
	<header>
		<div class="header-bar">
			<div class="logo">
				<div class="burger">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<a href="http://back-office.travelshop-center.tk/mainmenu">
					<img src="assets/images/logo.png" alt="">
				</a>
			</div>
			<?php include('pagepart/backtop.php') ;?>
		</div>
	</header>
	<div class="body-wrapper">
		<?php include('pagepart/backside.php') ; ?>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
							<h1>New
                <?php
                if($this->session->flashdata('f1') == 'ep'){
									echo 'Easy Package';
								}else{
									echo 'Series Package';
								}
                 ?>
              </h1>
							<p>Outbound | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameTH" type="text" placeholder="Thai Tour Name">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameEN" type="text" placeholder="English Tour Name">
						</div>
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Continent</label>
                <select name="continent">
                  <option disabled selected>Select Continent</option>
                <?php
                  if(isset($continent)){
                    foreach($continent->result_array() as $row){
                      echo "<option value=".$row['continent_id'].">".$row['continent_name']."</option>";
                    }
                  }
                  ?>
                </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Country</label>
                <select name="country">
                  <option disabled selected>Select Country</option>
	              <?php
	                if(isset($country)){
	                	foreach($country->result_array() as $row){
                      echo "<option value=".$row['country_id'].">".$row['country_nameEN']."</option>";
	                	}
	                }
	                ?>
	              </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Starter Price</label><br>
							<input id="startPrice" type="text"><span class="unit">THB</span>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="list-card card-header">
						<div class="header">
							<h2>Tour Info</h2>
						</div><br>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<label>Tour Cover</label>
									<div class="image-editor cover">
										<input type="file" class="cropit-image-input">
								        <div class="cropit-preview">
								        	<div class="error-msg"></div>
								        </div>
								        <br>
								        <input type="range" class="cropit-image-zoom-input">
								        <input type="hidden" name="image-data" class="hidden-image-data"/>
								    </div>
								    <div class="btn upload">Choose Cover Image</div>
								</div>
								<div class="col-md-8">
									<label>Wholesale Agency Company</label>
                  <select name="agent">
  	              <?php
  	                if(isset($agency)){
  	                	foreach($agency->result_array() as $row){
                        echo "<option value=".$row['agent_id'].">".$row['agent_code']." ".$row['agent_compName']."</option>";
  	                	}
  	                }
  	                ?>
  	              </select>
									<br><br>
									<label>Package Type</label>
                  <?php
                  $type = $this->session->flashdata('f1');
                  if($type == 'sp'){
                    echo '<input type="text" value="Series Package" disabled>';
                  }else{
                    echo '<input type="text" value="Easy Package" disabled>';
                  }
                   ?>
									<hr><br>
									<label><span class="tag">English</span>Overview</label><br>
									<input id="overviewEN" type="text"><br><br>
									<label><span class="tag">English</span>Tour Description</label><br>
  									<textarea id="descEN" name="desen"></textarea><br>

									<label><span class="tag">English</span>Tour Briefing</label><br>
									<textarea id="briefEN" name="briefen"></textarea><br>
									<hr><br>

									<label><span class="tag">Thai</span>Overview</label><br>
									<input id="overviewTH" type="text"><br><br>
									<label><span class="tag">Thai</span>Tour Description</label><br>
									<textarea id="descTH" name="desth"></textarea><br>

									<label><span class="tag">Thai</span>Tour Briefing</label><br>
									<textarea id="briefTH" name="briefth"></textarea><br>
									<hr><br>

									<div class="clear"></div><br>

									<label>Advance booking days</label><br>
									<input id="advanceBooking" type="number" value="0">
									<span class="unit">Day</span>
								</div>
							</div>
							<div class="form-group"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card top card-header">
						<div class="header">
							<div class="form-group no-bottom-mg">
								<div class="col-sm-6">
									<h2>Tour Schedule</h2>
								</div>
								<div class="col-sm-6">
									<div class="form-inline">
										<label>Day Night Program</label>
										<span>
                      <select name="daytrip">
												<option disabled selected>Select Day Night</option>
												<optgroup label="Ordinary">
                      <?php
                        for($i=1;$i<=10;$i++){
                          echo '<option value="'.$i.'" night="'.($i-1).'">'.$i.' Day / '.($i-1).' Night</option>';
                        }
                      ?>
												</optgroup>
												<optgroup label="Extraordinary">
													<?php include('extraordinary.php') ; ?>
												</optgroup>
                      </select>
										</span>
									</div>
								</div>
							</div>
						</div><br>
						<div class="col-xs-12 hide">
							<div class="content dp">
								<div class="form-group priceRange">
									<div class="col-md-3 col-sm-6 form-inline">
										<label>From</label>
										<span>
											<input type="text" class="date from" value="Select Date" readonly="readonly">
										</span>
									</div>
									<div class="col-md-3 col-sm-6 form-inline">
										<label>To</label>
										<span>
											<input type="text" class="date to" value="Select Date" readonly="readonly" disabled>
										</span>
									</div>
									<div class="col-md-3 col-md-offset-1 col-sm-8 form-inline">
										<label>Price</label>
										<span>
											<input type="number">
											<span class="unit">THB</span>
										</span>
									</div>
									<div class="col-md-2 col-sm-4">
										<div class="btn no-border gray">Delete</div>
									</div>
								</div>

								<div class="btn-wrapper">
									<div class="col-xs-12">
										<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Day Trip</div>
										<div class="btn border pull-right" data-toggle="modal" id="pdf" data-target="#autoschedule">Auto Schedule</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="btn-wrapper text-center">
            <input name="nameSlug" type="hidden" required>
            <input name="agentId" type="hidden" required>
            <input name="type" type="hidden" value="<?=$this->session->flashdata('f1')?>" required>
            <input name="nameTH" type="hidden" required>
            <input name="nameEN" type="hidden" required>
            <input name="country" type="hidden" required>
            <input name="continent" type="hidden" required>
            <input name="overviewTH" type="hidden" required>
            <input name="overviewEN" type="hidden" required>
            <input name="descTH" type="hidden" required>
            <input name="descEN" type="hidden" required>
            <input name="briefTH" type="hidden" required>
            <input name="briefEN" type="hidden" required>
            <input name="startPrice" type="hidden" required>
            <input name="advanceBooking" type="hidden" required>
            <input name="dayNight" type="hidden" required>
            <input name="priceRange" type="hidden" required>
            <input name="closeBooking" type="hidden" required>
            <button id="submit" type="submit" class="btn bold">Add Package</button>
					</div>
				</div>
			</div>
		</main>
	</div>

	<!-- modal -->
	<div class="modal fade" id="addFile" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Upload <b></b> File</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">Select File</label><br>
				<input type="file">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Select" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

  	<div class="modal fade" id="autoschedule" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Auto Schedule</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<label>Start Date</label>
						<input type="text" class="date set">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>Due Date</label>
						<input type="text" class="date set">
					</div>
					<div class="col-md-4 col-sm-12">
						<label>Duration</label>
						<input type="number">
						<span class="unit">Days</span>
					</div>
				</div>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Set" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>
		<!-- Modal -->
		<div class="modal fade" id="popup" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
					</div>
					<div class="modal-body text-center">
						<img src="<?=base_url()?>assets/images/ico-alert.png" alt="">
						<h4>Something wrong</h4>
						<p id="alert-warning">Please fill in all fields.</p>
					</div>
					<div class="modal-footer">
					</div>
				</div>
			</div>
		</div>
    <input id="isTourType" type="hidden" value="<?=$this->session->flashdata('f1')?>">
</body>
<script src="assets/js/script.js"></script>
<script>
$(document).ready(function(){
	$('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
});

$('#nameEN').blur(function(){
	if($(this).val() != ''){
		$.ajax({
			type: 'POST',
			url:'/check-nameEN',
			data:{
				'nameEN': $(this).val()
			},
			success:function(data){
				if(data == '0'){
					alert('Name is duplicate. Please change tour name.');
					$('#nameEN').val('');
					$('#nameEN').focus();
				}
			}
		});
	}
});

$('#nameEN').blur(function(){
	if(validateLatin($(this).val())){
		alert('Invalid tour name');
		$('#nameEN').val('');
		$('#nameEN').focus();
	}
});

function validateLatin($string) {
  $result = false;
	regEx=/[^a-zA-Z0-9_ -]/;
  if (regEx.test($string)) {
      $result = true;
  }
  return $result;
}

function submitform(){
  for ( instance in CKEDITOR.instances ) {
    CKEDITOR.instances[instance].updateElement();
  }
  $nameTH = $('#nameTH').val();
  $nameEN = $('#nameEN').val();
  $newNameSlug = $nameEN.toLowerCase()
    .replace(/\s+/g, '-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
  $agentId = $('select[name=agent]').val();
  $continent = $('select[name=continent]').val();
  $country = $('select[name=country]').val();
  $overviewTH = $('#overviewTH').val();
  $overviewEN = $('#overviewEN').val();
  $descTH = $('#descTH').val();
  $descEN = $('#descEN').val();
  $briefTH = $('#briefTH').val();
  $briefEN = $('#briefEN').val();
  $advanceBooking = $('#advanceBooking').val();
  $startPrice = $('#startPrice').val().replace(' ','');
  $day = $('select[name=daytrip]').val();
  $night = $('select[name=daytrip] option:selected').attr('night');
	var imageData = $('.image-editor').cropit('export');
	$status = true;
	switch(true){
		case ($nameTH == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($nameEN == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case (imageData == 'undefined' || imageData == '' || imageData == undefined):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($agentId == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($continent == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($country == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($overviewTH == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($overviewEN == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($descTH == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($descEN == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($briefTH == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($briefEN == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($advanceBooking == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($startPrice == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($day == ''):
			$status = false;
			$('#popup').modal('show');
		break;
		case ($night == ''):
			$night == '0';
		break;
	}

	if($status == true){
		$('input[name=nameSlug]').val($newNameSlug);
	  $('input[name=nameTH]').val($nameTH);
	  $('input[name=nameEN]').val($nameEN);
	  $('input[name=agentId]').val($agentId);
		$('input[name=continent]').val($continent);
	  $('input[name=country]').val($country);
	  $('input[name=overviewTH]').val($overviewTH);
	  $('input[name=overviewEN]').val($overviewEN);
	  $('input[name=descTH]').val($descTH);
	  $('input[name=descEN]').val($descEN);
	  $('input[name=briefTH]').val($briefTH);
	  $('input[name=briefEN]').val($briefEN);
	  $('input[name=advanceBooking]').val($advanceBooking);
	  $('input[name=startPrice]').val($startPrice);
	  $('input[name=dayNight]').val($day+","+$night);
	  $priceRange = $('.priceRange');
	  $from = '';
	  $to = '';
	  $price = '';
	  $result = '[';
	  for($i=0;$i<$priceRange.length;$i++){
	    $($priceRange[$i]).find('input').each(function(i){
				$d_temp = $(this).val().split("/");
	      $d_temp = new Date($d_temp[2]+'-'+$d_temp[1]+'-'+$d_temp[0]);
	      switch(i%3){
	        case 0:
	          $from = dateFormat($d_temp, "yyyy-mm-dd");
	        break;
	        case 1:
	          $to = dateFormat($d_temp, "yyyy-mm-dd");
	        break;
	        case 2:
	          $price = $(this).val();
	        break;
	      }
	    });
	    $result += '{"from":"'+$from+'","to":"'+$to+'","price":'+$price+'},';
	  }
	  $result = $result.substr(0,$result.length-1);
	  $result += ']';
	  $('input[name=priceRange]').val($result);
	  $closeBooking = Date.parse($to).addDays(-$advanceBooking).toString("yyyy-MM-dd");
	  $('input[name=closeBooking]').val($closeBooking);
	  var imageData = $('.image-editor').cropit('export');
		$('.hidden-image-data').val(imageData);
	}
	return $status;
}

$('#startPrice').click(function(){
  $start_price = $(this).val().replace(' ','');
  $('#startPrice').val($start_price);
});

$('#startPrice').blur(function(){
  $start_price = $('#startPrice').val();
  if($.isNumeric($start_price.replace(' ',''))){
    $('#startPrice').val(numberWithSpaces($start_price));
  }else{
		if($('#startPrice').val() != ''){
			alert('Invalid number');
	    $('#startPrice').val(0);
	    $('#startPrice').focus();
		}
  }
});

function numberWithSpaces(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

  CKEDITOR.replace( 'desen',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','BulletedList']}],
	});
	CKEDITOR.replace( 'briefen',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','Italic','BulletedList']}],
	});

	CKEDITOR.replace( 'desth',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','BulletedList']}],
	});
	CKEDITOR.replace( 'briefth',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','Italic','BulletedList']}],
	});


	$('.image-editor.cover').cropit({
      	exportZoom: 2,
      	imageBackgroundBorderWidth: 20,
      	allowDragNDrop: true,
      	imageBackground: true,
		imageBackgroundBorderWidth: 15,
        onImageError: function(e) {
            if (e.code === 1) {
                $('.image-editor.cover .error-msg').text("ขนาดภาพต้องมีขนาดมากกว่า 600px x 600px");
                $('.image-editor.cover .cropit-preview').addClass("has-error");
                window.setTimeout(function() {
                    return function() {
                        return $('.image-editor.cover .cropit-preview').removeClass("has-error")
                    }
                }(this), 3e3)
            }
        }
    });

    $('.upload').click(function(){
    	$(this).siblings(".image-editor").find('.cropit-image-input').click();
    });

	$('.list-card .btn.no-border.light').click(function() {
		var addform = $(this).closest('.content').find('.form-group').last().html();
		$(this).closest('.content').find('.form-group').last().after('<div class="form-group priceRange"><div class="col-md-3 col-sm-6 form-inline"><label>From</label><span><input type="text" class="date from" value="Select Date" readonly="readonly"></span></div><div class="col-md-3 col-sm-6 form-inline"><label>To</label><span><input type="text" class="date to" value="Select Date" readonly="readonly" disabled></span></div><div class="col-md-3 col-md-offset-1 col-sm-8 form-inline"><label>Price</label><span><input type="number"><span class="unit">THB</span></span></div><div class="col-md-2 col-sm-4"><div class="btn no-border gray">Delete</div></div></div>');

	});

    $('body').on('focus',".date.from", function(){
    	var dateindex = $(this).closest('.form-group').index();
	    $('.content.dp .form-group:eq('+dateindex+') .date.from').datepicker({
	    	buttonText: "Select date",
	      	dateFormat: 'dd/mm/yy',
					isBuddhist: true,
	        onSelect: function(date){
	            var to = $(this).datepicker('getDate');
	            var daytrip = parseInt($('select[name="daytrip"]').val());
	            $(this).closest('.form-group').find('.date.to').datepicker({
			      	buttonText: "Select date",
			      	dateFormat: 'dd/mm/yy'});
	            to.setDate(to.getDate()+(daytrip-1));
	            $(this).closest('.form-group').find('.date.to').datepicker('setDate', to);}
	    	});
	});

	$('body').on('click',".btn.no-border.gray", function(){
		$(this).closest('.form-group').remove();
	});

    $('select[name="daytrip"]').change(function() {
    	$(this).closest('.list-card').find('.col-xs-12').removeClass('hide');
    });

    $('.btn.full').click(function(){
    	$('#addFile .modal-header .modal-title b').text($(this).attr('id'));
    });

    $('.date.set').datepicker({
    	buttonText: "Select date",
	    dateFormat: 'd/m/yy'
    });


</script>
</html>
