<?php
  /*****************Session*****************/
  $lang = 'EN';
  if($this->session->userdata('lang') != ''){
  	$lang = $this->session->userdata('lang');
  }
  /*************Hilight Package*************/
  if(isset($hilight_price_range)){
    for($i=0;$i<count($hilight_price_range);$i++){
      $hilight_booking_timerange[$i] = json_decode($hilight_price_range[$i],true);
    }
  	$last_hbtr = count($hilight_booking_timerange)-1;
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
	<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
	<script src="assets/owl-carousel/owl.carousel.js"></script>

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header>
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
					<h1 class="animate-title">SUPERMARKET TOURS <br>
					<span>แพ็คเกจท่องเที่ยวในประเทศและต่างประเทศ</span></h1>
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
	<div class="container">
		<div class="row">
      <a href="thai-tour">
        <div class="col-xs-6 no-pd">
          <p class="choose-tours-box">
            THAILAND DOMESTIC TOURS
          </p>
        </div>
      </a>
      <a href="international-tour">
        <div class="col-xs-6 no-pd">
          <p class="choose-tours-box current">
            INTERNATIONAL TOURS
          </p>
        </div>
      </a>
		</div>
	</div>
	<div class="hilight-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-sm-3">
					<div class="title-text">
						<img src="assets/images/ico-searchtext.png" alt="">
						<p>Tour Type</p>
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
              <option value="0" selected disabled>All Continent</option>
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
              <option value="0" selected disabled>All Country</option>
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
							<option value="0" selected disabled>All Season</option>
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
	<div class="container normal">
		<div class="hilight-box row">
      <?php
      if(isset($hilight_package) && $hilight_package->num_rows()>0){
      ?>
			<div class="hilight-title">
				<div class="col-md-12">
					<h2>HIGHLIGHT PROGRAM<br>
					<span>โปรแกรมทัวร์แนะนำ</span></h2>
				</div>
			</div>
			<div class="hilight-slide owl-theme">
        <?php
          	$i = 0;
          	foreach($hilight_package->result_array() as $row){
        ?>
        <div class="item">
          <div class="tour-box">
            <div class="img">
              <img src="<?=base_url()?><?=$row['img_source'];?>" alt="tour image cover">
              <div class="img-des">
                <p>Price: <?=number_format($row['tour_startPrice']);?> <?=$row['tour_currency']?><br>
                  <?php
                    $hilight_est_date = explode(",",$row['tour_dayNight']);
                  ?>
                  <span><?=$hilight_est_date[0];?> Day <?=$hilight_est_date[1];?> Night</span>
                </p>
              </div>
            </div>
            <div class="tag">
              <p><?=$row['tour_type'];?></p>
            </div>
            <div class="description">
              <?php
                $from = $hilight_booking_timerange[$i][0]['from'];
                $c = count($hilight_booking_timerange[$i])-1;
                $to = $hilight_booking_timerange[$i][$c]['to'];
              ?>
              <p class="date"><?=date_format(date_create($from),"j F Y");?> - <?=date_format(date_create($to),"j F Y");?></p>
              <a href="<?=base_url()?>readmore?tour=<?=$row['tour_nameSlug'];?>" class="btn bold"> Detail & Booking </a>
              <hr>
              <a href="<?=base_url()?>filestorage/pdf/<?=$row['tour_pdf'];?>">Download Program</a>
            </div>
          </div>
        </div>
        <?php
            $i++;
          }
        ?>
          </div>
          <?php
        }else{
        ?>
    		<div class="col-xs-12">
    			<div class="coming">
    				<img src="assets/images/ico-coming.png" alt="">
    				<h2>Coming Soon</h2>
            <br><br><br><br><br><br><br>
    			</div>
    		</div>
        <?php
        }
        ?>
		<div id="package">
			<div class="col-xs-12">
				<div id="package-title" class="title-header">
					<h2>LATEST TOUR PROGRAMS</h2>
					<div class="line">
						<div class="tab"></div>
					</div>
				</div>
			</div>
			<div class="clear top-mg"></div><br>
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
              <a href="<?=base_url()?>filestorage/pdf/<?=$row['tour_pdf']?>">Download Program</a>
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
		<div id="seeMoreBtn" class="row top-mg">
			<div class="col-md-4 col-md-offset-4">
				<a id="seeMoreProgram" class="btn bold square border blue seemore">See More Program</a>
			</div>
		</div>
  </div>
	</div>
  <?php include 'footer.php';?>
</body>
<input type="hidden" id="isTourType" value="sp">
<script>
  $('#seeMoreProgram').click(function() {
    $(this).attr('href','international-tour-all?type='+$('#isTourType').val());
  });

  $('#SeriesPackageSelector').click(function(){
    $("#isTourType").val("sp");
    changeTourType();
    $('html, body').animate({
      scrollTop: $('#package-title').offset().top-20
    }, 500);
  });

  $('#EasyPackageSelector').click(function(){
    $('#isTourType').val('ep');
    changeTourType();
    $('html, body').animate({
      scrollTop: $('#package-title').offset().top-20
    }, 500);
  });

  $('select[name=continent]').change(function(){
    url = 'international-tour-all?type='+$('#isTourType').val()+'&continent='+$(this).val();
    $(location).attr("href", url);
  });

  $('select[name=country]').change(function(){
    url = 'international-tour-all?type='+$('#isTourType').val()+'&country='+$(this).val();
    $(location).attr("href", url);
  });

  $('select[name=season]').change(function(){
    url = 'international-tour-all?type='+$('#isTourType').val()+'&season='+$(this).val();
    $(location).attr("href", url);
  });

  $('#searchBar').keypress(function(e){
    if(e.which == 13) {
      url = 'international-tour-all?type='+$('#isTourType').val()+'&keysearch='+$(this).val();
      $(location).attr("href", url);
    }
  });

  function changeTourType(){
    $.ajax({
      type: 'POST',
      url:'/change-tour-type',
      data:{
        'country': 'international',
      	'type': $('#isTourType').val()
      	},
      dataType: 'json',
      success:function(data){
        $result = '';
      	if($.trim(data['package'])){
            for($i=0;$i<data['package'].length;$i++){
              $date_range = JSON.parse(data['package'][$i].tour_priceRange);
              $last_btr = $date_range.length-1;
              $open_booking = new Date($date_range[0].from);
              $close_booking = new Date($date_range[$last_btr].to);
              $result += '<div class="col-md-4 col-sm-6">';
              $result += '<div class="tour-box">';
            	$result += '<div class="img">';
            	$result += '<img src="'+data['package'][$i].img_source+'" alt="tour image cover">';
            	$result += '<div class="img-des">';
              $result += '<p>Price: '+numeral(data['package'][$i].tour_startPrice).format('0,0')+' '+data['package'][$i].tour_currency+'<br>';
            	$est_dayNight = data['package'][$i].tour_dayNight.split(",");
            	$result += '<span>'+$est_dayNight[0]+' Day '+$est_dayNight[1]+' Night</span></p>';
            	$result += '</div></div>';
            	$result += '<div class="tag">';
            	$result += '<p>'+data['package'][$i].tour_type+'</p>';
            	$result += '</div>';
            	$result += '<div class="description">';
            	$result += '<p class="date">'+$open_booking.format("d mmmm yyyy")+' - '+$close_booking.format("d mmmm yyyy")+'</p>';
            	$result += '<a href="readmore?tour='+data['package'][$i].tour_nameSlug+'" class="btn bold"> Detail & Booking </a>';
            	$result += '<hr>';
            	$result += '<a href="filestorage/pdf/'+data['package'][$i].tour_pdf+'">Download Program</a>';
            	$result += '</div></div></div>';
            }
            $('#package-list').html($result);
            $('#seeMoreProgram').click(function() {
              $(this).attr('href','international-tour-all?type='+$('#isTourType').val());
            });
          }else{
            $result = '<div class="tours-program-box row"><div class="col-xs-12"><div id="package-title" class="title-header"><h2>LATEST TOUR PROGRAMS</h2><div class="line"><div class="tab"></div></div></div></div>';
            $result += '<div class="clear top-mg"></div><br><div id="package-list" class="coming"><img src="assets/images/ico-coming-blue.png" alt=""><h3>Coming Soon</h3></div>';
            $('#package').html($result);
            $('#package-list').removeClass('coming');
            $('#seeMoreBtn').hide();
          }
      }
  	});
  }

	$('.menu-burger').click(function(){
		$('.menu-burger , .menu-list').toggleClass('open');
	});

	$('.choose-tours-box').click(function(){
		$('.choose-tours-box').removeClass('current');
		$('.filter-bar').toggleClass('hide');
		$(this).addClass('current');
	});

	$('.tour-category-box').click(function(){
		$('.tour-category-box').removeClass('current');
		$(this).addClass('current');
	});

	$('document').ready(function(){
    $('#isTourType').val('sp');
    $('select[name=continent]').val(0);
    $('select[name=country]').val(0);
    $('select[name=season]').val(0);
		$('.hilight-slide').owlCarousel({
	      pagination : false,
	    	navigation: true,
	    	items:3,
	    	autoPlay: 5000,
	    	nav:true,
  			navigationText: ["&#xf104","&#xf105"],
  			responsiveClass:true,
		    responsive:{
		        480:{
		            items:1,
		        },
		        768:{
		            items:2,
		        },
		        1000:{
		            items:3,
		            loop:false
		        }
		    }
	  	});
	});
</script>
</html>
