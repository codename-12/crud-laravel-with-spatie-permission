<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pegawai;

class pegawai extends Model
{
    use HasFactory;
    public $table = "pegawai";
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'id_user',
        'id_jabatan',
    ];
    /**
     * Get the jabatan that owns the pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(jabatan::class, 'id_jabatan', 'id');
    }
    /**
     * Get the user that owns the pegawai
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
