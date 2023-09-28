<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Leaflet JS Link Start -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Leaflet JS Link End -->
    <!-- Leaflet Control Geocoder Start -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <!-- Leaflet Control Geocoder End -->
    <style>
        #map {
            height: 180px;
        }
    </style>
</head>

<body>
    <div id="map"></div>
    <form action="/save-location/{{ Auth::user()->id }}" method="POST">
        @csrf
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" disabled>

        <label for="latitude">Latitude:</label>
        <input type="text" name="latitude" id="latitude" disabled>

        <label for="longitude">Longitude:</label>
        <input type="text" name="longitude" id="longitude" disabled>

        <button type="submit">Save Location</button>
    </form>
    <script>
        var map = L.map('map').setView([0, 0], 2);
        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var geocoder = L.Control.geocoder({
                defaultMarkGeocode: false,
                geocodingQueryParams: {
                    addressdetails: 1,
                    format: 'json'
                },
                collapsed: false,
                geocoder: L.Control.Geocoder.nominatim({
                    geocodingQueryParams: {
                        countrycodes: 'ID',
                        limit: 5
                    }
                })
            })
            .on('markgeocode', function(e) {
                var bbox = e.geocode.bbox;
                var poly = L.polygon([
                    bbox.getSouthEast(),
                    bbox.getNorthEast(),
                    bbox.getNorthWest(),
                    bbox.getSouthWest()
                ]).addTo(map);
                map.fitBounds(poly.getBounds());
                console.log(e.geocode);
                document.getElementById("address").value = e.geocode.properties.display_name;
                document.getElementById("latitude").value = e.geocode.center.lat;
                document.getElementById("longitude").value = e.geocode.center.lng;
            })
            .addTo(map);
    </script>
</body>

</html>
