<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $percentage = array();
        if ($restaurant) {
            $items = $restaurant->items()->with('ingredients')->get();
            $ingredients = $restaurant->ingredients()->with('inventory_item')->get()->toArray();
            $ingredients_sum = [];
            foreach ($ingredients as $ingredient) {
                $ingredients_sum [$ingredient['inventory_item_id']] = 0;
                $inventory_item_sum [$ingredient['inventory_item_id']] = 0;
                $percentage [$ingredient['inventory_item_id']] = 0;
            }
            foreach ($ingredients as $ingredient) {
                $ingredients_sum [$ingredient['inventory_item_id']] += 
                $ingredient['amount'];

                $inventory_item [$ingredient['inventory_item_id']]= InventoryItem::where('id',$ingredient['inventory_item_id'])->get()->toArray();
                $inventory_item_sum [$ingredient['inventory_item_id']]
                 +=
                $inventory_item [$ingredient['inventory_item_id']] [0] ['number_of_cu_per_pu']
                *
                $inventory_item [$ingredient['inventory_item_id']] [0] ['pu_count'];
                // var_dump($inventory_item [$ingredient['inventory_item_id']]);
                 
                $percentage [$ingredient['inventory_item_id']] = 
                array(
                
                    "inventory_item_name"=>
                    $inventory_item [$ingredient['inventory_item_id']] [0] ['name'],
                    "percentage"=>
                    ($ingredients_sum [$ingredient['inventory_item_id']] / $inventory_item_sum [$ingredient['inventory_item_id']] )*100

                );
            }

            // dd($percentage);
            return view('shopping-cart.index')->with('restaurant',$restaurant)
                                ->with('percentage',$percentage);
        }
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
        //
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
