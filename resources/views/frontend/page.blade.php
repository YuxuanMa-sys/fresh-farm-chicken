@extends('layouts.frontend')

@section('title', $data['title'])
@php $gtext = gtext(); @endphp

@section('meta-content')
	<meta name="keywords" content="{{ $gtext['og_keywords'] }}" />
	<meta name="description" content="{{ $gtext['og_description'] }}" />
	<meta property="og:title" content="{{ $gtext['og_title'] }}" />
	<meta property="og:site_name" content="{{ $gtext['site_name'] }}" />
	<meta property="og:description" content="{{ $gtext['og_description'] }}" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ asset('media/'.$gtext['og_image']) }}" />
	<meta property="og:image:width" content="600" />
	<meta property="og:image:height" content="315" />
	@if($gtext['fb_publish'] == 1)
	<meta name="fb:app_id" property="fb:app_id" content="{{ $gtext['fb_app_id'] }}" />
	@endif
	<meta name="twitter:card" content="summary_large_image">
	@if($gtext['twitter_publish'] == 1)
	<meta name="twitter:site" content="{{ $gtext['twitter_id'] }}">
	<meta name="twitter:creator" content="{{ $gtext['twitter_id'] }}">
	@endif
	<meta name="twitter:url" content="{{ url()->current() }}">
	<meta name="twitter:title" content="{{ $gtext['og_title'] }}">
	<meta name="twitter:description" content="{{ $gtext['og_description'] }}">
	<meta name="twitter:image" content="{{ asset('media/'.$gtext['og_image']) }}">
@endsection

@section('header')
@include('frontend.partials.header')
@endsection

@section('content')

