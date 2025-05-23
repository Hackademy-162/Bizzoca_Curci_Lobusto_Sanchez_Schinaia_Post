<x-layout>
    <div class="container-fluid p-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="display-1 titolo text-capitalize">{{ $user->name }}</h1>
            </div>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3 d-flex justify-content-evenly pb-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top bordo"
                    alt="Immagine dell'articolo {{ $article->title }}">
                    <div class="card-body back-card bordo">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-subtitle">{{ $article->subtitle }}</p>
                        @if ($article->category)
                        <p class="small text-dark active back-card">Categoria:
                            <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-dark active">
                                {{ $article->category->name }}
                            </a>
                        </p>
                        @else
                        <p class="small text-dark active">Nessuna categoria</p>
                        @endif
                        
                        <p class="small text-dark active my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center back-card bordo">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da {{ $article->user->name }}</p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-dark">Leggi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>
    