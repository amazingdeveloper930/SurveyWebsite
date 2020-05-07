@extends('frontend.layouts.default')

@section('title') Naudojimosi Taisykles - @stop

@section('content')
	<!-- Agent Single Welcome Section -->
	<section class="agent-single-welcome-section contact" id="welcome-section" style="background-image: url({{ ('images/img/single-page-welcome-bg.jpg') }});">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="agent-content-tbl">
						<div class="agent-content-tbl-c">
							<div class="agent-single-page-content">
								<h2>Naudojimosi Taisykles</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			<div class="agent-single-page-breadcumb">
				<ul>
					<li><a href="{{ route('home') }}" title="">Apie</a></li>
					<li><i class="fa fa-angle-right breadcumb-active"></i></li>
					<li><a href="{{ url('naudojimosi-taisykles1')}}" class="breadcumb-active">Naudojimosi Taisykles</a></li>
				</ul>
			</div> <!-- .agent-single-page-breadcumb END -->
		</div>
	</section> <!-- .agent-single-welcome-section END -->
		
	<!-- Agent Our Service Version 1 -->
	<section class="agent-our-service-section agent-our-service-tab-version section-padding agent-gray-bg faq-page-faq" id="service-section">
		<div class="container">
			<div class="agent-section-heading-v2 text-center">
				<h2>FA QUESTIONS</h2>
			</div> <!-- .agent-section-heading-v2 END -->

			<div class="row content-margin-top-v2">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home"><i class="icon-scissors"></i><h5>QUESTION </h5></a></li>
					<li><a data-toggle="tab" href="#web-devolopment"><i class="icon-genius"></i><h5>QUESTION </h5></a></li>
					<li><a data-toggle="tab" href="#social-marketing"><i class="icon-tools"></i><h5>QUESTION </h5></a></li>
					<li><a data-toggle="tab" href="#photography"><i class="icon-aperture"></i><h5>QUESTION </h5></a></li>
				</ul>

				<div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>Lorem Ipsum</h3>
									<p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam</p>
								</div>
								<div class="agent-service-right-txt">
									<p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Lid est laborum arums ser quidem rerum facilis dolores nemis omnis aha imk afs  you are not affected in this world</p>
								</div>
							</div>
						</div>
					</div>
					<div id="web-devolopment" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>Lorem Ipsum</h3>
									<p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam</p>
								</div>
								<div class="agent-service-right-txt">
									<p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Lid est laborum arums ser quidem rerum facilis dolores nemis omnis aha imk afs  you are not affected in this world</p>
								</div>
							</div>
						</div>
					</div>
					<div id="social-marketing" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>Lorem Ipsum</h3>
									<p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam</p>
								</div>
								<div class="agent-service-right-txt">
									<p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Lid est laborum arums ser quidem rerum facilis dolores nemis omnis aha imk afs  you are not affected in this world</p>
								</div>
							</div>
						</div>
					</div>
					<div id="photography" class="tab-pane fade">
						<div class="agent-service-tab-content">
							<div class="agent-tab-single-element">
								<div class="agent-service-left-txt">
									<h3>Lorem Ipsum</h3>
									<p>Nunc placerat mi id nisi interdum mollis. Praesent pharetra, justo ut scelerisque mattis, leo quam aliquet diam</p>
								</div>
								<div class="agent-service-right-txt">
									<p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Lid est laborum arums ser quidem rerum facilis dolores nemis omnis aha imk afs  you are not affected in this world</p>
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
							@include('frontend.campaigns.advertisements')
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop