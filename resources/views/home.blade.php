@extends('app')

@section('content')



<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Jara Bygg AS</div>

				<div class="panel-body">
                                    
                                        <h1>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h1>
                                                
                                        <hr>
                                        
                                        
                                    <?PHP
                                    if(isset($_POST['hei'])){
                                        echo "HEI!";
                                    }
                                    
                                    
                                    ?>
                                        
                                    <div class=menyvalg onclick="oc('/timelisteprosjekter/create')">{{trans('general.registerTimesheet')}}</div>
                                    <div class=menyvalg onclick="oc('/logbookaddition/create')">{{trans('general.registerLogbook')}}</div>
                                    <div class=menyvalg onclick="oc('/oversikt')">{{trans('general.yourOverview')}}</div>
                                    @if(Auth::user()->brukertype == 1)
                                    <div class=menyvalg onclick="oc('/editpage')">{{trans('general.changes')}}</div>
                                    <div class=menyvalg onclick="oc('/admin')">{{trans('general.statistic')}}</div>
                                    <div class=menyvalg onclick="oc('/admin?side=2')">{{trans('general.export_excel')}}</div>
                                    
                                    @endif
                                    

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
