@extends('app')
@section('content')


    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="noindex,follow" />
    <title>{{trans('general.editLogbook')}}</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A" type="text/javascript"></script>
    <!-- According to the Google Maps API Terms of Service you are required display a Google map when using the Google Maps API. see: http://code.google.com/apis/maps/terms.html -->
    <script src="/js/kjorerute.js"></script>
     <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.editDriving')}}
                    <a id="backbutton" href="{{ URL::previous() }}"><img src="/bilder/back-button.png" width="40" height="30" align="left"></a>
                        </div>
                    <div class="panel-body">

                        <body onload="initialize()">
                        <!--fra min index blade fil -->
                        {!! Form::model($logbookaddition, ['method' =>'PATCH', 'action' =>[ 'LogbookadditionController@update', $logbookaddition->logbookadditionID ]]) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            {!! Form::label('projectIDs', trans('general.project')) !!} <br />
                            {!! Form::select('projectID', $projects) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('registrationNR', trans('general.car')) !!} <br />
                            {!! Form::select('registrationNR', $cars) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', trans('general.date')) !!}<br />
                            {!! Form::text('date', $logbookaddition->date, ['class' => 'datepicker'] ) !!}
                        </div><div id="container"></div>
                        <div class="form-group">
                            {!! Form::label('startdestination', trans('general.startdestination')) !!}
                            {!! Form::text('startdestination', $logbookaddition->startdestination, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group" onload="initialize()">
                            {!! Form::label('stopdestination', trans('general.stopdestination')) !!}
                            {!! Form::text('stopdestination', $logbookaddition->stopdestination, ['class' => 'form-control', 'onblur' => 'showLocation()'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('totalkm', trans('general.kilometer')) !!}
                            {!! Form::text('totalkm', $logbookaddition->totalkm, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::submit(trans('general.updateLogbook'), ['class' => 'btn btn-primary form-control'] ) !!}
                        </div>

                        {!! Form::close() !!}
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif
<script>
        var minimal = 0;</script>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop


