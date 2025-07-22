@extends('layouts.app')

@section('title', 'Shipping Rates')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-money-check-alt"></i> Cek Tarif Pengiriman</h1>
        <p class="lead mb-0">Hitung estimasi biaya pengiriman paket Anda dengan mudah.</p>
    </div>
</div>
<div class="container pb-5">
    <form method="GET" action="" class="mb-4">
        <div class="row g-3 justify-content-center align-items-end">
            <div class="col-md-3">
                <label for="asal" class="form-label fw-bold">Kota Asal</label>
                <div class="input-group">
                    <span class="input-group-text bg-orange text-white"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" id="asal" name="asal" class="form-control" placeholder="Kota Asal" value="{{ request('asal') }}" required>
                </div>
            </div>
            <div class="col-md-3">
                <label for="tujuan" class="form-label fw-bold">Kota Tujuan</label>
                <div class="input-group">
                    <span class="input-group-text bg-orange text-white"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Kota Tujuan" value="{{ request('tujuan') }}" required>
                </div>
            </div>
            <div class="col-md-2">
                <label for="berat" class="form-label fw-bold">Berat (kg)</label>
                <div class="input-group">
                    <span class="input-group-text bg-orange text-white"><i class="fas fa-weight-hanging"></i></span>
                    <input type="number" id="berat" name="berat" class="form-control" placeholder="Berat (kg)" min="1" value="{{ request('berat', 1) }}" required>
                </div>
            </div>
            <div class="col-md-2">
                <label for="jenis" class="form-label fw-bold">Jenis Pengiriman</label>
                <div class="input-group">
                    <span class="input-group-text bg-orange text-white"><i class="fas fa-shipping-fast"></i></span>
                    <select id="jenis" name="jenis" class="form-control" required>
                        <option value="reguler" @if(request('jenis')=='reguler') selected @endif>Reguler</option>
                        <option value="express" @if(request('jenis')=='express') selected @endif>Express</option>
                        <option value="same day" @if(request('jenis')=='same day') selected @endif>Same Day</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-orange w-100"><i class="fas fa-calculator"></i> Cek Tarif</button>
            </div>
        </div>
    </form>
    @php
        $tarif = null;
        $harga = null;
        if(request('asal') && request('tujuan') && request('berat') && request('jenis')) {
            $jenis = strtolower(request('jenis'));
            $berat = max(1, (int)request('berat'));
            $tarif = \App\Models\Tarif::where('jenis', $jenis)->first();
            if($tarif) {
                $harga = (int) $tarif->harga * $berat;
            }
        }
    @endphp
    @if(request()->has(['asal','tujuan','berat','jenis']))
        @if($tarif)
            <div class="card shadow border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-orange mb-3"><i class="fas fa-money-bill-wave"></i> Tarif Pengiriman</h5>
                    <p class="mb-2"><i class="fas fa-map-marker-alt text-orange me-2"></i>Dari <b>{{ request('asal') }}</b> ke <b>{{ request('tujuan') }}</b></p>
                    <p class="mb-2"><i class="fas fa-shipping-fast text-orange me-2"></i>Layanan: <b>{{ ucfirst(request('jenis')) }}</b></p>
                    <p class="mb-2"><i class="fas fa-weight-hanging text-orange me-2"></i>Berat: <b>{{ request('berat') }} kg</b></p>
                    <p class="fs-4 fw-bold mb-0"><i class="fas fa-money-bill text-orange me-2"></i>Rp{{ number_format($harga,0,',','.') }}</p>
                </div>
            </div>
        @else
            <div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>Tarif tidak ditemukan untuk layanan yang dipilih.</div>
        @endif
    @endif
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .btn-orange { background-color: #E1652C; color: #fff; border: none; }
    .btn-orange:hover { background-color: #d35400; color: #fff; }
</style>
@endsection 