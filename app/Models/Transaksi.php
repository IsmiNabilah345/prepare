<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengirim',
        'id_penerima',
        'id_produk',
        'id_tarif',
        'layanan',
        'berat',
        'harga',
        'tgl_transaksi',
        'total_harga',
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function getNoResiAttribute()
    {
        return $this->produk?->no_resi;
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir');
    }

    public function penerima()
    {
        return $this->belongsTo(Penerima::class, 'id_penerima');
    }

    public function pengirim()
    {
        return $this->belongsTo(Pengirim::class, 'id_pengirim');
    }

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif');
    }
}
