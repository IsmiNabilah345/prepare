@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="text-center mb-4">Cek Tarif Pengiriman</h2>
  <form method="GET" action="{{ route('search.tariff.result') }}" class="row g-3 justify-content-center" data-aos="fade-up">
    <div class="col-md-4">
      <input type="number" step="0.1" name="weight" class="form-control" placeholder="Berat barang (kg)" required>
    </div>
    <div class="col-md-3">
      <select name="service" class="form-select">
        <option value="darat">Darat</option>
        <option value="laut">Laut</option>
        <option value="udara">Udara</option>
      </select>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Cari Tarif</button>
    </div>
  </form>
</div>
@endsection
