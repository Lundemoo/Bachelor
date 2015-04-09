<!DOCTYPE html>
<html>
<head>
    <meta charset = "utf-8">

</head>

<body>

<h1> Alle kjørebøker </h1>

@foreach ($logbookadditions as $logbookaddition)
   <h2> <li> Ansattnr: {{$logbookaddition->employeeNR}}</li> </h2>

   <div class="innholdet"> RegistrationNr: {{ $logbookaddition->registrationNR }}</div>
   <div class="innholdet"> Dato: {{ $logbookaddition->date }}</div>
   <div class="innholdet"> Start destination: {{ $logbookaddition->startdestination }}</div>
   <div class="innholdet"> Stop destination: {{ $logbookaddition->stopdestination }}</div>
   <div class="innholdet"> Total km: {{ $logbookaddition->totalkm }}</div>

    <!-- <li>{{ link_to("/logbookaddition/{$logbookaddition->registrationNR}", $logbookaddition->registrationNR)}}</li>  -->

@endforeach


</body>

</html>