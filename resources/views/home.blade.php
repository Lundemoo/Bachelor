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
                                        
                                        
                                    
                                    <div id=menyvalg onclick="oc('/timelisteprosjekter/create')">{{trans('general.registerTimesheet')}}</div></br>
                                    <div id=menyvalg onclick="oc('/logbookaddition/create')">{{trans('general.registerLogbook')}}</div></br>
                                    <div id=menyvalg onclick="oc('/oversikt')">{{trans('general.yourOverview')}}</div></br>
                                    @if(Auth::user()->brukertype == 1)
                                    <div id=menyvalg onclick="oc('/editpage')">{{trans('general.changes')}}</div></br>
                                    <div id=menyvalg onclick="oc('/admin')">{{trans('general.statistic')}}</div></br>
                                    <div id=menyvalg onclick="oc('/admin')">{{trans('general.export_excel')}}</div>
                                    
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
