@extends("layouts.master")
@section("contenuto")

    @php
        $order = $user->order;
    @endphp

    <div class="container d-flex justify-content-center align-items-center h-100">
        @if ($order)
            <div class="row w-100">

                @foreach ($order->products as $prod)
                    <div class="col-12">
                        <x-cart-card :prod="$prod">
                        </x-cart-card>
                    </div>

                @endforeach
            </div>
        @else
            <div class="alert alert-dark">
                <h1>Nessun prodotto nel carrello</h1>
            </div>
        @endif
    </div>

@endsection

@section("titolo", "Carrello")