@extends("layouts.master")
@section("titolo", "Dettagli $prod->nome")
@section("contenuto")
    <div class="container cent">
        <x-best-card :prod="$prod">
            <x-slot:desc>
                <p class="card-text">{{$prod->descrizione}}</p>
            </x-slot:desc>
            <x-slot:add>
                <!-- <a href="{{ route("user.addToCart", $prod) }}" class="btn">
                                    <i class="bi bi-cart2"></i>
                                </a> -->
                <div class="btn btn-primary"><a href="{{ route("products.details", $prod) }}">Dettagli</a></div>
            </x-slot:add>
        </x-best-card>
    </div>
@endsection