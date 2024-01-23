<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tahfiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_penuh',
        'no_kp',
        'alamat',
        'no_tel',
        'no_tel_ibubapa',
        'emel',
        'kursus_id',
        'akuan',
        'akuanjuz'
    ];

    public function kursus(): BelongsTo
    {
        return $this->belongsTo(KursusTvet::class, 'kursus_id');
    }
}
