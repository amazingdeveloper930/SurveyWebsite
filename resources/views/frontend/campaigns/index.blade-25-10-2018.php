@extends('frontend.layouts.default')

@section('title')Anketų sąrašas - @stop

@section('content')

	<!-- Agent Single Welcome Section -->
		<section class="agent-single-welcome-section" id="welcome-section" style="background-image: url({{ asset('images/img/single-page-welcome-bg.jpg') }} );">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="agent-content-tbl">
							<div class="agent-content-tbl-c">
								<div class="agent-single-page-content">
									<h2>Polls</h2>
								</div> <!-- .agent-single-page-content END -->
							</div>
						</div>
					</div>
				</div>
				<div class="agent-single-page-breadcumb">
					<ul>
						<li><a href="{{ route('home') }}" title="">Apie</a></li>
						<li><i class="fa fa-angle-right breadcumb-active"></i></li>
						<li><a href="" class="breadcumb-active">Polls</a></li>
					</ul>
				</div> <!-- .agent-single-page-breadcumb END -->
			</div>
		</section> <!-- .agent-single-welcome-section END -->

		<section class="agent-about-page-fun-fact section-padding">
			<div class="container">
				<center>	
					<div class="agent-section-heading">
						<h2>Anketų sąrašas</h2>
						<div class="agent-header-spearetor">
							<img src="{{ asset('images/img/spearretor-v-1.png') }}" alt="">
						</div>
					</div>
				</center>
				<br />					
			@if (count($entries) > 0)
				@foreach ($entries as $entry)
				<div class="row">
					<div class="col-lg-6 col-md-5">
						<a href="{{ route('campaigns.answer', $entry->id) }}">
							<blockquote>
							<h3>{{ $entry->title }}</h3>
							<h4>{{ $entry->description }}</h4>
							</blockquote>
						</a>
					</div> <!-- .agent-right-side-fun-fact-txt END -->
					<div class="col-lg-6 col-md-7">
						<div class="agent-single-fun-fact">
							<div class="agent-single-fun-fact-content">
								<div class="agent-content-tbl-c">
									<a href="{{ route('campaigns.answers', $entry->id) }}">
										<i class="fa fa-tasks"></i>
										<h5>{{ count($entry->results) }}</h5>
									</a>
								</div>
							</div>
						</div> <!-- .agent-single-fun-fact END -->
						<div class="agent-single-fun-fact">
							<div class="agent-single-fun-fact-content">
								<div class="agent-content-tbl-c">
									<i class="fa fa-user"></i>
									<h5>{{ $entry->user->username }}</h5>
								</div>
							</div>
						</div> <!-- .agent-single-fun-fact END -->
						<div class="agent-single-fun-fact">
							<div class="agent-single-fun-fact-content">
								<div class="agent-content-tbl-c">
									<i class="fa fa-calendar"></i>
									<h5>{{ $entry->created_at }}</h5>					
								</div>
							</div>
						</div>
					</div>
				</div>
			
				@endforeach

				<div class="text-center">
					{{ $entries->links() }}
				</div>
			@else
				<div class="alert alert-warning">
					Empty.
				</div>
			@endif

			</div>
		</section>

		<section class="agent-about-page-fun-fact">
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