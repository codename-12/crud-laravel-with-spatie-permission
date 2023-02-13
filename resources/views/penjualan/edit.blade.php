@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Penjualan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('penjualan.index') }}"> Back</a>
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


    <form action="{{ route('penjualan.update',$penjualan->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="form-group">
                <strong>Tanggal Faktur  :</strong>
                <input type="date" class="form-control" style="height:150px" name="tgl_faktur" placeholder="Tanggal Faktur">
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Faktur :</strong>
                <input type="text" class="form-control" style="height:150px" name="no_faktur" placeholder="Nomor Faktur">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Nama Konsumen :</strong>
                <input type="text" class="form-control" style="height:150px" name="nama_konsumen" placeholder="Nama Konsumen">
            </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah :</strong>
               <input type="text" class="form-control" style="height:150px" name="jumlah" placeholder="Jumlah">
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
               <strong>Harga Satuan :</strong>
              <input type="text" class="form-control" style="height:150px" name="harga_satuan" placeholder="Harga Satuan">
            </div>
            </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
           <strong>Harga Total :</strong>
          <input type="text" class="form-control" style="height:150px" name="harga_total" placeholder="Harga Total">
            </div>   
            </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection