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
    <div class="container-fluid p-5  text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1 class="display-1 titolo">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>   
    <div class="container my-5">
        <div class="d-flex justify-content-between">           
            <h2 class="shadow  testo bold">Richieste per il ruolo di amministratore</h2>           
        </div>
        <x-request-table :roleRequests="$adminRequests" role="amministratore" />
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-between">        
            <h2 class="shadow  testo bold">Richieste per il ruolo di revisore</h2>
        </div>
        <x-request-table :roleRequests="$revisorRequests" role="revisore" />
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="shadow  testo bold">Richieste per il ruolo di redattore</h2>
        </div>
        <x-request-table :roleRequests="$writerRequests" role="redattore" />
    </div>
    <hr>
    <div class="container my-5">
        <div class=" d-flex justify-content-between">          
            <h2 class="shadow  testo bold">Tutti i tags</h2>
        </div>
        <x-metainfo-table :metaInfos="$tags" metaType="tags" />
    </div>
    <div class="container my-5">
        <div class="d-flex justify-content-between">
            <h2 class="shadow  testo bold">Tutte le categorie</h2>
        </div>
        <form action="{{ route('admin.storeCategory') }}" method="POST" class="w-50 d-flex m-3">
            @csrf
            <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
            <button type="submit" class="btn btn-dark">Inserisci</button>
        </form>
        <x-metainfo-table :metaInfos="$categories" metaType="categorie"/>
    </div>
</x-layout>