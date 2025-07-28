<?php

namespace App\Filament\Kurir\Pages;

use Filament\Pages\Page;
use App\Models\Pengiriman;
use App\Models\Tracking;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;

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
        //dd($this->pengiriman);
        $this->validate([
            'foto_bukti' => 'required|image|max:2048',
        ]);

        logger([
            'guard_kurir_id' => Auth::guard('kurir')->id(),
            'auth_user' => Auth::guard('kurir')->user(),
        ]);

        logger([
            'id_pengiriman' => $this->pengiriman->id,
            'id_kurir' => $this->pengiriman->id_kurir,
        ]);

        $this->pengiriman = Pengiriman::findOrFail($this->pengiriman->id);

        if ($this->pengiriman->id_kurir !== Auth::guard('kurir')->id()) {
            Notification::make()
                ->title('Akses Ditolak')
                ->body('Pengiriman ini bukan milikmu.')
                ->danger()
                ->send();

            return;
        }

        $path = $this->foto_bukti->store('images', 'public');

        $this->pengiriman = Pengiriman::findOrFail($this->pengiriman->id);

        Tracking::create([
            'id_pengiriman' => $this->pengiriman->id,
            'id_kurir'      => $this->pengiriman->id_kurir,
            'foto_bukti'    => $path,
        ]);

        $this->pengiriman->update([
            'status' => 'terkirim',
        ]);

        Notification::make()
            ->title('Bukti Berhasil Diupload')
            ->success()
            ->send();

        return redirect()->route('filament.kurir.pages.dashboard-kurir');
    }

    public static function getSlug(): string
    {
        return 'upload-bukti';
    }

    public static function canAccess(): bool
    {
        return Auth::guard('kurir')->check() && in_array(Auth::guard('kurir')->user()->role, ['kurir', 'kurir_motor', 'kurir_truk']);
    }
}
