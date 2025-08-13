
@php 
$FooterSection = FooterSection(); 
@endphp

<!-- Footer Section -->
@if($FooterSection->is_publish == 1)
<footer class="footer-section">
	<div class="footer-middle">
		<div class="container">
			<div class="row">
				<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-border">
					<div class="footer-widget-card">
						@if($gtext['is_publish_about'] == 1)
						<div class="footer-widget mb25">
							<div class="info-card">
								@if($gtext['about_logo_footer'] != '')
								<div class="info-logo" style="margin-bottom: 0px;">
									<a href="{{ url('/') }}" title="{{ __('Home') }}">
										<img src="{{ asset('media/'.$gtext['about_logo_footer']) }}" alt="" class="img-fluid footer-logo" />
									</a>
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
				<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4 footer-border">
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
				<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
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
			<div class="row align-items-center">
				<div class="col-12">
					@if($gtext['is_publish_copyright'] == 1)
					<div class="copy-right text-center">
						@php 
							$copyright_text = str_replace('2024', '2025', $gtext['copyright']);
							echo $copyright_text;
						@endphp
					</div>
					@endif
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6">
					@if($gtext['is_publish_payment'] == 1)
					<div class="payment-method">
						@if($gtext['payment_gateway_icon'] != '')
						<img src="{{ asset('media/'.$gtext['payment_gateway_icon']) }}" class="img-fluid" />
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