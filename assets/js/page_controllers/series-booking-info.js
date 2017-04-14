/*
*	@page series-package-info
*	@creator PONGSAKORN LEKPOJAI (bankk.pongsakorn@gmail.com)
*	@vesion 0.5
*	@note ใช้สำหรับ  function ที่จำเป็นต้องติดต่อกับ controller
*/

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
