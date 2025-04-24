<x-layout>
    <div class="container-fluid mt-3  text-center ">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 titolo">{{$article->title}}</h1>
            </div>
        </div>
    </div>
    <div class="container my-5 ">
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 d-flex flex-column">
                <div class="d-flex justify-content-center">
                    <img src="{{Storage::url($article->image)}}"  class="img-fluid"
                    alt="Immagine dell'articolo: {{$article->title}}">
                </div>
            </div>
            <div class="col-12 col-md-6 ">
                <div class="text-center bg-dark shadow">
                    <h2 class="testo testo-y ">{{$article->subtitle}}</h2>
                    <p class="fs-5 testo testo-y">Categoria:
                        <a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize fw-bold testo-y active">{{$article->category->name}}</a>
                    </p>
                </div>
                <div class="testo-y active my-3 bg-dark shadow p-1">
                    <p class="testo-y testo">Redatto il {{$article->created_at->format('d/m/Y')}} da <a href="{{route('article.byUser', $article->user)}}" class="testo-y testo active fw-bold">{{$article->user->name}}</a></p>
                </div>
                
                
                <div class="testo-y active my-3 bg-dark shadow">
                <p class=" testo testo-y active">Corpo dell'articolo: <br>{{$article->body}}</p>
                </div>
            </div>
           
            <div class="col-12 mt-5">
                @if (Auth::user() && Auth::user()->is_revisor)
                <div class="container ">
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
                <div class="text-center my-5">
                    <button class="p-2 rounded-4 btn-outline-dark"><a href="{{route('article.index')}}" style="text-decoration: none;" class="text-dark ">Vai alla lista degli articoli</a></button>
                </div>
            </div>
        </div>
    </div>
 <hr>
</x-layout>
