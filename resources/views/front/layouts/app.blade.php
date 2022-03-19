<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    @include('front.layouts.header')
</head>

<body class="rtl">
    <header class="header menu_fixed">
        <div id="preloader">
            <div data-loader="circle-side"></div>
        </div><!-- /Page Preload -->
        <div id="logo">
            <a href="index.html" aria-label="Right Align">
                <img src="{{ asset('img/logo.svg') }}" width="150" height="36" alt="avg_logo" class="logo_normal">
                <img src="{{ asset('img/logo_sticky.svg') }}" width="150" height="36" alt="logo" class="logo_sticky">
            </a>
        </div>
    
        <!-- /top_menu -->
        <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu pr-5">
            <ul>
                <li><span><a href="/">الرئيسية</a></li>
                <li><span><a href="{{ route('search') }}">اكتشف رحلاتنا</a></span></li>
                @auth
                <li><span><a href="{{ route('travels') }}">المفضلة</a></span></li>
                <li><span><a href="{{ route('profile') }}">الصفحة الشخصية</a></span></li>
                @endauth
                @guest
                <li><span><a href="{{ route('login') }}"> تسجيل الدخول</a></span></li>
                @endguest
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
                    <p>You will receive an email containing a link allowing you to reset your password to a new
                        preferred one.</p>
                    <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                </div>
            </div>
        </form>
        <!--form -->
    </div>
    <!-- /Sign In Popup -->

    <div id="toTop"></div><!-- Back to top button -->
    <footer>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p><img src="{{ asset('img/logo.svg') }}" width="150" height="36" alt=""></p>
                    <p>شركة سياحة داخليه ( شرم الشيخ - دهب - الغردقه - مرسى علم - الاقصر واسوان - مرسى مطروح - و تنظيم داي يوز)</p>
                    <div class="follow_us">
                        <ul>
                            <li>تابعنا علي</li>
                            @if(env('FB_PAGE'))
                            <li><a href="{{ url(env('FB_PAGE')) }}" target="blank"><i class="ti-facebook"></i></a></li>
                            @endif
                            @if(env('TWITTER_PAGE'))
                            <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
                            @endif
                            @if(env('PINTEREST_PAGE'))
                            <li><a href="#0"><i class="ti-pinterest"></i></a></li>
                            @endif
                            @if(env('INSTGRAM_PAGE'))
                            <li><a href="#0"><i class="ti-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5> تصفح موقعنا</h5>
                    <ul class="links">
                        <li><a href="about.html">الرئيسية</a></li>
                        <li><a href="login.html">استكشف رحلتنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>تواصل معنا</h5>
                    <ul class="contacts">
                        <li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
                        <li><a href="mailto:info@Panagea.com"><i class="ti-email"></i> info@Panagea.com</a></li>
                    </ul>
                </div>
            </div>
            <!--/row-->
            <hr>
            <div class="row w-100 text-center">
               <p class="text-center d-flex justify-content-center w-100 mb-0"> جميع حقوق النشر و الطباعه تابعه الي {{env('APP_NAME')}}</p>
            </div>
        </div>
    </footer>
    <!-- COMMON SCRIPTS -->
    @include('front.layouts.footer')
    @yield('custom_script')
</body>

</html>