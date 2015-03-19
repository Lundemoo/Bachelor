<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">

</head>

<body>

<h1> Alle biler</h1>

@foreach ($cars as $car)
   <h2> <li> RegistreringsNr: {{$car->registrationNr}}</li> </h2>

   <div class="innholdet"> Kallenavn: {{ $car->nickname }}</div>
   <div class="innholdet"> Merke/modell: {{ $car->brand }}</div>

    <!-- <li>{{ link_to("/car/{$car->registrationNr}", $car->registrationNr)}}</li>  -->

@endforeach


</body>

</html>