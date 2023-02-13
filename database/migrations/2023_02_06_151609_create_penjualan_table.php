<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_faktur');
            $table->string('no_faktur');
            $table->string('nama_konsumen');
            $table->ForeignId('kode_barang')->constrained('master_barang')
                                            ->onUpdate('cascade')
                                            ->onDelete('cascade');
            $table->string('jumlah');
            $table->string('harga_satuan');
            $table->string('harga_total');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualan');
    }
};
