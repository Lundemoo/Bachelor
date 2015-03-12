@extends('app')
@section('content')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="robots" content="noindex,follow" />
    <title>Registrere Kjørebok</title>
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
                    alert("Sorry, we were unable to geocode the first address");
                }
                else
                {
                    location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                    geocoder.getLocations(document.forms[0].stopdestination.value, function (response) {
                        if (!response || response.Status.code != 200)
                        {
                            alert("Sorry, we were unable to geocode the second address");
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
</head>

<body onload="initialize()">

<h1> Registrer Kjørebok</h1>


    <!--fra min index blade fil -->
    {!! Form::open(['url' => 'logbookaddition']) !!}
    <div class="form-group">
        {!! Form::label('registrationNr', 'RegistreringsNr:') !!}
        {!! Form::text('registrationNr', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('date', 'Dato:') !!}
        {!! Form::text('date', date('Y-m-d'), ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('startdestination', 'Start:') !!}
        {!! Form::text('startdestination', null, ['class' => 'form-control'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('stopdestination', 'Stop:') !!}
        {!! Form::text('stopdestination', null, ['class' => 'form-control', 'onblur' => 'showLocation()'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('totalkm', 'Total km:') !!}
        {!! Form::text('totalkm', null, ['class' => 'form-control'] ) !!}
    </div>
    <br/>

    <div class="form-group">
        {!! Form::submit('Registrer kjøreboken', ['class' => 'btn btn-primary form-control'] ) !!}
    </div>

</form>


@stop

</body>
</html>