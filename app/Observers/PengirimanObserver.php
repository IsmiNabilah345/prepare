<?php

namespace App\Observers;

use App\Models\Pengiriman;
use App\Models\Tracking;


class PengirimanObserver
{
    public function created(Pengiriman $pengiriman): void
    {
        Tracking::create([
            'id_pengiriman' => $pengiriman->id,
            'status' => 'Proses Pengiriman',
            'catatan' => 'Paket telah diserahkan kepada kurir untuk diantar.',
        ]);
    }

    public function boot(): void
    {
        Pengiriman::observe(PengirimanObserver::class);
    }
}
