<?php
  /*****************Session*****************/
  $lang = 'EN';
  if($this->session->userdata('lang') != ''){
  	$lang = $this->session->userdata('lang');
  }
  /*************Normal Package**************/
  if(isset($price_range)){
  	$last_pr = count($price_range)-1;
  	for($i=0;$i<=$last_pr;$i++){
  		$booking_timerange[$i] = json_decode($price_range[$i],true);
  		$last_btr[$i] = count($booking_timerange[$i])-1;
  	}
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUPERMARKET TOURS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <script src="assets/js/numeral.min.js"></script>
  <script src="assets/js/date.format.js"></script>
  <script src="assets/js/jquery.query-object.js"></script>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header class="readmore thai">
		<div class="container-fulid clearfix">
			<div class="header-box">
				<div class="language-box">
					<a class="current" href="#">
						<img src="assets/images/ico-en.png" alt="">
					</a>
					<a href="#">
						<img src="assets/images/ico-th.png" alt="">
					</a>
				</div>
				<div class="contact">
					<h2>Add Line</h2>
					<a href="http://line.me/ti/p/XdJsl_Agtu"><img src="assets/images/ico-line.png" alt=""></a>
				</div>
				<div class="contact">
					<h2>Contact Us</h2>
					<p>02-222-2222</p>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<a href="index.php"><img src="assets/images/logo.png" alt="" class="logo"></a>
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
            <li><a href="about">ABOUT</a></li>
            <?php if(empty($this->session->userdata('firstname'))){?>
            <li><a href="_signin?from=it" class="btn">Sign In</a></li>
            <?php
              }else{
              ?>
            <li class="user-profile">
              <i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
              <ul>
                <li><a href="booking-list">BOOKING LIST</a></li>
                <li><a href="user-edit-profile">EDIT PROFILE</a></li>
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
					<h1>INTERNATIONAL TOURS <br>
					<span>แพ็คเกจท่องเที่ยวต่างประเทศ</span></h1>
				</div>
			</div>
		</div>
	</header>
	<div class="title-bar">
		<div class="container">
			<div class="col-sm-6">
				<h1>Anywhere You Can Go</h1><br>
				<p>Let,s Start Your Journey</p>
			</div>
			<div class="col-sm-6">
				<input type="text" id="searchBar" class="search-bar">
			</div>
		</div>
	</div>
	<div class="hilight-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-sm-3">
					<div class="title-text">
						<img src="assets/images/ico-searchtext.png" alt="">
						<p>Tour type</p>
					</div>
				</div>
				<div class="col-sm-9">
          <div id="SeriesPackageSelector" class="tour-category-box current">
            Join Group Tours
          </div>
          <div id="EasyPackageSelector" class="tour-category-box">
            Private Group Tours
          </div>
				</div>
				<div class="clear"></div>
				<div class="filter-bar clearfix">
					<div class="col-md-4">
						<p>Continent</p> <br>
            <select name="continent">
              <option value="0" selected>All Continent</option>
              <?php
                if(isset($continent)){
                  foreach($continent->result_array() as $row){
                    echo "<option value='".$row['continent_id']."'>".$row['continent_name']."</option>";
                  }
                }
                ?>
            </select>
						<div class="line">
							<div class="tab"></div>
						</div>
					</div>
					<div class="col-md-4">
						<p>Country</p> <br>
            <select name="country">
              <option value="0" selected>All Country</option>
              <?php
                if(isset($country)){
                  foreach($country->result_array() as $row){
                    echo "<option value='".$row['country_id']."'>".$row['country_nameEN']."</option>";
                  }
                }
              ?>
            </select>
						<div class="line">
							<div class="tab"></div>
						</div>
					</div>
					<div class="col-md-4">
						<p>Season</p> <br>
            <select name="season">
							<option value="0" selected>All Season</option>
							<option value="h">High Season</option>
							<option value="l">Low Season</option>
						</select>
						<div class="line">
							<div class="tab"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container tourprogram show">
		<div class="hilight-box row">
      <div id="package">
			<div class="col-xs-12">
				<div class="tour-header-bar result">
					<div id="package-title" class="title-header">
						<h2><i class="fa fa-plane" aria-hidden="true"></i> ALL TOURS PROGRAM</h2>
					</div>
					<div class="digi">
						<?=$c_package?> Programs
					</div>
					<div class="clear"></div>
					<h3>แพ็คเกจทัวร์ท่องเที่ยวต่างประเทศทั้งหมด</h3>
				</div>
			</div>
      <div id="package-list">
        <?php
          if(isset($package)){
            $i = 0;
          foreach($package->result_array() as $row){
        ?>
        <div class="col-md-4 col-sm-6">
  				<div class="tour-box">
  					<div class="img">
  						<img src="<?=base_url()?><?=$row['img_source'];?>" alt="tour image cover">
  						<div class="img-des">
                <p>Price: <?=number_format($row['tour_startPrice']);?> <?=$row['tour_currency']?><br>
                  <?php
                    $est_date = explode(",",$row['tour_dayNight']);
                    ?>
                  <span><?=$est_date[0];?> Day <?=$est_date[1];?> Night</span>
                </p>
  						</div>
  					</div>
  					<div class="tag">
  						<p><?=$row['tour_type'];?></p>
  					</div>
            <div class="description">
              <p class="date"><?=date_format(date_create($booking_timerange[$i][0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$i][$last_btr[$i]]['to']),"j F Y");?></p>
              <a href="<?=base_url()?>readmore?tour=<?=$row['tour_nameSlug'];?>" class="btn bold"> Detail & Booking </a>
              <hr>
              <a href="<?=base_url()?>filestorage/pdf/<?=$row['tour_pdf'];?>">Download Program</a>
            </div>
  				</div>
  			</div>
        <?php
            $i++;
          }
        }
        ?>
      </div>
    </div>
		</div>
    <div class="pagination-wrapper">
        <div class="col-xs-12">
          <div class="pagination">
            <?php foreach ($pagination_links as $link) {
              echo $link;
              }?>
          </div>
        </div>
      </div>
	</div>
  <?php
	include 'footer.php';
  ?>
</body>
<input type="hidden" id="isTourType" value="sp">
<input type="hidden" id="cPackage" value="<?=$c_package?>">
<script>

  $('#SeriesPackageSelector').click(function(){
    $("#isTourType").val('sp');
    filter();
  });

  $('#EasyPackageSelector').click(function(){
    $("#isTourType").val('ep');
    filter();
  });

  $('select[name=continent]').change(function(){
    filter();
  });

  $('select[name=country]').change(function(){
    filter();
  });

  $('select[name=season]').change(function(){
    filter();
  });

  $('#searchBar').change(function(){
    filter();
  });

	$('.menu-burger').click(function(){
		$('.menu-burger , .menu-list').toggleClass('open');
	});

  function filter(){
    $url = 'international-tour-all?type='+$('#isTourType').val();
    $continent = $('select[name=continent]').val();
    if($continent != '0'){
       $url += '&continent='+$continent;
    }
    $country = $('select[name=country]').val();
    if($country != '0'){
       $url += '&country='+$country;
    }
    $season = $('select[name=season]').val();
    if($season != '0'){
      $url += '&season='+$season;
    }
    $keysearch = $('#searchBar').val();
    if($keysearch != ''){
      $url += '&keysearch='+$keysearch;
    }
    $(location).attr("href", $url+'&scroll=1');
  }

	$(function() {
	  $('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      	var target = $(this.hash);
	      	target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      	if (target.length) {
	        	$('html, body').animate({
	          	scrollTop: target.offset().top-50
	        	}, 1000);
	        	return false;
	      	}
	    }
	  });
	});

  $('.menu-burger').click(function(){
		$('.menu-burger , .menu-list').toggleClass('open');
	});

	$('.choose-tours-box').click(function(){
		$('.choose-tours-box').removeClass('current');
		$('.filter-bar').toggleClass('hide');
		$(this).addClass('current');
	});

  $type = $.query.get('type');
  $continent = $.query.get('continent');
  $country = $.query.get('country');
  $season = $.query.get('season');
  $keysearch = $.query.get('keysearch');
  $scroll = $.query.get('scroll');
  $per_page = $.query.get('per_page');
	var uri = window.location.pathname;
	$(document).ready(function(){
    if($type != 'ep'){
      $('#SeriesPackageSelector').addClass('current');
      $('#EasyPackageSelector').removeClass('current');
    }else{
      $('#EasyPackageSelector').addClass('current');
      $('#SeriesPackageSelector').removeClass('current');
    }
    if($continent != ''){
      $('select[name=continent]').val($continent);
    }
    if($country != ''){
      $('select[name=country]').val($country);
    }
    if($season != ''){
      $('select[name=season]').val($season);
    }
    if($keysearch != ''){
      $('#searchBar').val($keysearch);
    }
    if($('#cPackage').val() == 0){
      $html = '<div class="coming"><img src="assets/images/ico-coming.png" alt=""><h2>Coming Soon</h2></div>';
      $('#package').html($html);
      $('html, body').animate({
      	scrollTop: $('.coming').offset().top-20
      }, 500);
    }
    if($scroll == '1' || $per_page != ''){
      $('html, body').animate({
      	scrollTop: $('#package-title').offset().top-20
      }, 500);
    }
	});

</script>
</html>
