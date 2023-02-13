@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambahkan Barang Baru</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('master_barang.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('master_barang.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Kode Barang :</strong>
		            <input type="text" name="kode_barang" class="form-control" placeholder="Kode Barang">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama Barang :</strong>
		            <input type="text" class="form-control" style="height:150px" name="nama_barang" placeholder="Nama Barang">
		        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga Jual :</strong>
                    <input type="text" class="form-control" style="height:150px" name="harga_jual" placeholder="Harga Jual">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Harga Barang :</strong>
                    <input type="text" class="form-control" style="height:150px" name="harga_barang" placeholder="Harga Barang"><
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Quantity :</strong>
                        <input type="text" class="form-control" style="height:150px" name="qty" placeholder="quantity">
                    </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection