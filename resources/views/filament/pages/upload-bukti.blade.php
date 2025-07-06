<x-filament::page>
    <h2 class="text-xl font-bold mb-4">📤 Upload Bukti Pengiriman</h2>

    <form wire:submit.prevent="submit" class="space-y-4 max-w-xl">
        {{ $this->form }}
        <x-filament::button type="submit">
            Simpan Bukti
        </x-filament::button>
    </form>
</x-filament::page>
