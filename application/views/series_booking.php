<?php
  /*************Clear POST&GET**************/
  unset($_POST, $_GET);
  /*****************Session*****************/
  $lang = 'EN';
  if(!empty($this->session->userdata('lang'))){
  	$lang = $this->session->userdata('lang');
  }
  $country = $this->session->userdata('country');
  /***************List package**************/
  $package = $package->row_array(0);
  if(isset($price_range)){
  	$booking_timerange = json_decode($price_range,true);
  	$last_btr = count($booking_timerange)-1;
  }
  if($package['tour_privateGroup'] == 1){
    $discountRate = json_decode($package['tour_discountRate'],true);
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
              <li><a href="<?=base_url()?>thai-tour">THAILAND DOMESTIC TOURS</a></li>
              <li><a href="<?=base_url()?>international-tour">INTERNATIONAL TOURS</a></li>
              <li><a href="<?=base_url()?>about">ABOUT</a></li>
              <?php if(empty($this->session->userdata('firstname'))){?>
              <li><a href="_signin?from=sb" class="btn">Sign In</a></li>
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
            <?php if($package['country_name'] == 'Thailand'){ ?>
            <h1>
            THAILAND DOMESTIC TOURS<br>
            <?php }else{ ?>
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
          <h1>
            <?php
              if(empty($package['tour_name'.$lang])){
              	echo strtoupper($package['tour_name'.$lang]);
              }else{
              	if($lang == 'TH'){
              		echo strtoupper($package['tour_nameTH']);
              	}else{
              		echo strtoupper($package['tour_nameEN']);
              	}
              }
              ?>
          </h1>
          <br>
          <p><?=date_format(date_create($booking_timerange[0]['from']),"j F Y");?> - <?=date_format(date_create($booking_timerange[$last_btr]['to']),"j F Y");?></p>
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
          <a href="series-booking?tour=<?=$package['tour_nameSlug']?>" class="choose-step-box current">
          <span class="circle"> 1 </span>
          Select Room
          </a>
        </div>
        <div class="col-sm-5 no-pd booking-infopage">
          <a class="choose-step-box">
          <span class="circle"> 2 </span>
          Fill Tourist
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="form-group">
            <h3>Tour Booking</h3>
            <div class="col-md-6">
              <label for="">Day trip</label><br>
              <select name="daytrip">
                <option disabled selected>Select day trip</option>
                <?php
                  for($i=0;$i<=$last_btr;$i++){
                    $date1 = new DateTime($booking_timerange[$i]['from']);
                    $date1->modify('-'.$package['tour_advanceBooking'].' day');
                    $date1 = $date1->format('Y-m-d');
                    $date2 = (new DateTime)->format('Y-m-d');
                    if($date2 <= $date1){
                      echo '<option datestart="'.$booking_timerange[$i]['from'].'" datefinish="'.$booking_timerange[$i]['to'].'" value="'.$booking_timerange[$i]['price'].'">';
                  		$open_booking = date_format(date_create($booking_timerange[$i]['from']),"d M Y");
                  		$close_booking = date_format(date_create($booking_timerange[$i]['to']),"d M Y");
                  		echo '<td>'.$open_booking." - ".$close_booking.'</td>';
                  		echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.number_format($booking_timerange[$i]['price']).' '.$package['tour_currency'].'</td>';
                  		echo '</option>';
                    }
                  }
                  ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="">Tourist</label><br>
              <input id="tourist-total-num" type="number" min="1" value="1">
              <span class="unit">person</span>
            </div>
          </div>
          <?php
            if($condition->num_rows() > 0){
            	echo '<div class="form-group"><h3>Tour package option</h3>';
            	foreach($condition->result_array() AS $row){
                if($row['tc_type'] == 'option'){
            ?>
          <div class="col-md-6">
            <div class="checkbox-box">
              <input type="checkbox" class="tour-option" condition="<?=$row['tc_condition']?>" price="<?=$row['tc_price']?>"><span><?=$row['tc_data'];?>
              <?php
                if($row['tc_condition'] == 'decrease'){
                	$result = "<b class='discount'> discount ";
                  $result .= number_format($row['tc_price'])." ".$package['tour_currency']."</b>";
                	echo $result;
                }else{
                	$result = "<b> add ";
                  $result .= number_format($row['tc_price'])." ".$package['tour_currency']."</b>";
                	echo $result;
                }
                ?></span>
            </div>
          </div>
          <?php
        }
            }
            }
            $is_first = true;
            foreach($condition->result_array() AS $row){
              if($row['tc_type'] == 'option activity'){
                if($is_first){
                  $is_first = false;
                  echo '<div class="form-group" id="multiple">';
                  if($row['tc_title'] != ''){
                    echo '<h3>'.$row['tc_title'].'</h3>';
                  }
                  echo '<div class="col-md-12"><table><tbody><tr><td><input type="radio" name="extension-activity" price="0" checked>Do Not Participate</td>';
                  echo '<td>No Charge</td></tr>';
                }
                echo '<tr><td><input type="radio" name="extension-activity" activity="'.$row['tc_data'].'" price="'.$row['tc_price'].'">'.$row['tc_data'].'</td>';
                echo '<td><span>Increase</span>Add '.number_format($row['tc_price']).' '.$package['tour_currency'].'</td>';
                echo '</tr>';
              }
            }
            echo '</tbody></table></div></div>';
            if($package['tour_privateGroup'] == 1){
            ?>
          <div class="form-group">
					<h3><input type="checkbox" id="private-group"> <span>Private Group</span></h3>
					<div class="col-md-8" id="joinchart">
						<table>
							<thead>
								<tr>
									<td>Amount Tourist</td>
									<td>Increase</td>
								</tr>
							</thead>
							<tbody>
                <?php
                $discountRate = json_decode($package['tour_discountRate'],true);
                $c_discountRate = count($discountRate)-1;
                for($i=0;$i<=$c_discountRate;$i++){
                  if($i != $c_discountRate){
                    echo '<tr>';
                    echo '<td>< '.$discountRate[$i]['pax'].' people</td><td>'.$discountRate[$i]['price'].'</td>';
                    echo '</tr>';
                  }else{
                    echo '<tr>';
                    echo '<td>> '.$discountRate[$i]['pax'].' people</td><td>'.$discountRate[$i]['price'].'</td>';
                    echo '</tr>';
                  }
                }
                 ?>
							</tbody>
						</table>
					</div>
				</div>
        <?
      }
        ?>
          <div class="form-group">
            <h3>Select Room Type</h3>
            <div class="form-group">
              <div class="list">
                <div class="amount">
                  <p>Total <span>0</span> / <span id="total-tourist">1</span> person</p>
                </div>
              </div>
              <div class="list" room-type="Twin / Tripple room">
                <div class="col-sm-5"><label>Twin / Tripple room</label></div>
                <div class="col-sm-4 col-xs-7">
                  <p class="priceroom"><?=number_format($package['tour_startPrice']);?></p>
                  <p>&nbsp;/ person</p>
                </div>
                <div class="col-sm-3 col-xs-5"><input type="hidden"><input class="tourist-num" type="number" value="0" min="0" max="1"><span class="unit">person</span></div>
              </div>
              <?php
                foreach($room->result_array() as $row){
                	$room_condition = json_decode($row['tc_data'], TRUE);
                	$last_rc = count($room_condition);
                	for($i=0;$i<$last_rc;$i++){
              ?>
              <div class="list" room-type="<?=$room_condition[$i]['roomtype']?>">
                <div class="col-sm-5"><label><?=$room_condition[$i]['roomtype']?><br>
                  <?php if($room_condition[$i]['roomdetail'] != ''){ ?>
                  <span>(
                  <?php echo $room_condition[$i]['roomdetail']; ?>
                  )</span>
                  <?php }
                    ?>
                  </label>
                </div>
                <div class="col-sm-4 col-xs-7">
                  <input type="hidden" value="<?=$row['tc_price'];?>">
                  <p class="priceroom"><?=number_format($package['tour_startPrice']+$row['tc_price']);?></p>
                  <p>&nbsp;/ person</p>
                </div>
                <div class="col-sm-3 col-xs-5"><input class="tourist-num" type="number" value="0" min="0" max="1"><span class="unit">person</span></div>
              </div>
              <?php }
                }
                ?>
              <div class="form-group">
      					<h3>Spacial Request</h3>
      					<textarea id="spacial-request"></textarea>
      				</div>
              <hr>
              <div class="list total-amount">
                <div class="col-sm-5"><label>Total amount</label></div>
                <div class="col-sm-4">
                  <p id="total-amount" class="total">0</p><?=$package['tour_currency']?>
                </div>
              </div>
            </div>
        </div>
      <div class="clear"></div>
      <div class="btn-wrapper">
        <div class="col-sm-4 col-sm-offset-4">
          <button type="submit" class="btn bold booking-infopage">Next <i class="fa fa-angle-right" aria-hidden="true"></i></button>
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
      <form id="to-booking-info" action="series-booking-info" method="post">
        <input name="tour-nameSlug" type="hidden" value="<?php echo $package['tour_nameSlug']?>" required>
        <input name="booking-detail" type="hidden" value="" required>
      </form>
      <input id="isDoublePack" type="hidden" value="<?=$package['tour_doublePack']?>">
      <input id="isPrivateGroup" type="hidden" value="<?=$package['tour_privateGroup']?>">
      <input id="discountRate" type="hidden" value='<?=$package['tour_discountRate']?>'>
      <input id="privateGroupPrice" type="hidden" value="<?=$package['tour_privateGroupPrice']?>">
      <input id="minimum" type="hidden" value="<?=$package['tour_minimum']?>">
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
            <h4>Infomations</h4>
            <p id="alert-warning"></p>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  </body>
  <script>
    $(document).ready(function(){
    	$count_list = $('.list').length;
    	$is_first = true;
    	for($i=0;$i<$count_list;$i++){
    		if($('.list').eq($i).attr('room-type') == 'Single room'){
    			$('.list').eq($i).find('input').eq(1).val(1);
    			$('.amount').find('span').eq(0).html(1);
    		}
    		if($('.list').eq($i).attr('room-type') != 'Single room' && typeof($('.list').eq($i).attr('room-type')) != 'undefined'){
    			$('.list').eq($i).hide();
    		}
    	}
      $isDoublePack = $('#isDoublePack').val();
      if($isDoublePack == 1){
        double_pack(true);
      }
      if($('#minimum').val() > 0){
        $('#tourist-total-num').val($('#minimum').val());
        $('#tourist-total-num').prop('min',$('#minimum').val());
      }
      set_room(2);
      set_max($('#tourist-total-num').val());
      sum_amount();
    });
    /**************************Control zone*******************************/
    $('select[name="daytrip"]').change(function(){
    	$datestart = $(this).find(':selected').attr('datestart');
    	$datefinish = $(this).find(':selected').attr('datefinish');
    	$price_starting = $(this).val();
    	$index = 0;
    	$('.priceroom').eq($index).text(numeral($price_starting).format('0,0'));
    	$count_input = $('.list').find('input').length;
    	for($i=0;$i<$count_input;$i++){
    		if($('.list').find('input').eq($i).val() != 0){
    			$index++;
    			$result = parseInt($price_starting);
    			$result += parseInt($('.list').find('input').eq($i).val());
    			$('.priceroom').eq($index).text(numeral($result).format('0,0'));
    		}
    	}
    	set_room(3);
    	sum_amount();
    });

    /**************Change tourist****************/
    $('#tourist-total-num').change(function(){
    	$('#total-tourist').html($(this).val());
    	$total = parseInt($(this).val(),10);
    	switch(true){
    		case ($total == 0 || $total < 0):
    			$(this).val(1);
    			set_room(1);
    			$('#alert-warning').html('Invalid number');
    			$('#popup').modal('show');
    		break;
    		case ($total == 100 || $total > 100):
    			$(this).val(1);
    			set_room(1);
    			$('#alert-warning').html('Invalid number');
    			$('#popup').modal('show');
    		break;
    		case ($total == 1):
    			set_room(1);
    			set_max($total);
    		break;
    		case ($total > 0):
    			set_room(2);
    			set_max($total);
    		break;
    	}
      $direction = this.defaultValue < this.value
      this.defaultValue = this.value;
      if(!$direction){
        $count_list = $('.list').length;
      	for($i=0;$i<$count_list;$i++){
          $('.list').eq($i).find('input').eq(1).val(0);
        }
        set_room(2);
        set_max();
        sum_amount();
      }
    });

    /**************Change tourist****************/
    $('#tourist-total-num').blur(function(){
    	$total = parseInt($(this).val(),10);
    	switch(true){
    		case ($total == 0 || $total < 0):
    			$(this).val(1);
    			set_room(1);
    			$('#alert-warning').html('Invalid number');
    			$('#popup').modal('show');
    		break;
    		case ($total == 100 || $total > 100):
    			$(this).val(1);
    			set_room(1);
    			$('#alert-warning').html('Invalid number');
    			$('#popup').modal('show');
    		break;
    		case ($total == 1):
    			set_room(1);
    			set_max($total);
    		break;
    		case ($total > 0):
    			set_room(2);
    			set_max($total);
    		break;
    	}
    	sum_amount();
    });

    /*****************Sum tourist******************/
    $('.tourist-num').change(function(){
    	$tourist_total_num = $('#tourist-total-num').val();
    	$tourist_total = 0;
    	$count_list = $('.list').length;
    	for($i=0;$i<$count_list;$i++){
    		if(typeof($('.list').eq($i).find('input').eq(1).val()) != 'undefined'){
    			$tourist_total += parseInt($('.list').eq($i).find('input').eq(1).val());
    		}
    		if($tourist_total>$tourist_total_num){
    			$(this).val(0);
    			break;
    		}
    	}
    	set_max($tourist_total_num);
    	sum_amount();
    });

    /********************Check tour condition**********************/
    $('.tour-option').change(function(){
    	if($(this).is(":checked")){
    		switch ($(this).attr('condition')){
    			case 'increase':
    				for($i=1;$i<$('.list').size()-1;$i++){
    					$price_starting = $('.list').eq($i).find('p').eq(0).html();
    					$price_starting = parseInt(numeral($price_starting).format('0'))+parseInt($(this).attr('price'));
    					$('.list').eq($i).find('p').eq(0).html(numeral($price_starting).format('0,0'));
    				}
    			break;
    			case 'decrease':
    				for($i=1;$i<$('.list').size()-1;$i++){
    					$price_starting = $('.list').eq($i).find('p').eq(0).html();
    					$price_starting = parseInt(numeral($price_starting).format('0'))-parseInt($(this).attr('price'));
    					$('.list').eq($i).find('p').eq(0).html(numeral($price_starting).format('0,0'));
    				}
    			break;
    		}
    	}else{
    		switch ($(this).attr('condition')){
    			case 'increase':
    				for($i=1;$i<$('.list').size()-1;$i++){
    					$price_starting = $('.list').eq($i).find('p').eq(0).html();
    					$price_starting = parseInt(numeral($price_starting).format('0'))-parseInt($(this).attr('price'));
    					$('.list').eq($i).find('p').eq(0).html(numeral($price_starting).format('0,0'));
    				}
    			break;
    			case 'decrease':
    				for($i=1;$i<$('.list').size()-1;$i++){
    					$price_starting = $('.list').eq($i).find('p').eq(0).html();
    					$price_starting = parseInt(numeral($price_starting).format('0'))+parseInt($(this).attr('price'));
    					$('.list').eq($i).find('p').eq(0).html(numeral($price_starting).format('0,0'));
    				}
    			break;
    		}
    	}
    	sum_amount();
    });

    $('input:radio[name=extension-activity]').change(function(){
      sum_amount();
    });

    /*****************Submit form to booking-info page*************/
    $('.booking-infopage').click(function(){
    	$status_room = false;
    	$status_day = false;
    	$status_tourist = false;
      if(!check_doublePack()){
          $('#alert-warning').html("This tour is double pack. Plese fill even number only");
      		$('#popup').modal('show');
        }else{
          if(!check_room()){
        		$tourist_total_num = $('#tourist-total-num').val();
        		set_max($tourist_total_num);
        		$('#alert-warning').html("Twin room can't stay alone.");
        		$('#popup').modal('show');
        	}else{
        		$status_room = true;
        		if($('select[name="daytrip"]').val() == null){
        			$('#alert-warning').html('Plese select your interested day trip');
        			$('#popup').modal('show');
        		}else{
        			$status_day = true;
        			if(parseInt($('.amount').find('span').eq(0).html()) == parseInt($('.amount').find('span').eq(1).html())){
        				$status_tourist = true;
        			}
        			if($status_room && $status_day && $status_tourist){
        				$b_detail = '{"room":[';
        				$count_list = $('.list').length;
        				for($i=0;$i<$count_list;$i++){
        					if(typeof($('.list').eq($i).find('input').eq(1).val()) != 'undefined' && $('.list').eq($i).find('input').eq(1).val() > 0){
        						$roomtype = $('.list').eq($i).attr('room-type');
        						$tourist = $('.list').eq($i).find('input').eq(1).val();
        						$b_detail += '{"roomtype":"'+$roomtype+'","tourist_num":'+$tourist+'}';
        						if(typeof($('.list').eq($i+1).find('input').eq(1).val()) != 'undefined' && $('.list').eq($i+1).find('input').eq(1).val() > 0){
        							$b_detail += ',';
        						}
        					}
        				}
        				$b_detail += '],';
        				$datestart = $('select[name="daytrip"]').find(':selected').attr('datestart');
        				$datefinish = $('select[name="daytrip"]').find(':selected').attr('datefinish');
        				$b_detail += '"date":[{"start":"'+$datestart+'","end":"'+$datefinish+'"}],';
        				$tour_option = $('input.tour-option:checked');
        				if($tour_option.length > 0){
        					$b_detail += '"option":[';
        					$tour_option.each(function(i){
        						$b_detail += '{"condition":"'+$(this).attr('condition')+'","price":"'+$(this).attr('price')+'"}';
        						if(i != $tour_option.length-1){
        							$b_detail += ',';
        						}
        					});
        					$b_detail += '],';
        				}
        				$totaltourist = $('#tourist-total-num').val();
        				$b_detail += '"tourist":[{"total_tourist":'+$totaltourist+'}],';
                if($('#private-group').is(":checked")){
                  $b_detail += '"private-group":"true",';
                }
                if($('#spacial-request').val() != ''){
                  $b_detail += '"special-request":"'+$('#spacial-request').val()+'",';
                }
        				$totalamount = numeral($('#total-amount').html()).format('0');
        				$b_detail += '"total_amount":'+$totalamount+'';
        				$b_detail += '}';
        				$jsonData = JSON.stringify($b_detail);
        				$('input[name=booking-detail]').val($jsonData);
                document.forms['to-booking-info'].submit();
        			}else{
        				$('#alert-warning').html('Please fill in all tourist');
        				$('#popup').modal('show');
        			}
        		}
        	}
        }
    });

    /******************************Model zone****************************/
    function set_room($temp){
    	switch($temp){
    		case 1:
    			$count_list = $('.list').length;
    			for($i=0;$i<$count_list;$i++){
    				if($('.list').eq($i).attr('room-type') == 'Single room'){
    					$('.list').eq($i).find('input').eq(1).val(1);
    					$('.amount').find('span').eq(0).html(1);
    				}
    				if($('.list').eq($i).attr('room-type') != 'Single room' && typeof($('.list').eq($i).attr('room-type')) != 'undefined'){
    					$('.list').eq($i).hide();
    				}
    			}
    		break;
    		case 2:
    			$count_list = $('.list').length;
    			for($i=0;$i<$count_list;$i++){
    				if($('.list').eq($i).attr('room-type') != 'Single room' && typeof($('.list').eq($i).attr('room-type')) != 'undefined'){
    					$('.list').eq($i).show();
    				}
    			}
    		break;
    		case 3:
    			$count_list = $('.list').length;
    			$count = 0;
    			for($i=0;$i<$count_list;$i++){
    				if($('.list').eq($i).find('input').eq(1).val() != undefined){
    					$count += parseInt($('.list').eq($i).find('input').eq(1).val());
    				}
    			}
    			if($count == 0){
    				$('#alert-warning').html("No single room in this day trip.");
    				$('#popup').modal('show');
    			}
    			$('.amount').find('span').eq(0).html($count);
    		break;
    	}
    }

    function set_max($tourist_num){
    	$max_left = 0;
    	$use_left = 0;
    	$count_list = $('.list').length;
    	for($i=0;$i<$count_list;$i++){
    		if(typeof($('.list').eq($i).find('input').eq(1).val()) != 'undefined'){
    			$use_left += parseInt($('.list').eq($i).find('input').eq(1).val());
    		}
    	}
    	$max_left = $tourist_num-$use_left;
    	for($i=0;$i<$count_list;$i++){
    		$value = parseInt($('.list').eq($i).find('input').eq(1).val());
    		$max = $value+$max_left;
    		$($('.list').eq($i).find('input').eq(1).attr('max',$max))
    	}

    	$('.amount').find('span').eq(0).html($use_left);
    }

    function sum_amount(){
    	$count_list = $('.list').length;
    	$sum = 0;
      $extension_activity_price = 0;
      if($('input:radio[name=extension-activity]:checked').attr('price') != undefined){
        $extension_activity_price = parseInt($('input:radio[name=extension-activity]:checked').attr('price'));
      }
    	for($i=0;$i<$count_list;$i++){
    		if($('.list').eq($i).find('input').eq(1).val() != undefined && $('.priceroom').eq(0).text() != undefined && $('.list').eq($i).find('input').eq(1).val() > 0){
          $sum += (numeral($('.priceroom').eq($i-1).text()).format('0'))*($('.list').eq($i).find('input').eq(1).val());
          $sum += $extension_activity_price*($('.list').eq($i).find('input').eq(1).val());
    		}
    	}
    	$('#total-amount').html(numeral($sum).format('0,0'));
      $isPrivateGroup = $('#isPrivateGroup').val();
      $statusPrivate = $('#private-group');
      if($isPrivateGroup == 1){
        if($statusPrivate.is(":checked")){
          $count_list = $('.list').length;
        	$tourist_num = 0;
        	for($i=0;$i<$count_list;$i++){
        		if($('.list').eq($i).find('input').eq(1).val() != undefined){
        			$tourist_num += parseInt($('.list').eq($i).find('input').eq(1).val());
        		}
        	}
          $discountRate = JSON.parse($('#discountRate').val());
          $c_discountRate = $discountRate.length;
          $index = 0;
          for($i=0;$i<$c_discountRate;$i++){
            if($tourist_num <= $discountRate[$i]['pax']){
              $index = $discountRate[$i]['pax'];
              $increase = $tourist_num*$discountRate[$i]['price'];
              $total_amount = parseInt(numeral($('#total-amount').html()).format('0'));
              $('#total-amount').html(numeral($total_amount+$increase).format('0,0'));
              break;
            }
          }
        }
      }
    }

    function check_room(){
    	$twin_room = $('.list[room-type="Twin / Tripple room"]').find('input').eq(1).val();
    	$remnant = $twin_room % 2;
    	if($remnant == 1){
    		$('.list[room-type="Twin / Tripple room"]').find('input').eq(1).val($twin_room-1);
    		$single_room = parseInt($('.list[room-type="Single room"]').find('input').eq(1).val());
    		$('.list[room-type="Single room"]').find('input').eq(1).val($single_room+1);
    		return false;
    	}else{
    		return true;
    	}
    }

    function double_pack($detection){
      $isDoublePack = $('#isDoublePack').val();
      if($isDoublePack == 1){
        $temp = parseInt($('#tourist-total-num').val());
        $mod = $temp%2;
        if($temp%2 === 0){
        }else{
          if($detection){
            $('#tourist-total-num').val($temp+1);
          }else{
            $('#tourist-total-num').val($temp-1);
          }
        }
        $('#total-tourist').html($('#tourist-total-num').val());
      }
    }

    function check_doublePack(){
      $isDoublePack = $('#isDoublePack').val();
      if($isDoublePack == 1){
        $temp = parseInt($('#tourist-total-num').val());
        if($temp%2 == 1){
          return false;
        }else{
          return true;
        }
      }else{
        return true;
      }
    }

    $('#private-group').change(function (){
      private_group();
    });

    function private_group(){
      $isPrivateGroup = $('#isPrivateGroup').val();
      $statusPrivate = $('#private-group');
      if($isPrivateGroup == 1){
        if($statusPrivate.is(":checked")){
          $count_list = $('.list').length;
        	$tourist_num = 0;
        	for($i=0;$i<$count_list;$i++){
        		if($('.list').eq($i).find('input').eq(1).val() != undefined){
        			$tourist_num += parseInt($('.list').eq($i).find('input').eq(1).val());
        		}
        	}
          $discountRate = JSON.parse($('#discountRate').val());
          $c_discountRate = $discountRate.length;
          $index = 0;
          for($i=0;$i<$c_discountRate;$i++){
            if($tourist_num <= $discountRate[$i]['pax']){
              $index = $discountRate[$i]['pax'];
              $increase = $tourist_num*$discountRate[$i]['price'];
              $pgp = parseInt($('#privateGroupPrice').val());
              $total_amount = parseInt(numeral($('#total-amount').html()).format('0'));
              $('#total-amount').html(numeral(($total_amount+$increase)+$pgp).format('0,0'));
              break;
            }
          }
        }else{
          $count_list = $('.list').length;
        	$tourist_num = 0;
        	for($i=0;$i<$count_list;$i++){
        		if($('.list').eq($i).find('input').eq(1).val() != undefined){
        			$tourist_num += parseInt($('.list').eq($i).find('input').eq(1).val());
        		}
        	}
          $discountRate = JSON.parse($('#discountRate').val());
          $c_discountRate = $discountRate.length;
          $index = 0;
          for($i=0;$i<$c_discountRate;$i++){
            if($tourist_num <= $discountRate[$i]['pax']){
              $index = $discountRate[$i]['pax'];
              $increase = $tourist_num*$discountRate[$i]['price'];
              $pgp = parseInt($('#privateGroupPrice').val());
              $total_amount = parseInt(numeral($('#total-amount').html()).format('0'));
              $('#total-amount').html(numeral(($total_amount-$increase)-$pgp).format('0,0'));
              break;
            }
          }
        }
      }
    }

    $('.menu-burger').click(function(){
      $('.menu-burger , .menu-list').toggleClass('open');
    });
  </script>
</html>
