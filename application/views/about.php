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
    <link href="<?=base_url()?>assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
  </head>
  <body>
    <header class="readmore">
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
              <li><a href="<?=base_url()?>thai-tour">DOMESTIC TOURS</a></li>
              <li><a href="<?=base_url()?>international-tour">OUTBOUCE TOURS</a></li>
              <li><a href="<?=base_url()?>about">ABOUT</a></li>
              <?php if(empty($this->session->userdata('firstname'))){?>
              <li><a href="_signin?from=ab" class="btn">Sign In</a></li>
              <?php
                }else{
                ?>
              <li class="user-profile">
                <i class="fa fa-user-circle-o" aria-hidden="true"></i> PROFILE
                <ul>
                  <li><a href="<?=base_url()?>booking-list">BOOKING LIST</a></li>
                  <li><a href="<?=base_url()?>user-editprofile">EDIT PROFILE</a></li>
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
            <h1>ABOUT US <br>
              <span>เกี่ยวกับเรา</span>
            </h1>
          </div>
        </div>
      </div>
    </header>
    <div class="container about-page">
      <div class="row top-mg">
        <div class="col-md-3 text-center">
          <img src="<?=base_url()?>assets/images/img-about-logo.png" alt="" class="logo">
        </div>
        <div class="col-md-4">
          <h2>SUPERMARKET TOURS</h2>
          <p>สแตนดาร์ดสตรอว์เบอร์รีท็อปบูต โนติส กู๋โฮลวีตเอ็นเตอร์เทนวิก ยนตรกรรม สไลด์แชมป์ฟลอร์ซี้ ด็อกเตอร์ซิมโฟนี่แกรนด์ เปโซว้าวอันเดอร์สังโฆฟาสต์ฟู้ด แอปเปิ้ล มุมมองแซมบ้า รีเสิร์ชตุ๊ดอะ ฮิปฮอปแตง
            <br><br>
            กวาแทงโก้ แมคเคอเรล ซูเอี๋ยจูน น็อคเซลส์ ลอจิสติกส์อัลตราป๊อกโคโยตีอิเลียด หม่านโถวฮองเฮาเคลมอะโปรเจกต์
          </p>
          <br><br>
        </div>
        <div class="col-md-4 col-md-offset-1">
          <h2>CONTACT US</h2>
          <ul>
            <li><img src="<?=base_url()?>assets/images/ico-fb.png"> <span><a href="https://www.facebook.com/supermarket">Supermarket Tours</a></span></li>
            <li><img src="<?=base_url()?>assets/images/ico-about-line.png"> <span><a href="http://line.me/ti/p/~bankzahaplus">Supermarket Tours</a></span></li>
            <li><img src="<?=base_url()?>assets/images/ico-tel.png"> <span><a href="tel:0875012500">02-222-2222</a></span></li>
            <li><img src="<?=base_url()?>assets/images/ico-mail.png"> <span><a href="mailto:info@supermarket.com">info@supermarket.com</a></span></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid about-page">
      <div class="row">
        <div class="col-xs-12 full-img no-pd">
          <img src="assets/images/img-about.jpg" alt="">
        </div>
      </div>
      <div class="row location">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <div class="title-header">
                <h2>LOCATION</h2>
                <div class="line">
                  <div class="tab"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <iframe class="map"
          width="600"
          height="500"
          frameborder="0" style="border:0"
          src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAsL_kfu1G1BtJ4hO1uV_Sh5NgU3ppJlIU
          &q=PB+Travel+Agency+Center+Co.,Ltd." allowfullscreen>
        </iframe>
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <h2><i class="fa fa-map-marker" aria-hidden="true"></i> P.B. TRAVEL AGENCY</h2>
              <p>เลขที่ 171/17 หมู่บ้านสินธานี ซ.ลาดพร้าว ถ.ลาดพร้าว เขตลาดพร้าว
                แขวงวังทองหลาง กรุงเทพฯ 10310
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="container">
          <div class="row top-mg">
            <div class="col-xs-12">
              <div class="title-header">
                <h2>T.A.T. License</h2>
                <div class="line">
                  <div class="tab"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row top-mg">
            <div class="col-lg-4 col-sm-6">
              <div class="img-lc">
                <a href="<?=base_url()?>assets/images/img-lc01.jpg" data-lightbox="lc">
                <img src="<?=base_url()?>assets/images/img-lc01.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="img-lc">
                <a href="<?=base_url()?>assets/images/img-lc02.jpg" data-lightbox="lc">
                <img src="<?=base_url()?>assets/images/img-lc02.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="col-lg-4 col-sm-6">
              <div class="img-lc">
                <a href="<?=base_url()?>assets/images/img-lc03.jpg" data-lightbox="lc">
                <img src="<?=base_url()?>assets/images/img-lc03.jpg" alt="">
                </a>
              </div>
            </div>
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
  </body>
  <script src="<?=base_url()?>assets/js/lightbox.js"></script>
  <script>
    $('.menu-burger').click(function(){
    	$('.menu-burger , .menu-list').toggleClass('open');
    });
  </script>
</html>
