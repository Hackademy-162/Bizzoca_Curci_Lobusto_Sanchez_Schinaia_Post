<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
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
            <div class="col-12 col-md-6">
                <h1 class="display-1 text-center titolo text-dark mt-5">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <div class="container my-5  contenitore">
        <div class="row justify-content-evenly">
            @foreach ($articles as $article)
            <div class="col-12 col-md-3 mt-5 pb-4 d-flex justify-content-center">
                <x-article-card :article="$article"/>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>