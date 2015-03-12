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
                                    
 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

<link rel="stylesheet" href="/picker/default.css">
<link rel="stylesheet" href="/picker/default.time.css">
<link rel="stylesheet" href="/picker/default.date.css">

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


<body>

    <section class="section">

        <form>
            <fieldset>
                
                
                <input
                    id="input_from"
                    class="timepicker"
                    type="time"
                    name="time">
                    <!-- valuee="2:30 AM"
                    data-value="0:00" -->
            </fieldset>
        </form>

        

    </section>
    
    
    
    
    
                <input
                    id="input_01"
                    class="datepicker"
                    name="date"
                    type="text"
                    autofocuss
                    value="14 August, 2014"
                    data-valuee="2014-08-08">
                
    
<div id="container"></div>


<a href="#" onclick="test()"> + ny kontaktperson </a>

    <script src="/picker/jquery.1.9.1.js"></script>
    <script src="/picker/picker.js"></script>
    <script src="/picker/picker.time.js"></script>
    <script src="/picker/picker.date.js"></script>
    <script src="/picker/legacy.js"></script>

    <script type="text/javascript">

        var $input = $( '.timepicker' ).pickatime({
        })
        var picker = $input.pickatime('picker')
       // picker.open()

    </script>
    
     <script type="text/javascript">

var dt = new Date();

dt.getFullYear() + "/" + (dt.getMonth() + 1) + "/" + dt.getDate();

        var $input = $( '.datepicker' ).pickadate({
            formatSubmit: 'yyyy/mm/dd',
             min: [dt.getFullYear(), dt.getMonth(), dt.getDate()],
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
        })

        var picker = $input.pickadate('picker')
         picker.set('select', '')
        // picker.open()

        // $('button').on('click', function() {
        //     picker.set('disable', true);
        // });

    </script>
                                    
    <script>
    
    function test(){
        
        
        alert(document.getElementById('input_01').value + " - " + document.getElementById('input_from').value);
    }
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
