@extends('layouts.app')

@section('title', 'FAQ')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-question-circle"></i> Frequently Asked Questions (FAQ)</h1>
        <p class="lead mb-0">Temukan jawaban atas pertanyaan umum seputar layanan Yulis Cargo.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="accordion" id="faqAccordion">
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-peach text-navy">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button bg-peach text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        <i class="fas fa-search me-2 text-orange"></i> Bagaimana cara melacak paket saya?
                    </button>
                </h2>
            </div>
            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Anda dapat melacak paket dengan memasukkan nomor resi pada halaman <a href="{{ route('trace-track') }}">Trace & Track</a>.
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-peach text-navy">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed bg-peach text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        <i class="fas fa-money-bill-wave me-2 text-orange"></i> Bagaimana cara mengetahui tarif pengiriman?
                    </button>
                </h2>
            </div>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Silakan gunakan halaman <a href="{{ route('shipping-rates') }}">Cek Tarif</a> untuk mengetahui tarif pengiriman sesuai kota tujuan dan jenis layanan.
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-peach text-navy">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed bg-peach text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        <i class="fas fa-shipping-fast me-2 text-orange"></i> Apa saja jenis layanan pengiriman yang tersedia?
                    </button>
                </h2>
            </div>
            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Kami menyediakan layanan Reguler, Express, dan Same Day sesuai kebutuhan pengiriman Anda.
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-peach text-navy">
                <h2 class="accordion-header" id="faq4">
                    <button class="accordion-button collapsed bg-peach text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        <i class="fas fa-map-marker-alt me-2 text-orange"></i> Bagaimana cara menemukan drop point terdekat?
                    </button>
                </h2>
            </div>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Anda dapat mencari lokasi drop point terdekat melalui halaman <a href="{{ route('drop-point') }}">Drop Point</a>.
                </div>
            </div>
        </div>
        <div class="card border-0 shadow-sm mb-3">
            <div class="card-header bg-peach text-navy">
                <h2 class="accordion-header" id="faq5">
                    <button class="accordion-button collapsed bg-peach text-navy" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <i class="fas fa-exclamation-circle me-2 text-orange"></i> Bagaimana jika paket saya rusak atau hilang?
                    </button>
                </h2>
            </div>
            <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Silakan hubungi customer service kami untuk klaim dan bantuan lebih lanjut.
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