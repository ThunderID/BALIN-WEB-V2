	$('ul.nav li.dropdown').hover(function() {        
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
	}, function() {
		$(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(300);
	});

/* SECTION PLUGIN I-CHECK */
	$('.i-checks').iCheck({
		checkboxClass: 'icheckbox_square',
		radioClass: 'iradio_square',
		increaseArea: '20%' 
	});
/* END SECTION PLUGIN I-CHECK */

/* SECTION COLLAPSE PRODUCT CATEGORY, FILTER */
	$('.menu_accordion').click(function(){
		$('.collapse_category').collapse("hide");
	});

	$('.form_input_search').click(function(){
		$('.collapse_category').collapse("hide");
		$('.menu_accordion').removeClass('active');
	});

	$('.collapse_category').on('show.bs.collapse', function(e){
		$('.menu_accordion').removeClass('active');
		$('#' + $(this).data('collapse')).addClass('active');
	});

	$('.collapse_category').on('hide.bs.collapse', function(e){
		$('.menu_accordion').removeClass('active');
	});
/* END SECTION COLLAPSE PRODUCT CATEGORY, FILTER */

/* SECTION INPUT MASK */
	$(".money").inputmask({ rightAlign: false, alias: "numeric", prefix: 'IDR ', radixPoint: '', placeholder: "", autoGroup: !0, digitsOptional: !1, groupSeparator: '.', groupSize: 3, repeat: 15 });              
	$(".money_right").inputmask({ rightAlign: true, alias: "numeric", prefix: 'IDR ', radixPoint: '', placeholder: "", autoGroup: !0, digitsOptional: !1, groupSeparator: '.', groupSize: 3, repeat: 15 });              
	$(".date_time_format").inputmask({
		mask: "d-m-y h:s",
		placeholder: "dd-mm-yyyy hh:mm",
		alias: "datetime",
	}); 
	$(".date_format").inputmask({
		mask: "d-m-y",
		placeholder: "dd-mm-yyyy",
		alias: "date",
	});
/* END SECTION INPUT MASK */

/* CHECK OFFSET FOR DIVIDER FOOTER & NAVBAR SHORTCUT */
	function checkOffset() {
		var wh=$(document).scrollTop()+window.innerHeight;
		var dh=$('.divider_footer').offset().top;
		if (wh<dh) {
			$('.navbar_shortcut').fadeIn();
		} else {
			// $('.navbar_shortcut').fadeOut();
		}
	}
	// $(document).ready(checkOffset);
	// $(document).scroll(checkOffset);
/* END CHECK OFFSET FOR DIVIDER FOOTER & NAVBAR SHORTCUT */

/* SECTION OWL CAROUSEL SLIDER PRODCT */
$('.owl-carousel').owlCarousel({
	loop:true,
	margin:10,
	responsiveClass:true,
	navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ],
	responsive:{
		320:{
			items:1,
			stagePadding: 0,
			margin: 0,
			nav:true
		},
		768:{
			items:1,
			stagePadding: 0,
			margin: 0,
			nav:true
		},
		1000:{
			items:4,
			nav:true,
			loop:false
		}
	}
});
/* END SECTION OWL CAROUSEL SLIDER PRODCT */

/* SECTION EASYZOOM SLIDER PRODUCT */
// Instantiate EasyZoom instances
var $easyzoom = $('.easyzoom').easyZoom({loadingNotice:""});
// Get an instance API
var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

$('.item-carousel').on('click', 'a', function(e) {
	var $this = $(this);
	
	e.preventDefault();

	$('.canvas-image').addClass('myCanvas');
	api1.swap($this.data('standard'), $this.attr('href'));
	setTimeout(function() {
		$('.canvas-image').removeClass('myCanvas');
	}, 800);
});
/* END SECTION EASYZOOM SLIDER PRODUCT */

// disable mousewheel on a input number field when in focus
// (to prevent Cromium browsers change the value when scrolling)
$('form').on('focus', 'input[type=number]', function (e) {
 	$(this).on('mousewheel.disableScroll', function (e) {
		e.preventDefault()
	});
});
$('form').on('blur', 'input[type=number]', function (e) {
  	$(this).off('mousewheel.disableScroll')
});

// Minified version of isMobile included in the HTML since it's small
!function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/IEMobile/i,h=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,i=/BlackBerry/i,j=/BB10/i,k=/Opera Mini/i,l=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,m=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),n=function(a,b){return a.test(b)},o=function(a){var o=a||navigator.userAgent,p=o.split("[FBAN");return"undefined"!=typeof p[1]&&(o=p[0]),this.apple={phone:n(b,o),ipod:n(c,o),tablet:!n(b,o)&&n(d,o),device:n(b,o)||n(c,o)||n(d,o)},this.android={phone:n(e,o),tablet:!n(e,o)&&n(f,o),device:n(e,o)||n(f,o)},this.windows={phone:n(g,o),tablet:n(h,o),device:n(g,o)||n(h,o)},this.other={blackberry:n(i,o),blackberry10:n(j,o),opera:n(k,o),firefox:n(l,o),device:n(i,o)||n(j,o)||n(k,o)||n(l,o)},this.seven_inch=n(m,o),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},p=function(){var a=new o;return a.Class=o,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=o:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=p():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=p()):a.isMobile=p()}(this);

// function for mobile input focus navbar bottom hide
if (isMobile.any) {
	$(':input').focusin(function() {
		$('.navbar_shortcut').hide();
	}).blur(function (){
		$('.navbar_shortcut').show();
	});
}