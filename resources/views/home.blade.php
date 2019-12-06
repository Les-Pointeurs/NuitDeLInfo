@extends('layouts.app')

@section("title", "Fil d'actualité")

@section('content')
    <div class="container-fluid">
        <h2 class="mb-3 title">Fil d'actualité</h2>

        @foreach($problemes as $prob)
            <a href="{{route("probleme.view", ["prob" => $prob])}}" class="link-inherit">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="user-picture user-picture-inline"></div>
                            <div
                                class="d-flex flex-column justify-content-center ml-3 h5 subtitle mb-0">{{$prob->utilisateur->nom}}</div>
                        </div>
                        <div class="mt-2">
                            {{$prob->question}}<br/>
                            <div class="d-flex flex-row">
                                <small class="flex-grow-1">{{$prob->commentaires->count()}} commentaires</small>
                                <small>{{$prob->date->format("d/m/Y")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
