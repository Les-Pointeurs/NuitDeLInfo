<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    public $timestamps = false;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }

    public function commentaires()
    {
        return $this->hasMany('App\Commentaire');
    }
}
