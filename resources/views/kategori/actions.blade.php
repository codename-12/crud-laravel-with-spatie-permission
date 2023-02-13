<form action="{{ route('kategori.destroy',$kategori->id) }}" method="POST">
    <a class="btn btn-info" href="{{ route('kategori.show',$kategori->id) }}">Show</a>
    @can('kategori-edit')
    <a class="btn btn-primary" href="{{ route('kategori.edit',$kategori->id) }}">Edit</a>
    @endcan


    @csrf
    @method('DELETE')
    @can('kategori-delete')
    <button type="submit" class="btn btn-danger">Delete</button>
    @endcan
</form>