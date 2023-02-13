<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    public $table = "penjualan";
    protected $fillable = [
        'tgl_faktur',
        'no_faktur',
        'nama_konsumen',
        'kode_barang',
        'jumlah',
        'harga_satuan',
        'harga_total',
    ];
    /**
     * Get the user that owns the penjualan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kode(): BelongsTo
    {
        return $this->belongsTo(master_barang::class, 'kode_barang', 'id');
    }
}
