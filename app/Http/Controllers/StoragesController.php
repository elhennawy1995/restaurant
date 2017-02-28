<?php

namespace App\Http\Controllers;

use App\Storage;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class StoragesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $storages = Storage::all();
        $units = Unit::all();
        if ($restaurant) {
            $items = $restaurant->with('inventory_items')->get()->first()->inventory_items;
        }
        return view('storages.index')->with('restaurant',$restaurant)
                                        ->with('storages',$storages)
                                        ->with('items',$items)
                                        ->with('units',$units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $storage = Storage::create( $request->all() ) )
        {
            foreach ($request->storage_items as $item) 
            {
                $storage->item()->attach($item);
            }
            return  redirect()->back();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($selected_storage = Storage::find($id))
        {
            $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
            $storages = Storage::all();
            $selected_storage_items = $selected_storage->item()->with('storage')->get();
            $selected_storage_items_array = [];
            foreach ($selected_storage_items as $storage_item) {
                $selected_storage_items_array [] = $storage_item->id;
            }
            $selected_storage_items = $selected_storage_items_array;
            $units = Unit::all();
            if ($restaurant) {
                $items = $restaurant->with('inventory_items')->get()->first()->inventory_items;
            }
            return view('storages.edit')->with('restaurant',$restaurant)
                                            ->with('storages',$storages)
                                            ->with('selected_storage',$selected_storage)
                                            ->with('selected_storage_items',$selected_storage_items)
                                            ->with('items',$items)
                                            ->with('units',$units);
            
        }
        return redirect('/storages');

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
        // dd($request->all());
        if($storage = Storage::find($id))
        {
            if( $storage->update( $request->all() ) )
            {
                $storage->item()->sync($request->storage_items);
                return  redirect()->back();
            }
        }
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storage = Storage::find($id);
        if($storage->item())
        {
            $storage->item()->detach();
            if( $storage->delete() )
            {
                return response('Deleted.',200);
            }
        }
        return response('Error.',400);
    }
}
