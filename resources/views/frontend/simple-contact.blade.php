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
	
	<!-- Contact Section -->
	<section class="inner-section inner-section-bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
					<div class="row">
						<!-- Contact Form -->
						<div class="col-lg-7">
							<div class="contact-form-card">
								<div class="card border-0 shadow-sm">
									<div class="card-body p-4 p-lg-5">
										<h3 class="card-title text-center mb-4" style="color: var(--theme-color);">
											<i class="bi bi-chat-dots me-2"></i>Get In Touch
										</h3>
										<form id="simple-contact-form" novalidate>
											@csrf
											<div class="row">
												<div class="col-md-6 mb-3">
													<div class="form-group">
														<label for="name" class="form-label">{{ __('Name') }} <span class="text-danger">*</span></label>
														<input type="text" name="name" id="name" class="form-control" placeholder="{{ __('Your Name') }}" required>
													</div>
												</div>
												<div class="col-md-6 mb-3">
													<div class="form-group">
														<label for="email" class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
														<input type="email" name="email" id="email" class="form-control" placeholder="{{ __('Your Email') }}" required>
													</div>
												</div>
											</div>
											<div class="mb-3">
												<div class="form-group">
													<label for="phone" class="form-label">{{ __('Phone Number') }}</label>
													<input type="tel" name="phone" id="phone" class="form-control" placeholder="{{ __('Your Phone Number') }}">
												</div>
											</div>
											<div class="mb-4">
												<div class="form-group">
													<label for="message" class="form-label">{{ __('Message') }} <span class="text-danger">*</span></label>
													<textarea name="message" id="message" class="form-control" rows="5" placeholder="{{ __('Your Message') }}" required></textarea>
												</div>
											</div>
											<div class="text-center">
												<button type="submit" id="submit-contact-form" class="btn theme-btn btn-lg px-5">
													<i class="bi bi-send me-2"></i>{{ __('Send Message') }}
												</button>
											</div>
										</form>
										<div id="contact-message" class="mt-3"></div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- Contact Info -->
						<div class="col-lg-5">
							<div class="contact-info-card">
								<div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, var(--color-lightness-green) 0%, var(--color-light-green) 100%);">
									<div class="card-body p-4 p-lg-5">
										<h3 class="card-title text-center mb-4" style="color: var(--theme-color);">
											<i class="bi bi-info-circle me-2"></i>Direct Contact
										</h3>
										
										<div class="contact-info-item mb-4">
											<div class="d-flex align-items-center">
												<div class="contact-icon-wrapper me-3">
													<i class="bi bi-telephone-fill" style="color: var(--theme-color); font-size: 1.5rem;"></i>
												</div>
												<div>
													<h5 class="mb-1" style="color: var(--theme-color);">{{ __('Phone') }}</h5>
													<p class="mb-0">{{ $data['phone'] }}</p>
												</div>
											</div>
										</div>
										
										<div class="contact-info-item mb-4">
											<div class="d-flex align-items-center">
												<div class="contact-icon-wrapper me-3">
													<i class="bi bi-envelope-fill" style="color: var(--theme-color); font-size: 1.5rem;"></i>
												</div>
												<div>
													<h5 class="mb-1" style="color: var(--theme-color);">{{ __('Email') }}</h5>
													<p class="mb-0">
														<a href="mailto:{{ $data['email'] }}" style="color: inherit; text-decoration: none;">{{ $data['email'] }}</a>
													</p>
												</div>
											</div>
										</div>
										
										<div class="contact-info-item">
											<div class="d-flex align-items-center">
												<div class="contact-icon-wrapper me-3">
													<i class="bi bi-clock-fill" style="color: var(--theme-color); font-size: 1.5rem;"></i>
												</div>
												<div>
													<h5 class="mb-1" style="color: var(--theme-color);">{{ __('Business Hours') }}</h5>
													<p class="mb-0">Monday - Saturday: 8:00 AM - 6:00 PM</p>
													<p class="mb-0">Sunday: 9:00 AM - 4:00 PM</p>
												</div>
											</div>
										</div>
										
										<div class="text-center mt-4">
											<div class="organic-badge">
												<i class="bi bi-leaf-fill me-2"></i>
												<span>100% Organic & Natural</span>
											</div>
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
	<!-- /Contact Section/ -->
</main>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#simple-contact-form').on('submit', function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();
        var submitBtn = $('#submit-contact-form');
        var originalText = submitBtn.html();
        
        // Show loading state
        submitBtn.html('<span class="spinner-border spinner-border-sm me-2"></span>Sending...');
        submitBtn.prop('disabled', true);
        
        $.ajax({
            type: 'POST',
            url: '{{ route("frontend.sentSimpleContactMessage") }}',
            data: formData,
            success: function(response) {
                if(response.msgType == 'success') {
                    $('#contact-message').html('<div class="alert alert-success alert-dismissible fade show" role="alert">' + response.msg + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    $('#simple-contact-form')[0].reset();
                } else {
                    $('#contact-message').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">' + response.msg + '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            },
            error: function() {
                $('#contact-message').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">An error occurred. Please try again.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            },
            complete: function() {
                submitBtn.html(originalText);
                submitBtn.prop('disabled', false);
            }
        });
    });
});
</script>

<style>
.contact-form-card .card {
    border-radius: 15px;
    border: 1px solid var(--color-light-green);
}

.contact-info-card .card {
    border-radius: 15px;
}

.contact-icon-wrapper {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    backdrop-filter: blur(10px);
}

.organic-badge {
    background: rgba(255, 255, 255, 0.3);
    padding: 10px 20px;
    border-radius: 25px;
    display: inline-block;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.organic-badge i {
    color: var(--theme-color);
}

.organic-badge span {
    color: var(--theme-color);
    font-weight: 600;
}

.form-control {
    border: 2px solid var(--color-light-green);
    border-radius: 10px;
    padding: 12px 15px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: var(--theme-color);
    box-shadow: 0 0 0 0.2rem rgba(var(--theme-color-rgb), 0.25);
}

.form-label {
    font-weight: 600;
    color: var(--theme-color);
    margin-bottom: 8px;
}

.theme-btn {
    border-radius: 25px;
    padding: 12px 30px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.theme-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.contact-info-item {
    padding: 15px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.contact-info-item:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>
@endpush 