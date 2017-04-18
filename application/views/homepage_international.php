<?php
  /*****************Session*****************/
  $lang = 'EN';
  if($this->session->userdata('lang') != ''){
  	$lang = $this->session->userdata('lang');
  }
  /*************Hilight Package*************/
  if(isset($hilight_price_range)){
  	$hilight_booking_timerange = json_decode($hilight_price_range,true);
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
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.4/numeral.min.js"></script>
    <script src="<?=base_url()?>assets/js/date.format.js"></script>
  </head>
  <body>
    <header>
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
            <a href="<?=base_url()?>"><img src="<?=base_url()?>assets/images/logo.png" alt="" class="logo"></a>
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
              <li><a href="_signin?from=it" class="btn">Sign In</a></li>
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
            <h1 class="animate-title">
              SUPERMARKET TOURS <br>
              <span>
                แพ็คเกจท่องเที่ยวในประเทศและต่างประเทศ<br>
                <p style="font-size:20px;color:#ffff00;margin-top:-13px;">ที่นักท่องเที่ยวนิยมเข้ามาเลือกซื้อมากที่สุด</p>
              </span>
              <br>
            </h1>
          </div>
        </div>
      </div>
    </header>
    <div class="title-bar">
      <div class="container">
        <div class="col-sm-6">
          <h1>Anywhere You Can Go</h1>
          <br>
          <p>Let,s Start Your Journey</p>
        </div>
        <div class="col-sm-6">
          <input type="text" class="search-bar">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <a href="<?=base_url()?>thai-tour">
          <div class="col-xs-6 no-pd">
            <p class="choose-tours-box">
              THAILAND DOMESTIC TOURS
            </p>
          </div>
        </a>
        <a href="<?=base_url()?>international-tour">
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
              <img src="<?=base_url()?>assets/images/ico-searchtext.png" alt="">
              <p>Tour Type</p>
            </div>
          </div>
          <div class="col-sm-9">
            <div id="series-package-selector" class="tour-category-box current">
              Join Group Tours
            </div>
            <div id="easy-package-selector" class="tour-category-box">
              Private Group Tours
            </div>
          </div>
          <div class="clear"></div>
          <div class="filter-bar clearfix">
            <div class="col-md-4">
              <p>Continent</p>
              <br>
              <select name="continent">
                <option>All Continent</option>
                <?php
                  if(isset($continent)){
                  	foreach($continent->result_array() as $row){
                  		echo "<option>".$row['continent_name']."</option>";
                  	}
                  }
                  ?>
              </select>
              <div class="line">
                <div class="tab"></div>
              </div>
            </div>
            <div class="col-md-4">
              <p>Country</p>
              <br>
              <select name="country">
                <option>All Country</option>
                <?php
                  if(isset($country)){
                  	foreach($country->result_array() as $row){
                  		echo "<option>".$row['country_name']."</option>";
                  	}
                  }
                  ?>
              </select>
              <div class="line">
                <div class="tab"></div>
              </div>
            </div>
            <div class="col-md-4">
              <p>Season</p>
              <br>
              <select name="season">
                <option>All Season</option>
                <option>High Season</option>
                <option>Low Season</option>
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
        <div class="hilight-title">
          <div class="col-md-12">
            <h2>HIGHLIGHT PROGRAM<br>
              <span>โปรแกรมทัวร์แนะนำ</span>
            </h2>
          </div>
        </div>
        <?php
          if(isset($hilight_package)){
          	$i = 0;
          	foreach($hilight_package->result_array() as $row){
          ?>
        <div class="col-md-4 col-sm-6">
          <div class="tour-box">
            <div class="img">
              <img src="<?=base_url()?><?=$row['img_source'];?>" alt="tour image cover">
              <div class="img-des">
                <?php
                  if($row['tour_currency'] == 'THB'){
                  ?>
                <p>Price: <?=number_format($row['tour_startPrice']);?> Baht<br>
                  <?php
                    }else{
                    ?>
                <p>Price: $<?=number_format($row['tour_startPrice']);?><br>
                  <?php
                    }
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
              <p class="date"><?=date_format(date_create($hilight_booking_timerange[$i]['from']),"j F Y");?> - <?=date_format(date_create($hilight_booking_timerange[$i]['to']),"j F Y");?></p>
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
      <div class="tours-program-box row">
        <div class="col-xs-12">
          <div class="title-header">
            <h2>ALL TOURS PROGRAM</h2>
            <div class="line">
              <div class="tab"></div>
            </div>
          </div>
        </div>
        <div class="clear top-mg"></div>
        <div class="tour-package">
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
                  <?php
                    if($row['tour_currency'] == 'THB'){
                    ?>
                  <p>Price: <?=number_format($row['tour_startPrice']);?> Baht<br>
                    <?php
                      }else{
                      ?>
                  <p>Price: $<?=number_format($row['tour_startPrice']);?><br>
                    <?php
                      }
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
      <div class="pagination-wrapper">
        <div class="col-xs-12">
          <div class="pagination">
            <?php foreach ($pagination_links as $link) {
              echo str_replace('/index.php','',$link);
              }?>
          </div>
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
    <input id="isTourCountry" type="hidden" value="international">
    <input id="isTourType" type="hidden" value="sp">
  </body>
  <script>
    function filter(){function a(a,c,d,e,f,g,h,i,j,k){return $result="",$.ajax({type:"POST",async:!1,url:"/filter-tour",data:{type:c,region:d,province:e,continent:f,country:g,season:h,keysearch:i,ref_url:j,offset:k},dataType:"json",success:function(c){$result=b(a,c)}}),$result}function b(a,b){if($result=new Array,$result.list_package="",$result.pagination_links="",$.trim(b.package))for($result=new Array,$result.list_package="",$i=0;$i<b.package.length;$i++)$date_range=JSON.parse(b.package[$i].tour_priceRange),$last_btr=$date_range.length-1,$open_booking=new Date($date_range[0].from),$close_booking=new Date($date_range[$last_btr].to),$result.list_package+='<div class="col-md-4 col-sm-6">',$result.list_package+='<div class="tour-box">',$result.list_package+='<div class="img">',$result.list_package+='<img src="'+a+b.package[$i].img_source+'" alt="tour image cover">',$result.list_package+='<div class="img-des">',"THB"==b.package[$i].tour_currency?$result.list_package+="<p>Price: "+numeral(b.package[$i].tour_startPrice).format("0,0")+" Baht<br>":$result.list_package+="<p>Price: $"+numeral(b.package[$i].tour_startPrice).format("0,0")+"<br>",$est_dayNight=b.package[$i].tour_dayNight.split(","),$result.list_package+="<span>"+$est_dayNight[0]+" Day "+$est_dayNight[1]+"</span></p>",$result.list_package+="</div></div>",$result.list_package+='<div class="tag">',$result.list_package+="<p>"+b.package[$i].tour_type+"</p>",$result.list_package+="</div>",$result.list_package+='<div class="description">',$result.list_package+='<p class="date">'+$open_booking.format("d mmmm yyyy")+" - "+$close_booking.format("d mmmm yyyy")+"</p>",$result.list_package+='<a href="'+a+"readmore?tour="+b.package[$i].tour_nameSlug+'" class="btn bold"> Detail & Booking </a>',$result.list_package+="<hr>",$result.list_package+='<a href="'+a+"filestorage/pdf/"+b.package[$i].tour_pdf+'">Download Program</a>',$result.list_package+="</div></div></div>";return"undefined"!=b.pagination_links&&($result.pagination_links=b.pagination_links),$result}$ref_url=$base_url+"international-tour/",$type=$("#isTourType").val(),$region="",$province="",$continent="",$country=$("#isTourCountry").val(),$keysearch=$(".search-bar").val(),$season="",null!=$('select[name="region"]').val()&&"All Region"!=$('select[name="region"]').val()&&($region=$('select[name="region"]').val()),null!=$('select[name="province"]').val()&&"All Province"!=$('select[name="province"]').val()&&($province=$('select[name="province"]').val()),null!=$('select[name="continent"]').val()&&"All Continent"!=$('select[name="continent"]').val()&&($continent=$('select[name="continent"]').val()),null!=$('select[name="country"]').val()&&"All Country"!=$('select[name="country"]').val()&&($country=$('select[name="country"]').val()),"All Season"!=$('select[name="season"]').val()&&("High Season"==$('select[name="season"]').val()?$season="1":$season="0"),$offset=location.href.match(/([^\/]*)\/*$/)[1],"international-tour"==$offset&&($offset=0),$result=a($base_url,$type,$region,$province,$continent,$country,$season,$keysearch,$ref_url,$offset),$(".tour-package").html(""),$(".pagination").html(""),$(".tour-package").html($result.list_package),$(".pagination").html($result.pagination_links)}$base_url="<?=base_url()?>",$("#series-package-selector").click(function(){$("#isTourType").val("sp"),filter()}),$("#easy-package-selector").click(function(){$("#isTourType").val("ep"),filter()}),$("select").change(function(){filter()}),$(".search-bar").on("keyup",function(a){13==a.keyCode&&filter()}),$(".tour-category-box").click(function(){$(".tour-category-box").removeClass("current"),$(this).addClass("current")}),$(".menu-burger").click(function(){$(".menu-burger , .menu-list").toggleClass("open")});
  </script>
</html>
