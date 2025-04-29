@extends("layouts.master")
@section("contenuto")
@php

$user = Auth::user();

@endphp
    <div class="container cent">

        <div class="card text-center fs-2   ">
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email Verificata?</th>
                    <td>{{ $user->email_verified_at ? $user->email_verified_at : "Non Verificata" }}</td>
                </tr>
            </table>
        </div>

    </div>

@endsection

@section("titolo", "Profilo")