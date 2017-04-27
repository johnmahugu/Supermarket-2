<?php
/*****************Initial*****************/
$filestorage = 'http://travelshop-center.tk:80/';
/*************List package****************/
$package = $package->row_array(0);
if(isset($price_range)){
  $booking_timerange = json_decode($price_range,true);
  $last_btr = count($booking_timerange)-1;
}
 ?>
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

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="">
  <form id="update-domestic-package" action="update-domestic-package" method="post" enctype="multipart/form-data">
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
			<div class="menu">
				<ul>
					<li><a class="current" href="#">Tour Management</a></li>
					<li><a href="#">Tour Operation</a></li>
					<li><a href="#">Dashboard</a></li>
					<li><span>Admin</span>
						<ul class="">
							<li><a href="profile.html">
								View Profile
							</a></li>
							<li><a href="member-account.html">
								Account Setting
							</a></li>
							<li><a href="login.html">
								Logout
							</a></li>
						</ul>
					</li>

				</ul>
				<p class="menu-btn">MENU</p>
			</div>
		</div>
	</header>
	<div class="body-wrapper">
		<aside>
			<h2>Myanmar Center</h2>
			<div class="title-line">
				<h3>Tour</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-std-main.html">
					<li>Standard Tours</li>
				</a>
				<a href="tm-mc-easy-main.html">
					<li>Easy Packages</li>
				</a>
				<a href="tm-mc-promotion-main.html">
					<li>Promotion</li>
				</a>
				<a href="tm-mc-locationdata.html">
					<li>Location Data</li>
				</a>
				<a href="tm-mc-locationimages.html">
					<li>Location Images</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Shop Travel</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-hotel-main.html">
					<li>Hotel</li>
				</a>
				<a href="tm-vehicle-main.html">
					<li>Vehicle</li>
				</a>
				<a href="tm-meal-main.html">
					<li>Meal</li>
				</a>
				<a href="tm-ticket-main.html">
					<li>Ticket</li>
				</a>
				<a href="tm-guide-main.html">
					<li>Guide</li>
				</a>
				<a href="tm-other-main.html">
					<li>Others</li>
				</a>
			</ul>
			<h2 class="top-mg">Supermarket Tours</h2>
			<div class="title-line">
				<h3>Domestic Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="domestic-package?type=ep">
					<li>Private Group Tours</li>
				</a>
				<a href="domestic-package?type=sp">
					<li>Join Group Tours</li>
				</a>
				<a href="tm-domestic-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Outbound Tours</h3>
				<hr>
			</div>
			<ul>
				<a href="outbound-package?type=ep">
					<li>Private Group Tours</li>
				</a>
				<a href="outbound-package?type=sp">
					<li>Join Group Tours</li>
				</a>
				<a href="tm-outbound-locationdata.html">
					<li>Location Data</li>
				</a>
			</ul>
			<div class="title-line">
				<h3>Tour Agency</h3>
				<hr>
			</div>
			<ul>
				<a href="tm-touragency-main.html">
					<li>Tour Agency Management</li>
				</a>
			</ul>
		</aside>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
							<h1>Edit Join Group Tour</h1>
							<p>Outbound | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameTH" type="text" value="<?=$package['tour_nameTH']?>">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameEN" type="text" value="<?=$package['tour_nameEN']?>">
						</div>
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Region</label>
                <select name="region">
                  <?php
                   if(isset($region)){
                     foreach($region->result_array() as $row){
                       if($package['geography_id'] == $row['geography_id']){
                         echo "<option value=".$row['geography_id']." selected>".$row['geography_nameEN']."</option>";
                       }else{
                         echo "<option value=".$row['geography_id'].">".$row['geography_nameEN']."</option>";
                       }
                     }
                   }
                   ?>
                </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Province</label>
                <select name="province">
                  <?php
  	                if(isset($province)){
  	                	foreach($province->result_array() as $row){
                        if($package['address_province'] == $row['province_nameEN']){
                          echo "<option value=".$row['province_nameEN']." selected>".$row['province_nameEN']."</option>";
                        }else{
                          echo "<option value=".$row['province_nameEN'].">".$row['province_nameEN']."</option>";
                        }
  	                	}
  	                }
  	                ?>
	              </select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Starter Price</label><br>
							<input id="startPrice" type="text" value="<?=intval($package['tour_startPrice'])?>"><span class="unit"><?=$package['tour_currency']?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
						<div class="col-sm-6 no-pd">
							<a href="tm-domestic-series-new.html" class="btn current">TOUR INFO</a>
						</div>
						<div class="col-sm-6 no-pd">
							<a href="edit-domestic-package-condition?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">CONDITION</a>
						</div>
					</div>
				</div>
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
									<label>Tour Agency</label>
                  <select name="agency">
  	              <?php
  	                if(isset($agency)){
  	                	foreach($agency->result_array() as $row){
                        if($package['agent_code'] == $row['agent_code']){
                          echo "<option value=".$row['agent_id']." selected>".$row['agent_code']." ".$row['agent_compName']."</option>";
                        }else{
                          echo "<option value=".$row['agent_id'].">".$row['agent_code']." ".$row['agent_compName']."</option>";
                        }
  	                	}
  	                }
  	                ?>
  	              </select>
									<br><br>
									<label>Package Type</label>
									<input type="text" value="<?=$package['tour_type']?>" disabled>
									<hr><br>
									<label><span class="tag">English</span>Overview</label><br>
									<input id="overviewEN" type="text" value="<?=$package['tour_overviewEN']?>"><br><br>
									<label><span class="tag">English</span>Tour Description</label><br>
									<textarea id="descEN" name="desen" required><?=$package['tour_descEN']?></textarea><br>

									<label><span class="tag">English</span>Tour Briefing</label><br>
									<textarea id="briefEN" name="briefen" required><?=$package['tour_briefingEN']?></textarea><br>
									<hr><br>
									<label><span class="tag">Thai</span>Overview</label><br>
									<input id="overviewTH" type="text" value="<?=$package['tour_overviewTH']?>"><br><br>
									<label><span class="tag">Thai</span>Tour Description</label><br>
									<textarea id="descTH" name="desth" required><?=$package['tour_descTH']?></textarea><br>

									<label><span class="tag">Thai</span>Tour Briefing</label><br>
									<textarea id="briefTH" name="briefth" required><?=$package['tour_briefingTH']?></textarea><br>
									<hr><br>

									<div class="col-md-6 col-xs-12 text-center">
										<div class="btn border light full" data-toggle="modal" id="pdf" data-target="#addFile">
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Click Upload pdf file
										</div>
									</div>
									<div class="col-md-6 col-xs-12 text-center">
										<div class="btn border light full" data-toggle="modal" id="word" data-target="#addFile">
											<i class="fa fa-file-word-o" aria-hidden="true"></i> Click Upload word file
										</div>
									</div>
									<div class="clear"></div><br>
									<label>Advance booking days</label><br>
									<input id="advanceBooking" type="number" value="<?=$package['tour_advanceBooking']?>" min="0">
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
                      <?php
                        $est_date = explode(",",$package['tour_dayNight']);
                        for($i=1;$i<=10;$i++){
                          if($i == $est_date[0]){
                            echo '<option value="'.$i.'" selected>'.$i.' Day / '.($i-1).' Night</option>';
                          }else{
                            echo '<option value="'.$i.'">'.$i.' Day / '.($i-1).' Night</option>';
                          }
                        }
                      ?>
                      </select>
										</span>
									</div>
								</div>
							</div>
						</div><br>
						<div class="col-xs-12">
							<div class="content dp">
                <?
                for($i=0;$i<=$last_btr;$i++){
                  ?>
								<div class="form-group priceRange">
									<div class="col-md-3 col-sm-6 form-inline">
										<label>From</label>
										<span>
											<input type="text" class="date from" value="<?=$booking_timerange[$i]['from']?>" readonly="readonly">
										</span>
									</div>
									<div class="col-md-3 col-sm-6 form-inline">
										<label>To</label>
										<span>
											<input type="text" class="date to" value="<?=$booking_timerange[$i]['to']?>" readonly="readonly" disabled>
										</span>
									</div>
									<div class="col-md-3 col-md-offset-1 col-sm-8 form-inline">
										<label>Price</label>
										<span>
											<input type="number" value="<?=$booking_timerange[$i]['price']?>">
											<span class="unit"><?=$package['tour_currency']?></span>
										</span>
									</div>
									<div class="col-md-2 col-sm-4">
										<div class="btn no-border gray">Delete</div>
									</div>
								</div>
                <?
              }
                ?>
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
              <input name="oldNameSlug" type="hidden" required>
              <input name="newNameSlug" type="hidden" required>
              <input name="type" type="hidden" value="<?=$this->session->flashdata('f1')?>" required>
              <input name="region" type="hidden" required>
              <input name="province" type="hidden" required>
              <input name="nameTH" type="hidden" required>
              <input name="nameEN" type="hidden" required>
              <input name="overviewTH" type="hidden" required>
              <input name="overviewEN" type="hidden" required>
              <input name="descTH" type="hidden" required>
              <input name="descEN" type="hidden" required>
              <input name="briefTH" type="hidden" required>
              <input name="briefEN" type="hidden" required>
              <input name="advanceBooking" type="hidden" required>
              <input name="dayNight" type="hidden" required>
              <input name="priceRange" type="hidden" required>
						  <button id="submit" type="submit" class="btn bold">Add Package</button>
            </form>
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
		        <input id="gen-schedule" type="submit" value="Set" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>
    <input id="nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>">
    <input id="isTourType" type="hidden" value="<?=$this->session->flashdata('f1')?>">
