<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! $gtext['is_rtl'] == 1 ? 'dir="rtl"' : '' !!}>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@php 
	$PageVariation = PageVariation();
	$gtext = gtext(); 
	@endphp
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>@yield('title')</title>
	@yield('meta-content')
	<!-- Custom CSS for FAQ page -->
	<link rel="stylesheet" href="{{ asset('frontend/css/custom-faq.css') }}">
	<!-- Custom CSS for Logo Banner -->
	<link rel="stylesheet" href="{{ asset('frontend/css/logo-banner.css') }}">
	
	@if($gtext['fb_pixel_publish'] == 1)
	<!-- Facebook Pixel Code -->
	<script>
	  !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '{{ $gtext["fb_pixel_id"] }}');
	  fbq('track', 'PageView');
	</script>
	<noscript>
	  <img height="1" width="1" style="display:none" 
		   src="https://www.facebook.com/tr?id={{ $gtext['fb_pixel_id'] }}&ev=PageView&noscript=1"/>
	</noscript>
	<!-- End Facebook Pixel Code -->
	@endif
	
	@if($gtext['ga_publish'] == 1)
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ $gtext['tracking_id'] }}"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '{{ $gtext["tracking_id"] }}');
	</script>
	@endif

	@if($gtext['gtm_publish'] == 1)
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','{{ $gtext["google_tag_manager_id"] }}');</script>
	<!-- End Google Tag Manager -->	
	@endif
	<!--favicon-->
	<link rel="shortcut icon" href="{{ $gtext['favicon'] ? asset('media/'.$gtext['favicon']) : asset('backend/images/favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ $gtext['favicon'] ? asset('media/'.$gtext['favicon']) : asset('backend/images/favicon.ico') }}" type="image/x-icon">
	<!-- css -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Spartan:wght@400;500;700;800;900&display=swap" rel="stylesheet">

	@if($gtext['is_rtl'] == 1)
	<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="{{asset('frontend/css/bootstrap.rtl.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/rtl.css')}}" rel="stylesheet">
	@else
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	@endif
	<link href="{{asset('frontend/css/bootstrap-icons.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/jquery-ui.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/slick.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/jquery.gritter.min.css')}}" rel="stylesheet">

	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800;900&display=swap');
	:root {
	  /* Modern Organic Color Palette */
	  --theme-color: #2D5A27; /* Deep Forest Green - Primary brand color */
	  --color-green: #4A7C59; /* Sage Green - Secondary brand color */
	  --color-light-green: #E8F5E8; /* Light Sage - Background accents */
	  --color-lightness-green: #F7FBF7; /* Very Light Sage - Page backgrounds */
	  --color-gray: #6B7280; /* Modern Gray - Text and borders */
	  --color-gray-dark: #374151; /* Dark Gray - Headings */
	  --color-gray-400: #E5E7EB; /* Light Gray - Input borders */
	  --color-black: #111827; /* Rich Black - Primary text */
	  --color-white: #FFFFFF; /* Pure White */
	  
	  /* Additional Organic Colors */
	  --color-earth-brown: #8B4513; /* Earth Brown - Accent color */
	  --color-warm-beige: #F5F5DC; /* Warm Beige - Background */
	  --color-cream: #FFF8DC; /* Cream - Light backgrounds */
	  --color-forest-dark: #1B4332; /* Dark Forest - Dark accents */
	  --color-sage-light: #9CAF88; /* Light Sage - Muted accents */
	  
	  /* Modern Typography */
	  --primary-font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
	  --secondary-font-family: 'Playfair Display', Georgia, serif;
	  --arabic-font-family: 'Noto Kufi Arabic', sans-serif;
	  
	  /* Font Sizes - Modern Scale */
	  --font-size-100: 14px; /* Base body text */
	  --font-size-200: 16px; /* Larger body text */
	  --font-size-300: 18px; /* Subheadings */
	  --font-size-400: 20px; /* Small headings */
	  --font-size-500: 24px; /* Medium headings */
	  --font-size-600: 30px; /* Large headings */
	  --font-size-700: 36px; /* Extra large headings */
	  --font-size-800: 48px; /* Hero headings */
	  --font-size-900: 64px; /* Display headings */
	  
	  /* Heading Sizes */
	  --heading-1: 48px; /* Main page headings */
	  --heading-2: 36px; /* Section headings */
	  --heading-3: 30px; /* Subsection headings */
	  --heading-4: 24px; /* Card headings */
	  --heading-5: 20px; /* Small headings */
	  --heading-6: 18px; /* Micro headings */
	  
	  /* Line Heights */
	  --line-height-100: 1.2; /* Tight spacing for headings */
	  --line-height-200: 1.6; /* Comfortable reading for body text */
	  
	  /* Spacing System */
	  --spacing-xs: 4px;
	  --spacing-sm: 8px;
	  --spacing-md: 16px;
	  --spacing-lg: 24px;
	  --spacing-xl: 32px;
	  --spacing-2xl: 48px;
	  --spacing-3xl: 64px;
	  
	  /* Border Radius */
	  --border-radius-sm: 4px;
	  --border-radius-md: 8px;
	  --border-radius-lg: 12px;
	  --border-radius-xl: 16px;
	  --border-radius-full: 9999px;
	  
	  /* Shadows */
	  --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
	  --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
	  --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
	  --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
	}
	</style>
	<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
	@stack('style')
	@if($gtext['custom_css'] != '')
	<style type="text/css">
	@php echo $gtext['custom_css']; @endphp
	</style>
	@endif
