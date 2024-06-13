@extends('layouts.template')

    @section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html ,body {
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
    <!-- Modal Create Point-->
<div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="PointModalLabel">Create Point</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store-point')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Fill point name">
              </div>
              <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
              </div>
              <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_point" name="geom" rows="3"readonly></textarea>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_point" name="image"
                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
              </div>
              <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-point"
                class="img-thumbnail" width="400" >
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal Create Polyline-->
<div class="modal fade" id="PolylineModal" tabindex="-1" aria-labelledby="PolylineModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolylineModalLabel">Create Polyline</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store-polyline')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Fill point name">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_polyline" name="geom" rows="3"readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_polyline" name="image"
                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-polyline"
                class="img-thumbnail" width="400" >
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
    <!-- Modal Create Polygon-->
<div class="modal fade" id="PolygonModal" tabindex="-1" aria-labelledby="PolygonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="PolygonModalLabel">Create Polygon</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store-polygon')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Fill point name">
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="geom" class="form-label">Geometry</label>
                <textarea class="form-control" id="geom_polygon" name="geom" rows="3"readonly></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image_polygon" name="image"
                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="mb-3">
                <img src="" alt="Preview" id="preview-image-polygon"
                class="img-thumbnail" width="400" >
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    </div>
</div>
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

       /* Digitize Function */
var drawnItems = new L.FeatureGroup();
map.addLayer(drawnItems);

var drawControl = new L.Control.Draw({
    draw: {
        position: 'topleft',
        polyline: true,
        polygon: false,
        rectangle: false,
        circle: false,
        marker: true,
        circlemarker: false
    },
    edit: false
});

map.addControl(drawControl);

map.on('draw:created', function(e) {
    var type = e.layerType,
        layer = e.layer;

    console.log(type);

    var drawnJSONObject = layer.toGeoJSON();
    var objectGeometry = Terraformer.WKT.convert(drawnJSONObject.geometry);

    console.log(drawnJSONObject);
    console.log(objectGeometry);

    if (type === 'polyline') {
        $("#geom_polyline").val(objectGeometry);
        $("#PolylineModal").modal('show');
    } else if (type === 'marker') {
        // Use the custom icon for the marker
        layer.setIcon(customIcon);
        $("#geom_point").val(objectGeometry);
        $("#PointModal").modal('show');
        console.log("Create " + type);
    } else {
        console.log('undefined');
    }
    drawnItems.addLayer(layer);
});

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
            "' class='img-thumbnail' alt='...' width='150' >" + "<br>" +

            "<div class='d-flex flex-row mt-3'>" +

            "<a href='{{ url('edit-point') }}/" + feature.properties.id +
            "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

            "<form action='{{ url('delete-point') }}/" + feature.properties.id + "' method='POST'>" +
            '{{ csrf_field() }}' +
            '{{ method_field('DELETE') }}' +
            "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Yakin Anda akan menghapus data ini?\")'><i class='fa-solid fa-trash-can'></i></button>" +

            "</form>" +

            "</div>";

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
            weight: 3, // Ketebalan garis polilin
            opacity: 2 // Opasitas garis polilin
        };
    },
    onEachFeature: function(feature, layer) {
        var popupContent = "" + feature.properties.name + "<br>" +
            "Rute:" + feature.properties.description + "<br>"+

            "<div class='d-flex flex-row mt-3'>" +

            "<a href='{{ url('edit-polyline') }}/" + feature.properties.id +
            "' class='btn btn-warning me-2'><i class='fa-solid fa-pen-to-square'></i></a>" +

            "<form action='{{ url('delete-polyline') }}/" + feature.properties.id +
            "' method='POST'>" +
            '{{ csrf_field() }}' +
            '{{ method_field('DELETE') }}' +

            "<button type='submit' class='btn btn-danger' onclick='return confirm(Yakin Anda akan menghapus data ini?)'><i class='fa-solid fa-trash-can'></i></button>"

        "</form>"

        "</div>"

        ;
        layer.on({
            click: function(e) {
                layer.bindPopup(popupContent);
            },
            mouseover: function(e) {
                layer.bindTooltip(feature.properties.name);
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
        // Add layer control to the map
        L.control.layers(null, overlayMaps).addTo(map);
</script>
@endsection
