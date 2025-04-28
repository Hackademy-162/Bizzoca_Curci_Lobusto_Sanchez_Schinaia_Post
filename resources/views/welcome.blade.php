<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            @if (session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
            @endif
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-center titolo text-dark mt-5">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
            <div class="col-12 col-md-4 mt-5 pb-4 d-flex justify-content-center">
                <div class="card border-dark" style="width: 18rem;">
                    @if ($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Immagine dell'articolo: {{$article->title}}">
                    @else
                    <img src="https://via.placeholder.com/300x200?text=Nessuna+immagine" class="card-img-top" alt="Immagine mancante per l'articolo: {{$article->title}}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title text-dark active">{{$article->title}}</h5>
                        <p class="card-text text-dark active">{{$article->subtitle}}</p>
                        <p class="small text-dark active">Categoria: <a href="{{route('article.byCategory', $article->category)}}" class="text-dark active">{{$article->category->name}}</a></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da <a href="{{route('article.byUser', $article->user)}}" class="text-dark active">{{$article->user->name}}</a></p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-outline-dark">Leggi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>