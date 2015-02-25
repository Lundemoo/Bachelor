@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Hovedmeny</div>

				<div class="panel-body">
                                    Du er logget inn som {{ Auth::user()->fornavn }} {{ Auth::user()->etternavn }}</br>
                                    Epost: {{ Auth::user()->email }}
                                        
                                

   
                                
                                
                                
                                </div>
			</div>
		</div>
	</div>
</div>
@endsection
