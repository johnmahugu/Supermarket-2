$('.burger').click(function() {
	$('body').toggleClass('sidebar');
});

$('.menu > ul > li:last-child span').click(function(e){
	e.stopPropagation();
	$(this).parent('li').toggleClass('open');
	$(document).click(function(){
		$('.menu > ul > li:last-child').removeClass('open');
	});
});

$('.menu-btn').click(function(){
	$('.menu').toggleClass('open');
	if($(this).text()=='CLOSE'){
		$(this).text('MENU');
	}else if($(this).text()=='MENU'){
		$(this).text('CLOSE');
	}
});