@extends("layouts.master")
@section("contenuto")

    @php
        session_start();
        if ($order) {
            $grandTotal = 0;
            foreach ($order->products as $prod) {
                if ($prod->pivot->quantita == 1) {
                    $grandTotal += $prod->prezzo;
                } else {
                    $totaleProd = $prod->prezzo * $prod->pivot->quantita;
                    $grandTotal += $totaleProd;
                }
            }
        }

        $_SESSION["total"] = $grandTotal;
        

    @endphp

    <div class="container d-flex justify-content-center align-items-center h-100">
        @if ($order)
            <div class="row w-100 mt-5">

                @foreach ($order->products as $prod)
                    <div class="col-12">
                        <x-cart-card :prod="$prod">
                        </x-cart-card>
                    </div>

                @endforeach
                <div class="col-12 d-flex justify-content-end">
                    <p class="fs-2 mt-5">
                        <b>
                            Totale: {{ $grandTotal }}€
                        </b>
                    </p>
                </div>
                <div class="col-12 d-flex justify-content-around">
                    <a href="{{ route("home") }}" class="btn btn-primary">Continua lo shopping</a>
                    <a href="{{ route("order.checkout") }}" class="btn btn-success">Procedi al Checkout</a>
                </div>
            </div>
        @else
            <div class="alert alert-dark">
                <h1>Nessun prodotto nel carrello</h1>
            </div>
        @endif
    </div>

@endsection

@section("titolo", "Carrello")