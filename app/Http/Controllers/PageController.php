<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verlanglijstje;
use App\item;
use Log;

class PageController extends Controller
{
    public function getIndex(){
        return view('pages/home');
    }

    public function getSharedList($slug){
        $verlanglijstje = Verlanglijstje::where('url', "=", "$slug")->first();
        $items = Item::where('list_id', "=", "$verlanglijstje->id")->get();
        // Log::error($slug);
        // Log::error($verlanglijstje);
        return view('verlanglijstjes/show')->withVerlanglijstje($verlanglijstje)->withItems($items);

    }

}

