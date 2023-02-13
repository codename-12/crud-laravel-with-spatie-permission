@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kategori</h2>
            </div>
            <div class="pull-right">
                @can('kategori-create')
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Buat Kategori Baru</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Harga Jual</th>
            <th>Harga Barang</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
    </table>
@endsection
<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          scrollX: true,
          ajax: "{{ route('master_barang.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'kode_barang', name: 'kode_barang'},
              {data: 'nama_barang', name: 'nama_barang'},
              {data: 'harga_jual', name: 'harga_jual'},
              {data: 'harga_beli', name: 'harga_beli'},
              {data: 'qty', name: 'qty'},
              {data: 'id_kategori.nama_kategori', name: 'id_kategori.nama_kategori'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>    
@endsection