<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DropPoint extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'latitude',
        'longitude',
        'telepon',
        'jam_buka',
    ];
} 