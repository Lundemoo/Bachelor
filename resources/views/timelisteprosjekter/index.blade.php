@extends('app')
@section('content')

<h1>{{trans('general.allTimesheets')}}</h1>

@foreach ($timelisteprosjekter as $timelisteprosjekt)
   <h2> <li> {{trans('general.employeeNr')}} {{$timelisteprosjekt->employeeNR}}</li> </h2>

   <div class="innholdet"> {{trans('general.projectId')}} {{ $timelisteprosjekt->projectID }}</div>
   <div class="innholdet"> {{trans('general.date')}} {{ $timelisteprosjekt->date }}</div>
   <div class="innholdet"> {{trans('general.startTime')}} {{ $timelisteprosjekt->starttime }}</div>
   <div class="innholdet"> {{trans('general.stopTime')}} {{ $timelisteprosjekt->endtime }}</div>
   <div class="innholdet"> {{trans('general.comment')}} {{ $timelisteprosjekt->comment }}</div>

    <!-- <li>{{ link_to("/timelisteprosjekter/{$timelisteprosjekt->projectID}", $timelisteprosjekt->projectID)}}</li>  -->

@endforeach


@stop