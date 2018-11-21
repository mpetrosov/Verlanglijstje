<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verlanglijstje;
use App\Item;
use App\User;


class ItemController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    protected $fillable = ['name', 'description', 'url', 'list_id'];

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|string'
        // ]);
        
        $item = new Item();
        $item->name = $request->name;
        $item->description = "omschrijving";
        $item->url = "test";
        $item->list_id = "3";

        $item->save();
            
        return response()->json(['success' => "De wens is toegevoegd"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::where('list_id', "=", "$id")->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}