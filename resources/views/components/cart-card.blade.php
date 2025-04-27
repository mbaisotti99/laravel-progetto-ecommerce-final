@props(["prod"])
<div class=" cartCard mb-4">
    <img src="{{asset("prods/$prod->img")}}" alt="..." style="max-height: 100%; width:200px;">
    <p class="card-title fs-2">
        {{ $prod->nome }}
    </p>
    <p class="card-title fs-2 me-4">
        {{ $prod->pivot->quantita }}
    </p>
</div>