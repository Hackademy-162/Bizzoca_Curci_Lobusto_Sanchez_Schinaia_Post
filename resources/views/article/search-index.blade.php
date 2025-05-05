<x-layout>
  <div class="container-fluid p-5 titolo text-center">
    <div class="row justify-content-center">
      <div class="col-12 col-md-6">
        <h1 class="display-1 titolo">Tutti gli articoli per {{ $query }}</h1>
      </div>
    </div>
  </div>
  <div class="container my-5">
  <div class="row justify-content-evenly">
                @forelse ($articles as $article)
                <div class="col-12 col-md-4 mt-5 pb-4 d-flex justify-content-center">
                    <x-article-card :article="$article"/>
                </div>
                @empty
                <div class="contenitore">

                  <p class="titolo text-active text-center fs-1">Non ci sono articoli presenti</p>
                </div>
                @endforelse
            </div>
        </div>
</x-layout>
