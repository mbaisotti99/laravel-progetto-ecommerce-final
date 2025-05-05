@extends("layouts.master")
@section("titolo", "Modifica Prodotto")

@section("contenuto")
@php
$taglie = ["XS", "S", "M", "L", "XL", "XXL"];
@endphp
    <div class="container">
        <form action="{{route("prods-admin.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row my-5">
                <div class="col-6 py-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{ $prod->nome }}">
                </div>
                <div class="col-6 py-3">
                    <label for="prezzo" class="form-label">Prezzo in €:</label>
                    <input type="number" min="0" class="form-control" name="prezzo" value={{ $prod->prezzo }}>
                </div>
                <div class="col-6 py-3">
                    <label for="descrizione" class="form-label">Descrizione:</label>
                    <textarea type="text" class="form-control" name="descrizione">
                        {{ $prod->descrizione }}
                    </textarea>
                </div>
                <div class="col-6 py-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <select name="categoria" id="categoria" class="form-control">
                        @foreach ($cats as $cat )
                            <option value="{{ $cat }}" {{ $cat == $prod->categoria ? "selected" : "" }}>{{$cat}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 py-3">
                    <label for="img">Immagine:</label>
                    <input type="file" name="img">
                </div>
                <div class="col-6 py-3">
                    <div class="row">
                        @foreach ($taglie as $taglia )
                            <div class="col-4 me-5 mb-3">
                                <input type="checkbox"  name="taglie[]" value="{{$taglia}}" id="{{ $taglia }}box" {{ $prod->taglie->contains($taglia) ? "checked" : "" }}>
                                <label for="{{$taglia}}box">{{$taglia}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-6 py-3">
                    <button class="btn btn-success" type="submit">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection