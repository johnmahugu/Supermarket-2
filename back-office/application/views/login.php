<?php
	echo $ispass ;
if ($ispass == "T"){
	echo"In Loop" ;
	echo $ispass ;
	foreach ($rs as $value) {
		$text = $value[0]->staff_username;
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login | PB Agency Office</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="dark">
	<div class="login-box">
		<div class="col-lg-7 col-lg-push-5 col-sm-6 col-sm-push-6 bg">
			<img src="assets/images/logo-white.png" alt="" class="logo">
		</div>
		<div class="col-lg-5 col-lg-pull-7 col-sm-6 col-sm-pull-6">
			<div class="form-group top-mg">

			<?php echo $text; ?>
				<form action="logincheck" method="POST" >
					<label>Username</label><br>
					<input type="text" name="username"><br>
					<label>Password</label><br>
					<input type="password" name="password"><br>
					<input type="submit" value="Login">
				</form>
			</div>
		</div>
	</div>
</body>
<script>

</script>
</html>
