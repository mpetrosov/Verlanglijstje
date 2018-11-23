<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Verlanglijstje;
use App\Item;
use App\User;
use Log;
use Response;


class ItemController extends Controller
{

    
    protected $fillable = ['name', 'description', 'url', 'list_id'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getItems($id)
    {
        // Log::error(Item::where('list_id', "=", "$id")->get());
        $item = Item::where('list_id', "=", "$id")->get();
        // Log::error ('de naam is: ' + $item->name);
        // name', 'description', 'url', 'list_id']
        return Response::json(array('name' => $item->name, 'description' => $item->description, 'url' => $item->url, 'list_id' => $item->list_id));
    }


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
        $item = new Item();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->url = $request->url;
        $item->list_id = $request->list_id;
        
        // return $item;
        $item->save();
        // return "het item is toegevoegd";
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
    public function edit(Request $request)
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
    public function update(Request $request)
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