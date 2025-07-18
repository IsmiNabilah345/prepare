<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kurir extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_kurir';

    protected $fillable = [
        'nama_kurir',
        'no_telp',
    ];
}
