<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KursusTahfiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kursus',
        'status'
    ];
    // public function pelajar(): HasOne
    // {
    //     return $this->hasOne(Pelajar::class, 'kursus_id');
    // }
}
