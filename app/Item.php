<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'description', 'url', 'list_id'];
    
    public function verlanglijstjes() {
        return $this->belongsTo('App\Verlanglijstje');
    }

}
