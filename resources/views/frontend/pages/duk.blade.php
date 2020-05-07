@extends('frontend.layouts.default')

@section('title')DUK - @stop

@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


      <style type="text/css">
      	@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(https://example.com/MaterialIcons-Regular.eot); /* For IE6-8 */
  src: local('Material Icons'),
    local('MaterialIcons-Regular'),
    url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
    url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
    url(https://example.com/MaterialIcons-Regular.ttf) format('truetype');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;  /* Preferred icon size */
  display: inline-block;
  line-height: 1;
  text-transform: none;
  letter-spacing: normal;
  word-wrap: normal;
  white-space: nowrap;
  direction: ltr;

  /* Support for all WebKit browsers. */
  -webkit-font-smoothing: antialiased;
  /* Support for Safari and Chrome. */
  text-rendering: optimizeLegibility;

  /* Support for Firefox. */
  -moz-osx-font-smoothing: grayscale;

  /* Support for IE. */
  font-feature-settings: 'liga';
}
      </style>

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

	.content-margin-top-v2 {
    margin-top: 0px;
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
								<h2>FAQ</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 
		</div>
	</section> <!-- .agent-single-welcome-section END -->
		
	<!-- Agent Our Service Version 1 -->
	<section  class="agent-our-service-section agent-our-service-tab-version section-padding agent-gray-bg faq-page-faq" id="service-section">
		<div class="container">
			

			<div class="row content-margin-top-v2">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#photography"><i class="icon-aperture"></i><h5>@lang('frontend/pages.Signup_login_account') </h5></a></li>
					<li><a data-toggle="tab" href="#home"><i class="material-icons">playlist_add_check</i><h5>@lang('frontend/pages.Create_survey') </h5></a></li>
					<li><a data-toggle="tab" href="#social-marketing"><i class="icon-tools"></i><h5>@lang('frontend/pages.Results') </h5></a></li>
					<li><a data-toggle="tab" href="#web-devolopment"><i class="material-icons">attach_money</i><h5>@lang('frontend/pages.Payments') </h5></a></li>
					
					
				</ul>

				<div class="tab-content">
					<div id="photography" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>@lang('frontend/pages.Question_5')</h3>
									<p>In <a href="https://pollanimal.com/register">Sign Up</a> page fill out the Sign up form: write your Username, Email,create a password and confirm it, mark that you agree with the Terms and Conditions and click Submit. If You want You can connect with social apps, for example, Facebook, Twitter and Google+</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>@lang('frontend/pages.Question_6')</h3>
									<p>If you forgot your password, you can reset it. First of all you should go to <a href="https://pollanimal.com/remember-password">Forgot password</a> page, enter your email address and select “Confirm”. Then check your email and confirm your password to reset.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="home" class="tab-pane fade in active">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>@lang('frontend/pages.Question_1')</h3>
									<p>@lang('frontend/pages.Answer_1')</p>
								    <h3>@lang('frontend/pages.Question_2')</h3>
									<p>@lang('frontend/pages.Answer_2')</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>@lang('frontend/pages.Question_3')</h3>
									<p>@lang('frontend/pages.Answer_3')</p>
									<h3>@lang('frontend/pages.Question_4')</h3>
									<p>@lang('frontend/pages.Answer_4')</p>
								</div>
							</div>
						</div>
					</div>
					<div id="social-marketing" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>@lang('frontend/pages.Question_7')</h3>
									<p>@lang('frontend/pages.Answer_7')</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>@lang('frontend/pages.Question_8')</h3>
									<p>lang('frontend/pages.Answer_8')</p>
									<h3>@lang('frontend/pages.Question_9')</h3>
									<p>@lang('frontend/pages.Answer_9')</p>
								</div>
							</div>
						</div>
					</div>
					<div id="web-devolopment" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>@lang('frontend/pages.Question_10')</h3>
									<p>@lang('frontend/pages.Answer_10')</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>@lang('frontend/pages.Question_11')</h3>
									<p>@lang('frontend/pages.Answer_11')</p>
									<h3>@lang('frontend/pages.Question_12')</h3>
									<p>Read our <a href="https://pollanimal.com/terms-conditions">Terms and Conditions</a>.</p>
								</div>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</section> <!-- .agent-our-service-section .agent-our-service-section-v2 END -->

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
@stop