@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambahkan Pegawai Baru</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pegawai.index') }}"> Back</a>
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


    <form action="{{ route('pegawai.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nama :</strong>
		            <input type="text" name="nama" class="form-control" placeholder="nama">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Tanggal Lahir :</strong>
		            <input type="date" class="form-control" style="height:150px" name="tanggal_lahir" >
		        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat :</strong>
                    <input type="text" class="form-control" style="height:150px" name="alamat" placeholder="Alamat">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Nomor HP :</strong>
                    <input type="text" class="form-control" style="height:150px" name="no_hp" placeholder="Nomor HP">
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection