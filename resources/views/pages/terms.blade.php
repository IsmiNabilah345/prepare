@extends('layouts.app')

@section('title', 'Syarat & Ketentuan')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-file-contract"></i> Syarat & Ketentuan Pengiriman</h1>
        <p class="lead mb-0">Harap baca dan pahami syarat & ketentuan sebelum menggunakan layanan kami.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <ol class="mb-0">
                <li class="mb-2"><i class="fas fa-check-circle text-orange me-2"></i>Pengirim wajib mengisi data pengiriman dengan benar dan lengkap.</li>
                <li class="mb-2"><i class="fas fa-ban text-orange me-2"></i>Paket yang dikirim tidak mengandung barang terlarang sesuai hukum yang berlaku.</li>
                <li class="mb-2"><i class="fas fa-exclamation-triangle text-orange me-2"></i>Barang yang mudah pecah atau rusak wajib dikemas dengan baik dan aman.</li>
                <li class="mb-2"><i class="fas fa-box-open text-orange me-2"></i>Yulis Cargo tidak bertanggung jawab atas kerusakan akibat pengemasan yang tidak sesuai standar.</li>
                <li class="mb-2"><i class="fas fa-shield-alt text-orange me-2"></i>Pengiriman dapat ditolak jika paket tidak memenuhi syarat keamanan dan regulasi.</li>
                <li class="mb-2"><i class="fas fa-clock text-orange me-2"></i>Klaim kehilangan atau kerusakan harus dilakukan maksimal 3x24 jam setelah barang diterima.</li>
                <li class="mb-2"><i class="fas fa-balance-scale text-orange me-2"></i>Biaya pengiriman dihitung berdasarkan berat aktual atau volume, mana yang lebih besar.</li>
                <li class="mb-2"><i class="fas fa-thumbs-up text-orange me-2"></i>Dengan menggunakan layanan kami, pengirim dianggap telah menyetujui seluruh syarat & ketentuan ini.</li>
            </ol>
            <p class="mt-3">Untuk informasi lebih lanjut, silakan hubungi customer service kami.</p>
        </div>
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .text-navy { color: #1B3A57 !important; }
</style>
@endsection 