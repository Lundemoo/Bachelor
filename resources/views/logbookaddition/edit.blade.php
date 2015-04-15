@extends('app')
@section('content')


    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="noindex,follow" />
    <title>{{trans('general.editLogbook')}}</title>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7j_Q-rshuWkc8HyFI4V2HxQYPm-xtd00hTQOC0OXpAMO40FHAxT29dNBGfxqMPq5zwdeiDSHEPL89A" type="text/javascript"></script>
    <!-- According to the Google Maps API Terms of Service you are required display a Google map when using the Google Maps API. see: http://code.google.com/apis/maps/terms.html -->
    <script type="text/javascript">

        var geocoder, location1, location2, gDir;

        function initialize() {
            geocoder = new GClientGeocoder();
            gDir = new GDirections();
            GEvent.addListener(gDir, "load", function() {
                var drivingDistanceMiles = gDir.getDistance().meters / 1609.344;
                var drivingDistanceKilometers = gDir.getDistance().meters / 1000;
                document.getElementById('totalkm').value = drivingDistanceKilometers;
            });
            return drivingDistanceKilometers;
        }

        function showLocation() {
            geocoder.getLocations(document.forms[0].startdestination.value, function (response) {
                if (!response || response.Status.code != 200)
                {
                    alert({{trans('general.unableToFind1')}});
                }
                else
                {
                    location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                    geocoder.getLocations(document.forms[0].stopdestination.value, function (response) {
                        if (!response || response.Status.code != 200)
                        {
                            alert({{trans('general.unableToFind2')}});
                        }
                        else
                        {
                            location2 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                            gDir.load('from: ' + location1.address + ' to: ' + location2.address);
                        }
                    });
                }
            });
        }

    </script>




    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('general.registrateDriving')}}</div>
                    <div class="panel-body">
                        <body onload="initialize()">
                        <!--fra min index blade fil -->
                        {!! Form::model($logbookaddition, ['method' =>'PATCH', 'action' =>[ 'LogbookadditionController@update', $logbookaddition->employeeNR ]]) !!}
                        <div class="form-group">

                            {!! Form::label('registrationNR', {{trans('general.car')}}) !!}
                            {!! Form::select('registrationNR', $cars) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('date', {{trans('general.date')}}) !!}
                            {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('startdestination', 'Start:') !!}
                            {!! Form::text('startdestination', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group" onload="initialize()">
                            {!! Form::label('stopdestination', 'Stop:') !!}
                            {!! Form::text('stopdestination', null, ['class' => 'form-control', 'onblur' => 'showLocation()'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('totalkm', 'Total km:') !!}
                            {!! Form::text('totalkm', null, ['class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('bompenger', {{trans('general.roadTolls')}}) !!}
                            {!! Form::text('bompenger', 0, ['placeholder'=>'0','class' => 'form-control'] ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Aktiv:') !!}
                            {!! Form::checkbox('active', '1' , true) !!}
                        </div>
                        <br/>

                        <div class="form-group">
                            {!! Form::submit({{trans('general.editLogbook')}}, ['class' => 'btn btn-primary form-control'] ) !!}
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


