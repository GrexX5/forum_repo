<?php

include('includes/header.php');
require('action/signAction.php');
require('action/logAction.php') ;


?>

<link rel="stylesheet" href="style.css">
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form  method="POST">
			<h1>Create Account</h1>
			<?php if(isset($errorMsg)){ echo '<p>' .$errorMsg. '</p>';}?>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="sign-name" placeholder="Name" />
			<input type="email" name="sign-email" placeholder="Email" />
			<input type="password" name="sign-password" placeholder="Password" />
			<button name ="valide_sign" >Sign up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form  method="POST" >
			<h1>Sign in</h1>
			<?php if(isset($errorMsg)){ echo '<p>' .$errorMsg. '</p>';}?>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="log-email" placeholder="Email" />
			<input type="password" name="log-password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button name="valide_log">Log In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Log In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>

<script src="animation.js"></script>