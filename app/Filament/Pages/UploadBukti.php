<?php

namespace App\Filament\Kurir\Pages;

use Filament\Pages\Page;
use App\Models\Pengiriman;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class UploadBukti extends Page
{
    use WithFileUploads;

    protected static string $view = 'filament.kurir.pages.upload-bukti';
    protected static ?string $navigationLabel = null;

    public $foto_bukti;
    public ?Pengiriman $pengiriman = null;

    public function mount($id)
    {
        $this->pengiriman = Pengiriman::findOrFail($id);
    }

    public function submit()
    {
        $path = $this->foto_bukti->store('images', 'public');

        Tracking::create([
            'id_pengiriman' => $this->pengiriman->id,
            'foto_bukti' => $path,
            'waktu_kirim' => now(),
        ]);

        $this->pengiriman->update([
            'status' => 'terkirim',
        ]);

        return redirect()->route('filament.kurir.pages.dashboard-kurir');
        //return redirect()->route('filament.kurir.pages.upload-bukti', ['id' => $this->pengiriman->id]);
    }

    public static function getSlug(): string
    {
        return 'upload-bukti';
    }

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['kurir', 'kurir_motor', 'kurir_truk']);
    }
}



// 
// use Livewire\WithFileUploads;
// use Illuminate\Support\Facades\Auth;
// use App\Models\Tracking;

// class UploadBukti extends Page
// {
//     use WithFileUploads;

//     public $foto_bukti;

//     protected static string $view = 'filament.pages.upload-bukti';

//     public ?Pengiriman $pengiriman = null;

//     public function mount($id = null): void
//     {
//         $this->pengiriman = Pengiriman::with(['transaksi.produk', 'transaksi.penerimas'])
//             ->findOrFail($id);

//         if (! in_array(Auth::user()?->role, ['kurir', 'kurir_motor', 'kurir_truk'])) {
//             abort(403);
//         }
//     }


//     public function simpan()
//     {
//         $filename = time() . '-' . $this->foto_bukti->getClientOriginalName();
//         $this->foto_bukti->storeAs('images', $filename, 'public');

//         $path = 'images/' . $filename;

//         Tracking::create([
//             'id_pengiriman' => $this->pengiriman->id,
//             'foto_bukti' => $path,
//         ]);

//         $this->pengiriman->update(['status' => 'terkirim']);

//         session()->flash('success', 'Bukti berhasil diupload.');
//         return redirect()->route('filament.kurir.pages.dashboard-kurir');
//     }

//     public static function canAccess(): bool
//     {
//         return Auth::check() && in_array(Auth::user()->role, ['kurir', 'kurir_motor', 'kurir_truk']);
//     }

//     public static function getSlug(): string
//     {
//         return 'upload-bukti';
//     }
