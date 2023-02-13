<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    public $table = "kategori";
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];
    /**
     * Get all of the category for the kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category(): HasMany
    {
        return $this->hasMany(master_barang::class);
    }
}
