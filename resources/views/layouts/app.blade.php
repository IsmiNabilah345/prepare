<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>@yield('title','Yulis Cargo')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

  <!-- AOS Animation CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

  <link rel="icon" href="images/logo.png" type="image/x-icon"/>
  <style>
    :root {
      --clr-dark-navy: #1B3A57;
      --clr-mid-blue:  #729DC3;
      --clr-orange:    #E1652C;
      --clr-peach:     #ECB19E;
      --clr-lilac:     #E3DCEA;
      --clr-white:     #FFFFFF;
    }

    body { scroll-behavior: smooth; }

    /* Navbar */
    .navbar {
      background-color: var(--clr-dark-navy) !important;
      z-index: 1100 !important;
      position: sticky;
      top: 0;
    }
    .navbar .nav-link,
    .navbar .navbar-brand {
      color: var(--clr-white) !important;
    }
    .navbar .nav-link:hover,
    .navbar .nav-link.active {
      color: var(--clr-orange) !important;
    }

    /* CTA Bar */
    #cta-bar {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      min-height: 64px;
      padding: 12px 1rem;
      background-color: var(--clr-orange);
      color: var(--clr-white);
      position: fixed;
      top: 56px;
      left: 0;
      width: 100%;
      z-index: 1040;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      transition: top 0.3s;
    }
    #cta-bar .btn {
      margin-left: 0.5rem;
    }
    body.cta-active main {
      margin-top: 48px;
    }
    #cta-bar .btn {
      transform: scale(1);
      transition: transform .2s;
    }
    #cta-bar .btn:hover {
      transform: scale(1.05);
    }

    /* Hero */
    .hero {
      background: linear-gradient(
          to bottom right,
          rgba(27,58,87,0.8),
          rgba(225,101,44,0.8)
        ),
        url('/images/hero-bg.jpg') center/cover no-repeat;
      min-height: 80vh;
      display: flex;
      align-items: center;
      text-align: center;
    }
    .hero h1,
    .hero p {
      color: var(--clr-white);
    }
    .hero .btn {
      transition: transform .2s;
    }
    .hero .btn:hover {
      transform: scale(1.05);
    }

    /* Services */
    .bg-services {
      background-color: var(--clr-lilac) !important;
    }
    .service-card {
      background-color: var(--clr-white);
      transition: transform .3s, box-shadow .3s;
    }
    .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .service-card h5 { color: var(--clr-dark-navy); }
    .service-card p  { color: var(--clr-mid-blue); }

    /* Dropdown on hover */
    .navbar .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
      opacity: 1;
      transition: opacity .3s;
    }
    .dropdown-menu {
      opacity: 0;
      z-index: 1200 !important;
    }

    /* Footer */
    footer {
      background-color: var(--clr-dark-navy);
      color: var(--clr-white);
    }
    footer a { color: var(--clr-peach); }
    footer a:hover { color: var(--clr-mid-blue); }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <i class="fas fa-box-open"></i> Yulis Cargo
      </a>
      <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse" data-bs-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto align-items-center">
          <!-- Order -->
          <li class="nav-item dropdown mx-2">
            {{-- <a class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown">
              <i class="fas fa-shopping-cart"></i> Order
            </a> --}}
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Pick Up</a></li>
              <li><a class="dropdown-item" href="#">Drop Off</a></li>
            </ul>
          </li>
          <!-- Search -->
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown">
              <i class="fas fa-search"></i> Pencarian
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('trace-track') }}">Trace & Track</a></li>
              <li><a class="dropdown-item" href="{{ route('shipping-rates') }}">Shipping Rates</a></li>
              <li><a class="dropdown-item" href="{{ route('drop-point') }}">Find Drop Point</a></li>
            </ul>
          </li>
          <!-- Layanan -->
          <li class="nav-item mx-2">
            <a class="nav-link" href="{{ route('layanan') }}"><i class="fas fa-truck"></i> Layanan</a>
          </li>
          <!-- Information -->
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown">
              <i class="fas fa-info-circle"></i> Informasi
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('faq') }}">FAQ</a></li>
              <li><a class="dropdown-item" href="{{ route('packaging-info') }}">Packaging Information</a></li>
              <li><a class="dropdown-item" href="{{ route('terms') }}">Terms</a></li>
            </ul>
          </li>
          <!-- About Us -->
          <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown">
              <i class="fas fa-users"></i> Tentang Kami
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('company-profile') }}">Company Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('contact-us') }}">Contact Us</a></li>
            </ul>
          <!-- LogIn -->
          {{-- <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('login') }}">
                  <i class="fa-solid fa-right-to-bracket"></i> Log In
              </a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>

  <!-- Sticky CTA Bar -->
  <div id="cta-bar" class="text-center py-2">
    <span class="fw-bold me-3">Siap Kirim Barangmu Sekarang?</span>
    <a href="{{ route('order.form') }}" class="btn btn-light btn-sm">Buat Order</a>
  </div>

  <!-- Main Content -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="py-5" style="background-color: var(--clr-dark-navy); color: var(--clr-white);">
    <div class="container">
        <div class="row g-4 d-flex align-items-start">
            <!-- Kontak -->
            <div class="col-md-4 d-flex flex-column align-items-start">
                <h6 class="fw-bold mb-3">Kontak Kami</h6>
                <p class="mb-1">Jl. Soekarno-Hatta No.187 b, Babakan Ciparay,<br>
                Kec. Babakan Ciparay, Kota Bandung, Jawa Barat 40223<br>
                0852-9478-7674</p>
            </div>
            <!-- Link Cepat -->
            <div class="col-md-4 d-flex flex-column align-items-center">
                <h6 class="fw-bold mb-3">Link Cepat</h6>
                <ul class="list-unstyled text-center mb-0">
                    <li><a href="{{ route('trace-track') }}" class="footer-link">Lacak Paket</a></li>
                    <li><a href="{{ route('shipping-rates') }}" class="footer-link">Cek Tarif</a></li>
                    <li><a href="{{ route('faq') }}" class="footer-link">FAQ</a></li>
                    <li><a href="{{ route('packaging-info') }}" class="footer-link">Packaging Info</a></li>
                    <li><a href="{{ route('terms') }}" class="footer-link">Terms</a></li>
                </ul>
            </div>
            <!-- Sosial -->
            <div class="col-md-4 d-flex flex-column align-items-end">
                <h6 class="fw-bold mb-3">Ikuti Kami</h6>
                <div>
                    <a href="#" class="me-2 footer-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="me-2 footer-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="footer-link"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-light my-4">
        <p class="text-center small mb-0">&copy; {{ date('Y') }} Yulis Cargo</p>
    </div>
    <style>
        .footer-link {
            color: var(--clr-peach);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-link:hover {
            color: var(--clr-orange);
            text-decoration: underline;
        }
        footer ul {
            padding-left: 0;
        }
        footer ul li {
            margin-bottom: 0.3rem;
        }
        @media (max-width: 767px) {
            .footer-link, .fw-bold {
                text-align: left !important;
            }
            .col-md-4.d-flex {
                align-items: flex-start !important;
            }
        }
    </style>
</footer>

  <!-- Bootstrap JS + AOS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({ duration: 800, once: true });
    // Sticky CTA
    const ctaBar = document.getElementById('cta-bar');
    function updateCtaBar() {
      if (window.scrollY > 200) {
        ctaBar.style.display = 'flex';
        document.body.classList.add('cta-active');
      } else {
        ctaBar.style.display = 'none';
        document.body.classList.remove('cta-active');
      }
    }
    window.addEventListener('scroll', updateCtaBar);
    window.addEventListener('DOMContentLoaded', updateCtaBar);
  </script>
</body>
</html>
