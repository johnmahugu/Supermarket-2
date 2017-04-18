<?php
  /*****************Session*****************/
  $lang = $this->session->userdata('lang');
  $session = $user_data->row_array(0);
  $country = $this->session->userdata('country');
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
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <script src="<?=base_url()?>assets/js/date.format.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  </head>
  <body>
    <header class="user">
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
            <a href="<?=base_url()?><?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
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
              <li><a href="_signin?from=bl" class="btn">Sign In</a></li>
              <?php
                }else{
                ?>
              <li class="user-profile">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
                <ul>
                  <li><a href="#">BOOKING LIST</a></li>
                  <li><a href="<?=base_url()?>user-edit-profile">EDIT PROFILE</a></li>
                  <li><a href="signout">LOG OUT</a></li>
                </ul>
                <?php
                  }
                  ?>
            </ul>
          </div>
        </div>
        <div class="row profile">
          <div class="col-xs-12">
            <h1><span>Profile</span>
              <?php echo $session['client_firstName']." ".$session['client_middleName']." ".$session['client_lastName']?>
            </h1>
            <a href="<?=base_url()?>user-edit-profile" class="btn border right">Edit</a>
            <div class="clear"></div>
            <div class="line">
              <div class="tab"></div>
            </div>
          </div>
          <div class="clear"></div>
          <div class="col-md-4 col-sm-6 clearfix">
            <ul>
              <li><span>Email 	</span>: <?php echo $session['client_email']?></li>
              <li><span>Tel No. 	</span>: <?php echo $session['client_tel']?></li>
              <li><span>Line ID	</span>: <?php echo $session['client_lineId']?></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 clearfix">
            <ul>
              <li><span>Passport No.  </span>: <?php echo $session['client_passportNumber']?></li>
              <li><span>Birth Date  	</span>: <?php echo date_format(date_create($session['client_dob']),"j F Y")?></li>
              <li><span>Address	    </span>: <?php echo $session['client_address']?></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <div class="title-bar mybooking">
      <div class="container">
        <div class="col-sm-6">
          <h1>MY BOOKING PROGRAM</h1>
          <br>
          <p>Tour Programs</p>
        </div>
      </div>
    </div>
    <div class="container card-wrapper">
      <div class="row">
        <div class="table-header">
          <div class="col-sm-2">
            <p>Program Tour</p>
          </div>
          <div class="col-lg-2 col-lg-offset-8 col-sm-3 col-sm-offset-7">
            <p>Status</p>
          </div>
        </div>
        <div class="col-xs-12">
          <?php
            $i=0;
            foreach ($package_detail->result_array() as $row) {
            	$b_detail = json_decode($booking_detail[$i],true);
            ?>
          <div class="mybooking-card">
            <div class="col-sm-3 bookingno">
              <p>Booking Number</p>
              <h2><?php echo $row['booking_code']?></h2>
            </div>
            <div class="col-sm-7 col-lg-7	">
              <label>
              <?php
                if($lang == 'EN'){
                	if($row['tour_nameEN'] != ''){
                		echo strtoupper($row['tour_nameEN']);
                	}else{
                		echo strtoupper($row['tour_nameTH']);
                	}
                }else{
                	if($row['tour_nameTH'] != ''){
                		echo strtoupper($row['tour_nameTH']);
                	}else{
                		echo strtoupper($row['tour_nameEN']);
                	}
                }
                ?>
              </label><br>
              <h4><?php echo date_format(date_create($b_detail['date'][0]['start']),"j F Y")?> - <?php echo date_format(date_create($b_detail['date'][0]['end']),"j F Y")?></h4>
              <h3 class="top-mg"><?php echo count($b_detail['touristinfo'])?> Persons</h3>
              <p data-toggle="modal" data-target="#tourists<?php echo $i?>" class="tourist">See Tourists</p>
            </div>
            <div class="col-sm-3 col-lg-2">
              <p>Status</p>
              <h3><?php echo ucfirst($row['booking_status'])?></h3>
              <div class="btn-wrapper">
                <div class="btn link cancel-booking" cancel-booking="<?php echo $row['booking_code']?>" data-toggle="modal" data-target="#cancel">Cancel</div>
                <br>
                <a href="<?=base_url()?>filestorage/pdf/<?php echo $row['tour_pdf'];?>" class="btn">Download Program</a>
              </div>
            </div>
          </div>
          <?php
            $i++;
            }
            ?>
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
              <a href="http://line.me/ti/p/~bankzahaplus"><img src="<?=base_url()?>assets/images/ico-line.png" alt=""></a>
            </div>
            <div class="contact">
              <h2>Contact Us</h2>
              <p><a href="tel:0875012500">02-222-2222</a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="strap"></div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="popup" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
          </div>
          <div class="modal-body text-center">
            <img src="assets/images/ico-success.png" alt="">
            <h4><?php echo $this->session->flashdata('f1')?></h4>
            <p><?php echo $this->session->flashdata('f2')?></p>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="cancel" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <h4 class="modal-title"><i class="fa fa-plane" aria-hidden="true"></i> Cancel booking</h4>
          </div>
          <form id="cancel-booking-form" action="cancel-booking" method="POST">
            <div class="modal-body">
              <label for="content">Plese fill the reason why you cancel this booking.</label><br>
              <textarea id="content" name="content"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn gray" data-dismiss="modal" >CANCEL</button>
              <button id="cancel-booking-submit" type="button" class="btn" >SUBMIT</button>
            </div>
            <input id="cancel-booking_code" name="cancel-booking_code" type="hidden" value="">
            <input id="cancel-content" name="cancel-content" type="hidden" value="">
          </form>
        </div>
      </div>
    </div>
    <?php
      $i=0;
      foreach ($package_detail->result_array() as $row){
      	$b_detail = json_decode($booking_detail[$i],true);
      ?>
    <div class="modal fade" id="tourists<?php echo $i?>" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
            <h4 class="modal-title"><i class="fa fa-plane" aria-hidden="true"></i> Traveler lists</h4>
          </div>
          <form action="" method="POST">
            <div class="modal-body">
              <ol>
                <?php
                  $count = count($b_detail['touristinfo']);
                  for($j=0;$j<$count;$j++){
                  ?>
                <li><?php echo $b_detail['touristinfo'][$j]['fullname']?></li>
                <?php
                  }
                  ?>
              </ol>
            </div>
            <div class="modal-footer">
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php
      $i++;
      }
      ?>
    <input id="msg" type="hidden" value="<?php echo $this->session->flashdata('f1')?>">
  </body>
  <script>
    $(document).ready(function(){
    	$msg = $('#msg').val();
    	if($msg != ''){
    		$('#popup').modal('show');
    	}
    });

    $('#seemore').click(function() {
    	$('.tour-date').toggleClass('current');
    	if($(this).text()=="See More"){
    		$(this).text('Hide');
    	}else{
    		$(this).text('See More');
    	}
    });
    $('.menu-burger').click(function(){
    	$('.menu-burger , .menu-list').toggleClass('open');
    });

    $('#checkaccount .btn.border').click(function(){
    	$(this).closest('#checkaccount').addClass('hide');
    	$('#noaccount').fadeIn(500);
    });

    $('.link').click(function(){
    	$('#cancel-booking_code').val($(this).attr('cancel-booking'));
    });


    $('#cancel-booking-submit').click(function(){
    	$('#cancel-content').val($('textarea[name=content]').val());
    	document.forms['cancel-booking-form'].submit();
    });
  </script>
</html>
