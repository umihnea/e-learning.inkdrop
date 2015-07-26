<!doctype HTML>
<html>
	<head>
		<title><?php echo $data['title'] .' | '.SITETITLE; ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $data['css']; ?>">
	</head>
	<body>
		<div id="sl">
			<div id="sl_content">
				<img src="app/templates/landing/images/close.png" id="sl_close" onclick="close_sl()">
				<center>
					<h4 class="s_l" onclick="showL()" style="cursor: pointer">Log In 
						<span style="position: absolute; margin-top: 14px; color: rgba(0, 137, 255, 1);" class="arrown_down">&#x25BC;</span>
					</h4>
					<h4 class="s_l" onclick="showS()" style="cursor: pointer">Sign Up
						<span style="position: absolute; margin-top: 14px; color: rgba(0, 137, 255, 1);" class="arrown_down">&#x25BC;</span>
					</h4>

					<form id="sl_login" method="post" action="">
						<h3>Log In With Your Account</h3>
						<?php if (isset($data['login_error']))
							foreach($data['login_error'] as $error) {
						?>
						<p style="text-align: left; color: red;"><?php echo $error; ?></p>
						<?php } ?>
						<hr style="width: 80%; margin-bottom: 20px;">
						<input type="text" name="login_username" placeholder=" Username" id="l_username" required="required"><br>
						<input type="password" name="login_password" placeholder=" Password" id="l_password" required="required"><br><br>
						<input id="rememberme" name="login_remember_me" value="remember" type="checkbox" /><br>Remember me<br><br>
						<input type="submit" name="login_submit" value="Log In" id="l_submit" style="width: 80%; background-color: rgba(0, 137, 255, 0.9); box-shadow: 0 0 0; color: white;">
					</form>

					<form id="sl_signup" method="post" action="">
						<h3>Create New Account</h3>
						<?php if (isset($data['register_error']))
							foreach($data['register_error'] as $error) {
						?>
						<p style="text-align: left; color: red;"><?php echo $error; ?></p>
						<?php } ?>
						<hr style="width: 80%; margin-bottom: 20px;">
						<input type="text" name="register_first_name" placeholder=" First Name" required="required"><br>
						<input type="text" name="register_last_name" placeholder=" Last Name" required="required"><br>
						<input type="text" name="register_email" placeholder=" E-mail Adress" id="s_email" required="required"><br>
						<input type="text" name="register_username" placeholder=" Username" id="s_username" required="required"><br>
						<input type="password" name="register_password" placeholder=" Password" id="s_password" required="required"><br>
						<input type="password" name="register_password_confirm" placeholder=" Confirm password" id="s_password_confirm" required="required"><br><br>
						<!-- CAPTCHA -->
						<?php $rainCaptcha = new \Helpers\RainCaptcha(); ?>
						<img id="captchaImage" src="<?php echo $rainCaptcha->getImage(); ?>" />
						<input name="captcha" type="text" style="height: 20px; width: 65%;" />
						<button type="button" class='btn btn-danger' onclick="document.getElementById('captchaImage').src = '<?php echo $rainCaptcha->getImage(); ?>&morerandom=' + Math.floor(Math.random() * 10000);" style="height: 25px;">
							<span class="icon icon-refresh">Refresh</span>
						</button>
						<!-- END CAPTCHA -->
						<input type="submit" name="register_submit" value="Sign Up" id="s_submit" style="width: 80%; background-color: rgba(0, 137, 255, 0.9); box-shadow: 0 0 0; color: white;">
					</form>
				</center>
			</div>
		</div>

		<?php if (isset($data['success'])) { ?>
		<p style="color:green;"><strong><?php echo $data['success']; ?></strong></p>
		<?php } ?>

		<?php if (isset($data['activation_success']) && $data['activation_success'] === true) { ?>
		<p style="color:green;"><strong>Your account has been activated.</strong></p>
		<?php } ?>

		<?php if (isset($data['activation_error']))
			foreach($data['activation_error'] as $error) {?>
		<p style="color:red;"><strong><?php echo $error; ?></strong></p>
		<?php } ?>
		
		<div id="navigation_container">
			<div id="nav">
				<ul>
					<a href="<?php echo DIR; ?>"><li class="nav_el" id="logo"><strong>E-LEARNING.</strong></li></a>
					<a href="<?php echo DIR; ?>"><li class="nav_el">Subjects</li></a>
					<a href="about"><li class="nav_el">About</li></a>
					<?php if ($data['logged'] === false || !isset($data['logged'])) { ?>
					<li class="nav_el" id="sign_up" onclick="openS()"><strong>Sign Up</strong></li>
					<li class="nav_el" id="login" onclick="openL()"><strong>Log In</strong></li>
					<?php } else { ?>
					<a href="logout"><li class="nav_el" id="sign_up"><strong>Log Out</strong></li></a>
					<?php } ?>
				</ul>
			</div>
		</div>