@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pegawai</h2>
            </div>
            <div class="pull-right">
                @can('pegawai-create')
                <a class="btn btn-success" href="{{ route('pegawai.create') }}"> Buat Data Pegawai Baru</a>
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
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Nomor HP</th>
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
          ajax: "{{ route('pegawai.index') }}",
          columns: [
              {data: 'id', name: 'id'},
              {data: 'nama', name: 'nama'},
              {data: 'tanggal_lahir', name: 'tanggal_lahir'},
              {data: 'alamat', name: 'alamat'},
              {data: 'no_hp', name: 'no_hp'},
              {data: 'id_user.nama_user', name: 'id_user.nama_user'},
              {data: 'id_jabatan.nama_jabatan', name: 'id_jabatan.nama_jabatan'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
    });
  </script>    
@endsection