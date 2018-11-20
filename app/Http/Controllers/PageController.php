<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verlanglijstje;
class PageController extends Controller
{
    public function getIndex(){
        return view('pages/home');
    }

    public function getSharedList($slug){
        $verlanglijstje = Verlanglijstje::where('url', "=", "$slug")->first();
        return view('verlanglijstjes/show')->withVerlanglijstje($verlanglijstje);
    }
}