<main class="main">
	<!-- Page Breadcrumb -->
	<div class="breadcrumb-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
							<li class="breadcrumb-item active" aria-current="page">
								@if(strtolower($data['title']) == 'about us')
									Our Story
								@else
									{{ $data['title'] }}
								@endif
							</li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-6">
					<div class="page-title">
						<h1>
							@if(strtolower($data['title']) == 'about us')
								Our Story
							@else
								{{ $data['title'] }}
							@endif
						</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb/ -->
	
	@if(strtolower($data['title']) == 'about us')
		<!-- About Us Custom Layout -->
		<section class="about-us-section" style="padding: 0px 0;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
						<div class="about-content">
							<h1>Our Story</h1>
							<div class="about-text">
								<p>When I moved to Pakistan, I quickly realized how hard it was to find truly clean, healthy chicken. Most options in the market were full of antibiotics or raised in unhealthy conditions. I knew there had to be a better way.</p>
								<p>So I started raising a few chickens on our farmhouse, just for personal use. No antibiotics, no hormones, just clean feed, open space, and real care. Friends and family loved the taste and kept asking for more. That's how this small idea turned into something bigger.</p>
								<p>Today, we raise all our chickens with the same values: honesty, health, and freshness. We believe food should be trustworthy, and we're proud to bring that to your table.</p>
							</div>
							<div class="about-cta">
								<a href="#happy-hens" class="btn btn-light">MEET OUR HAPPY HENS</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6" style="padding: 0px;">
						<div class="about-video">
							<video autoplay muted loop playsinline>
								<source src="{{ asset('media/about_us.mp4') }}" type="video/mp4">
								Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Operations and Farms Section -->
		<section class="operations-farms-section" style="padding: 0px 0; background-color: #f8f9fa;">
			<div class="container-fluid">
				<div class="row align-items-center">
					<!-- Left Section - Text Content -->
					<div class="col-lg-6">
						<div class="operations-content">
							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								OUR OPERATIONS
							</h2>
							<div class="operations-text" style="margin-bottom: 40px;">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									S&S Farms is at the forefront of the market, emphasizing freshness, quality, ethical, and transparent chicken-farming methods. We follow principles of good farming and sustainability, ensuring our products are safe, suitable, and truthfully labeled.
								</p>
							</div>

							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								OUR FARM
							</h2>
							<div class="farms-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Our farm is located at <strong>S&S Farm House, Lahore, Pakistan</strong>. The environment features rolling hills and lush, green countryside, providing a natural, peaceful environment for our chickens to roam, scratch, explore... and grow healthy.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151;">
									We believe that <strong>happy chickens taste better</strong>, and our chickens enjoy an idyllic lifestyle from the Punjab sunshine to the rich fertile soils, producing meat that's full of goodness, rich in vitamins, minerals and flavor and is vibrant in quality.
								</p>
							</div>
						</div>
					</div>

					<!-- Right Section - Google Map -->
					<div class="col-lg-6" style="padding: 0px;">
						<div class="farms-map-container" style="background: white; border-radius: 15px; padding: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
							<h3 style="color: var(--theme-color); font-weight: 600; margin-bottom: 20px; text-align: center;">Our Farm Location</h3>
							@if($gtext['is_googlemap'] == 1 && !empty($gtext['googlemap_apikey']))
								<div id="farms-map" style="height: 400px; border-radius: 10px; overflow: hidden;"></div>
								<div class="map-legend" style="margin-top: 20px; text-align: center;">
									<div class="legend-item" style="display: inline-block; margin: 0 15px;">
										<span style="display: inline-block; width: 20px; height: 20px; background-color: #e74c3c; border-radius: 50%; margin-right: 8px;"></span>
										<span style="color: var(--theme-color); font-weight: 600;">S&S Farm House</span>
									</div>
								</div>
							@else
								<div class="farms-locations-fallback" style="height: 400px; border-radius: 10px; overflow: hidden; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center; padding: 40px;">
									<div style="margin-bottom: 30px;">
										<i class="bi bi-geo-alt-fill" style="font-size: 4rem; color: var(--theme-color);"></i>
									</div>
									<h4 style="color: var(--theme-color); font-weight: 600; margin-bottom: 15px;">Our Farm Location</h4>
									<div style="color: #374151; line-height: 1.6;">
										<p style="margin-bottom: 10px;"><strong>S&S Farm House:</strong> Lahore, Pakistan</p>
									</div>
									<div style="margin-top: 20px; padding: 15px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
										<p style="margin: 0; color: #666; font-size: 0.9rem;">
											<i class="bi bi-info-circle me-2"></i>
											Google Maps integration can be enabled in the admin panel
										</p>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Environment Section -->
		<section class="environment-section" style="padding: 0px 0; background: linear-gradient(135deg, var(--light-green-color) 0%, #e8f5e8 100%);">
			<div class="container-fluid">
				<div class="row align-items-stretch">
					<!-- Left Section - Environment Image -->
					<div class="col-lg-8" style="padding: 0px;">
						<div class="environment-image-container" style="position: relative; overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.15); height: 100%; min-height: 600px;">
							<img src="{{ asset('media/environment.png') }}" alt="Free-range chickens in natural environment" style="width: 100%; height: 100%; object-fit: cover; border-radius: 15px;">
							<div class="image-overlay" style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(0,0,0,0.3)); padding: 40px 20px 20px;">
								<div class="overlay-content" style="text-align: center; color: white;">
									<h4 style="font-weight: 600; margin-bottom: 10px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); color: #FFD700;">Natural Free-Range Environment</h4>
									<p style="margin: 0; font-size: 0.95rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.5); color: #FFA500;">Our chickens roam freely in lush green pastures</p>
								</div>
							</div>
						</div>
					</div>

					<!-- Right Section - Text Content -->
					<div class="col-lg-4">
						<div class="environment-content" style="padding: 40px 20px; height: 100%; display: flex; flex-direction: column; justify-content: center;">
							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								THE ENVIRONMENT
							</h2>
							<div class="environment-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Did you know that raising chickens naturally is not just good for you, but good for the planet? At S&S Farms, we truly care for the environment and believe in sustainable farming practices that protect our earth for future generations.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Our packaging is made from 100% recycled and biodegradable materials, and we use eco-friendly practices throughout our entire farming process to minimize our environmental impact.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151;">
									We have planted hundreds of trees around our farm that have made a positive impact on our carbon footprint, which will continue to grow as the trees mature. We are constantly striving to become more environmentally friendly and reduce our carbon footprint through sustainable farming methods.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Product Section -->
		<section class="product-section" style="padding: 0px 0; background-color: #ffffff;">
			<div class="container-fluid">
				<div class="row align-items-stretch">
					<!-- Left Section - Text Content -->
					<div class="col-lg-8">
						<div class="product-content" style="padding: 40px 20px; height: 100%; display: flex; flex-direction: column; justify-content: center;">
							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								RECYCLING
							</h2>
							<div class="product-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Both the carton and the label, including all inks and glues - are completely biodegradable. Our entire packaging process is entirely carbon neutral, reflecting our commitment to environmental sustainability.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Our egg cartons are made from recycled paper, collected from various sources, washed with organic soap, filtered to remove foreign objects like plastic, then pulped, shaped, and dried in an oven. This process ensures we give new life to materials that would otherwise end up in landfills.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 30px;">
									Our carton labels are printed with environmentally friendly vegetable inks, making every aspect of our packaging truly eco-conscious and sustainable.
								</p>
							</div>

							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								CERTIFICATION
							</h2>
							<div class="certification-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Many of the large customers we supply require strict and regular auditing programmes to which we adhere to. We maintain the highest standards of quality and safety in all our farming and production processes.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151;">
									The Ministry for Primary Industries requires a Risk Management Programme which ensures that the products we produce are fit for purpose - that is safe, suitable and truthfully labelled. We exceed these requirements to provide you with the highest quality, most trustworthy products.
								</p>
							</div>
						</div>
					</div>

					<!-- Right Section - Product Image -->
					<div class="col-lg-4" style="padding: 0px;">
						<div class="product-image-container" style="position: relative; overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.15); height: 100%; min-height: 400px;">
							<img src="{{ asset('media/product.png') }}" alt="Fresh eggs and product packaging" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Happy Hens Section -->
		<section id="happy-hens" class="happy-hens-section" style="padding: 0px 0; background-color: #f8f9fa;">
			<div class="container-fluid">
				<div class="row align-items-stretch">
					<!-- Left Section - Hen Image -->
					<div class="col-lg-6" style="padding: 0px;">
						<div class="hen-image-container" style="position: relative; overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.15); height: 100%; min-height: 500px;">
							<img src="{{ asset('media/hen.png') }}" alt="Happy free-range hen" style="width: 100%; height: 100%; object-fit: cover;">
						</div>
					</div>

					<!-- Right Section - Text Content -->
					<div class="col-lg-6">
						<div class="hens-content" style="padding: 40px 20px; height: 100%; display: flex; flex-direction: column; justify-content: center;">
							<h2 class="section-heading" style="color: var(--theme-color); font-weight: 700; text-transform: uppercase; margin-bottom: 30px; font-size: 2.5rem;">
								OUR HAPPY HENS
							</h2>
							<div class="hens-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Our hens are free to roam and partake in their daily activities such as scratching, perching, dust bathing and foraging. They rest in spacious safe barns and are fed with wholesome natural grains, which results in equally wholesome and healthy eggs. One taste and you'll notice the difference.
								</p>
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 30px;">
									Our eggs are sold nationwide into leading supermarkets, fruit and vegetable stores, retailers, cafés and restaurants, ensuring that everyone can enjoy the superior quality and taste of our free-range eggs.
								</p>
							</div>

							<h3 class="subsection-heading" style="color: var(--theme-color); font-weight: 600; text-transform: uppercase; margin-bottom: 20px; font-size: 1.8rem;">
								NUTRITIONAL INFORMATION
							</h3>
							<div class="nutritional-text">
								<p style="font-size: 1.1rem; line-height: 1.8; color: #374151; margin-bottom: 20px;">
									Scientific evidence shows that eggs are a highly nutritious food that can be included in the diet of healthy individuals. Our free-range eggs are a nourishing food and an excellent source of protein to fuel the brain and maintain healthy muscle mass. So, why not enjoy an egg today!
								</p>
								<div class="nutritional-highlights" style="background: white; padding: 20px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
									<div class="highlight-item" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
										<span style="font-weight: 600; color: var(--theme-color);">Protein:</span>
										<span style="color: #374151;">12.5g per 100g</span>
									</div>
									<div class="highlight-item" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
										<span style="font-weight: 600; color: var(--theme-color);">Energy:</span>
										<span style="color: #374151;">596 kJ per 100g</span>
									</div>
									<div class="highlight-item" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
										<span style="font-weight: 600; color: var(--theme-color);">Fat:</span>
										<span style="color: #374151;">11.2g per 100g</span>
									</div>
									<div class="highlight-item" style="display: flex; justify-content: space-between;">
										<span style="font-weight: 600; color: var(--theme-color);">Sodium:</span>
										<span style="color: #374151;">142mg per 100g</span>
									</div>
								</div>
								<p style="font-size: 0.9rem; color: #666; margin-top: 15px; font-style: italic;">
									STORE AT OR BELOW 15° C
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@else
		<!-- Inner Section -->
		<section class="inner-section entry-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="entry min-height">
						@php echo $data['content']; @endphp
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Inner Section/ -->
	@endif
