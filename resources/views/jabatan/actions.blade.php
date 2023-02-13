<form action="{{ route('jabatan.destroy',$jabatan->id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('jabatan.show',$jabatan->id) }}">Show</a>
    @can('jabatan-edit')
    <a class="btn btn-primary" href="{{ route('jabatan.edit',$jabatan->id) }}">Edit</a>
    @endcan


    @csrf
    @method('DELETE')
    @can('jabatan-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>