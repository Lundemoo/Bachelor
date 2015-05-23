<?PHP
$add = "";
?>

@if(Request::get('lan') != "")
                                    <?PHP
                                    
                                    $extension = $_GET['lan'];
                                    if(!($extension == "no" || $extension == "en" || $extension == "est")){
                                        $extension = "";
                                        
                                    }
                                    $add = "?lan=" . $extension;
                                    ?>
                                    @endif

<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                            <table><tr><td>
                            <a class="navbar-brand" href="{{URL::to("/auth/login")}}<?PHP echo $add; ?>"><img src="/bilder/logo.png" height="30" width="100" alt="logo JaraBygg AS"></a></td>
                                    @if(Auth::check())
                                    <td style="padding:5px;">  <a href="/language/en"><img src="/bilder/eng.png" width="20" height="20" alt="Engelsk flagg"></a></td>
                                    <td style="padding:5px;"><a href="/language/no"><img src="/bilder/nor.png" width="20" height="20" alt="Norsk flagg"></a></td>
                                    <td style="padding:5px;"><a href="/language/est"><img src="/bilder/est.png" width="20" height="20" alt="Estlandsk flagg"></a></td>
                                    @else
                                    
                                    <td style="padding:5px;">  <a href="/{{Request::path()}}?lan=en"><img src="/bilder/eng.png" width="20" height="20"></a></td>
                                    <td style="padding:5px;"><a href="/{{Request::path()}}?lan=no"><img src="/bilder/nor.png" width="20" height="20"></a></td>
                                    <td style="padding:5px;"><a href="/{{Request::path()}}?lan=est"><img src="/bilder/est.png" width="20" height="20"></a></td>
                                    @endif
                                </tr></table>
                                    
                        </div>
			

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if(Auth::check())
                                <ul class="nav navbar-nav">
					<li><a href="/auth/login/<?PHP echo $add; ?>">{{trans('general.mainMenu')}}</a></li>
                                        
				</ul>@endif
<div>

</div>
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login<?PHP echo $add; ?>">{{trans('general.login')}}</a></li>
						
						

					@else
                                        
                                        @if(Auth::user()->brukertype == 1)
                                        
                                        <li><a href="/car/create">{{trans('general.registerCar')}}</a></li>
                        <li><a href="/project/create">{{trans('general.registerProject')}}</a></li>
                        <li><a href="/builder/create">{{trans('general.registerBuilder')}}</a></li>
                        <li><a href="/auth/register">{{trans('general.registerUser')}}</a></li>


                                        
                                        @endif
                                        
                                                                <li><a href="/timelisteprosjekter/create">{{trans('general.registrateTimesheet')}}</a></li>
                        <li><a href="/logbookaddition/create">{{trans('general.registerLogbook')}}</a></li>
                                        
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout"> {{trans('general.logout')}} </a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
                                    
		</div>
	</nav>
