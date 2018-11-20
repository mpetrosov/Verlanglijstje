<?php

namespace App\Http\Controllers;

use App\Verlanglijstje;
use Illuminate\Http\Request;

class VerlanglijstjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'naam' => 'required|min:2|max:255',
        ));

        if (Auth::check())
        {
            $verlanglijstje = new Verlanglijstje;
            $verlanglijstje->naam = $request->naam;
            $verlanglijstje->user_id = Auth::id();
            $verlanglijstje->save();

            Session::flash('succes', 'Het lijstje' . $request->naam . 'is toegevoegd!');
            // RETURN NAAR TOEVOEGEN ITEMS
            return redirect()->route('posts.show', $post->id);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function show(Verlanglijstje $verlanglijstje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function edit(Verlanglijstje $verlanglijstje)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Verlanglijstje  $verlanglijstje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verlanglijstje $verlanglijstje)
    {
        //
    }
}
