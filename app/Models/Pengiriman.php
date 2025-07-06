<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengiriman extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $table = 'pengiriman';

    protected $fillable = [
        'id_produk',
        'id_kurir',
        'id_penerima',
        'tanggal_kirim',
        'status',
        'tipe_kendaraan',
        'estimasi_sampai',
        'catatan',
    ];

    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'id_produk');
    }

    public function kurir()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_kurir');
    }

    public function penerima()
    {
        return $this->belongsTo(\App\Models\Penerima::class, 'id_penerima');
    }
}
