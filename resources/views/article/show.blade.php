<x-layout>
    <div class="container-fluid p-5  text-center mt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 titolo">{{$article->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 d-flex flex-column">
                <img src="{{Storage::url($article->image)}}" class="img-fluid"
                alt="Immagine dell'articolo: {{$article->title}}">
                <div class="text-center text-white">
                    <h2>{{$article->subtitle}}</h2>
                    <p class="fs-5 ">Categoria:
                        <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize fw-bold text-white active">{{$article->category->name}}</a>
                    </p>
                </div>
                <div class="text-white active my-3">
                    <p>Redatto il {{$article->created_at->format('d/m/Y')}} da <a href="{{route('article.byUser', $article->user)}}" class="text-white active fw-bold">{{$article->user->name}}</a></p>
                </div>
                
                <hr>
                
                <p class="text-white active">Corpo dell'articolo: <br>{{$article->body}}</p>
                @if (Auth::user() && Auth::user()->is_revisor)
                <div class="container my-5">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-evenly">
                            <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Accetta l'articolo</button>
                            </form>
                            
                            <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Rifiuta l'articolo</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <div class="text-center">
                    <button class="p-2 rounded-4 btn-outline-dark"><a href="{{route('article.index')}}" style="text-decoration: none;" class="text-dark ">Vai alla lista degli articoli</a></button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
