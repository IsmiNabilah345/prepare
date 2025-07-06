<x-filament::page>
    <h2 class="text-xl font-bold mb-4">📦 Daftar Pengiriman Hari Ini</h2>

    @forelse ($pengirimanHariIni as $pengiriman)
        <div class="border p-4 rounded-lg shadow mb-4 bg-white">
            <p><strong>Produk:</strong> {{ $pengiriman->produk->ket_produk ?? '-' }}</p>
            <p><strong>Penerima:</strong> {{ $pengiriman->penerima->nama ?? '-' }}</p>
            <p><strong>Alamat:</strong> {{ $pengiriman->penerima->alamat ?? '-' }}</p>
            <p><strong>Status:</strong> {{ $pengiriman->status }}</p>

            <a href="{{ route('filament.pages.upload-bukti', ['id' => $pengiriman->id]) }}"
                class="inline-block mt-3 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Upload Bukti
            </a>

        </div>
    @empty
        <p class="text-gray-500">Tidak ada pengiriman hari ini.</p>
    @endforelse
</x-filament::page>
