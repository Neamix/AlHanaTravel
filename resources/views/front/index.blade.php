@extends('front.layouts.app')

@section('content')
<div id="page">
		<!-- /header -->
		
		<main>
			<!-- START SLIDER -->
            @livewire('cities-slider')
			<!-- END REVOLUTION SLIDER -->

			<div class="container container-custom margin_80_0">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Our Popular Tours</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme">
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_1.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Historic</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Arc Triomphe</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$54</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 1h 30min</li>
								<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_2.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Churches</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Notredam</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$124</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 1h 30min</li>
								<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_3.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Historic</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Versailles</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$25</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 1h 30min</li>
								<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_3.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Historic</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Versailles</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$25</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 1h 30min</li>
								<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_4.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Museum</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Pompidue Museum</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$45</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 2h 30min</li>
								<li><div class="score"><span>Superb<em>350 Reviews</em></span><strong>9.0</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
					<div class="item">
						<div class="box_grid">
							<figure>
								<a href="#0" class="wish_bt"></a>
								<a href="tour-detail.html"><img src="img/tour_5.jpg" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
								<small>Walking</small>
							</figure>
							<div class="wrapper">
								<h3><a href="tour-detail.html">Tour Eiffel</a></h3>
								<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
								<span class="price">From <strong>$65</strong> /per person</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> 1h 30min</li>
								<li><div class="score"><span>Good<em>350 Reviews</em></span><strong>7.5</strong></div></li>
							</ul>
						</div>
					</div>
					<!-- /item -->
				</div>
				<!-- /carousel -->
				<p class="btn_home_align"><a href="tours-grid-isotope.html" class="btn_1 rounded">View all Tours</a></p>
				<hr class="large">
			</div>
			<!-- /container -->
			
			<div class="container container-custom margin_30_95">
				<section class="add_bottom_45">
					<div class="main_title_3">
						<span><em></em></span>
						<h2>Popular Hotels and Accommodations</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="hotel-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>8.9</strong></div>
									<img src="img/hotel_1.jpg" class="img-fluid" alt="">
									<div class="info">
										<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
										<h3>Mariott Hotel</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="hotel-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>7.9</strong></div>
									<img src="img/hotel_2.jpg" class="img-fluid" alt="">
									<div class="info">
										<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
										<h3>Concorde Hotel </h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="hotel-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>7.0</strong></div>
									<img src="img/hotel_3.jpg" class="img-fluid" alt="">
									<div class="info">
										<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
										<h3>Louvre Hotel</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="hotel-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>8.9</strong></div>
									<img src="img/hotel_4.jpg" class="img-fluid" alt="">
									<div class="info">
										<div class="cat_star"><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i><i class="icon_star"></i></div>
										<h3>Park Yatt Hotel</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /row -->
					<a href="hotels-grid-isotope.html"><strong>View all (157) <i class="arrow_carrot-right"></i></strong></a>
				</section>
				<!-- /section -->
				
				<section class="add_bottom_45">
					<div class="main_title_3">
						<span><em></em></span>
						<h2>Popular Restaurants</h2>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="restaurant-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>8.5</strong></div>
									<img src="img/restaurant_1.jpg" class="img-fluid" alt="">
									<div class="info">
										<h3>Da Alfredo</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="restaurant-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>7.9</strong></div>
									<img src="img/restaurant_2.jpg" class="img-fluid" alt="">
									<div class="info">
										<h3>Slow Food</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="restaurant-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>7.5</strong></div>
									<img src="img/restaurant_3.jpg" class="img-fluid" alt="">
									<div class="info">
										<h3>Bella Napoli</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
						<div class="col-xl-3 col-lg-6 col-md-6">
							<a href="restaurant-detail.html" class="grid_item">
								<figure>
									<div class="score"><strong>9.0</strong></div>
									<img src="img/restaurant_4.jpg" class="img-fluid" alt="">
									<div class="info">
										<h3>Marcus</h3>
									</div>
								</figure>
							</a>
						</div>
						<!-- /grid_item -->
					</div>
					<!-- /row -->
					<a href="restaurants-grid-isotope.html"><strong>View all (157) <i class="arrow_carrot-right"></i></strong></a>
				</section>
				<!-- /section -->

				<div class="banner mb-0">
					<div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
						<div>
							<small>Adventure</small>
							<h3>Your Perfect<br>Advenure Experience</h3>
							<p>Activities and accommodations</p>
							<a href="adventure.html" class="btn_1">Read more</a>
						</div>
					</div>
					<!-- /wrapper -->
				</div>
				<!-- /banner -->

			</div>
			<!-- /container -->

			<div class="bg_color_1">
				<div class="container margin_80_55">
					<div class="main_title_2">
						<span><em></em></span>
						<h3>News and Events</h3>
						<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<a class="box_news" href="#0">
								<figure><img src="img/news_home_1.jpg" alt="">
									<figcaption><strong>28</strong>Dec</figcaption>
								</figure>
								<ul>
									<li>Mark Twain</li>
									<li>20.11.2017</li>
								</ul>
								<h4>Pri oportere scribentur eu</h4>
								<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
							</a>
						</div>
						<!-- /box_news -->
						<div class="col-lg-6">
							<a class="box_news" href="#0">
								<figure><img src="img/news_home_2.jpg" alt="">
									<figcaption><strong>28</strong>Dec</figcaption>
								</figure>
								<ul>
									<li>Jhon Doe</li>
									<li>20.11.2017</li>
								</ul>
								<h4>Duo eius postea suscipit ad</h4>
								<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
							</a>
						</div>
						<!-- /box_news -->
						<div class="col-lg-6">
							<a class="box_news" href="#0">
								<figure><img src="img/news_home_3.jpg" alt="">
									<figcaption><strong>28</strong>Dec</figcaption>
								</figure>
								<ul>
									<li>Luca Robinson</li>
									<li>20.11.2017</li>
								</ul>
								<h4>Elitr mandamus cu has</h4>
								<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
							</a>
						</div>
						<!-- /box_news -->
						<div class="col-lg-6">
							<a class="box_news" href="#0">
								<figure><img src="img/news_home_4.jpg" alt="">
									<figcaption><strong>28</strong>Dec</figcaption>
								</figure>
								<ul>
									<li>Paula Rodrigez</li>
									<li>20.11.2017</li>
								</ul>
								<h4>Id est adhuc ignota delenit</h4>
								<p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
							</a>
						</div>
						<!-- /box_news -->
					</div>
					<!-- /row -->
					<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all news</a></p>
				</div>
				<!-- /container -->
			</div>
			<!-- /bg_color_1 -->

			<div class="call_section">
				<div class="container clearfix">
					<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
						<div class="block-reveal">
							<div class="block-vertical"></div>
							<div class="box_1">
								<h3>Enjoy a GREAT travel with us</h3>
								<p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
								<a href="#0" class="btn_1 rounded">Read more</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/call_section-->
		</main>
		<!-- /main -->

		<footer>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-5 col-md-12 p-r-5">
						<p><img src="img/logo.svg" width="150" height="36" alt=""></p>
						<p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu. Nihil facilisi indoctum an vix, ut delectus expetendis vis.</p>
						<div class="follow_us">
							<ul>
								<li>Follow us</li>
								<li><a href="#0"><i class="ti-facebook"></i></a></li>
								<li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
								<li><a href="#0"><i class="ti-google"></i></a></li>
								<li><a href="#0"><i class="ti-pinterest"></i></a></li>
								<li><a href="#0"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 ml-lg-auto">
						<h5>Useful links</h5>
						<ul class="links">
							<li><a href="about.html">About</a></li>
							<li><a href="login.html">Login</a></li>
							<li><a href="register.html">Register</a></li>
							<li><a href="blog.html">News &amp; Events</a></li>
							<li><a href="contacts.html">Contacts</a></li>
						</ul>
					</div>
					<div class="col-lg-3 col-md-6">
						<h5>Contact with Us</h5>
						<ul class="contacts">
							<li><a href="tel://61280932400"><i class="ti-mobile"></i> + 61 23 8093 3400</a></li>
							<li><a href="mailto:info@Panagea.com"><i class="ti-email"></i> info@Panagea.com</a></li>
						</ul>
						<div id="newsletter">
						<h6>Newsletter</h6>
						<div id="message-newsletter"></div>
						<form method="post" action="assets/newsletter.php" name="newsletter_form" id="newsletter_form">
							<div class="form-group">
								<input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
								<input type="submit" value="Submit" id="submit-newsletter">
							</div>
						</form>
						</div>
					</div>
				</div>
				<!--/row-->
				<hr>
				<div class="row">
					<div class="col-lg-6">
						<ul id="footer-selector">
							<li>
								<div class="styled-select" id="lang-selector">
									<select>
										<option value="English" selected>English</option>
										<option value="French">French</option>
										<option value="Spanish">Spanish</option>
										<option value="Russian">Russian</option>
									</select>
								</div>
							</li>
							<li>
								<div class="styled-select" id="currency-selector">
									<select>
										<option value="US Dollars" selected>US Dollars</option>
										<option value="Euro">Euro</option>
									</select>
								</div>
							</li>
							<li><img src="img/cards_all.svg" alt=""></li>
						</ul>
					</div>
					<div class="col-lg-6">
						<ul id="additional_links">
							<li><a href="#0">Terms and conditions</a></li>
							<li><a href="#0">Privacy</a></li>
							<li><span>© 2019 Panagea</span></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	<!--/footer-->
	</div>
	<!-- page -->
@endsection