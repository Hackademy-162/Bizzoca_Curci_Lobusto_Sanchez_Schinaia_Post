<div class="table-responsive">
    <table class="table table-striped  table-primary table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <t-body>
            @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                    @case('amministratore')
                    <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-dark">Attiva {{ $role }}</button>
                    </form>
                    <form action="{{ route('admin.unsetAdmin', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger mt-2">Rifiuta {{ $role }}</button>
                    </form>
                    @break
                    
                    @case('revisore')
                    <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-dark">Attiva {{ $role }}</button>
                    </form>
                    <form action="{{ route('admin.unsetRevisor', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger mt-2">Rifiuta {{ $role }}</button>
                    </form>
                    @break
                    
                    @case('redattore')
                    <form action="{{ route('admin.setWriter', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-dark">Attiva {{ $role }}</button>
                    </form>
                    <form action="{{ route('admin.unsetWriter', $user) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger mt-2">Rifiuta {{ $role }}</button>
                    </form>
                    @break
                    @endswitch
                </td>
            </tr>
            @endforeach
        </t-body>
    </table>
</div>