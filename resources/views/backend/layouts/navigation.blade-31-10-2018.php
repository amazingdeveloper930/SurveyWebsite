<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="navbar-nav"><li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}"><a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a></li></ul>
        </div>

        @if (auth()->guard('admin')->check())
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    {{-- <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}"><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
                    <li class="{{ request()->is('admin/banners*') ? 'active' : '' }}"><a href="{{ route('banners.index') }}">Banners</a></li>
                    <li class="{{ request()->is('admin/blogs*') ? 'active' : '' }}"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                    <li class="{{ request()->is('admin/pages*') ? 'active' : '' }}"><a href="{{ route('pages.index') }}">Pages</a></li>
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                    <li class="{{ request()->is('admin/settings*') ? 'active' : '' }}"><a href="{{ route('settings.edit') }}">Settings</a></li>

					<li class="{{ request()->is('admin/payments*') ? 'active' : '' }}"><a href="{{ route('admin.payments') }}">Payments</a></li>

                    <li><a style="color: red;" href="/" target="_blank">Site</a></li>
                </ul>
@if(auth()->guard('admin')->check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
					 <a href class="dropdown-toggle" data-toggle="dropdown">

					@if(Auth()->guard('admin')->user()->photo=='')
						<img src="{{ asset('uploads/default_profile.png') }} " style="max-width: 25px;height: 25px;" alt="" class="img-circle size-30x30">
					@else
					<img src="{{ asset(Auth()->guard('admin')->user()->photo) }} " style="max-width: 25px;height: 25px;" alt="" class="img-circle size-30x30">
					@endif
                        <span>{{ Auth()->guard('admin')->user()->username }}<i class="caret"></i></span>
                    </a>


                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a href="{{ route('backend.logout') }}">Logout</a></li>
                        </ul>
                    </li>
                </ul>
				@endif


            </div>
        @endif
    </div>
</nav>