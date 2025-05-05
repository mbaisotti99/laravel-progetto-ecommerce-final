@extends("layouts.master")
@section("titolo", "Checkout")
@section("contenuto")
    <div class="container">
        @php
        $grandTotal = 0;
            foreach ($order->products as $prod) {
                if ($prod->pivot->quantita = 1) {
                    $grandTotal += $prod->prezzo;
                } else {
                    $totaleProd = $prod->prezzo * $prod->pivot->quantita;
                    $grandTotal += $totaleProd;
                }
            }
        @endphp

        @if (count($addresses) > 0)
        <!-- Send Order -->
            <form action="{{ route("order.storeInvoice") }}" method="POST">
                @csrf 
                <input type="hidden" value={{ $grandTotal }} name="total">
                <h1 class="text-center my-5">
                    Seleziona un indirizzo
                </h1>
                <div class="selectAddress d-flex gap-5 fs-2">
                    <select name="address" id="" class="form-control">
                        @foreach ($addresses as $add )
                        <option value={{ $add->id }}>{{$add->indirizzo . " - " . $add->localita}}</option>
                        @endforeach
                    </select>

                    <label for="spedizione" class="form-label">Tipo di spedizione: </label>
                    <select name="spedizione" id="spedizione" class="form-control">
                        @foreach ($speds as $sped)
                            <option value={{ $sped->id }}>{{$sped->nome . " - " . $sped->costo . "€"}}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary">Usa questo indirizzo</button>
                </div>
            </form>
            
            
            <hr>
            <p class="text-center text-secondary my-5">
                oppure
            </p>
            <hr>
        @endif

        <h1 class="my-5 text-center">
            Crea un nuovo Indirizzo
        </h1>

        <div class="cent">
            <x-create-address>
                <x-slot:page>
                    checkout
                </x-slot:page>
            </x-create-address>
        </div>

    </div>
@endsection