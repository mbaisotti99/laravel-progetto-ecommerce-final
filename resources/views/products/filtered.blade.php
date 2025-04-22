@extends("layouts.master")
@section("titolo", "$cat")

@section("contenuto")

    <div class="container">

        <h1 class="text-center my-5">
            {{$cat}}
        </h1>

        <div class="row mb-5">
            @foreach ($prods as $prod )
    
                <div class="col-6 mb-5">
                <x-best-card :prod="$prod">
                        <x-slot:desc>
                            <p class="card-text">{{$prod->descrizione}}</p>
                        </x-slot:desc>
                    </x-best-card>
                </div>
            
            @endforeach
        </div>



    </div>

@endsection