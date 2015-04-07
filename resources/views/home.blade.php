@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Jara Bygg AS</div>

				<div class="panel-body">
                                    <center>
                                        <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
                                        <hr width="70%">
                                        
                                        
                                    
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">Registrer timesliste</div></br>
                                    <div id=menyvalg onclick="oc('/logbookaddition/create')">Registrer kjørebok</div></br>
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">Din oversikt</div></br>
                                    @if(Auth::user()->brukertype == 1)
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">Endringer</div></br>
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">Statistikk</div></br>
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">Godkjenn lister</div>
                                    
                                    @endif
                                    </center>

<!--[if lt IE 9]>
    <script>document.createElement('section')</script>
    <style type="text/css">
        .holder {
            position: relative;
            z-index: 10000;
        }
        .datepicker {
            display: block;
        }
    </style>
<![endif]-->


                                    
                                    
                                    
                                
                                
                                </div>
			</div>
		</div>
	</div>
</div>


@endsection
