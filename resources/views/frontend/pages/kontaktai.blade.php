@extends('frontend.layouts.default')

@section('title')Kontaktai - @stop

@section('content')



<style type="text/css">
	.agent-single-fun-fact-content {
	    width: 120px;
    	height: 120px;
	}
	.agent-content-tbl-c {
		font-size: 15px;
	}
	.agent-single-welcome-section > div >div> div> div {
    height: 300px !important;
    width: 100%;
	}
</style>


	<!-- Agent Single Welcome Section -->
	<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url({{ ('images/img/single-page-welcome-bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>@lang('frontend/pages.Contacts')</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 <!-- .agent-single-page-breadcumb END -->
		</div>
	</section> <!-- .agent-single-welcome-section END -->
		
	<div class="agent-contact-section section-padding contact-v-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-contact-us-v-2 clear-both">
						<div class="agent-contact-us-left-side-content agent-gray-bg">
							<h4>@lang('frontend/pages.Contact_with_us')</h4>
							<div class="agent-contact-form">
							<form id="" method='POST' action="{{route('send-email')}}">
									{{ csrf_field()}}
									<input type="hidden" name="form_type" value="Contact Inquiry">
									<input type="text" name="name" placeholder="@lang('frontend/pages.Your_name')" id="form-name-px" required>
									<input type="email" name="email" placeholder="@lang('frontend/pages.Your_mail')" id="form-email-px" required>
								    <textarea name="massage" cols="30" rows="10" placeholder="@lang('frontend/pages.Your_message')" id="form-massage-px" required></textarea>
									<input type="submit" value="@lang('frontend/pages.Send_message')" name="send massage">
								</form>
							</div>
						</div> <!-- .agent-contact-us-left-side-content .agent-gray-bg -->

						<div class="agent-contact-us-right-side-content">
							<h4>@lang('frontend/pages.Contact_with_us')</h4>
							
							<div class="agent-contact-us-single-details clear-both">
								<div class="agent-contact-us-ico">
									<img src="{{ asset ('images/img/mail-ico-contact-1.png')}}" alt="">
								</div>
								<p>VSI Svietimo inovaciju institutas</p>
								<p>V. Nageviciaus st. 3<span>Vilnius, Lithuania</span></p>
							</div> <!-- .agent-contact-us-single-details END -->
							
							<div class="agent-contact-us-single-details clear-both">
								<div class="agent-contact-us-ico">
									<img src="{{ asset ('images/img/map-ico-contact-1.png')}}" alt="">
								</div>
								<p>info@pollanimal.com</p>
								<p>+370 . 657 . 77548</p>
							</div> <!-- .agent-contact-us-single-details END -->
							
							

							<div class="agent-contact-us-single-details clear-both">
								<div class="agent-contact-us-ico">
									<img src="{{ asset ('images/img/phone-ico-contact-1.png')}}" alt="">
								</div>
								<p>Gedimino av. 28/2<span>Vilnius, Lithuania</span></p>
							</div> <!-- .agent-contact-us-single-details END -->

							

							<nav class="agent-social-links text-center">
								<ul>
									<li><a href="https://twitter.com/Pollanimal" title="twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://plus.google.com/u/0/108265710207237184889" title="" target="_blank"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="https://www.facebook.com/Pollanimal-Survey-453745581712882/" title="facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
									
								</ul>
							</nav> <!-- .agent-social-links END -->
						</div>
					</div> <!-- .agent-contact-us-v-2 END -->
				</div>
			</div>
		</div>
	</div> <!-- .agent-contact-section .contact-v-2 -->
		
	<!-- Agent Contact US Map -->
	<div class="contact-map-v-2 agent-map-v-2">
		<div id="map"></div>
	</div>
	<br>
		
	<section class="agent-about-page-fun-fact agent-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<!-- @include('frontend.campaigns.advertisements') -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
  <?php echo file_get_contents('https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyBdWxkI5PyEOy429f-g-5IVY0daL_-6QlI'); ?>
</script>
@stop