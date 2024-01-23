<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tvet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penuh',
        'no_kp',
        'alamat',
        'no_tel',
        'no_tel_ibubapa',
        'emel',
        'kursus_id1',
        'kursus_id2',
        'kursus_id3',
        'akuan'
    ];

    public function kursus1(): BelongsTo
    {
        return $this->belongsTo(KursusTvet::class, 'kursus_id1');
    }
    public function kursus2(): BelongsTo
    {
        return $this->belongsTo(KursusTvet::class, 'kursus_id2');
    }
    public function kursus3(): BelongsTo
    {
        return $this->belongsTo(KursusTvet::class, 'kursus_id3');
    }
}
