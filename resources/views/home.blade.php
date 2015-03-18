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

<script>

function set(){

var t = getClockTime(0);

document.getElementById('input_from').value=t;
}
function getClockTime(timeZone)
{
var now = new Date();
var hour = now.getHours() + timeZone;
var minute = "";
var minuteRound = (now.getMinutes()) / 2;

var second = now.getSeconds();
var ap = "AM";
if (hour > 11) ap = "PM";
if (hour > 12) hour = hour - 12;
if (hour == 0) hour = 12;
if (hour < 10) hour = "0" + hour;
if (minuteRound > 7) minute = "30";
if(minuteRound > 20) hour= ( hour - 12) + 13;
if(minuteRound > 20) minute = "00";

var timeString = hour + ':' + minute + " " + ap;
return timeString;



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
