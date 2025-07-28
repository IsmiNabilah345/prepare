@extends('layouts.app')

@section('title', 'Drop Point')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-map-marker-alt"></i> Daftar Drop Point</h1>
        <p class="lead mb-0">Temukan lokasi drop point Yulis Cargo terdekat di kota Anda.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="mb-4">
        <form method="GET" action="">
            <div class="row justify-content-center g-2">
                <div class="col-md-6">
                    <label for="q" class="form-label fw-bold">Cari Drop Point</label>
                    <div class="input-group">
                        <span class="input-group-text bg-orange text-white"><i class="fas fa-search"></i></span>
                        <input type="text" name="q" id="q" class="form-control" placeholder="Cari nama/kota/alamat..." value="{{ request('q') }}">
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-orange w-100"><i class="fas fa-search-location"></i> Cari</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @php
            $query = request('q');
            $dropPoints = \App\Models\DropPoint::query();
            if ($query) {
                $dropPoints->where(function($q) use ($query) {
                    $q->where('nama', 'like', "%$query%")
                      ->orWhere('alamat', 'like', "%$query%")
                      ->orWhere('kota', 'like', "%$query%")
                      ->orWhere('telepon', 'like', "%$query%")
                      ->orWhere('jam_buka', 'like', "%$query%") ;
                });
            }
            $dropPoints = $dropPoints->orderBy('nama')->get();
        @endphp
        @forelse($dropPoints as $dp)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow border-0">
                    <div class="card-body">
                        <h5 class="card-title text-orange"><i class="fas fa-map-marker-alt me-2"></i>{{ $dp->nama }}</h5>
                        <div class="mb-2"><i class="fas fa-map-pin text-orange me-2"></i><strong>Alamat:</strong> {{ $dp->alamat }}</div>
                        <div class="mb-2"><i class="fas fa-city text-orange me-2"></i><strong>Kota:</strong> {{ $dp->kota }}</div>
                        <div class="mb-2"><i class="fas fa-phone-alt text-orange me-2"></i><strong>Telepon:</strong> {{ $dp->telepon ?? '-' }}</div>
                        <div class="mb-2"><i class="fas fa-clock text-orange me-2"></i><strong>Jam Buka:</strong> {{ $dp->jam_buka ?? '-' }}</div>
                        @if($dp->latitude && $dp->longitude)
                            <div class="mb-2">
                                <a href="https://maps.google.com/?q={{ $dp->latitude }},{{ $dp->longitude }}" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fas fa-map"></i> Lihat di Maps</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning"><i class="fas fa-exclamation-triangle me-2"></i>Akan dikembangkan di proyek 2.</div>
            </div>
        @endforelse
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .btn-orange { background-color: #E1652C; color: #fff; border: none; }
    .btn-orange:hover { background-color: #d35400; color: #fff; }
</style>
@endsection 