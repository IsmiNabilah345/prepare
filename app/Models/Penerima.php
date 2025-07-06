<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penerima extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_penerima';

    protected $fillable = [
        'nama_penerima',
        'alamat_penerima',
        'kode_pos',
        'telp_penerima',
    ];
}
