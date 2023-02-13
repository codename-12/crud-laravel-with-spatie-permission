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
            <th>Nama Kategori</th>
            <th>Keterangan</th>
            <th width="280px">Action</th>
        </tr>
    </table>
    <script type="text/javascript">
        $(function () {
          var table = $('.data-table').DataTable({
              processing: true,
              serverSide: true,
              scrollX: true,
              ajax: "{{ route('pegawai.index') }}",
              columns: [
                  {data: 'id', name: 'id'},
                  {data: 'nama_kategori', name: 'nama_kategori'},
                  {data: 'keterangan', name: 'keterangan'},
                  {data: 'action', name: 'action', orderable: false, searchable: false},
              ]
          });
        });
      </script>    
@endsection