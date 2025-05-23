<div class="table-responsive">
    <table class="table table-primary table-hover table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Sottotitolo</th>
                <th scope="col">Redattore</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepted))
                    <a href="{{ route('article.show', $article) }}" class="btn btn-dark">Leggi l'articolo</a>
                    @else
                    <form action="{{ route('revisor.undoArticle', $article) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">Riporta in revisione</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
</div>

