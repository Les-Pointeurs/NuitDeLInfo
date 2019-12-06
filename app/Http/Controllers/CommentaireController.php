<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\CommentaireVote;
use App\Probleme;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function vote(Probleme $prob, Commentaire $comm)
    {
        if ($prob != $comm->probleme) abort(403);
        if ($comm->utilisateur() === auth()->user()) abort(403);

        $existing = CommentaireVote::where("utilisateur_id", auth()->user()->id)->where("commentaire_id", $comm->id)->first();
        if ($existing !== null)
        {
            $existing->delete();
        }
        else
        {
            $vote = new CommentaireVote;
            $vote->commentaire()->associate($comm);
            $vote->utilisateur()->associate(auth()->user());
            $vote->signalement = request()->has("non");
            $vote->save();
        }

        return redirect(route("probleme.view", ["prob" => $comm->probleme]));
    }
}
