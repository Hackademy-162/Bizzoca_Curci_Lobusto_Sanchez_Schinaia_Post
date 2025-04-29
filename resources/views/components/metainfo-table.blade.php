<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome tag</th>
                <th scope="col">Q.tà articoli collegati</th>
                <th scope="col">Aggiorna</th>
                <th scope="col">Cancella</th>
                {{-- @if ($metaType != 'categorie')
                <th scope="col">Modifica</th>
                @endif --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ count($metaInfo->articles) }}</td>
                @if ($metaType == 'tags')
                <td>
                    <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" value="{{ $metaInfo->name }}" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-success">Aggiorna</button>
                    </form>
                </td> 
                {{-- <td>
                    <form action="">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-success">Aggiorna</button>
                    </form>
                </td> --}}
                <td>
                    <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
                @else
                <td>
                    <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" value="{{ $metaInfo->name }}" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 w-md-100 d-inline">
                        <button type="submit" class="btn btn-success"><span class="d-none d-md-block">Aggiorna</span><span class="d-inline d-md-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                            </svg></span> </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><span class="d-none d-md-block">Elimina</span><span class="d-block d-md-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg></span> </button> 
                        </form>
                    </td>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>