@extends('app')
@section('content')


    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="noindex,follow" />
    <title>{{trans('general.editLogbook')}}</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A" type="text/javascript"></script>
    <!-- According to the Google Maps API Terms of Service you are required display a Google map when using the Google Maps API. see: http://code.google.com/apis/maps/terms.html -->
    <script src="/js/kjorerute.js"></script>

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
                        <div class="form-group">

                            {!! Form::label('registrationNR', trans('general.car')) !!} </br>
                            {!! Form::select('registrationNR', $cars) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', trans('general.date')) !!}
                            {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('startdestination', trans('general.startdestination')) !!}
                            {!! Form::text('startdestination', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group" onload="initialize()">
                            {!! Form::label('stopdestination', trans('general.stopdestination')) !!}
                            {!! Form::text('stopdestination', null, ['class' => 'form-control', 'onblur' => 'showLocation()'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('totalkm', trans('general.kilometer')) !!}
                            {!! Form::text('totalkm', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <br/>
                        <div class="form-group">
                            {!! Form::submit(trans('general.editLogbook'), ['class' => 'btn btn-primary form-control'] ) !!}
                        </div>

                        {!! Form::close() !!}
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop


