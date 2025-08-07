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
							<li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
						</ol>
					</nav>
				</div>
				<div class="col-lg-6">
					<div class="page-title">
						<h1>{{ $data['title'] }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Breadcrumb/ -->
	
	@if(strtolower($data['title']) == 'about us')
		<!-- About Us Custom Layout -->
		<section class="about-us-section">
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
								<a href="#" class="btn btn-light">MEET OUR HAPPY HENS</a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
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
@endpush	