@extends('frontend.layouts.default')

@section('title')All Surveys - @stop

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
								<h2>@lang('frontend/pages.All_survey')</h2>
							</div> <!-- .agent-single-page-content END -->
						</div>
					</div>
				</div>
			</div>
			 <!-- .agent-single-page-breadcumb END -->
		</div>
	</section> <!-- .agent-single-welcome-section END -->
		
	<section style="padding: 70px 0px;" class="agent-about-page-fun-fact section-padding survey-items">
			
		<div class="container">
			
			<div class="row content-margin-top">		
				
		
		<?php $x=1;?>
	
		 @foreach ($public_entries as $anketa)
	
		
			<div class='border-solid item' style="width: 19%;float:left; position: relative; min-height: 1px;">
			@if(file_exists($anketa->photo))
			<img src='{{ $anketa->photo }}' class='img-responsive'/>
	
			@else
				<img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PGRlZnMvPjxyZWN0IHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjE0LjMzNTkzNzUiIHk9IjE2IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEycHg7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+wqA8L3RleHQ+PC9nPjwvc3ZnPg==" alt="title-img" class="survey-title-img " class='img-responsive'/>
				
			@endif
			
		 	<h4 style='height: 50px;'>{{ mb_strimwidth($anketa->title,0,50,"...") }}</h4>
			<p style='word-wrap: break-word;height:65px'>{{ mb_strimwidth($anketa->description, 0, 80, "...") }}</p>
		 	<p><a href="{{ route('campaigns.answer', $anketa->id) }}" title="" class="cusub"><i class="fa fa-book" aria-hidden="true"></i> Fill Survey</a></p>
			<p class='content'>
		
			</p>
			</div>
	<?php $x++;?>
		  @endforeach

		

	</div>
	{{ $public_entries->links() }}
	</div>
	</section>
@stop