<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class StatusKebenaran extends Model
{
    use HasFactory;
    //protected $table = ['status_kebenaran'];
    protected $fillable = [
        'user_id',
        'tujuan_id',
        'tarikh_keluar',
        'pegawai_id',
        'status_kebenaran',
        'catatan'
    ];

    public function Pelajar(): BelongsTo
    {
        return $this->belongsTo(Pelajar::class, 'pelajar_id');
    }
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Tujuan(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }
    public function usermohon(): BelongsTo
    {
        return $this->belongsTo(User::class, 'name');
    }
}
