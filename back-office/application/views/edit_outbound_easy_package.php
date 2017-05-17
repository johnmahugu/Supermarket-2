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
  <script src="assets/js/date.format.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="">
  <form id="update-outbound-package" action="update-outbound-package" method="post" enctype="multipart/form-data">
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
              <h1>Edit
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
							<input id="nameTH" type="text" value="<?=$package['tour_nameTH']?>">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input id="nameEN" type="text" value="<?=$package['tour_nameEN']?>">
						</div>
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Continent</label>
                <select name="continent">
                <?php
                  if(isset($continent)){
                    foreach($continent->result_array() as $row){
                      if($package['continent_id'] == $row['continent_id']){
                        echo "<option value=".$row['continent_id']." selected>".$row['continent_name']."</option>";
                      }else{
                        echo "<option value=".$row['continent_id'].">".$row['continent_name']."</option>";
                      }
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
	              <?php
	                if(isset($country)){
	                	foreach($country->result_array() as $row){
                      if($package['country_id'] == $row['country_id']){
                        echo "<option value=".$row['country_id']." selected>".$row['country_nameEN']."</option>";
                      }else{
                        echo "<option value=".$row['country_id'].">".$row['country_nameEN']."</option>";
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
            <div class="col-sm-4 no-pd">
							<a href="edit-outbound-package?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn current">TOUR INFO</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-service?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-condition?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">CONDITION</a>
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
									<label>Wholesale Agency Company</label>
                  <select name="agent">
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
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Click Upload PDF file
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
                    <?php
                    $est_date = explode(",",$package['tour_dayNight']);
                     ?>
										<label>Day Night Program (<?=$est_date[0]?> Day / <?=$est_date[1]?> Night)</label>
										<span>
                      <select name="daytrip">
												<option disabled selected>Select Day Night</option>
												<optgroup label="Ordinary">
											<?php
												for($i=1;$i<=10;$i++){
													echo '<option value="'.$i.'">'.$i.' Day / '.($i-1).' Night</option>';
												}
											?>
												</optgroup>
												<optgroup label="Extraordinary">
												<option value="5">5 Day / 3 Night</option>
												<option value="7">7 Day / 4 Night</option>
												<option value="8">8 Day / 5 Night</option>
												</optgroup>
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
              <input name="agent" type="hidden" required>
              <input name="type" type="hidden" value="<?=$this->session->flashdata('f1')?>" required>
              <input name="nameTH" type="hidden" required>
              <input name="nameEN" type="hidden" required>
              <input name="startPrice" type="hidden" required>
              <input name="country" type="hidden" required>
              <input name="continent" type="hidden" required>
              <input name="overviewTH" type="hidden" required>
              <input name="overviewEN" type="hidden" required>
              <input name="descTH" type="hidden" required>
              <input name="descEN" type="hidden" required>
              <input name="briefTH" type="hidden" required>
              <input name="briefEN" type="hidden" required>
              <input name="advanceBooking" type="hidden" required>
              <input name="dayNight" type="hidden" required>
              <input name="priceRange" type="hidden" required>
						  <button id="submit" type="submit" class="btn bold">Update Package</button>
            </form>
					</div>
				</div>
			</div>
		</main>
	</div>

  <!-- modal -->
  <div class="modal fade" id="addFile" role="dialog">
    <form id="update-itinerary" style="margin-top:-35%;">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <h4 class="modal-title">Upload <b></b> File</h4>
            <hr>
          </div>
          <div class="modal-body">
            <label class="filter">Select File
            <?php
            if($package['tour_pdf'] != ''){
              echo '(PDF Uploaded) ';
            }
            if($package['tour_word'] != ''){
              echo '(Word Uploaded)';
            }
             ?>
             </label>
             <br>
        <input name="file" type="file">
          </div>
          <div class="modal-footer">
            <input name="nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>">
            <button type="button" class="btn" data-dismiss="modal" >Cancel</button>
            <input id="submitfile" type="button" value="Select" class="btn" >
          </div>
        </div>
      </div>
    </form>
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
  $('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $start_price = $('#startPrice').val();
  $('#startPrice').val(numberWithSpaces($start_price));
});

$('#submitfile').click(function(){
  var formData = new FormData($("#update-itinerary")[0]);
  $.ajax({
    type: 'POST',
    url:'/update-itinerary',
    data: formData,
    mimeType: "multipart/form-data",
    contentType: false,
    cache: false,
    processData: false,
    success:function(data){
      alert(data);
      $('#addFile').removeClass('in');
      $('.modal-backdrop.fade').removeClass('in');
    }
  });
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
  $agent = $('select[name=agent]').find('option:selected').val();
  $continentId = $('select[name=continent]').val();
  $countryId = $('select[name=country]').val();
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
  $('input[name=agent]').val($agent);
  $('input[name=country]').val($countryId);
  $('input[name=continent]').val($continentId);
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
		$(this).closest('.content').find('.form-group').last().after('<div class="form-group priceRange"><div class="col-md-3 col-sm-6 form-inline"><label>From</label><span><input type="text" class="date from" value="Select Date" readonly="readonly"></span></div><div class="col-md-3 col-sm-6 form-inline"><label>To</label><span><input type="text" class="date to" value="Select Date" readonly="readonly" disabled></span></div><div class="col-md-3 col-md-offset-1 col-sm-8 form-inline"><label>Price</label><span><input type="number"><span class="unit">THB</span></span></div><div class="col-md-2 col-sm-4"><div class="btn no-border gray">Delete</div></div></div>');
	});

    $('body').on('focus',".date.from", function(){
    	var dateindex = $(this).closest('.form-group').index();
	    $('.content.dp .form-group:eq('+dateindex+') .date.from').datepicker({
	    	buttonText: "Select date",
	      	dateFormat: 'dd/mm/yy',
	        onSelect: function(date){
	            var to = $(this).datepicker('getDate');
	            var daytrip = parseInt($('select[name="daytrip"]').val());
	            $(this).closest('.form-group').find('.date.to').datepicker({
			      	buttonText: "Select date",
			      	dateFormat: 'dd/mm/yy' });
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
