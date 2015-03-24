@extends('app')
@section('content')

<h1> Alle biler</h1>

@foreach ($cars as $car)
   <h2> <li> RegistreringsNr: {{$car->registrationNR}}</li> </h2>

   <div class="innholdet"> Kallenavn: {{ $car->nickname }}</div>
   <div class="innholdet"> Merke/modell: {{ $car->brand }}</div>

    <!-- <li>{{ link_to("/car/{$car->registrationNR}", $car->registrationNR)}}</li>  -->

@endforeach

@endsection