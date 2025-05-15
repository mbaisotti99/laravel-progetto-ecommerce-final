@props(["prod"])
<form action="{{ route("user.updateCart",$prod) }}" method="POST">
    @csrf
    @method("PUT")
    <input type="hidden" name="old_taglia" value="{{ $prod->pivot->taglia }}">
    <input type="hidden" name="old_quantita" value="{{ $prod->pivot->quantita }}">
<div class=" cartCard mb-4">
    <a href="{{ route("products.details", $prod) }}" class="h-100">
        <img src="{{asset("storage/prods/$prod->img")}}" alt="..." style="max-height: 100%; width:200px;">
    </a>
    <p class="card-title fs-2">
        {{ $prod->nome }}
    </p>

        <div class="size">
            <select name="taglia" id="taglia" class="form-control fs-3">
                @foreach ($prod->taglie as $taglia)
                <option value="{{ $taglia }}" {{ $taglia == $prod->pivot->taglia ? "selected" : "" }}>{{ $taglia }}</option>
                @endforeach
            </select>
        </div>
        <div class="qty fs-3">
            <label for="qty">Quantità:</label>
            <input name="qty" type="number" min="0" id="qty" value="{{ $prod->pivot->quantita }}" style="width:40px">
        </div>
        <p class="card-title fs-2 ">
            {{ $prod->prezzo }}€
        </p>
        <button type="submit" class="btn">
            <i class="bi bi-arrow-clockwise fs-2"></i>
        </button>
    </form>
    <form action="{{route("user.removeFromCart", [$prod, $prod->pivot->taglia])}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn">
            <i class="bi bi-x-circle fs-2 me-4"></i>
        </button>
    </form>
</div>