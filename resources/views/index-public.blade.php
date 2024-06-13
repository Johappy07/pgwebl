@extends('layouts.template')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
<style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0%;
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/terraformer@1.0.7/terraformer.js"></script>
    <script src="https://unpkg.com/terraformer-wkt-parser@1.1.2/terraformer-wkt-parser.js"></script>
    <script>
        // Map
    var map = L.map('map').setView([-6.2, 106.8], 9); // Coordinates for Jabodetabek

        //Basemap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Define custom icon
var customIcon = L.icon({
    iconUrl: "{{ asset('icon-removebg-preview.png') }}", // Pastikan ini adalah path yang benar ke gambar ikon Anda
    iconSize: [32, 32], // Ukuran ikon, sesuaikan dengan ukuran gambar Anda
    iconAnchor: [16, 32], // Titik anchor dari ikon (biasanya tengah bawah)
    popupAnchor: [0, -32] // Titik anchor popup relatif terhadap ikon
});

// Create a marker cluster group
var markers = L.markerClusterGroup();

/* GeoJSON Point */
var point = L.geoJson(null, {
    pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon: customIcon});
    },
    onEachFeature: function(feature, layer) {
        var popupContent = "Stasiun " + feature.properties.name + "<br>" +
            "Operator: " + feature.properties.description + "<br>" +
            "Foto: <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
            "' class='img-thumbnail' alt='...' width='150' >" + "<br>" ;

        layer.on({
            click: function(e) {
                layer.bindPopup(popupContent).openPopup(e.latlng);
            },
            mouseover: function(e) {
                layer.bindTooltip(feature.properties.name).openTooltip(e.latlng);
            },
        });
    },
});

// Load GeoJSON data and add it to the cluster group
$.getJSON("{{ route('api.points') }}", function(data) {
    point.addData(data);
    markers.addLayer(point);
    map.addLayer(markers);
});

// Add the cluster group to the map
map.addLayer(markers);

// Add search control to the map
var searchControl = new L.Control.Search({
    layer: markers,
    propertyName: 'name',
    marker: false,
    moveToLocation: function(latlng, title, map) {
        map.setView(latlng, 15);
        L.popup()
            .setLatLng(latlng)
            .setContent(title)
            .openOn(map);
    }
});

map.addControl(searchControl);

// Add the cluster group to the map
map.addLayer(markers);


        /* GeoJSON Polyline */
var polyline = L.geoJson(null, {
    style: function(feature) {
        // Menentukan warna berdasarkan ID atau atribut lainnya
        var id = feature.properties.id;
        var color;
        // Contoh penentuan warna berdasarkan ID
        if (id === 11) {
            color = 'red';
        } else if (id === 12) {
            color = 'yellow';
        } else {
            color = 'green';
        }
        // Atau, Anda juga bisa menggunakan atribut lain untuk menentukan warna, misalnya 'color':
        // var color = feature.properties.color;

        return {
            color: color, // Warna garis polilin
            weight: 2, // Ketebalan garis polilin
            opacity: 1 // Opasitas garis polilin
        };
    },
    onEachFeature: function (feature, layer) {
        var popupContent = "" + feature.properties.name + "<br>" +
            "Rute:" + feature.properties.description + "<br>";


                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });
        // Function to create popup content
        function createPopupContent(feature) {
            return " " + feature.properties.KABKOT;
        }

        // Function to style each feature
        function style(feature) {
            return {
                fillColor: getRandomColor(),
                weight: 1,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.5
            };
        }

        // Function to generate random color
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }


        /* GeoJSON Polygon */
        var polygon = L.geoJson(null, {
            style: style, // Apply the style function here
            onEachFeature: function(feature, layer) {
                var popupContent = createPopupContent(feature);

                layer.on({
                    click: function(e) {
                        layer.bindPopup(popupContent).openPopup(e.latlng);
                    },

                });
            },
        });

        // Load GeoJSON data
        $.getJSON("{{ asset('Jabodetabek_New.json') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });
    // layer control
var overlayMaps = {
    "Titik Stasiun Kereta Api": markers,
    "Jalur Kereta Api": polyline,
    "Batas Administrasi Metropolitan Jabodetabek": polygon
};
var layerControl = L.control.layers(null, overlayMaps).addTo(map);
 // Tambahkan geolocation control
 L.control.locate({
        position: 'topright',
        strings: {
            title: "Show me where I am!"
        }
    }).addTo(map);
// Tambahkan fitur routing
L.Routing.control({
    waypoints: [
        L.latLng(-6.1753924, 106.8271528), // Koordinat Monas
        L.latLng(-6.1951255, 106.8228645)  // Koordinat Bundaran HI
    ],
    routeWhileDragging: true
}).addTo(map);
</script>
@endsection
