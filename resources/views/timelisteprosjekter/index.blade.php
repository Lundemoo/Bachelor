@extends('app')
@section('content')

<h1> Alle timelister</h1>

@foreach ($timelisteprosjekter as $timelisteprosjekt)
   <h2> <li> Ansattnr: {{$timelisteprosjekt->employeeNR}}</li> </h2>

   <div class="innholdet"> ProsjektID: {{ $timelisteprosjekt->projectID }}</div>
   <div class="innholdet"> Dato: {{ $timelisteprosjekt->date }}</div>
   <div class="innholdet"> Starttid: {{ $timelisteprosjekt->starttime }}</div>
   <div class="innholdet"> Sluttid: {{ $timelisteprosjekt->endtime }}</div>
   <div class="innholdet"> Kommentar: {{ $timelisteprosjekt->comment }}</div>

    <!-- <li>{{ link_to("/timelisteprosjekter/{$timelisteprosjekt->projectID}", $timelisteprosjekt->projectID)}}</li>  -->

@endforeach


@stop