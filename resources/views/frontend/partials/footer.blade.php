<!-- Footer Top Section -->
@if($gtext['is_subscribe_footer'] == 1)
<!-- <section class="footer-top" style="background-image: url({{ asset('media/'.$gtext['subscribe_background_image']) }});">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 offset-sm-0 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 col-xxl-6 offset-xxl-3">
				<div class="newsletter-card">
					<h2>{{ $gtext['subscribe_title'] }}</h2>
					<p>{{ $gtext['subscribe_popup_desc'] }}</p>
					<div class="newsletter-form">
						<form>
							<input name="subscribe_email" id="subscribe_email" type="email" class="form-control" placeholder="{{ __('Enter your email address') }}"/>
							<a class="btn newsletter-btn subscribe_btn sub_btn" href="javascript:void(0);">{{ __('Subscribe') }}</a>
						</form>
						<div class="subscribe_msg mt10"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
@endif
<!-- /Footer Top Section/ -->
@php 
$FooterSection = FooterSection(); 
@endphp

<!-- Footer Section -->
@if($FooterSection->is_publish == 1)
<footer class="footer-section">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 footer-border">
					<div class="footer-widget-card">
						@if($gtext['is_publish_about'] == 1)
						<div class="footer-widget mb25">
							<div class="info-card">
								@if($gtext['about_logo_footer'] != '')
								<div class="info-logo" style="margin-bottom: 0px;">
									<img src="{{ asset('media/'.$gtext['about_logo_footer']) }}" alt="" style="max-height: 250px; width: auto; margin-left:30px;" />
								</div>
								@endif
								@if($gtext['about_desc_footer'] != '')
								<p>{{ $gtext['about_desc_footer'] }}</p>
								@endif
							</div>
						</div>
						@endif
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4 footer-border">
					@if($gtext['is_publish_contact'] == 1)
					<div class="footer-widget-card">
						<div class="footer-widget mb10">
							<ul class="widget-contact">
								@if($gtext['email_footer'] != '')
								<li>
									<div class="contact-card">
										<div class="contact-icon">
											<i class="bi bi-envelope-paper"></i>
										</div>
										<div class="contact-desc">
											<h5>{{ __('Email') }}</h5>
											<p>{{ $gtext['email_footer'] }}</p>
										</div>
									</div>
								</li>
								@endif
								@if($gtext['phone_footer'] != '')
								<li>
									<div class="contact-card">
										<div class="contact-icon">
											<i class="bi bi-telephone"></i>
										</div>
										<div class="contact-desc">
											<h5>{{ __('Phone') }}</h5>
											<p>{{ $gtext['phone_footer'] }}</p>
										</div>
									</div>
								</li>
								@endif
								@if($gtext['address_footer'] != '')
								<li>
									<div class="contact-card">
										<div class="contact-icon">
											<i class="bi bi-geo-alt"></i>
										</div>
										<div class="contact-desc">
											<h5>{{ __('Address') }}</h5>
											<p>{{ $gtext['address_footer'] }}</p>
										</div>
									</div>
								</li>
								@endif
							</ul>
						</div>
					</div>
					@endif
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
					@if(FooterMenuList('footer') != '')
					<div class="footer-widget-card">
						<div class="footer-widget mb25">
							<h3 class="widget-title">{{ __('Quick links') }}</h3>
							<ul class="widget-list">
								@php echo FooterMenuList('footer'); @endphp
							</ul>
						</div>
					</div>
					@endif
				</div>
				
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					@if($gtext['is_publish_copyright'] == 1)
					<div class="copy-right">
						@php echo $gtext['copyright']; @endphp
					</div>
					@endif
				</div>
				<div class="col-lg-6">
					@if($gtext['is_publish_payment'] == 1)
					<div class="payment-method">
						@if($gtext['payment_gateway_icon'] != '')
						<img src="{{ asset('media/'.$gtext['payment_gateway_icon']) }}" />
						@endif
					</div>
					@endif
				</div>
			</div>
		</div>	
	</div>
</footer>
@endif
<!-- /Footer Section/ -->