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
                <h1 class="display-1 text-center nome-sito mt-5">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <section class="hero">
        <div class="carousel">
            <div class="slide slide1"></div>
            <div class="slide slide2"></div>
            <div class="slide slide3"></div>
        </div>
    </section>
    <div class="container my-5">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
            <div class="col-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="Immagine dell'articolo: {{$article->title}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->subtitle}}</p>
                        <p class="small text-muted">Categoria:<a href="{{route('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{$article->category->name}}</a></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br>
                            da <a href="{{route('article.byUser', $article->user)}}" class="text-capitalize text-muted">{{$article->user->name}}</a></p>
                            <a href="{{route('article.show', $article)}}" class="btn btn-outline-secondary">Leggi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>