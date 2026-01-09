<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Web Kampus Informatika</title>
    <meta name="description" content="Portal Web Kampus Informatika">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- CUSTOM STYLES -->
    <style {csp-style-nonce}>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        /* Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            margin-left: 20px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 1.3rem;
            position: relative;
            z-index: 1;
        }

        /* Carousel/Slider */
        .carousel-item {
            height: 400px;
            object-fit: cover;
        }

        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
        }

        /* Profile Section */
        .profile-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .profile-section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #667eea;
        }

        .profile-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .profile-card h4 {
            color: #667eea;
            margin-bottom: 15px;
        }

        .profile-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }

        /* News Section */
        .news-section {
            padding: 60px 0;
        }

        .news-section h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2.5rem;
            color: #667eea;
        }

        .news-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 30px;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .news-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .news-card-body {
            padding: 20px;
        }

        .news-card-title {
            color: #667eea;
            font-size: 1.3rem;
            margin-bottom: 10px;
        }

        .news-card-date {
            color: #999;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .news-card p {
            color: #666;
            font-size: 0.95rem;
        }

        .read-more {
            color: #667eea;
            font-weight: bold;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            transition: color 0.3s ease;
        }

        .read-more:hover {
            color: #764ba2;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 0 20px;
        }

        footer h5 {
            margin-bottom: 20px;
            font-weight: bold;
        }

        footer p {
            margin-bottom: 8px;
            font-size: 0.95rem;
        }

        footer a {
            color: #ffd700;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 20px;
            margin-top: 20px;
            text-align: center;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .carousel-item {
                height: 250px;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR / HEADER -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <i class="fas fa-graduation-cap"></i> Web Kampus Informatika
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#kontak">Kontak</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/login') ?>">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero" id="home">
    <div class="container">
        <h1>Selamat Datang di Web Kampus Informatika</h1>
        <p>Platform Informasi Terpadu untuk Mahasiswa dan Akademik</p>
        <a href="#berita" class="btn btn-light btn-lg mt-4">Lihat Berita Terbaru</a>
    </div>
</section>

<!-- CAROUSEL / SLIDER -->
<div class="container-fluid p-0">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://via.placeholder.com/1200x400/667eea/ffffff?text=Slide+1" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pendidikan Berkualitas</h5>
                    <p>Kami menyediakan pendidikan informatika terbaik</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x400/764ba2/ffffff?text=Slide+2" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Teknologi Terkini</h5>
                    <p>Belajar dengan teknologi dan tools terbaru</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://via.placeholder.com/1200x400/f093fb/ffffff?text=Slide+3" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Komunitas Aktif</h5>
                    <p>Bergabunglah dengan komunitas developer kami</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>

<!-- PROFIL SECTION -->
<section class="profile-section" id="profil">
    <div class="container">
        <h2>Profil Kampus</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-card text-center">
                    <div class="profile-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4>Program Studi</h4>
                    <p>Kami menawarkan program studi informatika yang komprehensif dengan kurikulum yang disesuaikan dengan kebutuhan industri modern.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-card text-center">
                    <div class="profile-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4>Dosen Berpengalaman</h4>
                    <p>Tim dosen kami terdiri dari praktisi berpengalaman dan akademisi yang ahli di bidangnya masing-masing.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-card text-center">
                    <div class="profile-icon">
                        <i class="fas fa-laptop"></i>
                    </div>
                    <h4>Fasilitas Lengkap</h4>
                    <p>Laboratorium komputer modern dan fasilitas pembelajaran yang mendukung untuk pengalaman belajar optimal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BERITA SECTION -->
<section class="news-section" id="berita">
    <div class="container">
        <h2>Berita Terbaru</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="news-card">
                    <img src="https://via.placeholder.com/400x250/667eea/ffffff?text=Berita+1" alt="Berita 1">
                    <div class="news-card-body">
                        <h5 class="news-card-title">Seminar Teknologi AI</h5>
                        <p class="news-card-date"><small>9 Januari 2026</small></p>
                        <p>Kampus mengadakan seminar tentang Artificial Intelligence dan machine learning dengan pembicara dari industri.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="https://via.placeholder.com/400x250/764ba2/ffffff?text=Berita+2" alt="Berita 2">
                    <div class="news-card-body">
                        <h5 class="news-card-title">Kompetisi Coding 2026</h5>
                        <p class="news-card-date"><small>8 Januari 2026</small></p>
                        <p>Pendaftaran kompetisi coding 2026 telah dibuka. Kesempatan terbaik untuk menunjukkan kemampuan Anda.</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="news-card">
                    <img src="https://via.placeholder.com/400x250/f093fb/ffffff?text=Berita+3" alt="Berita 3">
                    <div class="news-card-body">
                        <h5 class="news-card-title">Workshop Web Development</h5>
                        <p class="news-card-date"><small>7 Januari 2026</small></p>
                        <p>Workshop intensif web development menggunakan framework modern akan diadakan minggu depan. Daftar sekarang!</p>
                        <a href="#" class="read-more">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CONTENT -->

<section>

    <h1>About this page</h1>

    <p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

    <p>If you would like to edit this page you will find it located at:</p>

    <pre><code>app/Views/welcome_message.php</code></pre>

    <p>The corresponding controller for this page can be found at:</p>

    <pre><code>app/Controllers/Home.php</code></pre>

</section>

<!-- FOOTER -->
<footer id="kontak">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>Tentang Kami</h5>
                <p>Web Kampus Informatika adalah platform informasi terpadu untuk semua kebutuhan akademik mahasiswa informatika.</p>
            </div>
            <div class="col-md-4">
                <h5>Navigasi</h5>
                <p><a href="#home">Home</a></p>
                <p><a href="#profil">Profil</a></p>
                <p><a href="#berita">Berita</a></p>
                <p><a href="<?= base_url('Auth/login') ?>">Login</a></p>
            </div>
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p><i class="fas fa-map-marker-alt"></i> Jl. Kampus No. 123, Kota</p>
                <p><i class="fas fa-phone"></i> (021) 123-4567</p>
                <p><i class="fas fa-envelope"></i> info@kampus.ac.id</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Web Kampus Informatika. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Smooth Scroll -->
<script {csp-script-nonce}>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

</body>
</html>
