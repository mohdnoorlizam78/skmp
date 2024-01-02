<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarPelajar extends Model
{
    use HasFactory;
    protected $table = 'gambar_pelajar';

    protected $fillable = [
        'gambar'
    ];
}
