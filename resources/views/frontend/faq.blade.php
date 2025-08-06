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
    <!-- Hero Banner Section -->
    <section class="position-relative overflow-hidden" style="height: 400px;">
        <img src="{{ asset('public/frontend/images/banner.jpg') }}" alt="Free-range chickens in natural pasture" class="position-absolute w-100 h-100" style="object-fit: cover;">
        <div class="position-absolute w-100 h-100" style="background: linear-gradient(to right, var(--theme-color), var(--color-light-green), transparent);"></div>
        <div class="position-absolute w-100 h-100 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <h1 class="display-4 text-white font-weight-bold mb-3">
                            Premium Organic Eggs
                            <span class="d-block" style="color: var(--color-light-green);">From Happy Hens</span>
                        </h1>
                        <p class="lead text-white-90 mb-4">
                            Farm-fresh, pasture-raised eggs delivered straight from our sustainable farm to your table.
                        </p>
                        <div class="d-flex flex-column flex-sm-row">
                            <a href="{{ route('frontend.home') }}" class="btn btn-lg mb-2 mb-sm-0 mr-sm-2 shadow-lg" style="background-color: var(--theme-color); color: var(--color-white);">
                                Shop Now
                            </a>
                            <a href="{{ route('frontend.home') }}" class="btn btn-outline-light btn-lg shadow-lg">
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px; background-color: var(--color-lightness-green) !important;">
                        <i class="fas fa-shield-alt fa-2x" style="color: var(--theme-color);"></i>
                    </div>
                    <h3 class="h4 font-weight-bold mb-2">100% Organic</h3>
                    <p class="text-muted">No antibiotics, hormones, or synthetic chemicals. Just pure, natural goodness.</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px; background-color: var(--color-lightness-green) !important;">
                        <i class="fas fa-heart fa-2x" style="color: var(--theme-color);"></i>
                    </div>
                    <h3 class="h4 font-weight-bold mb-2">Ethically Raised</h3>
                    <p class="text-muted">Our hens roam freely on pasture, living happy and healthy lives.</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px; background-color: var(--color-lightness-green) !important;">
                        <i class="fas fa-truck fa-2x" style="color: var(--theme-color);"></i>
                    </div>
                    <h3 class="h4 font-weight-bold mb-2">Fresh Delivery</h3>
                    <p class="text-muted">Farm-to-table freshness delivered directly to your doorstep.</p>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 80px; height: 80px; background-color: var(--color-lightness-green) !important;">
                        <i class="fas fa-award fa-2x" style="color: var(--theme-color);"></i>
                    </div>
                    <h3 class="h4 font-weight-bold mb-2">Premium Quality</h3>
                    <p class="text-muted">Superior taste and nutrition that you can see and taste in every egg.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="h1 font-weight-bold mb-3">Frequently Asked Questions</h2>
                <p class="lead text-muted">
                    Everything you need to know about our organic eggs and farming practices
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        @foreach($data['faqs'] as $index => $faq)
                        <div class="card mb-3 border-0 shadow-sm">
                            <div class="card-header bg-white border-0" id="heading{{ $index }}">
                                <h3 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-dark font-weight-bold" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        {{ $faq['question'] }}
                                        <i class="fas fa-chevron-down float-right mt-1 accordion-icon" style="color: var(--theme-color); transition: transform 0.3s;"></i>
                                    </button>
                                </h3>
                            </div>

                            <div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#faqAccordion">
                                <div class="card-body border-top" style="border-color: var(--theme-color) !important;">
                                    {{ $faq['answer'] }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('scripts')
<script>
    // Add any custom JavaScript for the FAQ page here
    $(document).ready(function() {
        // Initialize any plugins or custom functionality
    });
</script>
@endpush