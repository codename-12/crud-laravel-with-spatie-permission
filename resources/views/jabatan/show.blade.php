@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Jabatan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('jabatan.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Jabatan :</strong>
                {{ $jabatan->nama_jabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji :</strong>
                {{ $jabatan->gaji }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"><small>Tutorial by <a href="https://github.com/codename-12"> Codename-12</a></small></p>