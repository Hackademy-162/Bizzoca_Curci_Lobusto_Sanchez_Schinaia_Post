<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-center titolo mt-5">The Aulab Post</h1>
            </div>
        </div>
    </div>
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
    </div>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
            <div class="col-12 col-md-4 mt-5 pb-4 d-flex justify-content-center">
                <div class="card border-dark" style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top bordo" alt="Immagine dell'articolo: {{$article->title}}">
                    <div class="card-body back-card">
                        <h5 class="card-title text-dark active">{{$article->title}}</h5>
                        <p class="card-text text-dark active">{{$article->subtitle}}</p>
                        @if ($article->category)
                        <p class="small text-muted">Categoria:
                            <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted">
                                {{ $article->category->name }}
                            </a>
                        </p>
                        @else
                        <p class="small text-muted">Nessuna categoria</p>
                        @endif
                        
                        <p class="small text-muted my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center back-card">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-dark active">{{$article->user->name}}</a></p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-outline-dark">Leggi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>