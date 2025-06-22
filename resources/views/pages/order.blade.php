@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h2 class="mb-4 text-center">Form Pemesanan</h2>
  <form method="POST" action="{{ route('orders.store') }}" class="row g-4" data-aos="fade-up">
    @csrf
    <div class="col-md-6">
      <label>Nama Customer</label>
      <input type="text" name="customer_name" class="form-control" required>
    </div>
    <div class="col-md-6">
      <label>Email</label>
      <input type="email" name="customer_email" class="form-control" required>
    </div>

    <div class="col-12">
      <label>Alamat Pickup</label>
      <input type="text" name="pickup_address" class="form-control" required>
    </div>
    <div class="col-12">
      <label>Alamat Tujuan (Drop-off)</label>
      <input type="text" name="dropoff_address" class="form-control" required>
    </div>

    <div class="col-md-4">
      <label>Berat Barang (kg)</label>
      <input type="number" step="0.1" name="weight" class="form-control" required>
    </div>
    <div class="col-md-4">
      <label>Layanan</label>
      <select name="service" class="form-select">
        <option value="darat">Darat</option>
        <option value="laut">Laut</option>
        <option value="udara">Udara</option>
      </select>
    </div>

    <div class="col-12 text-end">
      <button class="btn btn-success px-4">Submit Order</button>
    </div>
  </form>
</div>
@endsection
