<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduZone - Platform Edukasi</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            transition: color 0.3s;
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
            transition: width 0.3s;
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
        }

        /* Newsletter Section */
        .newsletter-section {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: white;
            padding: 60px 0;
            margin: 40px 0;
        }

        .newsletter-section h2 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 15px;
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
            transition: background-color 0.3s;
        }

        .newsletter-form button:hover {
            background-color: #333;
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
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
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
                            <i class="fas fa-phone"></i> +00 886 6668811
                        </div>
                        <div>
                            <i class="fas fa-map-marker-alt"></i> 1073 W Stephen Ave, Clawson
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-right">
                        <div>
                            <i class="fas fa-clock"></i> Mon - Sat 8:00 - 18:00
                        </div>
                        <div style="margin-top: 5px;">
                            <i class="fas fa-envelope"></i> info@example.com
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-cube" style="color: #28a745;"></i> <strong>EduZone</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown">
                            PROFILE
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Tentang Kami</a></li>
                            <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
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
                            <li><a class="dropdown-item" href="#">Informatika</a></li>
                            <li><a class="dropdown-item" href="#">Sistem Informasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown">
                            INFORMASI
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="informasiDropdown">
                            <li><a class="dropdown-item" href="#">Berita</a></li>
                            <li><a class="dropdown-item" href="#">Pengumuman</a></li>
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
                            <li><a class="dropdown-item" href="#">Portal Akademik</a></li>
                            <li><a class="dropdown-item" href="#">E-Learning</a></li>
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

    <!-- Newsletter Section -->
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Subscribe To Our Newsletter</h2>
                    <p>There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form, by injected humour, or randomised words.</p>
                </div>
                <div class="col-lg-6">
                    <h3 style="margin-bottom: 15px;">Your Email Address</h3>
                    <form class="newsletter-form">
                        <input type="email" placeholder="Your Email Address" required>
                        <button type="submit">Subscribe</button>
                    </form>
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
                        <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Our Services</a></li>
                    </ul>
                </div>

                <!-- Useful Links Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>USEFUL LINK</h4>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Create Account</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Company Philosophy</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Corporate Culture</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Portfolio</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Client Management</a></li>
                    </ul>
                </div>

                <!-- Contact Us Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>CONTACT US</h4>
                    
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h5>Address</h5>
                            <p>Demo Address 88901 Marmora Road On Mich City, Vietnam</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h5>Phone</h5>
                            <p>0800-123456 (24/7 Support Line)</p>
                        </div>
                    </div>

                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h5>Email</h5>
                            <p>info@example.com</p>
                        </div>
                    </div>
                </div>

                <!-- Newsletter Column -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4>SUBSCRIBE TO OUR NEWSLETTER</h4>
                    <p style="font-size: 0.9rem; margin-bottom: 15px;">Lorem Ipsum is Simply Dummy Text Of The Printing And Typesetting Industry Has Been The Industry's Standard Dummy Text Ever Since The...</p>
                    
                    <div class="newsletter-footer">
                        <input type="email" placeholder="Your Email Id">
                        <button>Subscribe</button>
                    </div>

                    <div class="social-icons">
                        <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="google"><i class="fab fa-google"></i></a>
                        <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <span>COPYRIGHT © 2020 EDUZONEZONE</span>
                <a href="#">ABOUT / HELP DESK / PRIVACY POLICY</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
