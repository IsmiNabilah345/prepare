<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tarif extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id_tarif';

    protected $fillable = [
        'jenis',
        'harga',
    ];
}
