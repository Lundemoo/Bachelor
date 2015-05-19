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
                    alert("cant find geo location nr 1");
                }
                else
                {
                    location1 = {lat: response.Placemark[0].Point.coordinates[1], lon: response.Placemark[0].Point.coordinates[0], address: response.Placemark[0].address};
                    geocoder.getLocations(document.forms[0].stopdestination.value, function (response) {
                        if (!response || response.Status.code != 200)
                        {
                            alert("cant find geolocation nr 2");
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