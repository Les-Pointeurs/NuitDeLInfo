<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model {

    protected $table = "motcles";
    public $timestamps = false;

    public function reponse() {
        return $this->belongsTo('App\Reponse');
    }
}
