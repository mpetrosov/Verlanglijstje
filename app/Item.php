<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function verlanglijstjes() {
        return $this->belongsTo('App\Verlanglijstje');
    }
}
