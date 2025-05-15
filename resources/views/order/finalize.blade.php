@extends("layouts.master")
@section("titolo", "Finalizza ordine")

@section("contenuto")
    @php
        $grandTotal = $invoice->costo;
    @endphp
    <div class="container cent">
        <h1 class="text-center my-5">Controlla il tuo ordine</h1>
        <table class="table table-striped">
            <tr>
                <th>
                    Prodotto
                </th>
                <th>
                    Taglia
                </th>
                <th>
                    Quantità
                </th>
                <th>
                    Prezzo
                </th>
            </tr>
            @foreach ($invoice->products as $prod)
                <tr>
                    <td>
                        {{$prod->nome}}
                    </td>
                    <td>
                        {{$prod->pivot->taglia}}
                    </td>
                    <td>
                        {{$prod->pivot->quantita}}
                    </td>
                    <td>
                        {{$prod->prezzo}}€
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>{{$invoice->ship->nome}}</td>
                <td></td>
                <td>1</td>
                <td>{{$invoice->ship->costo}}€</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><b>Totale</b></td>
                <td><b> {{ $grandTotal + $invoice->ship->costo }}€</b></td>
            </tr>
        </table>
        <h2 class="my-3">
            Indirizzo di spedizione
        </h2>
        <div class="card p-4 my3">
            {{ $invoice->address->nome . " " . $invoice->address->cognome }} <br>
            {{ $invoice->address->indirizzo . " " . $invoice->address->civico }} <br>
            {{ $invoice->address->localita . " (" . $invoice->address->provincia . ") " . $invoice->address->cap }}
        </div>
        <form action="{{route("order.finalize", $invoice->id)}}" method="POST">
            @csrf
            <button class="btn btn-success mt-5" type="submit">Conferma ordine<button />
        </form>
    </div>
@endsection