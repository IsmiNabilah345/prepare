<x-filament-panels::page>

    @foreach ($daftarTugas as $pengiriman)
    <div class="p-4 bg-white rounded-lg shadow-sm mb-4 ring-1 ring-gray-950/5 dark:bg-gray-800 dark:ring-white/10">
        <p><strong>No Resi:</strong> {{ $pengiriman->transaksi?->produk?->no_resi }}</p>
        <p><strong>Nama Penerima:</strong> {{ $pengiriman->transaksi?->penerima?->nama_penerima }}</p>
        <p><strong>Nomor Telepon:</strong> {{ $pengiriman->transaksi?->penerima?->telp_penerima }}</p>
        <p><strong>Alamat:</strong> {{ $pengiriman->transaksi?->penerima?->alamat_penerima }}</p>
        <p><strong>Kota:</strong> {{ $pengiriman->transaksi?->penerima?->kota_penerima }}</p>
        {{-- <p><strong>Kurir:</strong> {{ $pengiriman->id_kurir }}</p> --}}
        <p><strong>Catatan:</strong> {{ $pengiriman->catatan }}</p>
    </div>
    @endforeach

</x-filament-panels::page>