<!DOCTYPE html>
<html lang="id">

<head>

    <?php
    $db = \Config\Database::connect();
    $setting_front = $db->table('tbl_kampus')->where('id', 1)->get()->getRowArray();
    $app_front = $db->table('tbl_app')->where('id_app', 1)->get()->getRowArray();
    $prodi_list = $db->table('tbl_prodi')->get()->getResultArray();


    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduZone - Platform Edukasi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS - Animate On Scroll -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        /* Top Header */
        .top-header {
            background-color: #1f1f1f;
            color: #fff;
            padding: 10px 0;
            font-size: 0.9rem;
        }

        .top-header .header-left {
            display: flex;
            gap: 30px;
        }

        .top-header .header-right {
            text-align: right;
        }

        .top-header a {
            color: #fff;
            text-decoration: none;
        }

        .top-header a:hover {
            color: #28a745;
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 10px 0;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #28a745 !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand img {
            max-height: 40px;
        }

        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin-right: 20px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #28a745 !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #28a745;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .login-btn {
            background-color: #28a745;
            color: white !important;
            padding: 8px 20px !important;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #218838;
        }

        /* Main Content */
        .main-content {
            padding: 40px 0 20px 0;
            background-color: #f8f9fa;
        }

        .main-content h1 {
            font-size: 2.5rem;
            color: #333;
            font-weight: 700;
            margin-bottom: 20px;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes scaleUp {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Feedback Section */
        .feedback-section {
            background: #ffffff;
            padding: 60px 0;
            margin: 40px auto;
            /* tengah secara horizontal */
            max-width: 900px;
            /* lebar maksimal */
            border-radius: 10px;

            display: flex;
            justify-content: center;
            /* konten horizontal center */
            align-items: center;
            /* konten vertical center */

            transition: transform 0.3s ease;
        }

        .feedback-section:hover {
            transform: translateY(-5px);
        }

        .feedback-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            text-align: center;
        }

        .feedback-section p {
            font-size: 1rem;
            margin-bottom: 20px;
            line-height: 1.6;
            text-align: center;
        }

        /* Form */
        .feedback-form {
            width: 100%;
            max-width: 500px;
            /* form benar-benar di tengah */
        }

        .feedback-form input,
        .feedback-form textarea,
        .feedback-form select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        /* Button */
        .feedback-form button {
            background-color: #1f1f1f;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .feedback-form button:hover {
            background-color: #333;
            transform: scale(1.05);
        }


        /* Newsletter Section */
        .newsletter-section {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 60px 0;
            margin: 40px 0;
            transition: transform 0.3s ease;
        }

        .newsletter-section:hover {
            transform: translateY(-5px);
        }

        .newsletter-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
            animation: fadeInUp 0.8s ease-out;
        }

        .newsletter-section p {
            font-size: 1rem;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            max-width: 500px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 4px;
            font-size: 0.95rem;
        }

        .newsletter-form button {
            background-color: #1f1f1f;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .newsletter-form button:hover {
            background-color: #333;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: #1f1f1f;
            color: #ccc;
            padding: 50px 0 20px 0;
        }

        footer h4 {
            color: white;
            font-weight: bold;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }

        footer ul {
            list-style: none;
            padding: 0;
        }

        footer ul li {
            margin-bottom: 15px;
        }

        footer ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        footer ul li a:hover {
            color: #28a745;
            transform: translateX(5px);
        }

        /* Card Hover Effects */
        .card,
        .card-dosen {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover,
        .card-dosen:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
        }

        .card-img-top:hover {
            transform: scale(1.05);
        }

        footer ul li a:hover {
            color: #28a745;
        }

        footer ul li a i {
            color: #28a745;
            width: 20px;
        }

        .contact-info {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .contact-info i {
            color: #28a745;
            margin-top: 3px;
            min-width: 20px;
        }

        .contact-info div {
            flex: 1;
        }

        .contact-info h5 {
            color: white;
            font-size: 0.9rem;
            margin-bottom: 3px;
        }

        .contact-info p {
            margin: 0;
            font-size: 0.9rem;
        }

        .newsletter-footer {
            margin-top: 20px;
        }

        .newsletter-footer input {
            width: 100%;
            padding: 10px 12px;
            border: none;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .newsletter-footer button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s;
        }

        .newsletter-footer button:hover {
            background-color: #218838;
        }

        .social-icons {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-icons a.facebook {
            background-color: #3b5998;
        }

        .social-icons a.google {
            background-color: #dd4b39;
        }

        .social-icons a.linkedin {
            background-color: #0077b5;
        }

        .social-icons a.instagram {
            background-color: #e4405f;
        }

        .social-icons a.twitter {
            background-color: #1da1f2;
        }

        .social-icons a:hover {
            opacity: 0.8;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 20px;
            margin-top: 40px;
            text-align: right;
            font-size: 0.9rem;
        }

        .footer-bottom a {
            color: #ccc;
            text-decoration: none;
            margin-left: 20px;
            transition: color 0.3s;
        }

        .footer-bottom a:hover {
            color: #28a745;
        }

        @media (max-width: 768px) {
            .top-header .header-left {
                flex-direction: column;
                gap: 10px;
            }

            .top-header .header-right {
                text-align: left;
                margin-top: 10px;
            }

            .newsletter-form {
                flex-direction: column;
            }

            .main-content h1 {
                font-size: 2rem;
            }

            .newsletter-section h2 {
                font-size: 1.5rem;
            }

            .footer-bottom {
                text-align: left;
            }

            .footer-bottom a {
                display: block;
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Top Header -->
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="header-left">
                        <div>
                            <i class="fas fa-phone"></i> <?= $setting_front['no_telp'] ?>
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt"></i> <?= $setting_front['alamat'] ?? '1073 W Stephen Ave, Clawson' ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-right">
                        <div>
                            <i class="fas fa-clock"></i> <?= $setting_front['operasional'] ?? 'Mon - Sat 8:00 - 18:00' ?>
                        </div>
                        <div style="margin-top: 5px;">
                            <i class="fas fa-envelope"></i> <?= $setting_front['email'] ?? 'info@example.com' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">
                <i class="fas fa-cube" style="color: #28a745;"></i> <strong><?= $setting_front['nama_kampus'] ?? 'EduZone' ?></strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home') ?>">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            PROFILE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('Home/organisasi') ?>">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Home/sejarah') ?>">Sejarah</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('Home/visimisi') ?>">Visi & Misi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown">
                            AKADEMIK
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="akademikDropdown">
                            <li><a class="dropdown-item" href="#">Program Studi</a></li>
                            <li><a class="dropdown-item" href="#">Kurikulum</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="programDropdown" role="button" data-bs-toggle="dropdown">
                            PROGRAM STUDI
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="programDropdown">
                            <?php foreach ($prodi_list as $p) { ?>
                                <li><a class="dropdown-item" href="<?= base_url('Home/prodi/' . $p['id_prodi']) ?>" target="_blank"><?= $p['nama_prodi'] ?></a></li>
                            <?php }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown">
                            INFORMASI
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="informasiDropdown">
                            <li><a class="dropdown-item" href="#">Berita</a></li>
                            <li><a class="dropdown-item" href="#">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="#">Agenda</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="galleryDropdown" role="button" data-bs-toggle="dropdown">
                            GALLERY
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
                            <li><a class="dropdown-item" href="#">Foto Kegiatan</a></li>
                            <li><a class="dropdown-item" href="#">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown">
                            APPS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="appsDropdown">
                            <?php
                            $db = \Config\Database::connect();
                            $apps = $db->table('tbl_app')->get()->getResultArray();
                            foreach ($apps as $ap) {
                                echo '<li><a class="dropdown-item" href="' . $ap['link_app'] . '" target="_blank">' . $ap['nama_app'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link login-btn" href="<?= base_url('Auth/login') ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- content -->

                <?php
                if ($page) {
                    echo view($page, get_defined_vars());
                }
                ?>

                <!-- end-content -->
            </div>
        </div>
    </div>

    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Subscribe To Our Newsletter</h2>
                    <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                </div>
                <div class="col-lg-6">
                    <h3 style="margin-bottom: 15px;">Your Email Address</h3>
                    <form class="newsletter-form" id="newsletterForm1" method="POST" action="<?= base_url('Home/subscribe') ?>">
                        <?= csrf_field() ?>
                        <input type="email" name="email" placeholder="Your Email Address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                    <div id="newsletterMsg1" style="margin-top: 10px; display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Section -->
    <div class="feedback-section py-5">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <!-- Judul -->
                <div class="col-lg-8 text-center mb-4">
                    <h2>Berikan Kami Penilaian</h2>
                    <p>
                        Penilaian anda dapat memberikan semangat untuk kami dalam
                        meningkatkan kualitas pelayanan.
                    </p>
                </div>

                <!-- Form -->
                <div class="col-lg-6">
                    <div class="feedback-form p-4 shadow rounded">
                        <form action="<?= base_url('feedback/store') ?>" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keluhan</label>
                                <select name="keluhan" class="form-select" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Antrian Lama">Antrian Terlalu Lama</option>
                                    <option value="Aplikasi Lelet">Aplikasi Lelet</option>
                                    <option value="Pelayanan Kurang">Pelayanan Kurang</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label>Desa</label>
                                <select id="desa" name="desa" class="form-select"></select>
                            </div>

                            <div class="mb-3">
                                <label>Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-select"></select>
                            </div>

                            <div class="mb-3">
                                <label>Kabupaten / Kota</label>
                                <select id="kabupaten" name="kabupaten" class="form-select"></select>
                            </div>

                            <div class="mb-3">
                                <label>Provinsi</label>
                                <select id="provinsi" name="provinsi" class="form-select"></select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload Foto</label>
                                <input
                                    type="file"
                                    name="foto"
                                    class="form-control"
                                    accept="image/*"
                                    onchange="previewImage(event)"
                                    required>
                            </div>

                            <div class="mb-3 text-center">
                                <img
                                    id="imagePreview"
                                    src=""
                                    alt="Preview Gambar"
                                    class="img-fluid rounded shadow d-none"
                                    style="max-height: 200px;">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Submit Feedback
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Company Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>COMPANY</h4>
                    <ul>
                        <li><a href="<?= base_url() ?>"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="#profile"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#contact"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                        <li><a href="#akademik"><i class="fas fa-chevron-right"></i> Academic Info</a></li>
                        <li><a href="<?= base_url('Auth/login') ?>"><i class="fas fa-chevron-right"></i> Student Portal</a></li>
                    </ul>
                </div>

                <!-- Useful Links Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>USEFUL LINK</h4>
                    <ul>
                        <li><a href="<?= base_url('Auth/login') ?>"><i class="fas fa-chevron-right"></i> Login</a></li>
                        <li><a href="<?= base_url('Auth/register') ?>"><i class="fas fa-chevron-right"></i> Register</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Program Studi</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Campus Info</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Facilities</a></li>
                    </ul>
                </div>

                <!-- Contact Us Column -->
                <div class="col-lg-3 col-md-6 mb-4" id="contact">
                    <h4>CONTACT US</h4>

                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h5>Address</h5>
                            <p><?= $setting['alamat'] ?? 'Demo Address 88901 Marmora Road On Mich City, Vietnam' ?></p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h5>Phone</h5>
                            <p><?= $setting['telepon'] ?? '0800-123456' ?> (24/7 Support Line)</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h5>Email</h5>
                            <p><?= $setting['email'] ?? 'info@example.com' ?></p>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                    <p style="font-size: 0.9rem; margin-bottom: 15px;">Get latest news and updates about our campus, programs, and events directly to your email.</p>

                    <div class="newsletter-footer">
                        <form id="newsletterForm2" method="POST" action="<?= base_url('Home/subscribe') ?>">
                            <?= csrf_field() ?>
                            <input type="email" name="email" placeholder="Your Email Id" required>
                            <button type="submit">Subscribe</button>
                        </form>
                        <div id="newsletterMsg2" style="margin-top: 10px; display: none;"></div>
                    </div>

                    <div class="social-icons">
                        <a href="<?= $setting['facebook'] ?? '#' ?>" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?= $setting['google'] ?? '#' ?>" class="google" target="_blank"><i class="fab fa-google"></i></a>
                        <a href="<?= $setting['linkedin'] ?? '#' ?>" class="linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="<?= $setting['instagram'] ?? '#' ?>" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="<?= $setting['twitter'] ?? '#' ?>" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <span>COPYRIGHT © <?= date('Y') ?> <?= strtoupper($setting['nama_kampus'] ?? 'EDUZONE') ?></span>
                <a href="#">ABOUT / HELP DESK / PRIVACY POLICY</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (required for dropdowns and other components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS - Animate On Scroll JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <!-- Scroll Animation Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            const provinsi = document.getElementById("provinsi");
            const kabupaten = document.getElementById("kabupaten");
            const kecamatan = document.getElementById("kecamatan");
            const desa = document.getElementById("desa");

            // Aktifkan Select

            $('#provinsi, #kabupaten, #kecamatan, #desa').select2({});

            // LOAD PROVINSI
            $.getJSON(
                'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                function(data) {
                    $('#provinsi').append('<option value="">Pilih Provinsi</option>');
                    $.each(data, function(i, item) {
                        $('#provinsi').append(
                            `<option value="${item.id}">${item.name}</option>`
                        );
                    });
                }
            );

            // LOAD KABUPATEN
            $('#provinsi').on('change', function() {
                $('#kabupaten').empty().append('<option>Loading...</option>');
                $('#kecamatan').empty();
                $('#desa').empty();

                $.getJSON(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${this.value}.json`,
                    function(data) {
                        $('#kabupaten').empty().append('<option value="">Pilih Kabupaten</option>');
                        $.each(data, function(i, item) {
                            $('#kabupaten').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                );
            });

            // LOAD KECAMATAN
            $('#kabupaten').on('change', function() {
                $('#kecamatan').empty().append('<option>Loading...</option>');
                $('#desa').empty();

                $.getJSON(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${this.value}.json`,
                    function(data) {
                        $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
                        $.each(data, function(i, item) {
                            $('#kecamatan').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                );
            });

            // LOAD DESA
            $('#kecamatan').on('change', function() {
                $('#desa').empty().append('<option>Loading...</option>');

                $.getJSON(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${this.value}.json`,
                    function(data) {
                        $('#desa').empty().append('<option value="">Pilih Desa</option>');
                        $.each(data, function(i, item) {
                            $('#desa').append(
                                `<option value="${item.id}">${item.name}</option>`
                            );
                        });
                    }
                );
            });

        });

        function previewImage(event) {
            const img = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                img.src = URL.createObjectURL(file);
                img.classList.remove('d-none');
            } else {
                img.src = "";
                img.classList.add('d-none');
            }
        }

        // Initialize AOS for scroll animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Navbar scroll effect
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
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

        // Scroll reveal for cards and elements
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease-out forwards';
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all cards and sections
        document.querySelectorAll('.card, .section-full, .welcome-section, .card-dosen').forEach(el => {
            observer.observe(el);
        });
    </script>
    // Handle Newsletter Form Submission
    function handleNewsletterSubmit(formId, msgId) {
    var form = document.getElementById(formId);
    if (!form) return;

    form.addEventListener('submit', function(e) {
    e.preventDefault();

    var formData = new FormData(this);
    var msgDiv = document.getElementById(msgId);

    fetch('<?= base_url('Home/subscribe') ?>', {
    method: 'POST',
    body: formData
    })
    .then(response => response.json())
    .then(data => {
    msgDiv.style.display = 'block';
    if (data.success) {
    msgDiv.innerHTML = '<div class="alert alert-success" role="alert">' + data.message + '</div>';
    form.reset();
    } else {
    msgDiv.innerHTML = '<div class="alert alert-danger" role="alert">' + data.message + '</div>';
    }
    })
    .catch(error => {
    msgDiv.style.display = 'block';
    msgDiv.innerHTML = '<div class="alert alert-danger" role="alert">Error: ' + error + '</div>';
    });
    });
    }

    // Initialize both newsletter forms
    handleNewsletterSubmit('newsletterForm1', 'newsletterMsg1');
    handleNewsletterSubmit('newsletterForm2', 'newsletterMsg2');
    </script>