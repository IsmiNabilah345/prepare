<x-filament-panels::page.simple>
    {{-- Di sinilah tempat untuk mengubah branding --}}
    <x-slot name="heading">
        Login Kurir
    </x-slot>

    <x-slot name="subheading">
        Selamat Datang! Semangat Mengantar Paket!
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