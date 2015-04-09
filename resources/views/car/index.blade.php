@extends('app')
@section('content')

    <center>
<h1> Alle biler</h1>

@foreach ($cars as $car)
   <h2> <li> RegistreringsNr: {{$car->registrationNR}}</li> </h2>

  <!-- <div class="innholdet"> Kallenavn: {{ $car->nickname }}</div>
   <div class="innholdet"> Merke/modell: {{ $car->brand }}</div> -->

    <li> <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i> Redigere</a> </li>
    <li>Slette <input name="agree" type="checkbox" value="1"></li>


@endforeach
</center>
@endsection