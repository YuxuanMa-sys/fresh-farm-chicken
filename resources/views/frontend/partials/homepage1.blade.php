<main class="main {{ $PageVariation['home_variation'] }}">
<!-- Home Slider -->
	@if($section1->is_publish == 1)
	<section class="slider-section">
		<div class="slider-screen h1-height" style="padding-top: 0px !important; padding-bottom: 0px !important;">
			<div class="home-slider owl-carousel">
				@foreach ($slider as $row)
				@php $aRow = json_decode($row->desc); @endphp
				<!-- Slider Item -->
				<div class="single-slider" style="background-image: url({{ $row->image ? asset('media/'.$row->image) : '' }});">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 col-md-4 col-lg-5">
								@if($aRow->layer_image_2 != '')
								<div class="h1-layer3 layer-bounce3">
									<img src="{{ asset('media/'.$aRow->layer_image_2) }}" alt="{{ $row->title }}" />
								</div>
								@endif
								@if($aRow->layer_image_3 != '')
								<div class="h1-layer4 layer-bounce4">
									<img src="{{ asset('media/'.$aRow->layer_image_3) }}" alt="{{ $row->title }}" />
								</div>
								@endif
							</div>
							<div class="col-sm-12 col-md-8 col-lg-7">
								<div class="slider-content">
									<h1>{{ $row->title }}</h1>
									@if($aRow->sub_title != '')
									<p class="relative">{{ $aRow->sub_title }}</p>
									@endif
									
									@if($aRow->button_text != '')
									@php
										$buttonUrl = $row->url;
										if (strtolower($aRow->button_text) === 'shop now' || strtolower($aRow->button_text) === 'order now') {
											$buttonUrl = route('frontend.product-category', [8, 'fresh-meat-poultry']);
										}
									@endphp
									<a href="{{ $buttonUrl }}" class="btn theme-btn" {{ $aRow->target =='' ? '' : "target=".$aRow->target }}>{{ $aRow->button_text }}</a>
									@endif
									
									@if($aRow->layer_image_1 != '')
									<div class="h1-layer2 layer-bounce2">
										<img src="{{ asset('media/'.$aRow->layer_image_1) }}" alt="{{ $row->title }}" />
									</div>
									@endif
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Slider Item/ -->
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Home Slider/ -->
	
	<!-- Quick Intro -->
	<section class="section quick-intro-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h3 style="color: var(--theme-color);">Quick Intro</h3>
						<h2>We raise organic chicken on our family farmhouse, without antibiotics, hormones, or synthetic feed. Our birds live the way nature intended, with space, sunlight, and care.</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Quick Intro/ -->
	
	<!-- Popular Products -->
	@if($section3->is_publish == 1)
	<section class="section product-section" style="padding-top:40px !important; padding-bottom:40px !important;">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-heading text-center">
						@if($section3->desc !='')
						<h5>{{ $section3->desc }}</h5>
						@endif
						
						@if($section3->title !='')
						<h2>{{ $section3->title }}</h2>
						@endif
					</div>
				</div>
			</div>
			<div class="row owl-carousel caro-common category-carousel">
			
				@foreach ($popular_products as $row)
				<div class="col-lg-12">
					<div class="item-card">
						<div class="item-image">
							@if(($row->is_discount == 1) && ($row->old_price !=''))
								@php 
									$discount = number_format((($row->old_price - $row->sale_price)*100)/$row->old_price);
								@endphp
							<span class="item-label">{{ $discount }}% {{ __('Off') }}</span>
							@endif
							<a href="{{ route('frontend.product', [$row->id, $row->slug]) }}">
								<img src="{{ asset('media/'.$row->f_thumbnail) }}" alt="{{ $row->title }}" />
							</a>
						</div>
						<div class="item-title">
							<a href="{{ route('frontend.product', [$row->id, $row->slug]) }}">{{ str_limit($row->title) }}</a>
						</div>
						<div class="rating-wrap">
							<div class="stars-outer">
								<div class="stars-inner" style="width:{{ $row->ReviewPercentage }}%;"></div>
							</div>
							<span class="rating-count">({{ $row->TotalReview }})</span>
						</div>
						<div class="item-pric-card">
							@if($row->sale_price != '')
								@if($gtext['currency_position'] == 'left')
								<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->sale_price) }}</div>
								@else
								<div class="new-price">{{ NumberFormat($row->sale_price) }}{{ $gtext['currency_icon'] }}</div>
								@endif
							@endif
							@if(($row->is_discount == 1) && ($row->old_price !=''))
								@if($gtext['currency_position'] == 'left')
								<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->old_price) }}</div>
								@else
								<div class="old-price">{{ NumberFormat($row->old_price) }}{{ $gtext['currency_icon'] }}</div>
								@endif
							@endif
						</div>
						<div class="item-card-bottom">
							<a data-id="{{ $row->id }}" href="javascript:void(0);" class="btn add-to-cart addtocart">{{ __('Add To Cart') }}</a>
							<ul class="item-cart-list">
								<li><a class="addtowishlist" data-id="{{ $row->id }}" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
								<li><a href="{{ route('frontend.product', [$row->id, $row->slug]) }}"><i class="bi bi-eye"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Popular Products/ -->
	
	<!-- Why Choose Us -->
	<section class="section why-choose-us-section" style="padding-top:0px !important;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h3 style="color: var(--theme-color);">Why Choose Us</h3>
						<h2>We're committed to providing the best organic products for your family</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="why-choose-us-grid">
						<div class="why-choose-item">
							<div class="why-choose-icon">
								<i class="bi bi-shield-check"></i>
							</div>
							<div class="why-choose-content">
								<h4>100% antibiotic-free</h4>
							</div>
						</div>
						<div class="why-choose-item">
							<div class="why-choose-icon">
								<i class="bi bi-tree"></i>
							</div>
							<div class="why-choose-content">
								<h4>Naturally raised on open land</h4>
							</div>
						</div>
						<div class="why-choose-item">
							<div class="why-choose-icon">
								<i class="bi bi-truck"></i>
							</div>
							<div class="why-choose-content">
								<h4>Farm-to-door freshness</h4>
							</div>
						</div>
						<div class="why-choose-item">
							<div class="why-choose-icon">
								<i class="bi bi-people"></i>
							</div>
							<div class="why-choose-content">
								<h4>No middlemen, just clean food</h4>
							</div>
						</div>
						<div class="why-choose-item">
							<div class="why-choose-icon">
								<i class="bi bi-heart"></i>
							</div>
							<div class="why-choose-content">
								<h4>Trusted by local families</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Why Choose Us/ -->
	

	

	
	<!-- Farm Gallery Section -->
	<section class="section farm-gallery-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h3 style="color: var(--theme-color);">Behind the Scenes</h3>
						<h2>Farm Gallery</h2>
						<p>Take a peek into our daily farm life and see how we raise our organic chickens with care, transparency, and dedication to quality.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row owl-carousel caro-common farm-gallery-carousel">
						<!-- Gallery Item 1 -->
						<div class="col-lg-12">
							<div class="farm-gallery-item">
								<div class="farm-gallery-image">
									<img src="{{ asset('media/gallery1.jpg') }}" alt="Farm Life - Happy Chickens" />
									<div class="farm-gallery-overlay">
										<h4>Happy Chickens</h4>
										<p>Our free-range chickens enjoying the open space and natural environment</p>
									</div>
								</div>
								<div class="farm-gallery-content">
									<h4>Natural Habitat</h4>
									<p>Our chickens roam freely in spacious, natural environments with plenty of fresh air and sunlight.</p>
									<div class="farm-gallery-stats">
										<div class="farm-gallery-stat">
											<span class="stat-number">5+</span>
											<span class="stat-label">Acres</span>
										</div>
										<div class="farm-gallery-stat">
											<span class="stat-number">100%</span>
											<span class="stat-label">Free Range</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Gallery Item 2 -->
						<div class="col-lg-12">
							<div class="farm-gallery-item">
								<div class="farm-gallery-image">
									<img src="{{ asset('media/gallery2.jpg') }}" alt="Farm Life - Daily Care" />
									<div class="farm-gallery-overlay">
										<h4>Daily Care</h4>
										<p>Our dedicated team providing daily care and attention to every bird</p>
									</div>
								</div>
								<div class="farm-gallery-content">
									<h4>Expert Care</h4>
									<p>Our experienced team ensures every chicken receives individual attention and the best care possible.</p>
									<div class="farm-gallery-stats">
										<div class="farm-gallery-stat">
											<span class="stat-number">24/7</span>
											<span class="stat-label">Care</span>
										</div>
										<div class="farm-gallery-stat">
											<span class="stat-number">10+</span>
											<span class="stat-label">Years Experience</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Gallery Item 3 - Video -->
						<div class="col-lg-12">
							<div class="farm-gallery-item">
								<div class="farm-gallery-image">
									<video autoplay muted loop playsinline style="width: 100%; height: 100%; object-fit: cover;">
										<source src="{{ asset('media/about_us.mp4') }}" type="video/mp4">
										Your browser does not support the video tag.
									</video>
									<div class="farm-gallery-overlay">
										<h4>A Day at Our Farm</h4>
										<p>Watch our mini documentary to see a complete day in the life of our farm</p>
									</div>
								</div>
								<div class="farm-gallery-content">
									<h4>Our Story</h4>
									<p>Experience the daily rhythm of our farm and see how we care for our chickens with dedication and love.</p>
									<div class="farm-gallery-stats">
										<div class="farm-gallery-stat">
											<span class="stat-number">24/7</span>
											<span class="stat-label">Care</span>
										</div>
										<div class="farm-gallery-stat">
											<span class="stat-number">100%</span>
											<span class="stat-label">Transparent</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Farm Gallery Section/ -->
	
	<!-- Certifications & Quality Assurance Section -->
	<section class="section certifications-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h3 style="color: var(--theme-color);">Certifications & Quality Assurance</h3>
						<h2>Building Trust Through Standards</h2>
						<p>Our commitment to quality is backed by rigorous certifications and standards that ensure the highest level of care for our animals and the best products for your family.</p>
					</div>
				</div>
			</div>
			
			<!-- Certifications Grid -->
			<div class="certifications-grid">
				<!-- Certification 1 -->
				<div class="certification-item">
					<div class="certification-logo">
						<img src="{{ asset('media/cert1.jpg') }}" alt="Organic Certification" />
					</div>
					<div class="certification-content">
						<h4>Organic Certification</h4>
						<p>Certified organic farming practices ensuring no synthetic chemicals or harmful substances.</p>
					</div>
				</div>
				
				<!-- Certification 2 -->
				<div class="certification-item">
					<div class="certification-logo">
						<img src="{{ asset('media/cert2.jpg') }}" alt="Animal Welfare" />
					</div>
					<div class="certification-content">
						<h4>Animal Welfare</h4>
						<p>Highest standards of animal care and humane treatment throughout our operations.</p>
					</div>
				</div>
				
				<!-- Certification 3 -->
				<div class="certification-item">
					<div class="certification-logo">
						<img src="{{ asset('media/cert3.jpg') }}" alt="Food Safety" />
					</div>
					<div class="certification-content">
						<h4>Food Safety</h4>
						<p>Rigorous food safety protocols ensuring the highest quality and safety standards.</p>
					</div>
				</div>
				
				<!-- Certification 4 -->
				<div class="certification-item">
					<div class="certification-logo">
						<img src="{{ asset('media/cert4.jpg') }}" alt="Quality Management" />
					</div>
					<div class="certification-content">
						<h4>Quality Management</h4>
						<p>Comprehensive quality management systems for consistent product excellence.</p>
					</div>
				</div>
				
				<!-- Certification 5 -->
				<div class="certification-item">
					<div class="certification-logo">
						<img src="{{ asset('media/cert5.jpg') }}" alt="Environmental Standards" />
					</div>
					<div class="certification-content">
						<h4>Environmental Standards</h4>
						<p>Sustainable farming practices that protect and preserve our environment.</p>
					</div>
				</div>
			</div>
			
			<!-- Quality Assurance Content -->
			<div class="quality-assurance-content">
				<h3>Our Quality Assurance Process</h3>
				<div class="quality-assurance-grid">
					<div class="quality-item">
						<div class="quality-icon">
							<i class="bi bi-shield-check"></i>
						</div>
						<h4>Regular Inspections</h4>
						<p>Monthly farm inspections by certified inspectors to ensure all standards are met.</p>
					</div>
					
					<div class="quality-item">
						<div class="quality-icon">
							<i class="bi bi-heart"></i>
						</div>
						<h4>Animal Welfare</h4>
						<p>Comprehensive animal welfare programs ensuring the health and happiness of our chickens.</p>
					</div>
					
					<div class="quality-item">
						<div class="quality-icon">
							<i class="bi bi-tree"></i>
						</div>
						<h4>Environmental Care</h4>
						<p>Sustainable farming practices that minimize environmental impact and promote biodiversity.</p>
					</div>
					
					<div class="quality-item">
						<div class="quality-icon">
							<i class="bi bi-award"></i>
						</div>
						<h4>Quality Standards</h4>
						<p>Rigorous quality control measures ensuring every product meets our high standards.</p>
					</div>
				</div>
			</div>
			
			<!-- Certification Stats -->
			<div class="certification-stats">
				<div class="certification-stat">
					<span class="stat-number">5</span>
					<span class="stat-label">Certifications</span>
				</div>
				<div class="certification-stat">
					<span class="stat-number">100%</span>
					<span class="stat-label">Compliance</span>
				</div>
				<div class="certification-stat">
					<span class="stat-number">24/7</span>
					<span class="stat-label">Monitoring</span>
				</div>
				<div class="certification-stat">
					<span class="stat-number">5+</span>
					<span class="stat-label">Years</span>
				</div>
			</div>
		</div>
	</section>
	<!-- /Certifications & Quality Assurance Section/ -->

		<!-- Testimonials Section -->
	<section class="section testimonials-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h3 style="color: var(--theme-color);">What Our Customers Say</h3>
						<h2>Trusted by families who care about quality food</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row owl-carousel caro-common testimonials-carousel">
						<!-- Testimonial 1 -->
						<div class="col-lg-12">
							<div class="testimonial-card">
								<div class="testimonial-content">
									<div class="testimonial-rating">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
									</div>
									<p>"The taste of their organic chicken is incredible! You can really tell the difference - it's tender, flavorful, and you feel good knowing it's raised without antibiotics. My kids love it and I love that it's healthy for them."</p>
									<div class="testimonial-author">
										<div class="author-avatar">
											<i class="bi bi-person-circle"></i>
										</div>
										<div class="author-info">
											<h4>Sarah Ahmed</h4>
											<span>Mother of Two</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Testimonial 2 -->
						<div class="col-lg-12">
							<div class="testimonial-card">
								<div class="testimonial-content">
									<div class="testimonial-rating">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
									</div>
									<p>"As someone who's very conscious about what I eat, finding this farm was a game-changer. The eggs are fresh, the chicken is organic, and the delivery service is excellent. Highly recommend to anyone who values quality food."</p>
									<div class="testimonial-author">
										<div class="author-avatar">
											<i class="bi bi-person-circle"></i>
										</div>
										<div class="author-info">
											<h4>Dr. Fatima Khan</h4>
											<span>Nutritionist</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Testimonial 3 -->
						<div class="col-lg-12">
							<div class="testimonial-card">
								<div class="testimonial-content">
									<div class="testimonial-rating">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
									</div>
									<p>"I've been buying from them for over a year now and the quality is consistently amazing. The chicken is always fresh, the eggs are perfect, and the customer service is outstanding. It's like having a personal farm connection!"</p>
									<div class="testimonial-author">
										<div class="author-avatar">
											<i class="bi bi-person-circle"></i>
										</div>
										<div class="author-info">
											<h4>Ahmed Hassan</h4>
											<span>Home Chef</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Testimonial 4 -->
						<div class="col-lg-12">
							<div class="testimonial-card">
								<div class="testimonial-content">
									<div class="testimonial-rating">
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
									</div>
									<p>"Finally found a place that truly cares about organic farming! The difference in taste and quality is remarkable. My family can taste the difference, and knowing the animals are raised humanely makes all the difference."</p>
									<div class="testimonial-author">
										<div class="author-avatar">
											<i class="bi bi-person-circle"></i>
										</div>
										<div class="author-info">
											<h4>Zara Malik</h4>
											<span>Health Enthusiast</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Testimonials Section/ -->

		<!-- About Us Section -->
		<section class="about-us-section" style="padding-top: 10px !important; padding-bottom: 10px !important;">
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
							<a href="{{ route('frontend.page', [48, 'about-us']) }}" class="btn btn-light">Learn More</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-video">
						<video autoplay muted loop playsinline>
							<source src="{{ asset('media/our_story.mp4') }}" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /About Us Section/ -->
	
	<!-- Video Section -->
	<!-- @if($home_video['is_publish'] == 1)
	<section class="section video-section" style="background-image: url({{ asset('media/'.$home_video['image']) }});" style="display:none;">
		<div class="container">
			<div class="row justify-content-start">
				<div class="col-xl-7 text-center">
					<div class="video-card">
						<a href="{{ $home_video['video_url'] }}" class="play-icon popup-video">
							<i class="bi bi-play-fill"></i>
						</a>
					</div>
				</div>
				<div class="col-xl-5">
					<div class="video-desc">
						<h1>{{ $home_video['title'] }}</h1>
						@if($home_video['short_desc'] !='')
						<p>{{ $home_video['short_desc'] }}</p>
						@endif
						<a href="{{ $home_video['url'] }}" {{ $home_video['target'] =='' ? '' : "target=".$home_video['target'] }} class="btn theme-btn">{{ $home_video['button_text'] }}</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif -->
	<!-- /Video Section/ -->
	
	<!-- Deals Section -->
	<!-- @if($section6->is_publish == 1)
	<section class="section deals-section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section-heading">
						@if($section6->desc !='')
						<h5>{{ $section6->desc }}</h5>
						@endif
						
						@if($section6->title !='')
						<h2>{{ $section6->title }}</h2>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				@if(count($offer_ad_position2)>0)
				<div class="order-1 col-sm-12 order-sm-1 col-md-4 order-md-1 col-lg-3 order-lg-0">
					@foreach ($offer_ad_position2 as $row)
					@php $aRow = json_decode($row->desc); @endphp
					<div class="deals-card" style="background:{{ $aRow->bg_color == '' ? '#d7eabf' : $aRow->bg_color }};">
						<img src="{{ asset('media/'.$row->image) }}" alt="{{ $aRow->text_1 }}" />
						@if($aRow->text_1 != '')
						<div class="deals-desc">{{ $aRow->text_1 }}</div>
						@endif
						<div class="deals-bottom">
							@if($aRow->button_text != '')
							<a href="{{ $row->url }}" class="btn theme-btn" {{ $aRow->target =='' ? '' : "target=".$aRow->target }}>{{ $aRow->button_text }}</a>
							@endif
						</div>
					</div>
					@endforeach
				</div>
				<div class="order-0 col-sm-12 order-sm-0 col-md-8 order-md-0 col-lg-9 order-lg-1">
				@else
				<div class="order-0 col-sm-12 order-sm-0 col-md-12 order-md-0 col-lg-12 order-lg-1">
				@endif
					<div class="row owl-carousel caro-common deals-carousel">
						@foreach ($deals_products as $row)
						<div class="col-lg-12">
							<div class="item-card">
								<div class="item-image">
									@if(($row->is_discount == 1) && ($row->old_price !=''))
										@php 
											$discount = number_format((($row->old_price - $row->sale_price)*100)/$row->old_price);
										@endphp
									<span class="item-label">{{ $discount }}% {{ __('Off') }}</span>
									@endif
									<a href="{{ route('frontend.product', [$row->id, $row->slug]) }}">
										<img src="{{ asset('media/'.$row->f_thumbnail) }}" alt="{{ $row->title }}" />
									</a>
									@if(($row->is_discount == 1) && ($row->end_date !=''))
									<div class="deals-countdown-card">
										<div data-countdown="{{ date('Y/m/d', strtotime($row->end_date)) }}" class="deals-countdown"></div>
									</div>
									@endif
								</div>
								<div class="item-title">
									<a href="{{ route('frontend.product', [$row->id, $row->slug]) }}">{{ str_limit($row->title) }}</a>
								</div>
								<div class="rating-wrap">
									<div class="stars-outer">
										<div class="stars-inner" style="width:{{ $row->ReviewPercentage }}%;"></div>
									</div>
									<span class="rating-count">({{ $row->TotalReview }})</span>
								</div>
								<div class="item-pric-card">
									@if($row->sale_price != '')
										@if($gtext['currency_position'] == 'left')
										<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->sale_price) }}</div>
										@else
										<div class="new-price">{{ NumberFormat($row->sale_price) }}{{ $gtext['currency_icon'] }}</div>
										@endif
									@endif
									@if(($row->is_discount == 1) && ($row->old_price !=''))
										@if($gtext['currency_position'] == 'left')
										<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->old_price) }}</div>
										@else
										<div class="old-price">{{ NumberFormat($row->old_price) }}{{ $gtext['currency_icon'] }}</div>
										@endif
									@endif
								</div>
								<div class="item-card-bottom">
									<a data-id="{{ $row->id }}" href="javascript:void(0);" class="btn add-to-cart addtocart">{{ __('Add To Cart') }}</a>
									<ul class="item-cart-list">
										<li><a class="addtowishlist" data-id="{{ $row->id }}" href="javascript:void(0);"><i class="bi bi-heart"></i></a></li>
										<li><a href="{{ route('frontend.product', [$row->id, $row->slug]) }}"><i class="bi bi-eye"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif -->
	<!-- /Deals Section/ -->
</main>