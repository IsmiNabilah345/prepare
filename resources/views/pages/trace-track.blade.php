@extends('layouts.app')

@section('title', 'Trace & Track')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-search-location"></i> Trace & Track</h1>
        <p class="lead mb-0">Lacak status pengiriman paket Anda dengan mudah dan cepat.</p>
    </div>
</div>
<div class="container pb-5">
    <form method="GET" action="" class="mb-4">
        <div class="row justify-content-center g-2">
            <div class="col-md-6">
                <label for="resi" class="form-label fw-bold">Nomor Resi</label>
                <div class="input-group">
                    <span class="input-group-text bg-orange text-white"><i class="fas fa-barcode"></i></span>
                    <input type="text" name="resi" id="resi" class="form-control" placeholder="Masukkan Nomor Resi" value="{{ request('resi') }}" required>
                </div>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-orange w-100"><i class="fas fa-search"></i> Cek Status</button>
            </div>
        </div>
    </form>
    @php

    $resi = request('resi');

    $order = null;

    if ($resi) {

        //$order = \App\Models\Pengiriman::where('no_resi', $resi)->first();
        $order = \App\Models\Pengiriman::with('kurir')->where('no_resi', $resi)->first();

    }

    @endphp
    @if($resi)
        @if($order)
            <div class="card shadow border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-orange mb-3"><i class="fas fa-truck-moving"></i> Status Pengiriman</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><i class="fas fa-barcode text-orange me-2"></i><strong>Nomor Resi:</strong> {{ $order->no_resi }}</li>
                        <li class="list-group-item"><i class="fas fa-user text-orange me-2"></i><strong>Nama Kurir:</strong> {{ $order->kurir->name ?? '-'  }}</li>
                        <li class="list-group-item"><i class="fas fa-phone text-orange me-2"></i><strong>No Telephon Kurir:</strong> {{ $order->kurir->no_telp ?? '-'  }}</li>
                        <li class="list-group-item"><i class="fas fa-info-circle text-orange me-2"></i><strong>Status:</strong> {{ $order->status }}</li>
                        <li class="list-group-item"><i class="fas fa-clock text-orange me-2"></i><strong>Update Terakhir:</strong> {{ $order->updated_at->format('d-m-Y H:i') }}</li>
                        <li class="list-group-item"><i class="fas fa-clock text-orange me-2"></i><strong>Catatan:</strong> {{ $order->catatan }}</li>
                    </ul>
                </div>
            </div>
        @else
            <div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>Nomor resi tidak ditemukan.</div>
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