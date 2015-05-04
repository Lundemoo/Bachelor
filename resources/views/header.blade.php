	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{URL::to("/")}}"><img src="/bilder/logo.png" height="30" width="100"></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">{{trans('general.mainMenu')}}</a></li>
                                        
				</ul>
<div>

</div>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">{{trans('general.login')}}</a></li>
						<li><a href="/auth/register">{{trans('general.registerUser')}}</a></li>
						

					@else
                                        
                                        @if(Auth::user()->brukertype == 1)
                                        
                                        <li><a href="/car/create">{{trans('general.registerCar')}}</a></li>
                        <li><a href="/project/create">{{trans('general.registerProject')}}</a></li>
                        <li><a href="/builder/create">{{trans('general.registerBuilder')}}</a></li>
                        <li><a href="/auth/edit">{{trans('general.registerUser')}}</a></li>


                                        
                                        @endif
                                        
                                                                <li><a href="/timelisteprosjekter/create">{{trans('general.registrateTimesheet')}}</a></li>
                        <li><a href="/logbookaddition/create">{{trans('general.registerLogbook')}}</a></li>
                                        
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout"> {{trans('general.projectAddress')}} </a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
