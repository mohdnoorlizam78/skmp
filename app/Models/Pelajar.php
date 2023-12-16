<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; //buat relation dengan user, kursus dan pegawai


class Pelajar extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama_pelajar',
        'jantina',
        'kursus_id',
        'no_ndp',
        'sesimasuk_id',
        'gambar',
        'alamat_rumah',
        'alamat_lain',
        'no_tel',
        'no_tel_penjaga',
        'status',
    ];
    public function kursus(): BelongsTo
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
    public function sesimasuk(): BelongsTo
    {
        return $this->belongsTo(SesiMasuk::class);
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