</body>
<script src="assets/js/script.js"></script>
<script>
$(document).ready(function(){
  $('a[href="domestic-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $start_price = $('#startPrice').val();
  $('#startPrice').val(numberWithSpaces($start_price));
});

$('#submit').click(function(){
  submit();
});

function submit(){
  for ( instance in CKEDITOR.instances ) {
    CKEDITOR.instances[instance].updateElement();
  }
  $nameSlug = $('#nameSlug').val();
  $nameTH = $('#nameTH').val();
  $nameEN = $('#nameEN').val();
  $newNameSlug = $nameEN.toLowerCase()
    .replace(/\s+/g, '-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
  $region = $('select[name=region]').val();
  $province = $('select[name=province]').find('option:selected').text();
  $overviewTH = $('#overviewTH').val();
  $overviewEN = $('#overviewEN').val();
  $descTH = $('#descTH').val();
  $descEN = $('#descEN').val();
  $briefTH = $('#briefTH').val();
  $briefEN = $('#briefEN').val();
  $advanceBooking = $('#advanceBooking').val();
  $startPrice = $('#startPrice').val().replace(' ','');
  $day = $('select[name=daytrip]').val();
  $night = $day-1;

  $('input[name=oldNameSlug]').val($nameSlug);
  $('input[name=newNameSlug]').val($newNameSlug);
  $('input[name=nameTH]').val($nameTH);
  $('input[name=nameEN]').val($nameEN);
  $('input[name=region]').val($region);
  $('input[name=province]').val($province);
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
      switch(i%3){
        case 0:
          $from = $(this).val();
        break;
        case 1:
          $to = $(this).val();
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
  var imageData = $('.image-editor').cropit('export');
	$('.hidden-image-data').val(imageData);
}

$('#gen-schedule').click(function(){
});

function listGenSchedule(){
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
    alert('Invalid number');
    $('#startPrice').val(this.defaultValue);
    $('#startPrice').focus();
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
		$(this).closest('.content').find('.form-group').last().after('<div class="form-group"><div class="col-md-3 col-sm-6 form-inline"><label>From</label><span><input type="text" class="date from" value="Select Date" readonly="readonly"></span></div><div class="col-md-3 col-sm-6 form-inline"><label>To</label><span><input type="text" class="date to" value="Select Date" readonly="readonly" disabled></span></div><div class="col-md-3 col-md-offset-1 col-sm-8 form-inline"><label>Price</label><span><input type="number"><span class="unit">THB</span></span></div><div class="col-md-2 col-sm-4"><div class="btn no-border gray">Delete</div></div></div>');
	});

    $('body').on('focus',".date.from", function(){
    	var dateindex = $(this).closest('.form-group').index();
	    $('.content.dp .form-group:eq('+dateindex+') .date.from').datepicker({
	    	buttonText: "Select date",
	      	dateFormat: 'yy-mm-dd',
	        onSelect: function(date){
	            var to = $(this).datepicker('getDate');
	            var daytrip = parseInt($('select[name="daytrip"]').val());
	            $(this).closest('.form-group').find('.date.to').datepicker({
			      	buttonText: "Select date",
			      	dateFormat: 'd/m/yy' });
	            to.setDate(to.getDate()+daytrip);
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
