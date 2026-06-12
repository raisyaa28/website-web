<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Location;
use App\Models\Vehicletype;

class Transactions extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'id',
        'id_lokasi',
        'no_tiket',
        'no_polisi',
        'id_jenis',
        'masuk',
        'keluar',
        'perjam_pertama',
        'perjam_berikutnya',
        'max_perhari',
        'total_jam',
        'total_bayar',
        'created_at',
        'updated_at',

    ];

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'id_lokasi');
    }

    public function vehicleType(): BelongsTo
    {
        return $this->belongsTo(Vehicletype::class, 'id_jenis');
    }
}
