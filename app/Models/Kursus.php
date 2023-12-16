<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne; //buat relation dengan user, kursus dan pegawai


class Kursus extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kursus'
    ];
    // public function pelajar()
    // {
    //     return $this->hasMany(Pelajar::class);
    // }
    public function pelajar(): HasOne
    {
        return $this->hasOne(Pelajar::class, 'kursus_id');
    }
}
