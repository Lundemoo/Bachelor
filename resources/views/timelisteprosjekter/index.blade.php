@extends('app')
@section('content')

<h1> Alle timelister</h1>

@foreach ($timelisteprosjekter as $timelisteprosjekt)
   <h2> <li> Ansattnr: {{$timelisteprosjekt->employeeNr}}</li> </h2>

   <div class="innholdet"> ProsjektID: {{ $timelisteprosjekt->projectId }}</div>
   <div class="innholdet"> Dato: {{ $timelisteprosjekt->date }}</div>
   <div class="innholdet"> Starttid: {{ $timelisteprosjekt->starttime }}</div>
   <div class="innholdet"> Sluttid: {{ $timelisteprosjekt->endtime }}</div>
   <div class="innholdet"> Kommentar: {{ $timelisteprosjekt->comment }}</div>

    <!-- <li>{{ link_to("/timelisteprosjekter/{$timelisteprosjekt->projectId}", $timelisteprosjekt->projectId)}}</li>  -->

@endforeach


@stop