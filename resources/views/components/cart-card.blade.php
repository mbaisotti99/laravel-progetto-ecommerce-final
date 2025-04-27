@props(["prod"])
<div class=" cartCard mb-4">
    <a href="{{ route("products.details", $prod) }}" class="h-100">
        <img src="{{asset("prods/$prod->img")}}" alt="..." style="max-height: 100%; width:200px;">
    </a>
    <p class="card-title fs-2">
        {{ $prod->nome }}
    </p>
    <p class="card-title fs-2">
        {{ $prod->pivot->taglia }}
    </p>
    <p class="card-title fs-2">
        x{{ $prod->pivot->quantita }}
    </p>
    <p class="card-title fs-2 me-4">
        {{ $prod->prezzo }}€
    </p>
</div>