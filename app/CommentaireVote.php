<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentaireVote extends Model
{
    protected $table = "commentaires_votes";
    public $timestamps = false;

    public function commentaire()
    {
        return $this->belongsTo('App\Commentaire');
    }

    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }
}
