<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusTvet extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kursus',
        'status'
    ];
}
