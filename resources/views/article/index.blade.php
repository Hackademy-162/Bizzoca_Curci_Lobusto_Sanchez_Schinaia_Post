<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="display-1 text-center titolo mt-5">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <div class="container my-5">
            <div class="row justify-content-evenly">
                @foreach ($articles as $article)
                <div class="col-12 col-md-4 mt-5 pb-4 d-flex justify-content-center">
                    <x-article-card :article="$article"/>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>