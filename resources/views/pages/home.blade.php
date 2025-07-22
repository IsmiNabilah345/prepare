@extends('layouts.app')

@section('content')
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="z-index:2000; position:fixed; top:80px; right:24px; min-width:300px;">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
  <!-- Hero -->
  <section class="hero">
    <div class="container" data-aos="zoom-in">
      <h1 class="display-3 fw-bold">Yulis Cargo</h1>
      <p class="lead mb-4">
        Ekspedisi Cepat & Terpercaya via 
        <strong>Darat</strong>, <strong>Laut</strong>, & <strong>Udara</strong>.
      </p>
      <a href="{{ route('trace-track') }}" class="btn btn-primary btn-lg mx-1">
        <i class="fas fa-box-open"></i> Lacak Paket
      </a>
      <a href="{{ route('shipping-rates') }}" class="btn btn-outline-light btn-lg mx-1">
        <i class="fas fa-calculator"></i> Cek Tarif
      </a>
    </div>
  </section>

  <!-- Services -->
  <section class="py-5 bg-services">
    <div class="container">
      <h2 class="text-center mb-5" data-aos="fade-up">Layanan Kami</h2>
      <div class="row g-4">
        <!-- Darat -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
          <div class="card service-card h-100 text-center p-4">
            <i class="fas fa-truck fa-2x mb-3" style="color:var(--clr-orange)"></i>
            <h5>Darat</h5>
            <p>Hemat & cepat antarkota</p>
          </div>
        </div>
        <!-- Laut -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="card service-card h-100 text-center p-4">
            <i class="fas fa-ship fa-2x mb-3" style="color:var(--clr-orange)"></i>
            <h5>Laut</h5>
            <p>Volume besar antar pulau</p>
          </div>
        </div>
        <!-- Udara -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
          <div class="card service-card h-100 text-center p-4">
            <i class="fas fa-plane fa-2x mb-3" style="color:var(--clr-orange)"></i>
            <h5>Udara</h5>
            <p>Super cepat prioritas tinggi</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Feature Highlights -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center mb-4" data-aos="fade-up">Kenapa Pilih Kami?</h2>
      <div class="row text-center g-4">
        <div class="col-sm-6 col-lg-3" data-aos="zoom-in">
          <i class="fas fa-shield-alt fa-2x mb-2" style="color:var(--clr-mid-blue)"></i>
          <h6>Aman & Terlacak</h6>
          <p class="small text-muted">Lacak real-time lewat SMS/Email.</p>
        </div>
        <div class="col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="100">
          <i class="fas fa-dollar-sign fa-2x mb-2" style="color:var(--clr-mid-blue)"></i>
          <h6>Harga Transparan</h6>
          <p class="small text-muted">Tanpa biaya tersembunyi.</p>
        </div>
        <div class="col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="200">
          <i class="fas fa-clock fa-2x mb-2" style="color:var(--clr-mid-blue)"></i>
          <h6>Jemput Cepat</h6>
          <p class="small text-muted">Pickup dalam 24 jam setelah order.</p>
        </div>
        <div class="col-sm-6 col-lg-3" data-aos="zoom-in" data-aos-delay="300">
          <i class="fas fa-thumbs-up fa-2x mb-2" style="color:var(--clr-mid-blue)"></i>
          <h6>Dijamin Puas</h6>
          <p class="small text-muted">Refund atau kirim ulang jika bermasalah.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Carousel -->
  {{-- <section class="py-5" style="background-color:var(--clr-lilac);">
    <div class="container">
      <h2 class="text-center mb-4" data-aos="fade-up" style="color:var(--clr-dark-navy)">
        Apa Kata Mereka
      </h2>
  
      <div class="row justify-content-center">
        <div class="col-md-8" data-aos="fade-up" data-aos-delay="200">
          <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner text-center">
              <div class="carousel-item active">
                <p class="fs-5 fst-italic text-dark">“Pengiriman super cepat dan aman!”</p>
                <strong class="d-block mt-3 text-primary">Andi, Jakarta</strong>
              </div>
              <div class="carousel-item">
                <p class="fs-5 fst-italic text-dark">“Harga transparan, stafnya sangat membantu.”</p>
                <strong class="d-block mt-3 text-primary">Sari, Surabaya</strong>
              </div>
              <div class="carousel-item">
                <p class="fs-5 fst-italic text-dark">“Tracking real-time bikin tenang!”</p>
                <strong class="d-block mt-3 text-primary">Budi, Medan</strong>
              </div>
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- <section class="py-5" style="background-color:var(--clr-lilac);">
    <div class="container">
      <h2 class="text-center mb-4" data-aos="fade-up" style="color:var(--clr-dark-navy)">
        Lacak Paket
      </h2>
      <form class="row justify-content-center g-2">
        <div class="col-sm-6">
          <input type="name" class="form-control" placeholder="Masukkan nomor resi mu" required>
        </div>
        <div class="col-sm-auto">
          <button class="btn btn-light">Cari</button>
        </div>
      </form>
    </div>
  </section> --}}

  <!-- Newsletter -->
  {{-- <section class="py-5 text-white text-center" style="background-color:var(--clr-mid-blue);">
    <div class="container" data-aos="zoom-in">
      <h2 class="mb-3">Cek Tarif</h2>
    </div>
  </section> --}}

  <!-- Trust Badges -->
  {{-- <section class="py-4">
    <div class="container text-center">
      <p class="mb-3">Dipercaya oleh:</p>
      <img src="/images/logo1.png" class="mx-3" height="40" alt="Partner 1">
      <img src="/images/logo2.png" class="mx-3" height="40" alt="Partner 2">
      <img src="/images/logo3.png" class="mx-3" height="40" alt="Partner 3">
    </div>
  </section> --}}
@endsection
