@props(["prod"])

<div class="card text-center">
  @if (isset($prod->hot))
    <div class="hot">
    <p>HOT</p>
    </div>
  @endif
  <img src="{{asset("prods/$prod->img")}}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$prod->nome}}</h5>
    <p class="card-title">{{$prod->categoria}}</p>
    {{ $desc }}
    <p class="card-title">{{implode(" - ", $prod->taglie)}}</p>
    <p class="card-text d-flex align-items-center w-100 justify-content-center gap-2">
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
    {{ $add }}
  </div>
</div>