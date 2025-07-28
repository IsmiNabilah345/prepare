<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengirim extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_pengirim';

    protected $fillable = [
        'nama_pengirim',
        'alamat_pengirim',
        'kota_pengirim',
        'kode_pos',
        'telp_pengirim',
    ];
}
