@props(["prod"])

<div class="card text-center detCard">
    @if (isset($prod->hot))
        <div class="hot">
            <p>HOT</p>
        </div>
    @endif
    <img src="{{asset("prods/$prod->img")}}" alt="..." class="detImg">
    <form action="{{ route("user.addToCart", $prod) }}" method="POST">
        @csrf
        <div class="card-body">
            <h5 class="card-title">{{$prod->nome}}</h5>
            <p class="card-title">{{$prod->categoria}}</p>
            {{ $prod->descrizione }}
            <!-- <p class="card-title">{{implode(" - ", $prod->taglie)}}</p> -->
             <br>
             <label class="mt-3" for="taglia">Taglia:</label>
             <select name="taglia" id="taglia" class="form-control">
                @foreach ($prod->taglie as $taglia )
                <option value="{{ $taglia }}">{{$taglia}}</option>
                @endforeach
             </select>
            <p class="card-text d-flex align-items-center w-100 justify-content-center gap-2 mt-3">
                @php
                $revs = $prod->reviews;
                $somma = 0;
                foreach ($revs as $rev) {
                    $somma += $rev->voto;
                }

                $avg = $somma / count($revs);
              @endphp
            {{ round($avg, 2) }} <i class="bi bi-star-fill" style="color: gold; font-size: 22px;"></i>
        </p>
        <p class="card-title fs-2">
            <b>
                {{ $prod->prezzo }}€
            </b>
        </p>
        <button type="submit" class="btn">
            <i class="bi bi-cart2"></i>
        </button>
    </form>
    </div>
</div>