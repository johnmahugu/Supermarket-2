<?php
  /*****************Session*****************/
  $lang = 'EN';
  if(!empty($this->session->userdata('lang'))){
  	$lang = $this->session->userdata('lang');
  }
  $country = $this->session->userdata('country');
  /*************List package****************/
  $package = $package->row_array(0);
  if(isset($price_range)){
  	$booking_timerange = json_decode($price_range,true);
  	$last_btr = count($booking_timerange)-1;
  }
  /*************List route******************/
  if(isset($briefing)){
  	$route_briefing = json_decode($briefing,true);
  	$last_rbf = count($route_briefing)-1;
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
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
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
            <a href="<?=base_url()?><?php if($country == 'thailand'){ echo "thai-tour"; }else{ echo "international-tour"; }?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
          </div>
          <div class="col-sm-10">
            <div class="menu-burger">
              <span></span>
              <span></span>
              <span></span>
            </div>
            <ul class="menu-list">
              <li><a href="thai-tour">THAILAND DOMESTIC TOURS</a></li>
              <li><a href="international-tour">INTERNATIONAL TOURS</a></li>
              <li><a href="<?=base_url()?>about">ABOUT</a></li>
              <?php if(empty($this->session->userdata('firstname'))){?>
              <li><a href="_signin?from=rm" class="btn">Sign In</a></li>
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
              if($package['country_name'] == 'Thailand'){
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
          <p><?=date_format(date_create($booking_timerange[0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$last_btr]['to']),"j F Y");?></p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="content row">
        <div class="col-sm-4 col-sm-push-8" style="text-align:center">
          <div class="tour-box readmore">
            <div class="img">
              <img src="<?=base_url()?><?=$package['img_source'];?>" alt="tour image cover">
            </div>
            <div class="tag">
              <p><?=$package['tour_type'];?></p>
            </div>
            <div class="description">
              <p>Price: $<?=number_format($package['tour_startPrice']);?> <?=$package['tour_currency']?><br>
                <?php
                  $est_date = explode(",",$package['tour_dayNight']);
                  ?>
                <span><?=$est_date[0];?> Day <?=$est_date[1];?> Night</span>
              </p>
              <br>
              <hr>
              <p><span>Program Tour</span></p>
              <a href="<?=base_url()?>filestorage/pdf/<?=$package['tour_pdf'];?>" class="btn bold"> Download Program</a>
            </div>
          </div>
          <div class="title-line top-mg">
            <h2>Table Travel</h2>
          </div>
          <table class="tour-date">
            <?php
              for($i=0;$i<=$last_btr;$i++){
              ?>
            <tr>
              <td><?=date_format(date_create($booking_timerange[$i]['from']),"j M Y");?> - <?=date_format(date_create($booking_timerange[$i]['to']),"j M Y");?></td>
              <td>$<?=number_format($booking_timerange[$i]['price']);?> <?=$package['tour_currency']?></td>
            </tr>
            <?php
              }
              ?>
          </table>
          <?php if($last_btr > 5){
            ?>
          <p id="seemore">See More</p>
          <?php
            } ?>
        </div>
        <div class="col-sm-8 col-sm-pull-4">
          <div class="title-line top-mg">
            <h2>Overview</h2>
          </div>
          <div class="content-box">
            <h2 class="title-text">
              <?=$package['tour_overview'];?>
            </h2>
            <h3 class="hilight-red">
              Start at <?=number_format($package['tour_startPrice']);?> <?=$package['tour_currency']?>
            </h3>
          </div>
          <div class="title-line top-mg">
            <h2>Tour Detail</h2>
          </div>
          <div class="content-box readmore">
            <?=$package['tour_desc'];?>
          </div>
          <div class="title-line top-mg">
            <h2>Tour Briefing</h2>
          </div>
          <div class="content-box">
            <ul>
              <?php
                for($i=0;$i<=$last_rbf;$i++){
                ?>
              <li>
                <h3>Day <?=$i+1;?></h3>
                <p><?=$route_briefing[$i]['route'];
                  if($route_briefing[$i]['hotel'] != ''){?>
                  <span>Stay at <?=strtoupper($route_briefing[$i]['hotel']);?></span>
                </p>
                <?php
                  }
                  ?>
              </li>
              <?php
                }
                ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="row btn-wrapper">
        <div class="col-sm-8">
          <?php if($package['tour_type'] == 'SERIES PACKAGE'){ ?>
          <a href="<?=base_url()?>series-booking?tour=<?=$package['tour_nameSlug'];?>" class="btn bold ">REQUEST THIS TOUR</a>
          <?php
            }else{
            ?>
          <a href="<?=base_url()?>easy-booking?tour=<?=$package['tour_nameSlug'];?>" class="btn bold ">REQUEST THIS TOUR</a>
          <?php
            }
            ?>
        </div>
        <div class="col-sm-4">
          <a href="<?=base_url()?>" class="btn gray square right">Back <i class="fa fa-angle-right" aria-hidden="true"></i></a>
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
  </body>
  <script>
    $('#seemore').click(function(){
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
  </script>
</html>