</head>
<body {!! $gtext['is_rtl'] == 1 ? 'class="rtl"' : '' !!}>
	@if($gtext['gtm_publish'] == 1)
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtext['google_tag_manager_id'] }}"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	@endif
	<!--loader-->
	<div class="tw-loader">
		<div class="tw-ellipsis">
			<div></div><div></div><div></div><div></div>
		</div>						
	</div>
	<!--/loader/--> 
	<!-- scrollToTop -->	
	<a href="#top" class="scroll-to-top">
		<i class="bi bi-arrow-up"></i>
	</a>
	<!-- /scrollToTop -->
	
	@if($PageVariation['home_variation'] == 'home_3' && Request::is('/'))
	<div class="container {{ $PageVariation['home_variation'] }}">
	@yield('header')
	@yield('content')
	@include('frontend.partials.footer')
	</div>
	@else
	@yield('header')
	@yield('content')
	@include('frontend.partials.footer')
	@endif
	
	@if($gtext['is_publish_cookie_consent'] == 1)
	<div class="cookie_consent_card {{ $gtext['cookie_style'] }} {{ $gtext['cookie_position'] }}">
		@if($gtext['cookie_title'] != '')
		<h4 class="cookie_consent_head">{{ $gtext['cookie_title'] }} </h4>
		@endif
		@if($gtext['cookie_message'] != '')
		<div class="cookie_consent_text">{{ $gtext['cookie_message'] }} 
			@if($gtext['learn_more_text'] != '')
			<a href="{{ $gtext['learn_more_url'] }}">{{ $gtext['learn_more_text'] }}</a>
			@endif
		</div>
		@endif
		@if($gtext['button_text'] != '')
		<button class="btn accept_btn">{{ $gtext['button_text'] }}</button>
		@endif
	</div>
	@endif
	
	<!-- js -->
	<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('frontend/js/scrolltop.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.popupoverlay.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.gritter.min.js') }}"></script>
	<script>
		var is_rtl = "{{ $gtext['is_rtl'] }}";
		if(is_rtl == 1){
			var isRTL = true;
		}else{
			var isRTL = false;
		}

		var theme_color = "{{ $gtext['theme_color'] }}";
		var base_url = "{{ url('/') }}";
		var public_path = "{{ asset('public') }}";
		
		//Cookie Consent
		var is_publish_cookie_consent = "{{ $gtext['is_publish_cookie_consent'] }}";
		if(is_publish_cookie_consent == 1){
			let cookieModal = document.querySelector(".cookie_consent_card");
			let acceptCookieBtn = document.querySelector(".accept_btn");

			acceptCookieBtn.addEventListener("click", function (){
				cookieModal.classList.remove("active");
				localStorage.setItem("cookie_consent", 1);
			});

			let cookieAccepted = localStorage.getItem("cookie_consent");
			if (cookieAccepted == 1){
				cookieModal.classList.remove("active");
			}else{
				cookieModal.classList.add("active");
			}
		}
	</script>
	<script src="{{ asset('frontend/js/scripts.js')}}"></script>
	<script src="{{asset('frontend/pages/cart.js')}}"></script>
	@stack('scripts')
	@if($gtext['custom_js'] != '')
	<script>
	@php echo $gtext['custom_js']; @endphp
	</script>
	@endif
	<script src="{{ asset('frontend/js/custom-faq.js') }}"></script>
</body>
</html>
	