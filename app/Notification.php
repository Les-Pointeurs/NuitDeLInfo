<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo('App\Utilisateur');
    }

    public function source()
    {
        return $this->belongsTo('App\Utilisateur');
    }

    public function type()
    {
        return $this->belongsTo('App\TypeNotification');
    }
}
