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
			case 'Children 2 - 12 year old (with bed)':
			$cwd++;
      $cwd_price = intval($row['tc_price']);
			break;
			case 'Children 2 - 12 year old (with out bed)':
			$cwod++;
      $cwod_price = intval($row['tc_price']);
			break;
			case 'Children < 2 year old':
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
					<li class="current">Standard Tours</li>
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
				<a href="tm-domestic-easy-main.html">
					<li>Private Group Tours</li>
				</a>
				<a href="tm-domestic-series-main.html">
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
				<a href="tm-outbound-easy-main.html">
					<li>Private Group Tours</li>
				</a>
				<a href="tm-outbound-series-main.html">
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
							<p>Domestic	 | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input type="text" value="<?=$package['tour_nameTH']?>">
						</div>
						<div class="col-sm-6 col-xs-12">
							<input type="text" value="<?=$package['tour_nameEN']?>">
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
                      if($package['geography_nameEN'] == $row['geography_nameEN']){
                        echo "<option value=".$row['geography_nameEN']." selected>".$row['geography_nameEN']."</option>";
                      }else{
                        echo "<option value=".$row['geography_nameEN'].">".$row['geography_nameEN']."</option>";
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
							<input id="start-price" type="text" value="<?=intval($package['tour_startPrice'])?>"><span class="unit"><?=$package['tour_currency']?></span>
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
								if($status > 0){
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
						<div class="col-sm-6 no-pd">
							<a href="edit-domestic-package?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn">TOUR INFO</a>
						</div>
						<div class="col-sm-6 no-pd">
							<a href="edit-domestic-package-condition?tour=<?=$package['tour_nameSlug']?>&type=<?=$this->session->flashdata('f1')?>" class="btn current">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header" id="room">
						<div class="header">
							<h2>Room Condition</h2>
						</div>
						<div class="content">
                  <?php
                  if($sr>0){
                    echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox">';
                  }
                   ?>
									<p>Single Room</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($sr>0){
                      echo '<input type="number" placeholder="Price"  value="'.$sr_price.'">';
                    }else{
                      echo '<input type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
                  <?php
                  if($cwd>0){
                    echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox">';
                  }
                   ?>
									<p>Children 2 - 12 yrs (with bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($cwd>0){
                      echo '<input type="number" placeholder="Price"  value="'.$cwd_price.'">';
                    }else{
                      echo '<input type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
                  <?php
                  if($cwod>0){
                    echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox">';
                  }
                   ?>
									<p>Children 2 - 12 yrs (without bed)</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($cwod>0){
                      echo '<input type="number" placeholder="Price"  value="'.$cwod_price.'">';
                    }else{
                      echo '<input type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
                  <?php
                  if($c>0){
                    echo '<div class="form-group"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect"><div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox">';
                  }
                   ?>
									<p>Children < 2 yrs</p>
								</div>
								<div class="col-md-4 col-sm-6 form-inline">
									<label>Add</label>
									<span>
                    <?php
                    if($c>0){
                      echo '<input type="number" placeholder="Price"  value="'.$c_price.'">';
                    }else{
                      echo '<input type="number" placeholder="Price"disabled>';
                    }
                    ?>
										<span class="unit"><?=$package['tour_currency']?></span>
									</span>
								</div>
							</div>
						</div>
					</div>
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
                  echo '<input type="text" placeholder="Option Name" value="'.$row['tc_data'].'">';
                  echo '</div><div class="col-md-3 form-inline"><label>Condition</label><span>';
                  echo '<select>';
                  if($row['tc_condition'] == 'increase'){
                    echo '<option selected>Increase</option>';
                    echo '<option>Decrease</option>';
                  }else{
                    echo '<option selected>Decrease</option>';
                    echo '<option>Increase</option>';
                  }
                  echo '</select>';
                  echo '</span></div>';
                  echo '<div class="col-md-3">';
                  echo '<input type="number" placeholder="Price" value="'.intval($row['tc_price']).'">';
                  echo '<span class="unit">THB</span>';
                  echo '</div><div class="col-md-2"><div class="btn no-border gray">Delete</div></div></div>';
                }
              }
							if($count == 0){
								echo '<div class="form-group"><div class="col-md-4">';
								echo '<input type="text" placeholder="Option Name">';
								echo '</div><div class="col-md-3 form-inline"><label>Condition</label><span>';
								echo '<select>';
								echo '<option selected>Increase</option>';
								echo '<option>Decrease</option>';
								echo '</select>';
								echo '</span></div>';
								echo '<div class="col-md-3">';
								echo '<input type="number" placeholder="Price">';
								echo '<span class="unit">'.$package['tour_currency'].'</span>';
								echo '</div><div class="col-md-2"><div class="btn no-border gray">Delete</div></div></div>';
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
                        echo '<input type="text" placeholder="Description" value="'.$row['tc_title'].'"></div>';
                        echo '<div class="col-md-3 form-inline"><label>Condition</label><span><select>';
                        if($row['tc_condition'] == 'increase'){
                          echo '<option selected>Increase</option>';
                          echo '<option>Decrease</option>';
                        }else{
                          echo '<option>Increase</option>';
                          echo '<option selected>Decrease</option>';
                        }
                        echo '</select></span></div></div><hr>';
                      }
                      echo '<div class="form-group"><div class="col-md-6">';
                      echo '<input type="text" placeholder="Option Name" value="'.$row['tc_data'].'">';
                      echo '</div><div class="col-md-3">';
                      echo '<input type="number" placeholder="Price" value="'.intval($row['tc_price']).'">';
                      echo '<span class="unit">'.$package['tour_currency'].'</span></div>';
                      echo '<div class="col-md-2 col-md-offset-1"><div class="btn no-border gray">Delete</div>';
                      echo '</div></div>';
                    }
              		}
									if($count == 0){
										echo '<input type="text" placeholder="Description"></div>';
										echo '<div class="col-md-3 form-inline"><label>Condition</label><span><select>';
										echo '<option selected>Increase</option>';
										echo '<option>Decrease</option>';
										echo '</select></span></div></div><hr><div class="form-group"><div class="col-md-6">';
										echo '<input type="text" placeholder="Option Name">';
										echo '</div><div class="col-md-3">';
										echo '<input type="number" placeholder="Price">';
										echo '<span class="unit">'.$package['tour_currency'].'</span></div>';
										echo '<div class="col-md-2 col-md-offset-1"><div class="btn no-border gray">Delete</div>';
										echo '</div></div>';
									}
                 ?>
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
											echo '<input type="number" placeholder="Pay increase" value="'.$price.'">';
										}else{
											echo '<input type="number" placeholder="Pay increase">';
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
                  echo '<input type="number" value="'.$discountRate[$i]['pax'].'">';
                  echo '<span class="unit">Pax</span>';
                  echo '</span></div>';
                  echo '<div class="col-md-4 form-inline">';
                  echo '<label>Pay increase</label><span>';
                  echo '<input type="number" value="'.$discountRate[$i]['price'].'">';
                  echo '<span class="unit">'.$package['tour_currency'].'</span>';
                  echo '</span>';
                  echo '</div>';
                  echo '<div class="col-md-4"><div class="btn no-border gray">Delete</div></div>';
                }
								if($c_discountRate == 0){
									echo '<div class="col-md-4 form-inline"><label>Up to</label><span>';
                  echo '<input type="number">';
                  echo '<span class="unit">Pax</span>';
                  echo '</span></div>';
                  echo '<div class="col-md-4 form-inline">';
                  echo '<label>Pay increase</label><span>';
                  echo '<input type="number">';
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
                    echo '<input type="checkbox" checked>';
                  }else{
                    echo '<div class="form-group cb-nonselect">';
                    echo '<div class="col-md-4 col-sm-6">';
                    echo '<input type="checkbox">';
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
                      echo '<input type="number" placeholder="Price" value="'.$package['tour_minimum'].'">';
                    }else{
                      echo '<input type="number" placeholder="Price" disabled>';
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
            <form action="update-domestic-package">
						  <input type="submit" value="Add Package" class="btn bold">
            </form>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
<script src="assets/js/script.js"></script>
<script>

$(document).ready(function(){
  $('a[href="outbound-package?type='+$('#isTourType').val()+'"]').find('li').eq(0).addClass('current');
  $start_price = $('#start-price').val();
  $('#start-price').val(numberWithSpaces($start_price));
});

$('#start-price').click(function(){
  $start_price = $(this).val().replace(' ','');
  $('#start-price').val($start_price);
});

$('#start-price').blur(function(){
  $start_price = $('#start-price').val();
  if($.isNumeric($start_price.replace(' ',''))){
    $('#start-price').val(numberWithSpaces($start_price));
  }else{
    alert('Invalid number');
    $('#start-price').val(this.defaultValue);
    $('#start-price').focus();
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
