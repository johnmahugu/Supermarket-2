<?php
/*****************Initial*****************/
$filestorage = 'http://travelshop-center.tk:80/';
/*************List package****************/
$package = $package->row_array(0);
if(isset($price_range)){
  $booking_timerange = json_decode($price_range,true);
  $last_btr = count($booking_timerange)-1;
}
$sr = 0;
$sr_price = '';
$cwd = 0;
$cwd_price = '';
$cwod = 0;
$cwod_price = '';
$c = 0;
$c_price = '';
foreach($condition->result_array() as $row){
	if($row['tc_type'] == 'room'){
    $temp = json_decode($row['tc_data'],true);
		switch($temp[0]['roomtype']){
			case 'Single room':
			$sr++;
      $sr_price = intval($row['tc_price']);
			break;
			case 'Children 2 - 12 yrs (with bed)':
			$cwd++;
      $cwd_price = intval($row['tc_price']);
			break;
			case 'Children 2 - 12 yrs (without bed)':
			$cwod++;
      $cwod_price = intval($row['tc_price']);
			break;
			case 'Children < 2 yrs':
			$c++;
      $c_price = intval($row['tc_price']);
			break;
		}
	}
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
							<p>Outbound	 | Supermarket Tours</p><br>
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
					<hr>
					<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p>
								<?php
								$count = 0;
								foreach($condition->result_array() as $row){
									if($row['tc_type'] == 'option'){
										$count++;
									}
								}
								if($count>0){
									echo '<input type="checkbox" name="option" checked>Tour Options';
								}else{
									echo '<input type="checkbox" name="option">Tour Options';
								}
								 ?>
							</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p>
								<?php
								$count = 0;
								foreach($condition->result_array() as $row){
									if($row['tc_type'] == 'option activity'){
										$count++;
									}
								}
								if($count>0){
									echo '<input type="checkbox" name="multiple" checked>Multiple Options';
								}else{
									echo '<input type="checkbox" name="multiple">Multiple Options';
								}
								 ?>
							</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p>
								<?php
								if($package['tour_privateGroup'] == '1'){
									echo '<input type="checkbox" name="pv" checked>Private Group';
								}else{
									echo '<input type="checkbox" name="pv">Private Group';
								}
								 ?>
							</p>
						</div>
						<div class="col-md-3 col-sm-4 col-xs-6">
							<p>
								<?php
                $status = 0;
                if($package['tour_doublePack'] == 1){
                  $status++;
                }
								if($status > 0 || $package['tour_minimum'] > 0){
									echo '<input type="checkbox" name="pax" checked>Pax Condition';
								}else{
									echo '<input type="checkbox" name="pax">Pax Condition';
								}
								 ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
						<div class="col-sm-4 no-pd">
							<a href="edit-outbound-package?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">TOUR INFO</a>
						</div>
            <div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-service?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn no-setting">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="edit-outbound-package-condition?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn current">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header hide" id="option">
						<div class="header">
							<h2>Tour Options</h2>
						</div>
						<div class="content">
              <?php
							$count = 0;
              foreach($condition->result_array() as $row){
              	if($row['tc_type'] == 'option'){
									$count++;
                  echo '<div class="form-group"><div class="col-md-4">';
                  echo '<input class="option" type="text" placeholder="Option Name" value="'.$row['tc_data'].'">';
                  echo '</div><div class="col-md-3 form-inline"><label>Condition</label><span>';
                  echo '<select>';
                  if($row['tc_condition'] == 'increase'){
                    echo '<option class="optioncond" selected>Increase</option>';
                    echo '<option class="optioncond">Decrease</option>';
                  }else{
                    echo '<option class="optioncond" selected>Decrease</option>';
                    echo '<option class="optioncond">Increase</option>';
                  }
                  echo '</select>';
                  echo '</span></div>';
                  echo '<div class="col-md-3">';
                  echo '<input class="optionprice" type="number" placeholder="Price" value="'.intval($row['tc_price']).'">';
                  echo '<span class="unit">THB</span>';
                  echo '</div><div class="col-md-2"><div class="btn no-border gray">Delete</div></div>';
                }
              }
							if($count == 0){
								echo '<div class="form-group"><div class="col-md-4">';
								echo '<input class="option" type="text" placeholder="Option Name">';
								echo '</div><div class="col-md-3 form-inline"><label>Condition</label><span>';
								echo '<select>';
								echo '<option class="optioncond" selected>Increase</option>';
								echo '<option class="optioncond">Decrease</option>';
								echo '</select>';
								echo '</span></div>';
								echo '<div class="col-md-3">';
								echo '<input class="optionprice" type="number" placeholder="Price">';
								echo '<span class="unit">'.$package['tour_currency'].'</span>';
								echo '</div><div class="col-md-2"><div class="btn no-border gray">Delete</div></div>';
							}
               ?>
						 </div>
               <div class="btn-wrapper">
                 <div class="col-xs-12">
                   <div class="btn no-border light">
                     <i class="fa fa-plus" aria-hidden="true"></i> Add Condition
                   </div>
                </div>
              </div>
            </div>
          </div>
					<div class="list-card card-header hide" id="multiple">
						<div class="header">
							<h2>Multiple Options Condition</h2>
						</div>
						<div class="content">
							<div class="form-group">
								<div class="col-md-9">
                  <?php
									$count = 0;
                  $is_first = true;
                  foreach($condition->result_array() as $row){
                  	if($row['tc_type'] == 'option activity'){
                      if($is_first){
												$count++;
                        $is_first = false;
                        echo '<input id="multidesc" type="text" placeholder="Description" value="'.$row['tc_title'].'"></div>';
                        echo '<div class="col-md-3 form-inline"><label>Condition</label><span><select id="multicond">';
                        if($row['tc_condition'] == 'increase'){
                          echo '<option selected>Increase</option>';
                          echo '<option>Decrease</option>';
                        }else{
                          echo '<option class="multicond">Increase</option>';
                          echo '<option class="multicond" selected>Decrease</option>';
                        }
                        echo '</select></span></div></div><hr>';
                      }
                      echo '<div class="form-group"><div class="col-md-6">';
                      echo '<input class="multioption" type="text" placeholder="Option Name" value="'.$row['tc_data'].'">';
                      echo '</div><div class="col-md-3">';
                      echo '<input class="multiprice" type="number" placeholder="Price" value="'.intval($row['tc_price']).'">';
                      echo '<span class="unit">'.$package['tour_currency'].'</span></div>';
                      echo '<div class="col-md-2 col-md-offset-1"><div class="btn no-border gray">Delete</div>';
                    }
              		}
									if($count == 0){
										echo '<input id="multidesc" type="text" placeholder="Description"></div>';
										echo '<div class="col-md-3 form-inline"><label>Condition</label><span><select id="multicond">';
										echo '<option selected>Increase</option>';
										echo '<option>Decrease</option>';
										echo '</select></span></div></div><hr><div class="form-group"><div class="col-md-6">';
										echo '<input class="multioption" type="text" placeholder="Option Name">';
										echo '</div><div class="col-md-3">';
										echo '<input class="multiprice" type="number" placeholder="Price">';
										echo '<span class="unit">'.$package['tour_currency'].'</span></div>';
										echo '<div class="col-md-2 col-md-offset-1"><div class="btn no-border gray">Delete</div>';
									}
                 ?>
                 </div>
               </div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
					</div>
					<div class="list-card card-header hide" id="pv">
						<div class="header">
							<h2>Private Group</h2>
						</div>
						<hr>
						<div class="content">
							<div class="form-group">
								<div class="col-md-6 form-inline">
									<label>Select Private Group</label>
									<span>
										<?php
										$price = $package['tour_privateGroupPrice'];
										if($price > 0){
											echo '<input id="priincrease" type="number" placeholder="Pay increase" value="'.$price.'">';
										}else{
											echo '<input id="priincrease" type="number" placeholder="Pay increase">';
										}
										 ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
							<hr>
							<div class="form-group">
                <?php
                $discountRate = json_decode($package['tour_discountRate'],true);
                $c_discountRate = count($discountRate);
                for($i=0;$i<$c_discountRate;$i++){
                  echo '<div class="col-md-4 form-inline"><label>Up to</label><span>';
                  echo '<input class="pripax" type="number" value="'.$discountRate[$i]['pax'].'">';
                  echo '<span class="unit">Pax</span>';
                  echo '</span></div>';
                  echo '<div class="col-md-4 form-inline">';
                  echo '<label>Pay increase</label><span>';
                  echo '<input class="priprice" type="number" value="'.$discountRate[$i]['price'].'">';
                  echo '<span class="unit">'.$package['tour_currency'].'</span>';
                  echo '</span>';
                  echo '</div>';
                  echo '<div class="col-md-4"><div class="btn no-border gray">Delete</div></div>';
                }
								if($c_discountRate == 0){
									echo '<div class="col-md-4 form-inline"><label>Up to</label><span>';
                  echo '<input class="pripax" type="number">';
                  echo '<span class="unit">Pax</span>';
                  echo '</span></div>';
                  echo '<div class="col-md-4 form-inline">';
                  echo '<label>Pay increase</label><span>';
                  echo '<input class="priprice" type="number">';
                  echo '<span class="unit">'.$package['tour_currency'].'</span>';
                  echo '</span>';
                  echo '</div>';
                  echo '<div class="col-md-4"><div class="btn no-border gray">Delete</div></div>';
								}
                 ?>
							</div>
							<div class="btn-wrapper">
								<div class="col-xs-12">
									<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Condition</div>
								</div>
							</div>
						</div>
					</div>
					<div class="list-card card-header hide" id="pax">
						<div class="header">
							<h2>Pax Condition</h2>
						</div>
						<div class="content">
                  <?php
                  if($package['tour_doublePack'] == 1){
                    echo '<div class="form-group">';
                    echo '<div class="col-md-4 col-sm-6">';
                    echo '<input id="paxdouble" type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect">';
                    echo '<div class="col-md-4 col-sm-6">';
                    echo '<input id="paxdouble" type="checkbox">';
                  }
                   ?>
									<p>Double Pax Condition</p>
								</div>
							</div>
              <?php
              if($package['tour_minimum'] > 0){
                echo '<div class="form-group">';
                echo '<div class="col-md-4 col-sm-6">';
                echo '<input type="checkbox" checked>';
              }else{
                echo '<div class="form-group cb-nonselect">';
                echo '<div class="col-md-4 col-sm-6">';
                echo '<input type="checkbox">';
              }
               ?>
									<p>Minimum Tourists</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Amount</label>
									<span>
                    <?php
                    if($package['tour_minimum'] > 0){
                      echo '<input id="paxminimum" type="number" placeholder="Person" value="'.$package['tour_minimum'].'">';
                    }else{
                      echo '<input id="paxminimum" type="number" placeholder="Person" disabled>';
                    }
                     ?>
										<span class="unit">Pax</span>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="btn-wrapper text-center">
            <form action="update-outbound-package-condition" method="POST">
              <input name="oldNameSlug" type="hidden" required>
              <input name="newNameSlug" type="hidden" required>
              <input name="type" type="hidden" value="<?=$this->session->flashdata('f1')?>" required>
              <input name="continent" type="hidden" required>
              <input name="country" type="hidden" required>
              <input name="nameTH" type="hidden" required>
              <input name="nameEN" type="hidden" required>
              <input name="startPrice" type="hidden" required>
              <input name="roomtype" type="hidden" required>
              <input name="roomprice" type="hidden" required>
              <input name="optionname" type="hidden" required>
              <input name="optioncond" type="hidden" required>
              <input name="optionprice" type="hidden" required>
              <input name="multidesc" type="hidden" required>
              <input name="multicond" type="hidden" required>
              <input name="multioption" type="hidden" required>
              <input name="multiprice" type="hidden" required>
              <input name="priincrease" type="hidden" required>
              <input name="pridiscountRate" type="hidden" required>
              <input name="paxdouble" type="hidden" required>
              <input name="paxminimum" type="hidden" required>
              <button id="submit" type="submit" class="btn bold">Update Package</button>
            </form>
					</div>
				</div>
			</div>
		</main>
	</div>
  <input id="nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>">
  <input id="isTourType" type="hidden" value="<?=$this->session->flashdata('f1')?>">
</body>
<script src="assets/js/script.js"></script>
<script>

$(document).ready(function(){
  $('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $startPrice = $('#startPrice').val();
  $('#startPrice').val(numberWithSpaces($startPrice));
});

$('#submit').click(function(){
  $nameSlug = $('#nameSlug').val();
  $nameTH = $('#nameTH').val();
  $nameEN = $('#nameEN').val();
  $newNameSlug = $nameEN.toLowerCase()
    .replace(/\s+/g, '-')
    .replace(/[^\w\-]+/g, '')
    .replace(/\-\-+/g, '-')
    .replace(/^-+/, '')
    .replace(/-+$/, '');
  $continent = $('select[name=continent]').val();
  $country = $('select[name=country]').val();
  $startPrice = $('#startPrice').val().replace(' ','');

  $room = $('.room');
  $c_room = $room.length;
  $roomcheck = $('.roomcheck');
  $roomtype = new Array();
  $roomprice = new Array();
  for($i=0;$i<$c_room;$i++){
    if($roomcheck.eq($i).prop('checked') == true){
      if($room.eq($i).val() != ''){
        $roomtype.push($room.eq($i).attr('roomtype'));
        $roomprice.push($room.eq($i).val());
      }
    }
  }

  $option = $('.option');
  $optioncond = $('.optioncond');
  $optionprice = $('.optionprice');
  $c_option = $option.length;
  $optionname_a = new Array();
  $optioncond_a = new Array();
  $optionprice_a = new Array();
  for($i=0;$i<$c_option;$i++){
    if($option.eq($i).val() != '' && $optionprice.eq($i).val() != ''){
      $optionname_a.push($option.eq($i).val());
      $optioncond_a.push($optioncond.eq($i).html().toLowerCase());
      $optionprice_a.push($optionprice.eq($i).val());
    }
  }

  $multidesc = $('#multidesc').val();
  $multicond = '';
  $multioption_a = new Array();
  $multiprice_a = new Array();
  if($multidesc != ''){
    $multicond = $('#multicond').find('option:selected').val().toLowerCase();
    $multioption = $('.multioption');
    $c_multioption = $multioption.length;
    $multiprice = $('.multiprice');
    for($i=0;$i<$c_multioption;$i++){
      $multioption_a.push($multioption.eq($i).val());
      $multiprice_a.push($multiprice.eq($i).val());
    }
  }

  $priincrease = $('#priincrease').val();
  $pripax = $('.pripax');
  $c_pripax = $pripax.length;
  $priprice = $('.priprice');
  $pridiscountRate = '[';
  for($i=0;$i<$c_pripax;$i++){
    $pridiscountRate += '{"pax":'+$pripax.eq($i).val()+',"price":'+$priprice.eq($i).val()+'},';
  }
  $pridiscountRate = $pridiscountRate.substr(0,$pridiscountRate.length-1);
  $pridiscountRate += ']';
  if($priincrease != '' && $pridiscountRate != '[{"pax":,"price":}]'){
    $('input[name=priincrease]').val($priincrease);
    $('input[name=pridiscountRate]').val($pridiscountRate);
  }

  $paxdouble = $('#paxdouble');
  if($paxdouble.prop('checked') == true){
    $('input[name=paxdouble]').val('1');
  }else{
    $('input[name=paxdouble]').val('0');
  }
  $paxminimum = $('#paxminimum').val();

  $('input[name=oldNameSlug]').val($nameSlug);
  $('input[name=newNameSlug]').val($newNameSlug);
  $('input[name=nameTH]').val($nameTH);
  $('input[name=nameEN]').val($nameEN);
  $('input[name=continent]').val($continent);
  $('input[name=country]').val($country);
  $('input[name=startPrice]').val($startPrice);
  $('input[name=roomtype]').val($roomtype);
  $('input[name=roomprice]').val($roomprice);
  $('input[name=optionname]').val($optionname_a);
  $('input[name=optioncond]').val($optioncond_a);
  $('input[name=optionprice]').val($optionprice_a);
  $('input[name=multidesc]').val($multidesc);
  $('input[name=multicond]').val($multicond);
  $('input[name=multioption]').val($multioption_a);
  $('input[name=multiprice]').val($multiprice_a);
  $('input[name=paxminimum]').val($paxminimum);
});

$('#startPrice').click(function(){
  $startPrice = $(this).val().replace(' ','');
  $('#startPrice').val($startPrice);
});

$('#startPrice').blur(function(){
  $startPrice = $('#startPrice').val();
  if($.isNumeric($startPrice.replace(' ',''))){
    $('#startPrice').val(numberWithSpaces($startPrice));
  }else{
    alert('Invalid number');
    $('#startPrice').val(this.defaultValue);
    $('#startPrice').focus();
  }
});

function numberWithSpaces(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

	$('.title-bar-wrapper input[type="checkbox"]').change(function() {
		var checkname = this.name;
		if($(this).is(':checked')){
			$('#'+checkname+',.'+checkname).removeClass('hide');
		}else{
			$('#'+checkname+',.'+checkname).addClass('hide');
		}
	});

	$('.title-bar-wrapper input[type="checkbox"]').each(function(){
		var checkname = this.name;
		if($(this).is(':checked')){
			$('#'+checkname).removeClass('hide');
		}else{
			$('#'+checkname).addClass('hide');
		}
	});

	$('.list-card .btn.no-border.light').click(function() {
		var addform = $(this).closest('.content').find('.form-group').last().html();
		$(this).closest('.content').find('.form-group').last().after("<div class='form-group'>"+addform+"</div>");
	});

	$('#room input[type="checkbox"],#pax input[type="checkbox"]').change(function() {
		if($(this).is(':checked')){
			$(this).closest('.form-group').removeClass('cb-nonselect').find('input[type="number"]').prop("disabled", false);
		}else{
			$(this).closest('.form-group').addClass('cb-nonselect').find('input[type="number"]').prop("disabled", true);
		}
	});

</script>
</html>
