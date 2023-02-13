<form action="{{ route('master_barang.destroy',$master_barang->id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('master_barang.show',$master_barang->id) }}">Show</a>
    @can('master_barang-edit')
    <a class="btn btn-primary" href="{{ route('master_barang.edit',$master_barang->id) }}">Edit</a>
    @endcan


    @csrf
    @method('DELETE')
    @can('master_barang-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>