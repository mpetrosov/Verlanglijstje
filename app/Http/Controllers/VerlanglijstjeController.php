<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Verlanglijstje;
use App\User;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class VerlanglijstjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyz')
    {
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces []= $keyspace[random_int(0, $max)];
        }
        return implode('', $pieces);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $verlanglijstjes = Verlanglijstje::paginate(3);
        $user = User::find($user)->verlanglijstje;
        
        return view('verlanglijstjes/index')->withVerlanglijstjes($verlanglijstjes)->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('verlanglijstjes/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'naam' => 'required|min:2|max:255|alpha_num',
        ));

        $user = Auth::id();
        $verlanglijstje = new Verlanglijstje;
        $verlanglijstje->name = $request->naam;
        $verlanglijstje->user_id = $user;
        $verlanglijstje->url = $this->random_str(8);
        $verlanglijstje->save();

        Session::flash('succes', 'Het lijstje is toegevoegd!');
        // RETURN NAAR TOEVOEGEN ITEMS
        // return redirect()->route('posts.show', $post->id);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function show(Verlanglijstje $verlanglijstje)
    {
        $user = Auth::id();
        $verlanglijstjes = User::find($user)->verlanglijstje;
        
        return view('verlanglijstjes/show')->withVerlanglijstjes($verlanglijstjes);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function edit(Verlanglijstje $verlanglijstje)
    {
        $verlanglijstje= Verlanglijstje::find($verlanglijstje);
		return view('verlanglijstjes/edit')->withPost($verlanglijstje);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verlanglijstje $verlanglijstje)
    {
        $this->validate($request, array(
            'naam' => 'required|min:2|max:255|alpha_num',
        ));

        $verlanglijstje = Verlanglijstje::find($verlanglijstje);
        $verlanglijstje->naam = $request->input('naam');
        $verlanglijstje->save();

        Session::flash('succes', 'Het lijstje is bijgewerkt!');
        // RETURN NAAR TOEVOEGEN ITEMS
        // return redirect()->route('posts.show', $post->id);
        return redirect()->route('pages/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verlanglijstje $verlanglijstje)
    {
        $verlanglijstje = Verlanglijstje::find($verlanglijstje);
        $verlanglijstjeTitel = $verlanglijstje->title;
        $verlanglijstje->delete();
        
        Session::flash('succes', "$verlanglijstjeTitel is verwijderd");
    
        return redirect()->route('pages/home');
    }
}
