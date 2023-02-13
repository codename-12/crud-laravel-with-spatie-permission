<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;
    public $table = "jabatan";
    protected $fillable = [
        'nama_jabatan','gaji',
    ];
    /**
     * Get all of the jabatan for the jabatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jabatan(): HasMany
    {
        return $this->hasMany(pegawai::class);
    }
}
