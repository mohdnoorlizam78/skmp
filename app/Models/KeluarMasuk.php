<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class KeluarMasuk extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'ndp_id',
        'tujuan_id',
        'destinasi',
        'statuskebenaran_id',
        'catatan',
        'pelulus_id',
        'tarikh_keluar',
        'masa_keluar',
        'pegawaikeluar_id',
        'tarikh_masuk',
        'masa_masuk',
        'pegawaimasuk_id',
        'status_masuk'
    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function pelajarinfo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function tujuanmohon(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }

    public function pengawalMasuk(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pegawaimasuk_id');
    }
    public function pengawalKeluar(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pegawaikeluar_id');
    }
    public function dibenarkan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
