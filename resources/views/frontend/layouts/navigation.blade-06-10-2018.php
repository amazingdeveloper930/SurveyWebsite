<header class="agent-main-menu-area agent-main-menu-area-v4" id="home-section">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-sm-3 col-xs-4">
				<a href="{{ route('home') }}" title=""> <img src="{{ asset('images/logo.png') }}"></a>
			</div>
			<div class="col-md-10 col-sm-9 col-xs-8">
				<nav id="dl-menu" class="agent-main-menu dl-menuwrapper">
					<button class="dl-trigger">Open Menu</button>
					<ul class="dl-menu">
						<li><a href="{{ route('home') }}" title="">Home</a></li>
						<!--<li><a href="{{ route('campaigns') }}" title="">Delete</a></li>-->
						<li><a href="{{ url('faq') }}">FAQ</a></li>
						<li><a href="{{url('contact')}}">Contacts</a></li>
						@if(!Auth::check())
						<li><a href="{{ route('login') }}" title="">Log in</a></li>
						<li><a href="{{ route('login.registration') }}" title="">Sign up</a></li>
						@else
						 <li class="dropdown nav-profile">
                    <a href="{{ route('account.index') }}" class="dropdown-toggle" data-toggle="dropdown">
					@if(auth()->user()->photo=='')
						<img style='max-width:3rem' src="{{ asset('uploads/default_profile.png') }} " alt="" class="img-circle size-30x30">   
					@else
					<img style='max-width:3rem' src="{{ auth()->user()->photo }} " alt="" class="img-circle size-30x30"> 
					@endif
                        <span>My account</span>
                    </a>
                    
                </li>     
@endif				
					</ul>
				</nav> 
			</div>
		</div>
	</div>
</header>