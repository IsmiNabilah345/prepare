<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracking extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_tracking';

    protected $fillable = [
        'id_pengiriman',
        'id_kurir',
        'status',
        'foto_bukti',
        'catatan'
    ];

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir');
    }

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }
}
