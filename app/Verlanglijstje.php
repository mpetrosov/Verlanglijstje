<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verlanglijstje extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
}