</main>

@endsection

@push('scripts')
@if(strtolower($data['title']) == 'about us' && $gtext['is_googlemap'] == 1 && !empty($gtext['googlemap_apikey']))
<script>
function initFarmsMap() {
    // Check if Google Maps is available
    if (typeof google === 'undefined' || typeof google.maps === 'undefined') {
        console.log('Google Maps not available');
        return;
    }

    // Farm location - S&S Farm House, Lahore, Pakistan
    const farm = {
        name: 'S&S Farm House',
        lat: 31.4426, // S&S Farms coordinates: 31°26'33.2"N 74°36'43.5"E
        lng: 74.6121,
        color: '#e74c3c'
    };

    // Create map centered on the farm
    const map = new google.maps.Map(document.getElementById('farms-map'), {
        zoom: 12,
        center: { lat: farm.lat, lng: farm.lng },
        styles: [
            {
                featureType: 'poi',
                elementType: 'labels',
                stylers: [{ visibility: 'off' }]
            }
        ]
    });

    // Add marker for the farm
    const marker = new google.maps.Marker({
        position: { lat: farm.lat, lng: farm.lng },
        map: map,
        title: farm.name,
        icon: {
            path: google.maps.SymbolPath.CIRCLE,
            scale: 12,
            fillColor: farm.color,
            fillOpacity: 1,
            strokeColor: '#ffffff',
            strokeWeight: 2
        }
    });

    // Create info window content
    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="padding: 10px; max-width: 200px;">
                <h4 style="margin: 0 0 5px 0; color: var(--theme-color);">${farm.name}</h4>
                <p style="margin: 0; font-size: 14px; color: #666;">
                    Our main farm in Lahore, Pakistan where we raise happy, healthy chickens with care and dedication.
                </p>
            </div>
        `
    });

    // Add click listener to marker
    marker.addListener('click', () => {
        infoWindow.open(map, marker);
    });
}

// Load Google Maps API
if (typeof google === 'undefined') {
    const script = document.createElement('script');
    script.src = `https://maps.googleapis.com/maps/api/js?key={{ $gtext['googlemap_apikey'] }}&callback=initFarmsMap`;
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);
} else {
    initFarmsMap();
}
</script>
@endif
@endpush	