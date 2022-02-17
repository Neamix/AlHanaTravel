<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
   @include('front.layouts.header')
</head>

<body class="rtl">
<header class="header menu_fixed">
			<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
			<div id="logo">
				<a href="index.html">
					<img src="img/logo.svg" width="150" height="36" alt="" class="logo_normal">
					<img src="img/logo_sticky.svg" width="150" height="36" alt="" class="logo_sticky">
				</a>
			</div>
			<ul id="top_menu">
				<li><a href="cart-1.html" class="cart-menu-btn" title="Cart"><strong>4</strong></a></li>
				<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
				<li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
			</ul>
			<!-- /top_menu -->
			<a href="#menu" class="btn_mobile">
				<div class="hamburger hamburger--spin" id="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
			<nav id="menu" class="main-menu">
				<ul>
					<li><span><a href="#0">الرئيسية</a></li>
					<li><span><a href="#0">اكتشف رحلاتنا</a></span></li>
					<li><span><a href="#0">رحلاتي</a></span></li>
					<li><span><a href="#0">الصفحة الشخصية</a></span></li>
				</ul>
			</nav>
		</header>
	
	@yield('content')
	<!-- Sign In Popup -->
	<div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="small-dialog-header">
			<h3>Sign In</h3>
		</div>
		<form>
			<div class="sign-in-wrapper">
				<a href="#0" class="social_bt facebook">Login with Facebook</a>
				<a href="#0" class="social_bt google">Login with Google</a>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" name="email" id="email">
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="password" id="password" value="">
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_15">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">Forgot Password?</a></div>
				</div>
				<div class="text-center"><input type="submit" value="Log In" class="btn_1 full-width"></div>
				<div class="text-center">
					Don’t have an account? <a href="register.html">Sign up</a>
				</div>
				<div id="forgot_pw">
					<div class="form-group">
						<label>Please confirm login email below</label>
						<input type="email" class="form-control" name="email_forgot" id="email_forgot">
						<i class="icon_mail_alt"></i>
					</div>
					<p>You will receive an email containing a link allowing you to reset your password to a new preferred one.</p>
					<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
				</div>
			</div>
		</form>
		<!--form -->
	</div>
	<!-- /Sign In Popup -->
	
	<div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    @include('front.layouts.footer')
	
</body>
</html>