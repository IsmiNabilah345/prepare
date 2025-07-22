@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-truck"></i> Layanan Pengiriman</h1>
        <p class="lead mb-0">Solusi pengiriman cepat, aman, dan terpercaya ke seluruh Indonesia.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card h-100 shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-2x mb-3 text-orange"></i>
                    <h5 class="card-title text-navy">Reguler</h5>
                    <p class="card-text">Hemat, estimasi 2-5 hari kerja. Cocok untuk pengiriman non-prioritas ke seluruh Indonesia.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-bolt fa-2x mb-3 text-orange"></i>
                    <h5 class="card-title text-navy">Express</h5>
                    <p class="card-text">Cepat, estimasi 1-2 hari kerja. Prioritas penanganan dan pengiriman.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow border-0">
                <div class="card-body text-center">
                    <i class="fas fa-clock fa-2x mb-3 text-orange"></i>
                    <h5 class="card-title text-navy">Same Day</h5>
                    <p class="card-text">Super cepat, sampai di hari yang sama (area tertentu).</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card h-100 border-0 bg-peach text-navy shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold"><i class="fas fa-road"></i> Darat</h6>
                    <p>Armada truk, mobil box, motor untuk antarkota/dalam kota.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 bg-peach text-navy shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold"><i class="fas fa-ship"></i> Laut</h6>
                    <p>Volume besar dan antar pulau dengan kapal laut.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 bg-peach text-navy shadow-sm">
                <div class="card-body">
                    <h6 class="fw-bold"><i class="fas fa-plane"></i> Udara</h6>
                    <p>Prioritas tinggi dan super cepat dengan pesawat.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <h4 class="mb-3 text-orange"><i class="fas fa-star"></i> Keunggulan Layanan Kami</h4>
        <ul class="list-unstyled mb-0">
            <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Jemput paket ke lokasi Anda (pickup service).</li>
            <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Tracking real-time dan notifikasi status pengiriman.</li>
            <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Jaringan drop point luas di seluruh Indonesia.</li>
            <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Layanan customer service responsif.</li>
        </ul>
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .text-navy { color: #1B3A57 !important; }
    .bg-peach { background-color: #ECB19E !important; }
</style>
@endsection