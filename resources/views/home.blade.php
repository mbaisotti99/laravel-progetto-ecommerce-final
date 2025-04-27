@extends("layouts.master")
@section("titolo", "Home")
@section("contenuto")
    <div class="container ">
        <div class="d-flex justify-content-center mt-5">
            <a href="{{ route("products.index") }}" class="btn btn-primary fs-2">
                Tutti i prodotti
            </a>
        </div>
        <h1 class="text-center my-5">I Nostri prodotti migliori</h1>
        <div class="row">
            @foreach ($bestProds as $prod)
                <div class="col-4 mb-5">
                    <x-best-card :prod="$prod">
                        <x-slot:desc>
                            <!-- <p class="card-text">{{$prod->descrizione}}</p> -->
                        </x-slot:desc>
                        <x-slot:add>
                            <!-- <a href="{{ route("user.addToCart", $prod) }}" class="btn">
                                <i class="bi bi-cart2"></i>
                            </a> -->
                            <div class="btn btn-primary"><a href="{{ route("products.details", $prod) }}">Dettagli</a></div>
                        </x-slot:add>
                    </x-best-card>
                </div>
            @endforeach
        </div>
    </div>
@endsection