<?php

namespace App\Filament\Pages;

use App\Models\Pengiriman;
use App\Models\Tracking;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardKurir extends Page
{
    protected function getUser()
    {
        return Auth::guard('kurir')->user();
    }

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $navigationLabel = 'Dashboard Kurir';
    protected static ?string $title = 'Tugas Pengiriman Saya';
    protected static string $view = 'filament.pages.dashboard-kurir';

    public array $daftarTugas = [];

    public function mount(): void
    {
        if (! in_array(Auth::user()?->role, ['kurir', 'kurir_motor', 'kurir_truk'])) {
            abort(403, 'Akses hanya untuk kurir.');
        }

        $this->daftarTugas = Pengiriman::with([
            'transaksi.produk',
            'transaksi.penerima'
        ])
            ->where('id_kurir', Auth::guard('kurir')->id())
            ->where('status', '!=', 'Terkirim')
            ->orderBy('created_at', 'asc')
            ->get()
            ->all();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('uploadBukti')
                ->label('Upload Bukti Pengiriman')
                ->icon('heroicon-o-camera')
                ->color('success')
                ->form([
                    Select::make('id_pengiriman')
                        ->label('Pilih Paket (No. Resi)')
                        ->options(
                            collect($this->daftarTugas)->mapWithKeys(function ($tugas) {
                                return [$tugas->id => $tugas->transaksi?->produk?->no_resi ?? 'Resi Tidak Ditemukan'];
                            })
                        )
                        ->searchable()
                        ->required(),
                    FileUpload::make('foto_bukti')
                        ->label('Foto Bukti (Paket & Penerima)')
                        ->image()
                        ->directory('bukti-pengiriman')
                        ->required(),
                ])
                ->action(function (array $data) {
                    DB::transaction(function () use ($data) {
                        $pengiriman = Pengiriman::find($data['id_pengiriman']);
                        if (!$pengiriman) return;

                        $pengiriman->status = 'Terkirim';
                        $pengiriman->save();

                        Tracking::create([
                            'id_pengiriman' => $pengiriman->id,
                            'status' => 'Terkirim',
                            'foto_bukti' => $data['foto_bukti'],
                            'catatan' => 'Paket telah diterima oleh penerima.',
                        ]);
                    });

                    Notification::make()
                        ->title('Upload Berhasil!')
                        ->body('Status paket telah diperbarui menjadi Terkirim.')
                        ->success()
                        ->send();

                    return redirect(request()->header('Referer'));
                })
                ->visible(count($this->daftarTugas) > 0),
        ];
    }

    public static function canAccess(): bool
    {
        return Auth::check() && in_array(Auth::user()->role, ['kurir', 'kurir_motor', 'kurir_truk']);
    }

    public static function getSlug(): string
    {
        return 'dashboard-kurir';
    }
}
