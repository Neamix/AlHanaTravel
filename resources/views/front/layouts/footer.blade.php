<script src="{{ asset('js/front/common_scripts.js') }}"></script>
    <script src="{{ asset('js/front/main_rtl.js') }}"></script>
	
	<!-- SLIDER REVOLUTION SCRIPTS  -->
    <script src="{{ asset('js/front/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.migration.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script src="{{ asset('js/front/revolution-slider/js/extensions/revolution.addon.slicey.min.js') }}"></script>
	<script>
				var tpj = jQuery;
				var revapi45;
				tpj(document).ready(function () {
					if (tpj("#rev_slider_45_1").revolution == undefined) {
						revslider_showDoubleJqueryError("#rev_slider_45_1");
					} else {
						revapi45 = tpj("#rev_slider_45_1").show().revolution({
							sliderType: "standard",
							jsFileLocation: "revolution/js/",
							sliderLayout: "fullscreen",
							dottedOverlay: "none",
							delay: 9000,
							navigation: {
								keyboardNavigation: "off",
								keyboard_direction: "horizontal",
								mouseScrollNavigation: "off",
								mouseScrollReverse: "default",
								onHoverStop: "off",
								bullets: {
									enable: true,
									hide_onmobile: false,
									style: "bullet-bar",
									hide_onleave: false,
									direction: "horizontal",
									h_align: "center",
									v_align: "bottom",
									h_offset: 0,
									v_offset: 50,
									space: 5,
									rtl: true,
									tmp: ''
								}
							},
							responsiveLevels: [1240, 1024, 778, 480],
							visibilityLevels: [1240, 1024, 778, 480],
							gridwidth: [1240, 1024, 778, 480],
							gridheight: [868, 768, 960, 720],
							lazyType: "none",
							shadow: 0,
							spinner: "off",
							stopLoop: "off",
							stopAfterLoops: -1,
							stopAtSlide: -1,
							shuffle: "off",
							autoHeight: "off",
							fullScreenAutoWidth: "off",
							fullScreenAlignForce: "off",
							fullScreenOffsetContainer: "",
							fullScreenOffset: "0px",
							hideThumbsOnMobile: "off",
							hideSliderAtLimit: 0,
							hideCaptionAtLimit: 0,
							hideAllCaptionAtLilmit: 0,
							debugMode: false,
							fallbacks: {
								simplifyAll: "off",
								nextSlideOnWindowFocus: "off",
								disableFocusListener: false,
							}
						});
					}
					if (revapi45) revapi45.revSliderSlicey();
				}); /*ready*/
	</script>