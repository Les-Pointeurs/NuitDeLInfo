<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function probleme()
    {
        return $this->belongsTo('App\Probleme');
    }

    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }

    public function votes()
    {
        return $this->hasMany('App\CommentaireVote');
    }
}
