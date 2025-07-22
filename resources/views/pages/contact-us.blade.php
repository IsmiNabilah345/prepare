@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="bg-orange text-white py-5 mb-4">
    <div class="container">
        <h1 class="mb-2"><i class="fas fa-envelope"></i> Hubungi Kami</h1>
        <p class="lead mb-0">Kami siap membantu kebutuhan pengiriman Anda.</p>
    </div>
</div>
<div class="container pb-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="mb-3 text-orange"><i class="fas fa-map-marker-alt"></i> Alamat Kantor Pusat</h5>
                    <p>Jl. Soekarno-Hatta No.187 b, Babakan Ciparay,<br>Kota Bandung, Jawa Barat 40223</p>
                    <p class="mb-2"><i class="fas fa-phone-alt text-orange me-2"></i><strong>Telepon:</strong> 0852-9478-7674</p>
                    <p class="mb-2"><i class="fas fa-envelope text-orange me-2"></i><strong>Email:</strong> info@yuliscargo.co.id</p>
                    <p class="mb-2"><i class="fab fa-whatsapp text-orange me-2"></i><strong>WhatsApp:</strong> 0852-9478-7674</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h5 class="mb-3 text-orange"><i class="fas fa-paper-plane"></i> Kirim Pesan</h5>
                    <form>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" rows="3" placeholder="Tulis pesan Anda..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-orange w-100" disabled>Kirim (Demo)</button>
                    </form>
                    <small class="text-muted">Form ini hanya demo, silakan hubungi kontak di samping untuk respon cepat.</small>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .bg-orange { background-color: #E1652C !important; }
    .text-orange { color: #E1652C !important; }
    .btn-orange { background-color: #E1652C; color: #fff; border: none; }
    .btn-orange:hover { background-color: #d35400; color: #fff; }
</style>
@endsection 