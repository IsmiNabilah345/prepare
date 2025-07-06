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
        'status',
        //'nama_kurir',
        'foto_bukti',
        'catatan',
    ];
}
