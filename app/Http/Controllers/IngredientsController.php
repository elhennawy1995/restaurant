<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use App\Item;
use App\ItemIngredient;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        if ($restaurant) 
        {
            $items = $restaurant->with('items')->get()->first()->items;
        }
        return view('ingredients.index')->with('restaurant',$restaurant)
                                    ->with('items',$items);
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
        $ingredients = request('group-a');
       foreach ($ingredients as $ingredient) 
       {
            $count_unit = InventoryItem::find($ingredient['inventory_item_id'])->count_unit()->get();
            $count_unit_id = $count_unit[0]['id'];
            $ingredient['menu_item_id'] = request('menu_item_id');
            $ingredient['count_unit'] = $count_unit_id;
            $ing = ItemIngredient::create( $ingredient );
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
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        if ($restaurant) 
        {
            $items = $restaurant->with('items')->get()->first()->items;
            $selected_item = Item::find($id)->with('ingredients')->get()->first();
            $ingredients = $selected_item->ingredients;
            // dd($ingredients);
            $inventory_items = $restaurant->with('inventory_items')->get()->first()->inventory_items;
        }
        $units = Unit::all();
        return view('ingredients.edit')->with('restaurant',$restaurant)
                                        ->with('items',$items)
                                        ->with('units',$units)
                                        ->with('selected_item',$selected_item)
                                        ->with('ingredients',$ingredients)
                                        ->with('inventory_items',$inventory_items);
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
        if(ItemIngredient::find($id)->delete())
            {
                return response('Deleted.',200);
            }
            return response('error',400);   
    }
}
