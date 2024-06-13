<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakarta Metropolitan RailMap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    {{-- fontawosoem --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('train.png') }}" type="image/x-icon">
    <!-- Optional: If using a PNG file -->
    <style>
        /* Global styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #ffffff;
            margin: 0;
            padding: 0px 0px;
        }

        /* Header styles */
        .header {
            background-color: #ff5733;
            color: #ffffff;
            padding: 100px 20px;
            text-align: center;
        }

        .header h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        .header p {
            font-size: 1.8rem;
            margin-bottom: 40px;
        }

        /* Features Section */
.features {
    background-color: #f1f1f1;
    padding: 20px 20px;  /* Mengurangi padding atas-bawah */
    text-align: center;
}

.features h2 {
    font-size: 2.5rem;
    margin-bottom: 20px;  /* Mengurangi margin-bottom */
    color: #ff5733;
}

.feature-box {
    padding: 20px;  /* Mengurangi padding dalam fitur box */
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-bottom: 20px;  /* Mengurangi margin-bottom antar fitur box */
    background-color: #ffffff;
    transition: all 0.3s ease;
}

.feature-box:hover {
    box-shadow: 0px 0px 15px rgba(76, 76, 77, 0.89);
}

.feature-icon {
    font-size: 3.5rem;
    color: #ff5733;
    margin-bottom: 20px;
}


        /* Specific styling for icons within the cta section */
        #cta .feature-icon {
            color: #ffffff;
        }

        .feature-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #040458;
        }

        .feature-description {
            font-size: 1.2rem;
            color: #040458;
        }

        /* Call to Action Section */
        .cta {
            background-color: #ff5733;
            color: #ffffff;
            padding: 100px 20px;
            text-align: center;
        }

        .cta h2 {
            font-size: 3.5rem;
            margin-bottom: 40px;
        }

        .cta-btn {
            background-color: #ffffff;
            color: #ff5733;
            border: 2px solid #ffffff;
            padding: 15px 40px;
            font-size: 1.5rem;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
        }

        .cta-btn:hover {
            background-color: #ffd5c2;
            color: #ff5733;
        }

        /* Footer styles */
        .footer {
            background-color: #343a40;
            color: #ffffff;
            text-align: center;
            padding: 40px;
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-train-tram"></i> Jakarta Metropolitan RailMap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link text-" href="#cta">Map</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#krl">KRL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lrt">LRT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#mrt">MRT</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <h1>Jakarta Metropolitan RailMap</h1>
            <p>Discover and explore Jakarta with interactive rail maps.</p>
        </div>
    </header>

    <!-- KRL Section -->
    <section id="krl" class="features">
        <div class="container">
            <h2>KRL (Commuter Line)</h2>
            <div class="feature-box">
                <i class="fas fa-train feature-icon"></i>
                <h3 class="feature-title">KRL Information</h3>
                <p class="feature-description">Get the latest updates and schedules for the KRL (Commuter Line) services in Jakarta.</p>
                <a href="https://www.kai.id/" class="cta-btn">More Information</a>
            </div>
        </div>
    </section>

    <!-- LRT Section -->
    <section id="lrt" class="features">
        <div class="container">
            <h2>LRT</h2>
            <div class="feature-box">
                <i class="fas fa-subway feature-icon"></i>
                <h3 class="feature-title">LRT Information</h3>
                <p class="feature-description">Learn more about the Light Rail Transit (LRT) system and its operations in Jakarta.</p>
                <a href="https://www.lrtjakarta.co.id/" class="cta-btn">More Information</a>
            </div>
        </div>
    </section>

    <!-- MRT Section -->
    <section id="mrt" class="features">
        <div class="container">
            <h2>MRT</h2>
            <div class="feature-box">
                <i class="fas fa-train feature-icon"></i>
                <h3 class="feature-title">MRT Information</h3>
                <p class="feature-description">Explore the MRT (Mass Rapid Transit) system and discover how it connects the city of Jakarta.</p>
                <a href="https://jakartamrt.co.id/id " class="cta-btn">More Information</a>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="cta" class="cta">
        <div class="container">
            <i class="fas fa-map-marked-alt feature-icon"></i>
            <h2>Ready to start exploring?</h2>
            <a href="{{ route('index-public') }}" class="cta-btn">Explore Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Jakarta RailMap. All rights reserved. | Designed by Johanes Berchmann Juvens Junior Pareira</p>
            <p>Sarjana Terapan Sistem Informasi Geografis Departemen Teknologi Kebumian Sekolah Vokasi Universitas Gadjah Mada</p>
        </div>
    </footer>

    <!-- JavaScript untuk Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
