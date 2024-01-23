<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaranganModel extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'tarikh_mula',
        'tarikh_akhir',
        'catatan'
    ];
    public function dibenarkan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
