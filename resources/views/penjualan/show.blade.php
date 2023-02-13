@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Penjualan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('penjualan.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Faktur :</strong>
                {{ $penjualan->tgl_faktur }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Faktur :</strong>
                {{ $penjualan->no_faktur }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Konsumen :</strong>
                {{ $penjualan->nama_konsumen }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kode Barang:</strong>
                {{ $master_barang->kode_barang }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah :</strong>
                {{ $penjualan->jumlah }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Satuan:</strong>
                {{ $penjualan->harga_satuan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Total:</strong>
                {{ $penjualan->harga_total }}
            </div>
        </div>
    </div>
@endsection
