<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;

class DashboardKurir extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Dashboard Kurir';
    protected static string $view = 'filament.pages.dashboard-kurir';

    public $pengirimanHariIni;

    public function mount(): void
    {
        if (! in_array(Auth::user()?->role, ['kurir', 'kurir_motor', 'kurir_truk'])) {
            abort(403, 'Akses hanya untuk kurir.');
        }

        $this->pengirimanHariIni = Pengiriman::with(['produk', 'penerima'])
            ->where('id_kurir', Auth::id())
            ->whereDate('tanggal_kirim', now())
            ->get();
    }


    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['kurir', 'kurir_motor', 'kurir_truk']);
        //return Auth::user()?->role === 'kurir';
        //return true;
    }
}
