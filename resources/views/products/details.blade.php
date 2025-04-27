@extends("layouts.master")
@section("titolo", "Dettagli $prod->nome")
@section("contenuto")
    <div class="container cent">
        <div class="row">
            <div class="col-4">
                <x-det-card :prod="$prod"></x-det-card>
            </div>
            <div class="col-8 revBox">
                @foreach ($prod->reviews as $rev)
                    <x-rev-card :rev="$rev"></x-rev-card>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
@endsection