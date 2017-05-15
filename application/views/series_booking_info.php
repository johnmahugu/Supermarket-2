<?php
  /**********Catch resubmission form*********/
  if(!isset($_GET["redi"])){
  	header('Location: series-booking-info?redi=s');
  }
  /*****************Session*****************/
  $lang = 'EN';
  if(!empty($this->session->userdata('lang'))){
  	$lang = $this->session->userdata('lang');
  }
  $country = $this->session->userdata('country');
  $session = $user_data->row_array(0);
  /***************List package**************/
  $package = $package->row_array(0);
  $b_detail = json_decode($booking_detail,true);
  $totaltourist = $b_detail['tourist'][0]['total_tourist'];
  $datestart = $b_detail['date'][0]['start'];
  $datefinish = $b_detail['date'][0]['end'];
  if(isset($price_range)){
  	$booking_timerange = json_decode($price_range,true);
  	$last_btr = count($booking_timerange)-1;
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>SUPERMARKET TOURS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <script src="<?=base_url()?>assets/js/date.format.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.4/numeral.min.js"></script>
    <script src="<?=base_url()?>assets/js/page_controllers/series-booking-info.js"></script>
  </head>
  <body>
    <header class="readmore outbouce">
      <div class="container-fulid clearfix">
        <div class="header-box">
          <div class="language-box">
            <a class="current" href="#">
            <img src="<?=base_url()?>assets/images/ico-en.png" alt="">
            </a>
            <a href="#">
            <img src="<?=base_url()?>assets/images/ico-th.png" alt="">
            </a>
          </div>
          <div class="contact">
            <h2>Add Line</h2>
            <a href="http://line.me/ti/p/~bankzahaplus"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
          </div>
          <div class="contact">
            <h2>Contact Us</h2>
            <p><a href="tel:0875012500">02-222-2222</a></p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <a href="<?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="assets/images/logo.png" alt="" class="logo"></a>
          </div>
          <div class="col-sm-10">
            <div class="menu-burger">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <ul class="menu-list">
              <li><a href="<?=base_url()?>thai-tour">THAILAND DOMESTIC TOURS</a></li>
              <li><a href="<?=base_url()?>international-tour">INTERNATIONAL TOURS</a></li>
              <li><a href="<?=base_url()?>about">ABOUT</a></li>
              <?php if(empty($this->session->userdata('firstname'))){?>
              <li><a href="_signin?from=sbi" class="btn">Sign In</a></li>
              <?php
                }else{
                ?>
              <li class="user-profile">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
                <ul>
                  <li><a href="<?=base_url()?>booking-list">BOOKING LIST</a></li>
                  <li><a href="<?=base_url()?>user-edit-profile">EDIT PROFILE</a></li>
                  <li><a href="signout">LOG OUT</a></li>
                </ul>
                <?php
                  }
                  ?>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <?php
              if($package['country_id'] == '215 '){
              ?>
            <h1>
            THAILAND DOMESTIC TOURS<br>
            <?php
              }else{
              ?>
            <h1>
            INTERNATIONAL TOURS<br>
            <?php
              }
              ?>
          </div>
        </div>
      </div>
    </header>
    <div class="title-bar readmore">
      <div class="container">
        <div class="col-sm-6">
          <h1><?php
            if(empty($package['tour_name'.$lang])){
            	echo strtoupper($package['tour_name'.$lang]);
            }else{
            	if($lang == 'TH'){
            		echo strtoupper($package['tour_nameTH']);
            	}else{
            		echo strtoupper($package['tour_nameEN']);
            	}
            }
            ?></h1>
          <br>
          <p><?=date_format(date_create($datestart),"j F Y");?> - <?=date_format(date_create($datefinish),"j F Y");?></p>
        </div>
      </div>
    </div>
    <div class="container content">
      <div class="row top-mg">
        <div class="col-xs-12">
          <div class="title-header">
            <h2>BOOKING FORM</h2>
            <div class="line">
              <div class="tab"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row top-mg">
        <div class="col-sm-1 hidden-xs"></div>
        <div class="col-sm-5 no-pd">
          <a href="series-booking?tour=<?=$package['tour_nameSlug']?>" class="choose-step-box current check">
          <span class="circle"> <i class="fa fa-check" aria-hidden="true"></i> </span>
          Select Room
          </a>
        </div>
        <div class="col-sm-5 no-pd">
          <a href="#" class="choose-step-box current">
          <span class="circle"> 2 </span>
          Fill Travelers
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <form id="submitbooking" action="series-booking-submit" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <h3>Personal Information</h3>
              <div id="checkaccount" class="btn-wrapper">
                <a id="login-account" href="_signin?from=sbi" class="btn">Had Used Before</a>
                <div id="register-account" class="btn border">No Account</div>
              </div>
              <div id="noaccount">
                <div class="col-md-6">
                  <label for="">Name - Surname * (eg. Peter Smith)</label><br>
                  <input name="nac-fullname" class="nac" type="text"><br>
                </div>
                <div class="col-md-6">
                  <label for="">LINE ID *</label><br>
                  <input name="nac-lineId" class="nac" type="text"><br>
                </div>
                <div class="col-md-6 used">
                  <label for="">Email *
                  <span class="msg" style="color:red;">Sorry , That Email is already used.</span>
                  </label><br>
                  <input id="nac-email" name="nac-email" class="nac" type="text" placeholder="Use a Username"><br>
                  <label for="">Confirm email *
                  <span class="msg" style="color:red;">Confirm email don't match.</span>
                  </label><br>
                  <input id="nac-confirmEmail" type="text" placeholder="Use a Username"><br>
                </div>
                <div class="col-md-6">
                  <label for="">Nationality *
                  </label><br>
                  <select name="nac-nationality" class="nac">
                    <option value="select-nationality" disabled selected>Select your nationality</option>
                    <?php
                      foreach($nationality->result_array() as $row){
                      	echo '<option value="'.$row['nationality_id'].'">'.$row['nationality_name'].'</option>';
                      }
                      ?>
                  </select>
                  <br>
                </div>
                <div class="col-md-6">
                  <label for="">Telephone Number *</label><br>
                  <input name="nac-tel" class="nac" type="text" placeholder="Use a Password"><br>
                </div>
                <div class="col-md-6">
                  <label for="">Passport Image *</label><br>
                  <div class="upload">
                    <img src="<?=base_url()?>assets/images/ico-passport.png" alt="passport image">
                    <input pointer="img0" name="nac-passportImg[]" class="nac img" type="file"><br>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="">Passport No. *</label><br>
                  <input name="nac-passportNumber" class="nac" type="text"><br>
                </div>
                <div class="col-md-6">
                  <label for="">Date of Birth *</label><br>
                  <input name="nac-dob" class="nac dob-picker" type="text" ><br>
                </div>
                <div class="col-md-12">
                  <label for="">Address</label><br>
                  <textarea name="nac-address" class="nac"></textarea>
                </div>
                <div class="col-md-12">
                  <hr>
                  <p class="note"><i class="fa fa-thumb-tack" aria-hidden="true"></i>
                    <span>Your Email</span>  is a Username and <span>Your Tel No.</span> is a Password for login to Your Account. <a href="_signin?from=sbi">Or Your have a account</a>
                  </p>
                </div>
              </div>
            </div>
            <?php
              if(!empty($session)){
              ?>
            <div class="form-group tourist">
              <h3>Confirm personal information</h3>
              <div class="col-md-6">
                <label for="">Name - Surname *</label><br>
                <input id="name-surname1" type="text" value="<?=$session['client_firstName']." ".$session['client_middleName']." ".$session['client_lastName'];?>"><br>
              </div>
              <div class="col-md-6">
                <label for="">Telephone Number *</label><br>
                <input type="text" value="<?=$session['client_tel'];?>"><br>
              </div>
              <div class="col-md-6">
                <label for="">Passport Image *</label><br>
                <div class="upload">
                  <?php
                    if($session['client_passportRefImg'] == null || $session['client_passportRefImg'] == ""){
                    ?>
                  <img src="<?=base_url()?>assets/images/ico-passport.png" alt="passport image">
                  <?php
                    }else{
                    ?>
                  <img id="session-passportImg" src="<?=base_url()?>filestorage/image/client/passport/<?=$session['client_passportRefImg']?>.jpg" alt="passport image" session-path="<?=$session['client_passportRefImg']?>">
                  <?php
                    }
                    ?>
                  <input pointer="img1" name="passportImg[]" class="img" type="file"><br>
                </div>
              </div>
              <div class="col-md-6">
                <label for="">Passport No. *</label><br>
                <input type="text" value="<?=$session['client_passportNumber'];?>"><br>
              </div>
              <div class="col-md-6">
                <label for="">Date of Birth *</label><br>
                <input id="session-date" type="text" class="dob-picker" value="<?=date_format(date_create($session['client_dob']),"d/m/Y");?>"><br>
              </div>
            </div>
            <?php
              }
              ?>
        </div>
      </div>
      <div class="clear"></div>
      <div class="btn-wrapper">
      <p class="note top-mg">We will reply within 24 hours via Email</p>
      <div class="col-sm-4 col-sm-offset-4">
      <button type="button" id="booking" class="btn bold">Booking</a>
      </div>
      </div>
    </div>
    <footer>
    <div class="container">
    <div class="row">
    <div class="col-sm-4 col-xs-12">
    <h3>SUPERMARKET Tours</h3>
    <p>by P.B Travel Agency</p>
    <hr>
    <a href="http://www.myanmar-center.in.th/">Myanmar Center</a>
    </div>
    <div class="col-sm-4 col-sm-offset-4 col-xs-12">
    <div class="contact">
    <h2>Add Line</h2>
    <a href="#"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
    </div>
    <div class="contact">
    <h2>Contact Us</h2>
    <p>02-222-2222</p>
    </div>
    </div>
    </div>
    </div>
    <div class="strap"></div>
    <input name="tour-nameSlug" type="hidden" value="<?=$package['tour_nameSlug']?>" required>
    <input id="total-tourist" name="total-tourist" type="hidden" value="<?=$totaltourist?>" required>
    <input name="booking-room-detail" type="hidden" value="<?=htmlspecialchars($booking_detail)?>" required>
    <input name="booking-tourist-detail" type="hidden" value="" required>
    <input id="booking-mode" name="booking-mode" type="hidden" value="1" required>
    </form>
    <input id="userId" type="hidden" value="<?php if(!empty($session)){ echo $session['client_id']; }?>">
    </footer>
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
    <p id="alert-warning">เราจะทำการตอบกลับภายใน 24 ชั่วโมงทาง Email</p>
    </div>
    <div class="modal-footer">
    </div>
    </div>
    </div>
    </div>
  </body>
  <script>
    $booking_mode = 'normal booking';
    $(document).ready(function() {
      $(".hide").hide();
    	$count = $('.msg').size();
    	for($i=0;$i<$count;$i++){
    		$('.msg').eq($i).hide();
    	}
    	$userId = $('#userId').val();
    	if($userId != ''){
    		$('#login-account').addClass('hide');
    		$('#register-account').addClass('hide');
    	}
    });

    $('#checkaccount .btn.border').click(function(){
    	$(this).closest('#checkaccount').addClass('hide');
    	$('#noaccount').fadeIn(500);
    });

    $('.dob-picker').datepicker({
    	dateFormat: 'dd/mm/yy',
    	changeMonth: true,
    	changeYear: true,
    	maxDate: "0D",
    	monthNamesShort: $.datepicker.regional["en"].monthNames
    });

    $('#register-account').click(function(){
    	$booking_mode = 'register and booking';
    	$('#booking-mode').val(2);
    });

    $('#nac-email').blur(function(){
    	if(checkEmail($(this).val()) == 1){
    		$('.msg').eq(0).show();
    	}else{
    		$('.msg').eq(0).hide();
    	}
    });

    $('#nac-confirmEmail').blur(function(){
    	if($(this).val() != '' && $('#nac-email').val() != $('#nac-confirmEmail').val()){
    		$('.msg').eq(1).show();
    	}else{
    		$('.msg').eq(1).hide();
    	}
    });

    $('.upload img').click(function(){
    	$(this).siblings('.img').click();
    });

    $(".img").change(function(){
    	readURL(this,$(this).attr('pointer'));
    });

    $('#booking').click(function(){
    	if($booking_mode == 'normal booking' && $('#userId').val() != ''){
    		$status = true;
    		$b_detail = '{"touristinfo":[';
    		$('.tourist input').each(
    			function(i,v){
    				switch(i){
    					case 0:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill each tourist name and surname.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 1:
    						if(v.value == ''){
    							$status = false;
      						$('#alert-warning').html('Please fill each tourist telephone number.');
      						$('#popup').modal('show');
      						return false;
    						}
    					break;
    					case 2:
    					break;
    					case 3:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill each tourist passport number.');
    							$('#popup').modal('show');
    							return false;
    						}else if(validatePassport(v.value) == false){
                  $status = false;
    							$('#alert-warning').html('Passport is not yet valid.');
    							$('#popup').modal('show');
    							return false;
                }
    					break;
    					case 4:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill each tourist date of birth.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    				}
    				$index = i%5;
    				switch($index){
    					case 0:
    						if(i!=0){
    							$b_detail += ',';
    						}
    						$b_detail += '{"fullname":"'+v.value+'",';
    					break;
    					case 1:
    						$b_detail += '"tel":"'+v.value+'",';
    					break;
    					case 2:
    						if(v.value == ""){
    							$b_detail += '"passportImg":"'+$('#session-passportImg').attr('session-path')+'",';
    						}else{
    							$b_detail += '"passportImg":"'+v.value+'",';
    						}
    					break;
    					case 3:
    						$b_detail += '"passportNo":"'+v.value+'",';
    					break;
    					case 4:
    						$dob = new Date(v.value).format('yyyy-mm-dd');
    						$b_detail += '"dob":"'+$dob+'"}';
    					break;
    				}
    			}
    		);
    		$b_detail += ']}';
    		$('input[name=booking-tourist-detail]').val($b_detail);
    		if($status){
    			document.forms['submitbooking'].submit();
    		}
    	}else if($booking_mode == 'normal booking' && $('#userId').val() == ''){
    		$('#alert-warning').html('Please sign-in or register account.');
    		$('#popup').modal('show');
    	}else if($booking_mode == 'register and booking'){
    		$status = true;
    		$b_detail = '{"touristinfo":[';
    		$('.nac').each(
    			function(i,v){
    				switch(i){
    					case 0:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your name and surname.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 1:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your line-id.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 2:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your email.');
    							$('#popup').modal('show');
    							return false;
    						}else if ($('#nac-email').val() != $('#nac-confirmEmail').val()){
    							$status = false;
    							$('#alert-warning').html("Confirm email don't match.");
    							$('#popup').modal('show');
    							return false;
    						}
    						if(checkEmail($(this).val()) == 1){
    							$status = false;
    							$('#alert-warning').html('Please fill another email. This email registed.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 3:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please select your nationality.');
    							$('#popup').modal('show');
    							return false;
    						}else if (v.value == 'select-nationality'){
    							$status = false;
    							$('#alert-warning').html('Please select your nationality.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 4:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your telephone number.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 5:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your passport image.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 6:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your passport number.');
    							$('#popup').modal('show');
    							return false;
    						}else if(validatePassport(v.value) == false){
                  $status = false;
    							$('#alert-warning').html('Passport is not yet valid.');
    							$('#popup').modal('show');
    							return false;
                }
    					break;
    					case 7:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your date of birth.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    					case 8:
    						if(v.value == ''){
    							$status = false;
    							$('#alert-warning').html('Please fill your address.');
    							$('#popup').modal('show');
    							return false;
    						}
    					break;
    				}
    				switch(i){
    					case 0:
    						$b_detail += '{"fullname":"'+v.value+'",';
    					break;
    					case 4:
    						$b_detail += '"tel":"'+v.value+'",';
    					break;
    					case 5:
    						$b_detail += '"passportImg":"'+v.value+'",';
    					break;
    					case 6:
    						$b_detail += '"passportNo":"'+v.value+'",';
    					break;
    					case 7:
    						$dob = new Date(v.value).format('yyyy-mm-dd');
    						$b_detail += '"dob":"'+$dob+'"}';
    					break;
    				}
    			}
    		);
    		$total_tourist = $('#total-tourist').val();
    		if($total_tourist > 1){
    			$('.tourist input').each(
    				function(i,v){
    					switch(i){
    						case 0:
    							if(v.value == ''){
    								$status = false;
    								$('#alert-warning').html('Please fill each tourist name and surname.');
    								$('#popup').modal('show');
    								return false;
    							}
    						break;
    						case 1:
    							if(v.value == ''){
    								$status = false;
    								$('#alert-warning').html('Please fill each tourist telephone number.');
    								$('#popup').modal('show');
    								return false;
    							}
    						break;
    						case 2:
    						break;
    						case 3:
    							if(v.value == ''){
    								$status = false;
    								$('#alert-warning').html('Please fill each tourist passport number.');
    								$('#popup').modal('show');
    								return false;
    							}else if(validatePassport(v.value) == false){
                    $status = false;
      							$('#alert-warning').html('Passport is not yet valid.');
      							$('#popup').modal('show');
      							return false;
                  }
    						break;
    						case 4:
    							if(v.value == ''){
    								$status = false;
    								$('#alert-warning').html('Please fill each tourist date of birth.');
    								$('#popup').modal('show');
    								return false;
    								}
    							break;
    					}
    					$index = i%5;
    					switch($index){
    						case 0:
    							if(i!=0){
    								$b_detail += ',';
    							}
    							$b_detail += ',{"fullname":"'+v.value+'",';
    						break;
    						case 1:
    							$b_detail += '"tel":"'+v.value+'",';
    						break;
    						case 2:
    							if(v.value == ""){
    								$b_detail += '"passportImg":"'+$('#session-passportImg').attr('session-path')+'",';
    							}else{
    								$b_detail += '"passportImg":"'+v.value+'",';
    							}
    						break;
    						case 3:
    							$b_detail += '"passportNo":"'+v.value+'",';
    						break;
    						case 4:
    							$dob = new Date(v.value).format('yyyy-mm-dd');
    							$b_detail += '"dob":"'+$dob+'"}';
    						break;
    					}
    				}
    			);
    		}
    		$b_detail += ']}';
    		$('input[name=booking-tourist-detail]').val($b_detail);
    		if($status){
    			document.forms['submitbooking'].submit();
    		}
    	}
    });

    function isEmail(email) {
    	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    		return regex.test(email);
    }

    function checkEmail($email){
    	$result = '';
    	$.ajax({
    		type: 'POST',
    		async : false,
    		url:'/check-email',
    		data:{
    			'email':$email
    			},
    		success:function(data){
    			$result = data;
    		}
    	});
    	return $result;
    }

    /**********Catch Resubmission***********/
    function preventBack(){
    	window.history.forward();
    }
     setTimeout("preventBack()", 0);
     window.onunload=function(){null};

    function readURL(input,pointer) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.upload input[pointer="'+pointer+'"]').siblings('img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function validatePassport(passport){
      var regsaid = /[a-zA-Z]{2}[0-9]{7}/;
      if(regsaid.test(passport) == false){
          return false;
      }else{
          return true;
      }
    }

    $('.menu-burger').click(function(){
      $('.menu-burger , .menu-list').toggleClass('open');
    });
  </script>
</html>
