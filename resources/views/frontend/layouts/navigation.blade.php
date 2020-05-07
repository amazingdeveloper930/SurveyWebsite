<header class="agent-main-menu-area agent-main-menu-area-v4" id="home-section">
	<div class="container">
		<div class="row" >
			<div class="col-md-2 col-sm-3 col-xs-4">
				<a href="{{ route('home') }}" title=""> <img style="width:100%;height:auto" src="{{ asset('images/logo.png') }}" alt="logo image"></a>
			</div>
			<div class="col-md-10 col-sm-9 col-xs-8">
				<nav id="dl-menu" class="agent-main-menu dl-menuwrapper" >
					<button class="dl-trigger">Open Menu</button>


					<!-- start -->
					<div class="dropdown" style="float: left;" id = "language_selector">
						<?php
						$currentLocale = LaravelLocalization::getCurrentLocale();

						?>
					    <button class=" dropdown-toggle" type="button" data-toggle="dropdown">@lang('frontend/login.Language') - {{ LaravelLocalization::getSupportedLocales()[$currentLocale]['native']}}
					    <span class="caret"></span></button>
					    <ul class="dropdown-menu">
					    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
					        <li>
					            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
					                {{ $properties['native'] }}
					            </a>
					        </li>
					    @endforeach
						</ul>
					  </div>

					<!-- end -->
					<ul class="dl-menu">
						<li><a href="{{ route('home') }}" title="Home">@lang('frontend/layouts.Home')</a></li>
						<!--<li><a href="{{ route('campaigns') }}" title="">Delete</a></li>-->
						<li><a href="{{ route('pages.all-serveys') }}" title="Surveys">@lang('frontend/layouts.Surveys')</a></li>
						<li><a href="{{ route('pages.duk') }}" title="FAQ">@lang('frontend/layouts.FAQ')</a></li>
						<li><a href="{{url('contact')}}" title="Contacts">@lang('frontend/layouts.Contacts')</a></li>
						@if(!Auth::check())
						<li><a href="{{ route('login') }}" title="Login">@lang('frontend/home.Login')</a></li>
						<li><a href="{{ route('login.registration') }}" title="Sign Up">@lang('frontend/home.Signup')</a></li>
						@else
						 <li class="dropdown nav-profile">
                    <a href="{{ route('account.index') }}" title="">
					@if(auth()->user()->photo=='')
						<img style='max-width:3rem' src="{{ asset('uploads/default_profile.png') }} " alt="" class="img-circle size-30x30">   
					@else
					<img style='max-width:3rem' src="{{ auth()->user()->photo }} " alt="" class="img-circle size-30x30"> 
					@endif
                        <span>@lang('frontend/layouts.My_account')</span>
                    </a>
                    
                </li>     
@endif				
					</ul>
				</nav> 
			</div>
		</div>
	</div>
	<style type="text/css">
		#language_selector .dropdown-toggle{
			background-color: transparent;
			color: white;
			border-width: 0px;
			padding: 20px 0px 0px; 
		}
		#language_selector  ul li{
		    display: block !important;
		    color: black;
		}
		#language_selector  ul li a{
			color: black !important;
			padding: 5px !important;
			text-align: center;
		}
	</style>
</header>