<?php

namespace App\Http\Controllers;

use App\Commentaire;
use App\Probleme;
use Illuminate\Http\Request;

class ProblemeController extends Controller
{
    public function voir(Probleme $prob)
    {
        return view('probleme-view', ["prob" => $prob]);
    }

    public function commentaire(Probleme $prob)
    {
        $data = $this->validate(request(), [
            "commentaire" => "required|string"
        ]);

        $comm = new Commentaire;
        $comm->probleme()->associate($prob);
        $comm->utilisateur()->associate(auth()->user());
        $comm->texte = $data["commentaire"];
        $comm->save();

        return redirect(route("probleme.view", ["prob" => $prob]));
    }
}
