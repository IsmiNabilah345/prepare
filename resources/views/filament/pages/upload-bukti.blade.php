<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Upload Bukti Pengiriman</h2>

    <form wire:submit.prevent="submit">
        <div class="space-y-4">
            <x-forms::file-upload
                wire:model="foto_bukti"
                label="Upload Foto Bukti"
                image
                required
            />

            <x-filament::button type="submit">
                Simpan Bukti
            </x-filament::button>
        </div>
    </form>
</x-filament::page>
    