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
        'id_transaksi',
        'id_kurir',
        'no_resi',
        'tanggal_kirim',
        'status',
        'tipe_kendaraan',
        'estimasi_sampai',
        'catatan',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir');
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima');
    }

    public function transaksi()
    {
        return $this->belongsTo(\App\Models\Transaksi::class, 'id_transaksi');
    }
}
