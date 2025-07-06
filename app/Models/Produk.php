<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'jumlah_produk',
        'berat_kiriman',
        'berat_asli',
        'volume_produk',
        'ket_produk',
        'no_resi',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $prefix = 'YKB-' . now()->format('Ymd') . '-';
            $random = strtoupper(Str::random(6));

            do {
                $resi = $prefix . $random;
            } while (self::where('no_resi', $resi)->exists());

            $product->no_resi = $resi;
        });
    }

    public function kurir()
    {
        return $this->belongsTo(User::class, 'id_kurir');
    }
}
