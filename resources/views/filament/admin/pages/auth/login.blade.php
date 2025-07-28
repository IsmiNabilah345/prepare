<x-filament-panels::page.simple>
    {{-- Ubah branding untuk Admin di sini --}}
    <x-slot name="heading">
        Login Admin
    </x-slot>

    <x-slot name="subheading">
        Selamat Datang minGo!
    </x-slot>

    <form wire:submit.prevent="submit">
    {{ $this->form }}

    <x-filament::button type="submit" class="mt-4 w-full">
        Masuk
    </x-filament::button>
    </form>

    <div class="mt-4 text-center">
        <a class="text-sm text-primary-600 hover:text-primary-700" href="/">
            Kembali ke Halaman Utama
        </a>
    </div>

</x-filament-panels::page.simple>