@extends('layouts.app')

@section('title', 'Company Profile')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-building"></i> Profil Perusahaan</h1>
        <p class="lead mb-0">Tentang Yulis Cargo, ekspedisi terpercaya untuk seluruh Indonesia.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="text-orange mb-3"><i class="fas fa-bullseye"></i> Visi</h4>
                    <p>Menjadi perusahaan ekspedisi terdepan dan terpercaya di Indonesia dengan layanan inovatif dan jaringan terluas.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h4 class="text-orange mb-3"><i class="fas fa-rocket"></i> Misi</h4>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Memberikan solusi pengiriman yang efisien, aman, dan terjangkau.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Mengutamakan kepuasan pelanggan melalui layanan prima.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Mengembangkan jaringan drop point dan armada di seluruh Indonesia.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Mendukung pertumbuhan UMKM dan bisnis lokal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card border-0 bg-peach text-navy shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3"><i class="fas fa-gem"></i> Nilai Perusahaan</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-star text-orange me-2"></i>Integritas dan kejujuran dalam setiap layanan.</li>
                        <li class="mb-2"><i class="fas fa-star text-orange me-2"></i>Inovasi berkelanjutan untuk kemudahan pelanggan.</li>
                        <li class="mb-2"><i class="fas fa-star text-orange me-2"></i>Kerja sama tim dan profesionalisme.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 bg-peach text-navy shadow-sm h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3"><i class="fas fa-network-wired"></i> Jaringan & Cabang</h5>
                    <p>Kami memiliki puluhan drop point dan mitra di berbagai kota besar di Indonesia, serta armada darat, laut, dan udara yang siap melayani pengiriman Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .text-navy { color: #1B3A57 !important; }
    .bg-peach { background-color: #ECB19E !important; }
</style>
@endsection 