<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PB Agency Office</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="<?=base_url()?>assets2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets2/css/font-awesome.min.css">

	<link rel="stylesheet" href="<?=base_url()?>assets2/css/dropzone.css">
	<script src="<?=base_url()?>assets2/js/ckeditor/ckeditor.js"></script>
	<script src="<?=base_url()?>assets2/js/jquery.cropit.js"></script>

	<link rel="stylesheet" href="<?=base_url()?>assets2/css/style.css">
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
			<?php include('pagepart/backtop.php')?>
		</div>
	</header>
	<div class="body-wrapper">
		<?php include('pagepart/backside.php')?>
		<main>
			<div class="title-bar-wrapper">
				<div class="main-wrapper">
					<div class="row">
						<div class="col-xs-12">
							<h1>New Easy Package</h1>
							<p>Outbound | Supermarket Tours</p><br>
						</div>
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="Thai Tour Name">
						</div>	
						<div class="col-sm-6 col-xs-12">
							<input type="text" placeholder="English Tour Name">
						</div>					
					</div>

					<div class="row top-mg">
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Continent</label>
								<select>
									<option>All Continent</option>
									<option>Continent</option>
									<option>Continent</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<div class="input-box">
								<label class="filter">Country</label>
								<select>
									<option>All Country</option>
									<option>Country</option>
									<option>Country</option>
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Starter Price</label><br>
							<input type="number"><span class="unit">THB</span>
						</div>
					</div>
					
				</div>
			</div>
			<div class="main-wrapper">
				<div class="row">
					<div class="card-btn-tab">
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new.html" class="btn current">TOUR INFO</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new-service.html" class="btn no-setting">SERVICES</a>
						</div>
						<div class="col-sm-4 no-pd">
							<a href="tm-outbound-easy-new-condition.html" class="btn no-setting">CONDITION</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card card-header">
						<div class="header">
							<h2>Tour Info</h2>
						</div><br>
						<div class="content">
							<div class="form-group">
								<div class="col-md-4">
									<label>Tour Cover</label>
									<div class="image-editor cover">
										<input type="file" class="cropit-image-input">
								        <div class="cropit-preview">
								        	<div class="error-msg"></div>
								        </div>
								        <br>
								        <input type="range" class="cropit-image-zoom-input">
								        <input type="hidden" name="image-data" class="hidden-image-data"/>
								    </div>
								    <div class="btn upload">Choose Cover Image</div>
								</div>
								<div class="col-md-8">
									<label>Tour Agency</label>
									<select>
										<option disabled selected>Select Agency</option>
										<option>Agency name</option>
										<option>Agency name</option>
										<option>Agency name</option>
									</select>
									<hr><br>
									<label><span class="tag">English</span>Overview</label><br>
									<input type="text"><br><br>
									<label><span class="tag">English</span>Tour Description</label><br>
									<textarea name="desen" required></textarea><br>

									<label><span class="tag">English</span>Tour Briefing</label><br>
									<textarea name="briefen" required></textarea><br>
									<hr><br>

									<label><span class="tag">Thai</span>Overview</label><br>
									<input type="text"><br><br>
									<label><span class="tag">Thai</span>Tour Description</label><br>
									<textarea name="desth" required></textarea><br>

									<label><span class="tag">Thai</span>Tour Briefing</label><br>
									<textarea name="briefth" required></textarea><br>
									<hr><br>

									<div class="col-md-6 col-xs-12 text-center">
										<div class="btn border light full" data-toggle="modal" id="pdf" data-target="#addFile">
											<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Click Upload pdf file
										</div>
									</div>
									<div class="col-md-6 col-xs-12 text-center">	
										<div class="btn border light full" data-toggle="modal" id="word" data-target="#addFile">
											<i class="fa fa-file-word-o" aria-hidden="true"></i> Click Upload word file
										</div>
									</div>
									<div class="clear"></div><br>

									<label>Advance booking days</label><br>
									<input type="number">
									<span class="unit">Day</span>
								</div>
							</div>
							<div class="form-group"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="list-card top card-header">
						<div class="header">
							<div class="form-group no-bottom-mg">
								<div class="col-sm-6">
									<h2>Tour Schedule</h2>
								</div>
								<div class="col-sm-6">
									<div class="form-inline">
										<label>Day Night Program</label>
										<span>
											<select name="daytrip">
												<option disabled selected>Select Day Night</option>
												<option value="1">1 Night / 2 Days</option>
												<option value="2">2 Nights / 3 Days</option>
												<option value="3">3 Nights / 4 Days</option>
												<option value="4">4 Nights / 5 Days</option>
												<option value="5">5 Nights / 6 Days</option>
												<option value="6">6 Nights / 7 Days</option>
												<option value="7">7 Nights / 8 Days</option>
												<option value="8">8 Nights / 9 Days</option>
											</select>
										</span>
									</div>
								</div>
							</div>
						</div><br>
						<div class="col-xs-12 hide">
							<div class="content dp">
								<div class="form-group">
									<div class="col-md-3 col-sm-6 form-inline">
										<label>From</label>
										<span>
											<input type="text" class="date from" value="Select Date" readonly="readonly">
										</span>
									</div>
									<div class="col-md-3 col-sm-6 form-inline">
										<label>To</label>
										<span>
											<input type="text" class="date to" value="Select Date" readonly="readonly">
										</span>
									</div>
									<div class="col-md-3 col-md-offset-1 col-sm-8 form-inline">
										<label>Price</label>
										<span>
											<input type="number">
											<span class="unit">THB</span>
										</span>
									</div>
									<div class="col-md-2 col-sm-4">
										<div class="btn no-border gray">Delete</div>
									</div>
								</div>
								<div class="btn-wrapper">
									<div class="col-xs-12">
										<div class="btn no-border light"><i class="fa fa-plus" aria-hidden="true"></i> Add Day Trip</div>
										<div class="btn border pull-right" data-toggle="modal" id="pdf" data-target="#autoschedule">Auto Schedule</div>
									</div>
								</div>

							</div>
						</div>				
					</div>
				</div>
				<div class="row">
					<div class="btn-wrapper text-center">
						<input type="submit" value="Add Package" class="btn bold">
					</div>
				</div>
			</div>
		</main>
	</div>

	<!-- modal -->
	<div class="modal fade" id="addFile" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Upload <b></b> File</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<label class="filter">Select File</label><br>
				<input type="file">
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Select" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>

  	<div class="modal fade" id="autoschedule" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
	          <h4 class="modal-title">Auto Schedule</h4>
	          <hr>
	        </div>
	        <div class="modal-body">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<label>Start Date</label>
						<input type="text" class="date set">
					</div>
					<div class="col-md-4 col-sm-6">
						<label>Due Date</label>
						<input type="text" class="date set">
					</div>
					<div class="col-md-4 col-sm-12">
						<label>Duration</label>
						<input type="number">
						<span class="unit">Days</span>
					</div>
				</div>
	        </div>
	        <div class="modal-footer">
	        	<button type="button" class="btn" data-dismiss="modal" >Cancel</button>
		        <input type="submit" value="Set" class="btn" >
	        </div>
	      </div>
	    </div>
  	</div>
	
