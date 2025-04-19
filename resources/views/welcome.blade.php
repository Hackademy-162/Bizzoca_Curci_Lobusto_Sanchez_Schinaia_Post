<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1 text-center nome-sito mt-5">The Aulab Post</h1>
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
    <section class="hero">
        <div class="carousel">
          <div class="slide slide1"></div>
          <div class="slide slide2"></div>
          <div class="slide slide3"></div>
        </div>
      </section>
</x-layout>