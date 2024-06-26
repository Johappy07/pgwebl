<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-locatecontrol/0.73.0/L.Control.Locate.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- fontawosoem --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Favicon -->
<link rel="icon" href="{{ asset('train.png') }}" type="image/x-icon">
<!-- Optional: If using a PNG file -->
    @yield('styles')

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-regular fa-map"></i>{{$title}} <i class="fa-solid fa-train-subway"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}"><i class="fa-solid fa-house"></i> Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-table"></i> Table</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route ('table-point')}}"><i class="fa-solid fa-location-dot"></i> Table Point</a></li>
                            <li><a class="dropdown-item" href="{{ route ('table-polyline')}}"><i class="fa-solid fa-route"></i></i> Table Polyline</a></li>
                            {{-- <li><a class="dropdown-item" href="{{ route ('table-polygon')}}"><i class="fa-solid fa-draw-polygon"></i></i> Table Polygon</a></li> --}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"
                         data-bs-toggle="modal" data-bs-target="#infoModal"
                        ><i class="fa-solid fa-circle-info" ></i></i> Info</a>
                    </li>

                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-window-maximize"></i></i> Dasboard</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item">
                            <button class="nav-link text-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i></i> Logout</button>
                        </li>
                    </form>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="{{ route ('login')}}"><i class="fa-solid fa-right-from-bracket"></></i><Leg></Leg> Login</a>
                    </li>
                    @endif



                </ul>
            </div>
        </div>
    </nav>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="infoModalLabel">Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 style="text-align: justify;">Fungsi dan Manfaat WebGIS Jakarta Metropolitan Railmap</h2>
                <p style="text-align: justify;">WebGIS Jakarta Metropolitan Railmap adalah alat berbasis web yang dirancang untuk menampilkan sebaran titik stasiun dan jalur kereta di Jakarta. Sistem ini mencakup jalur KRL, LRT, dan MRT. Beberapa fungsi dan manfaat utama dari webGIS ini adalah:</p>
                <ul style="text-align: justify;">
                    <li><strong>Visualisasi Jalur Transportasi:</strong> Memudahkan pengguna untuk melihat dan memahami jaringan transportasi rel di Jakarta melalui peta interaktif.</li>
                    <li><strong>Rencana Perjalanan:</strong> Membantu pengguna dalam merencanakan perjalanan mereka dengan menunjukkan lokasi stasiun dan rute yang tersedia.</li>
                    <li><strong>Informasi Stasiun:</strong> Menyediakan informasi detail tentang stasiun, termasuk fasilitas yang tersedia, integrasi dengan moda transportasi lain, dan informasi penting lainnya.</li>
                    <li><strong>Analisis Data Transportasi:</strong> Memungkinkan pemerintah dan pemangku kepentingan lainnya untuk menganalisis data terkait mobilitas, kemacetan, dan kebutuhan infrastruktur di masa depan.</li>
                    <li><strong>Peningkatan Aksesibilitas:</strong> Membantu penduduk lokal dan wisatawan untuk lebih mudah mengakses sistem transportasi publik, mengurangi ketergantungan pada kendaraan pribadi dan mengurangi kemacetan.</li>
                </ul>
                <!-- Menambahkan gambar ke dalam modal -->
                <h4 style="text-align: justify;">Infografis Perbedaan KRL, LRT dan MRT</h4>
                <img src="info_kereta.jpg" alt="Peta Railmap Jakarta" class="img-fluid">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    @yield('content')
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-locatecontrol/0.73.0/L.Control.Locate.min.js"></script>
    <script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.min.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


     @include("components.toast")
    @yield('script')
</body>

</html>