</body>
<script src="assets/js/script.js"></script>
<script>
    CKEDITOR.replace( 'desen',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','BulletedList']}],
	});
	CKEDITOR.replace( 'briefen',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','Italic','BulletedList']}],
	});

	CKEDITOR.replace( 'desth',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','BulletedList']}],
	});
	CKEDITOR.replace( 'briefth',{
		toolbar :[{ name: 'paragraph', items : [ 'Bold','Italic','BulletedList']}],
	});


	$('.image-editor.cover').cropit({
      	exportZoom: 2,
      	imageBackgroundBorderWidth: 20,
      	allowDragNDrop: true,
      	imageBackground: true,
		imageBackgroundBorderWidth: 15,
        onImageError: function(e) {
            if (e.code === 1) {
                $('.image-editor.cover .error-msg').text("ขนาดภาพต้องมีขนาดมากกว่า 600px x 600px");
                $('.image-editor.cover .cropit-preview').addClass("has-error");
                window.setTimeout(function() {
                    return function() {
                        return $('.image-editor.cover .cropit-preview').removeClass("has-error")
                    }
                }(this), 3e3)
            }
        }
    });

    $('.upload').click(function(){
    	$(this).siblings(".image-editor").find('.cropit-image-input').click();
    });

    $('.list-card .btn.no-border.light').click(function() {
		var addform = $(this).closest('.content').find('.form-group').last().html();
		$(this).closest('.content').find('.form-group').last().after('<div class="form-group"><div class="col-md-3 col-sm-6 form-inline"><label>From</label><span><input type="text" class="date from" value="Select Date" readonly="readonly"></span></div><div class="col-md-3 col-sm-6 form-inline"><label>To</label><span><input type="text" class="date to" value="Select Date" readonly="readonly" disabled></span></div><div class="col-md-3 col-md-offset-1 col-sm-8 form-inline"><label>Price</label><span><input type="number"><span class="unit">THB</span></span></div><div class="col-md-2 col-sm-4"><div class="btn no-border gray">Delete</div></div></div>');

	});

    $('body').on('focus',".date.from", function(){
    	var dateindex = $(this).closest('.form-group').index();
	    $('.content.dp .form-group:eq('+dateindex+') .date.from').datepicker({       
	    	buttonText: "Select date",
	      	dateFormat: 'd/m/yy',
	        onSelect: function(date){
	            var to = $(this).datepicker('getDate');
	            var daytrip = parseInt($('select[name="daytrip"]').val());
	            $(this).closest('.form-group').find('.date.to').datepicker({
			      	buttonText: "Select date",
			      	dateFormat: 'd/m/yy' });
	            to.setDate(to.getDate()+daytrip);
	            $(this).closest('.form-group').find('.date.to').datepicker('setDate', to);}
	    	});
	});

	$('body').on('click',".btn.no-border.gray", function(){
		$(this).closest('.form-group').remove();
	});

    $('select[name="daytrip"]').change(function() {
    	$(this).closest('.list-card').find('.col-xs-12').removeClass('hide');
    });

    $('.btn.full').click(function(){
    	$('#addFile .modal-header .modal-title b').text($(this).attr('id'));
    });

    $('.date.set').datepicker({
    	buttonText: "Select date",
	    dateFormat: 'd/m/yy'
    });


</script>
</html>



