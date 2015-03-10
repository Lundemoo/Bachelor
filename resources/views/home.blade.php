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
                                    
 <form>
            <fieldset>
                <h3><label for="input_01">Pick a time. Go ahead...</label></h3>
                <input
                    id="input_from"
                    class="datepicker"
                    type="time"
                    name="time"
                    autofocuss>
                    <!-- valuee="2:30 AM"
                    data-value="0:00" -->
            </fieldset>
        </form>
 <script type="text/javascript">

        var $input = $( '.datepicker' ).pickatime({
        })
        var picker = $input.pickatime('picker')
        picker.open()

    </script>

                                    
                                    
                                        
                                  @if (Auth::check())
                                        
                                      
                                        @if (Auth::user()->firstname == "Petter")
                                      Hei
                                        
                                        @endif
                                        @endif

   
                                
                                
                                
                                </div>
			</div>
		</div>
	</div>
</div>
@endsection
