<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_barang extends Model
{
    use HasFactory;
    public $table = "master_barang";
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'harga_jual',
        'harga_beli',
        'qty',
        'id_kategori',
    ];

    /**
     * Get the category that owns the master_barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(kategori::class, 'id_ketegory', 'id');
    }
}
