
                <div class="card border-dark" style="width: 18rem;">
                    @if ($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top bordo" alt="Immagine dell'articolo: {{$article->title}}">
                    @else
                    <img src="https://via.placeholder.com/300x200?text=Nessuna+immagine" class="card-img-top" alt="Immagine mancante per l'articolo: {{$article->title}}">
                    @endif
                    <div class="card-body bordo back-card">
                        <h5 class="card-title text-dark active">{{$article->title}}</h5>
                        <p class="card-text text-dark active">{{$article->subtitle}}</p>
                        @if ($article->category)
                        <p class="small text-dark active">Categoria:
                            <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-dark active">
                                {{ $article->category->name }}
                            </a>
                        </p>
                        @else
                        <p class="small text-muted">Nessuna categoria</p>
                        @endif
                        
                        <p class="small text-dark active my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center bordo back-card">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da <a href="{{route('article.byUser', $article->user)}}" class="text-dark active">{{$article->user->name}}</a></p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-outline-dark">Leggi</a>
                    </div>
</div>