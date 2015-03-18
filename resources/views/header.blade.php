	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Logo?</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/">Hovedmeny</a></li>
                                        <li><a href="/project/create">Lage prosjekt</a></li>
				</ul>
<div>

</div>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Logg inn</a></li>
						<li><a href="/auth/register">Registrer bruker</a></li>
						<li><a href="/car/create">Registrer bil</a></li>
                        <li><a href="/timelisteprosjekter/create">Registrer timelister</a></li>
                        <li><a href="/logbookaddition/create">Registrer kjørebok</a></li>
                        <li><a href="/project/create">Registrer prosjekt</a></li>

					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logg ut</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>