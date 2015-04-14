@extends('app')
@section('content')

    <center>
<h1>{{trans('general.allCars')}}</h1>

@foreach ($cars as $car)
   <h2> <li> {{trans('general.registrationNr')}} {{$car->registrationNR}}</li> </h2>

  <!-- <div class="innholdet"> Kallenavn: {{ $car->nickname }}</div>
   <div class="innholdet"> Merke/modell: {{ $car->brand }}</div> -->

    <li> <a href= "{{ URL::to("/car/{$car->registrationNR}/edit")}} "><i class="redigere"> </i>{{trans('general.edit')}}/a> </li>
    <li>{{trans('general.delete')}} <input name="agree" type="checkbox" value="1"></li>


@endforeach
</center>
@endsection