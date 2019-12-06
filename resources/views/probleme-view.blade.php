@extends('layouts.app')

@section("title", "Problème")

@section('content')
    <div id="comm-list" class="px-3">
        <div id="comm-list-top">
            <div class="card-body">
                <div class="d-flex flex-row">
                    <div class="user-picture user-picture-inline"></div>
                    <div
                        class="d-flex flex-column justify-content-center ml-3 h5 subtitle mb-0">{{$prob->utilisateur->nom}}</div>
                </div>
                <div class="mt-2 h4">
                    {{$prob->question}}<br/>
                </div>
            </div>

            <hr class="my-2"/>
        </div>

        @forelse($prob->commentaires as $comm)
            <div class="card-body @if(!$loop->first) pt-1 @endif">
                <div class="d-flex flex-row">
                    <div class="align-self-center comm-nvotes">{{$comm->votes->where("signalement", false)->count()}}</div>

                    <div class="d-flex flex-column comm-votes @if ($comm->utilisateur_id == auth()->user()->id) invisible @endif">
                        <form action="{{action("CommentaireController@vote", ["prob" => $comm->probleme, "comm" => $comm])}}" method="post">
                            {{ csrf_field() }}
                            <?php
                            $existing = App\CommentaireVote::where("utilisateur_id", auth()->user()->id)->where("commentaire_id", $comm->id)->first();
                            ?>
                            <button type="submit" name="oui"><i class="fas fa-arrow-circle-up @if ($existing !== null && !$existing->signalement) active @endif"></i></button>
                            <button type="submit" name="non"><i class="fas fa-exclamation-circle @if ($existing !== null && $existing->signalement) active @endif"></i></button>
                        </form>
                    </div>
                    <div class="align-self-center user-picture user-picture-inline"></div>
                    <div class="align-self-center ml-3 h5 subtitle mb-0">{{$comm->utilisateur->nom}}</div>
                </div>
                <div class="mt-2 h5 comm-texte">
                    {{$comm->texte}}<br/>
                </div>
            </div>
        @empty
            <div class="m-4">Aucun commentaire pour le moment.</div>
        @endforelse
    </div>
    <div id="comm-bar" class="p-3 text-right">
        <form action="{{route("probleme.comment", ["prob" => $prob])}}" method="post">
            {{ csrf_field() }}

            <textarea class="form-control" rows="3" id="commentaire" name="commentaire" required></textarea>

            <button type="submit" class="btn btn-primary mt-3">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
@endsection
