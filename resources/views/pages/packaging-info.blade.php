@extends('layouts.app')

@section('title', 'Packaging Information')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-box-open"></i> Informasi Pengemasan</h1>
        <p class="lead mb-0">Tips pengemasan paket yang aman dan sesuai standar ekspedisi.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <ul class="list-unstyled mb-0">
                <li class="mb-3"><i class="fas fa-cube text-orange me-2"></i><strong>Gunakan Kardus atau Box yang Kuat:</strong> Pastikan kardus/box tidak mudah penyok dan sesuai ukuran barang.</li>
                <li class="mb-3"><i class="fas fa-layer-group text-orange me-2"></i><strong>Bungkus Barang dengan Bubble Wrap:</strong> Untuk barang pecah belah atau elektronik, gunakan bubble wrap atau pelindung tambahan.</li>
                <li class="mb-3"><i class="fas fa-tape text-orange me-2"></i><strong>Segel Paket dengan Rapat:</strong> Gunakan lakban tebal untuk menutup semua sisi paket.</li>
                <li class="mb-3"><i class="fas fa-address-card text-orange me-2"></i><strong>Cantumkan Label Alamat dengan Jelas:</strong> Tulis alamat pengirim dan penerima dengan jelas dan lengkap.</li>
                <li class="mb-3"><i class="fas fa-ban text-orange me-2"></i><strong>Hindari Mengirim Barang Terlarang:</strong> Pastikan isi paket tidak melanggar aturan pengiriman (misal: cairan mudah terbakar, narkotika, dsb).</li>
            </ul>
            <p class="mt-3">Jika butuh bantuan pengemasan, silakan konsultasikan ke petugas drop point kami.</p>
        </div>
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .text-navy { color: #1B3A57 !important; }
</style>
@endsection 