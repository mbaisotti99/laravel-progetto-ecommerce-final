@php
use Carbon\Carbon;
@endphp
@extends("layouts.master")
@section("contenuto")
    <div class="container">
        <h1 class="text-center my-5">
            I miei Ordini
        </h1>
        <div class="orders">
            @foreach (Auth::user()->invoices as $order)
                <table class="table table-striped my-5">
                    <tr>
                        <th class="d-flex align-items-center gap-2"><div class="dot {{$order->status}}"></div>{{ ucfirst($order->status) . " " . Carbon::parse($order->updated_at)->format("d-m-Y") }}</th>
                        <th>Prodotto</th>
                        <th>Quantità</th>
                        <th>Taglia</th>
                        <th>Prezzo</th>
                    </tr>
                    @foreach ($order->products as $prod)
                        <tr>
                            <td>
                                <img src="{{asset("prods/$prod->img")}}" alt="...">
                            </td>
                            <td>
                                {{$prod->nome}}
                            </td>
                            <td>
                                {{$prod->pivot->quantita}}
                            </td>
                            <td>
                                {{$prod->pivot->taglia}}
                            </td>
                            <td>
                                {{$prod->prezzo}}€
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>{{$order->ship->nome}}</td>
                        <td>{{ $order->address->nome . " " . $order->address->cognome }}</td>
                        <td>{{ $order->address->indirizzo . " " . $order->address->civico }}</td>
                        <td>{{ $order->address->localita ." (". $order->address->provincia . ") " . $order->address->cap }}</td>
                        <td>{{ $order->ship->costo }}€</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Totale:</b></td>
                        <td>{{ $order->costo }}€</td>
                    </tr>
                </table>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
@section("titolo", "I miei Ordini")