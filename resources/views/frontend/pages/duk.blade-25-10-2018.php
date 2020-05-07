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
					<li class="active"><a data-toggle="tab" href="#photography"><i class="icon-aperture"></i><h5>Sign up, Login, My account </h5></a></li>
					<li><a data-toggle="tab" href="#home"><i class="material-icons">playlist_add_check</i><h5>Create Survey </h5></a></li>
					<li><a data-toggle="tab" href="#social-marketing"><i class="icon-tools"></i><h5>Results </h5></a></li>
					<li><a data-toggle="tab" href="#web-devolopment"><i class="material-icons">attach_money</i><h5>Payments </h5></a></li>
					
					
				</ul>

				<div class="tab-content">
					<div id="photography" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>How to Sign Up?</h3>
									<p>In https://pollanimal.com/signup page fill out the Sign up form: write your Username, Email,create a password and confirm it, mark that you agree with the Terms and Conditions and click Submit. If You want You can connect with social apps, for example, Facebook, Twitter and Google+</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>What to do if you forget password of your account?</h3>
									<p>If you forgot your password, you can reset it. First of all you should go to https://pollanimal.com/priminti-slaptazodi, enter your email address and select “Confirm”. Then check your email and confirm your password to reset.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="home" class="tab-pane fade in active">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>How to create a new survey?</h3>
									<p>When you are in your account (Dashboard) click “Create survey” in navigation bar or “Create new survey” in “My Surveys” board. In opened window fill out the form: write title and description of survey. In the survey settings you can mark, if you want, that results would be shown to respondents, get replies by email or allow multiple responses from one computer and save it. Then go to questions page and select what type of questions do you want to add. When you finish to add your questions click the save button. When your survey will be ready, in Survey settings mark Survey in public, Survey is not ready to launch and save it.</p>
								    <h3>How to set the question compulsory or optional to answer?</h3>
									<p>At this moment the questions on default set optional. But if you want that the respondents cannot skip the questions you should mark compulsory question in the Add question window. Also, do not forget to click Add question.</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>How to get the answer?</h3>
									<p>When you finish to create your survey and it will be set as public and ready to launch, in Survey settings you will find the Direct link of your survey. You can copy this link and sent to your respondents by email, social network or place this link in forum.</p>
									<h3>How many questions user can add in survey?</h3>
									<p>User can add questions as many as he/she wants. But it is important not to burden the survey.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="social-marketing" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>How to see the results?</h3>
									<p>User can all the time check his results of survey in his dashboard/results.
Click “Report” and enter the results page to see the data you receive. You can view all response and data visualization on my website. Or, you can click the “Export” button to download data.</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>Can respondents view results after answering?</h3>
									<p>Yes, if you mark this choice in Survey management/Survey settings/Show results to respondents.</p>
									<h3>How many respondents can answer to survey from one computer?</h3>
									<p>By default, one respondent can answer from one computer, but if you want, you can change this in Survey management/Survey settings by marked Allow multiple responses from one computer.</p>
								</div>
							</div>
						</div>
					</div>
					<div id="web-devolopment" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>What forms of payment are acceptable?</h3>
									<p>We accept payments by bank card and PayPal.</p>
								</div>
								<div class="agent-service-right-txt">
								    <h3>What can I buy in this website?</h3>
									<p>You can buy credits of this system and spend them for various services.</p>
									<h3>How can I refund my money?</h3>
									<p>Read our Terms and Conditions.</p>
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
							<h2 align="center">Advertisement</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop