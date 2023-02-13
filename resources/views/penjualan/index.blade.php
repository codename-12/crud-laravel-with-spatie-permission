@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Penjualan</h2>
            </div>
            <div class="pull-right">
                @can('penjualan-create')
                <a class="btn btn-success" href="{{ route('penjualan.create') }}"> Buat Data Pegawai Baru</a>
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
            <th>Tanggal Faktur</th>
            <th>No Faktur</th>
            <th>Nama Konsumen</th>
            <th>Kode Barang</th>
            <th>Jumlah</th>
            <th>Harga Satuan</th>
            <th>Harga Total</th>
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
          ajax: "{{ route('penjualan.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'tgl_faktur', name: 'tgl_faktur'},
              {data: 'no_faktur', name: 'no_faktur'},
              {data: 'nama_konsumen', name: 'nama_konsumen'},
              {data: 'id_barang.kode_barang', name: 'id_barang.kode_barang'},
              {data: 'jumlah', name: 'jumlah'},
              {data: 'harga_satuan', name: 'harga_satuan'},
              {data: 'harga_total', name: 'harga_total'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>    
@endsection