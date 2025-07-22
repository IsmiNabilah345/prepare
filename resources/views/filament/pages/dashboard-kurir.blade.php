<x-filament-panels::page>

    @foreach ($daftarTugas as $pengiriman)
    <div class="p-4 bg-white rounded-lg shadow-sm mb-4 ring-1 ring-gray-950/5 dark:bg-gray-800 dark:ring-white/10">
        <p><strong>No Resi:</strong> {{ $pengiriman->transaksi?->produk?->no_resi }}</p>
        <p><strong>Nama Penerima:</strong> {{ $pengiriman->transaksi?->penerima?->nama_penerima }}</p>
        <p><strong>Alamat:</strong> {{ $pengiriman->transaksi?->penerima?->alamat_penerima }}</p>
    </div>
    @endforeach

</x-filament-panels::page>