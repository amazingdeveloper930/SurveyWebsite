@extends('frontend.layouts.default')

@section('title')termsconditions - @stop

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
								<h2>Terms & Conditions</h2>
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