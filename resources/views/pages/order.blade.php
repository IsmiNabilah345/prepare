@extends('layouts.app')

@section('title', 'Buat Order Pengiriman')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-clipboard-list"></i> Buat Order Pengiriman</h1>
        <p class="lead mb-0">Isi data pengiriman dengan lengkap dan benar.</p>
    </div>
</div>
<div class="container pb-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('order.submit') }}" class="card shadow border-0 p-4">
        @csrf
        <h5 class="text-orange mb-3"><i class="fas fa-user"></i> Data Pengirim</h5>
        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <label class="form-label">Nama Pengirim</label>
                <input type="text" name="nama_pengirim" class="form-control" required value="{{ old('nama_pengirim') }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Telepon Pengirim</label>
                <input type="text" name="telp_pengirim" class="form-control" required value="{{ old('telp_pengirim') }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Alamat Pengirim</label>
                <input type="text" name="alamat_pengirim" class="form-control" required value="{{ old('alamat_pengirim') }}">
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label">Kota Pengirim</label>
                <input type="text" name="kota_pengirim" class="form-control" required value="{{ old('kota_pengirim') }}">
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label">Kode Pos Pengirim</label>
                <input type="text" name="kode_pos_pengirim" class="form-control" required value="{{ old('kode_pos_pengirim') }}">
            </div>
        </div>
        <h5 class="text-orange mb-3 mt-4"><i class="fas fa-user"></i> Data Penerima</h5>
        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <label class="form-label">Nama Penerima</label>
                <input type="text" name="nama_penerima" class="form-control" required value="{{ old('nama_penerima') }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Telepon Penerima</label>
                <input type="text" name="telp_penerima" class="form-control" required value="{{ old('telp_penerima') }}">
            </div>
            <div class="col-md-6 mb-2">
                <label class="form-label">Alamat Penerima</label>
                <input type="text" name="alamat_penerima" class="form-control" required value="{{ old('alamat_penerima') }}">
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label">Kota Penerima</label>
                <input type="text" name="kota_penerima" class="form-control" required value="{{ old('kota_penerima') }}">
            </div>
            <div class="col-md-3 mb-2">
                <label class="form-label">Kode Pos Penerima</label>
                <input type="text" name="kode_pos_penerima" class="form-control" required value="{{ old('kode_pos_penerima') }}">
            </div>
        </div>
        <h5 class="text-orange mb-3 mt-4"><i class="fas fa-box"></i> Detail Paket</h5>
        <div class="row mb-3">
            <div class="col-md-4 mb-2">
                <label class="form-label">Jumlah Paket</label>
                <input type="number" name="jumlah_produk" class="form-control" min="1" required value="{{ old('jumlah_produk', 1) }}">
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label">Berat (gram)</label>
                <input type="number" name="berat_kiriman" class="form-control" min="1" required value="{{ old('berat_kiriman', 1000) }}">
            </div>
            <div class="col-md-4 mb-2">
                <label class="form-label">Volume (opsional)</label>
                <input type="number" name="volume_produk" class="form-control" min="0" value="{{ old('volume_produk', 0) }}">
            </div>
            <div class="col-md-12 mb-2">
                <label class="form-label">Keterangan Paket</label>
                <input type="text" name="ket_produk" class="form-control" value="{{ old('ket_produk') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4 mb-2">
                <label class="form-label">Layanan Pengiriman</label>
                <select name="layanan" class="form-control" required>
                    <option value="reguler" @if(old('layanan')=='reguler') selected @endif>Reguler</option>
                    <option value="express" @if(old('layanan')=='express') selected @endif>Express</option>
                    <option value="same day" @if(old('layanan')=='same day') selected @endif>Same Day</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-orange px-4"><i class="fas fa-paper-plane"></i> Buat Order</button>
            </div>
        </div>
    </form>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .btn-orange { background-color: #E1652C; color: #fff; border: none; }
    .btn-orange:hover { background-color: #d35400; color: #fff; }
</style>
@endsection
