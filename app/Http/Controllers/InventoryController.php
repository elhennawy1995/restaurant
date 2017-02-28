<?php

namespace App\Http\Controllers;

use App\CountUnit;
use App\InventoryCategory;
use App\InventoryItem;
use App\PurchaseUnit;
use App\TimeUnit;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $units = Unit::all();
        $time_units = TimeUnit::all();
        $purchase_units = PurchaseUnit::all();
        $count_units = CountUnit::all();
        $categories = InventoryCategory::all();
        $items = '';
        if ($restaurant) {
            $items = $restaurant->inventory_items()->with('purchase_unit')->with('category')->get();
            // dd($items);
        }
        return view('inventory.index')->with('restaurant',$restaurant)
                                    ->with('items',$items)
                                    ->with('categories',$categories)
                                    ->with('units',$units)
                                    ->with('purchase_units',$purchase_units)
                                    ->with('count_units',$count_units)
                                    ->with('time_units',$time_units);
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
        // dd($request->all());
        if(InventoryItem::create($request->all()))
        {
            return redirect()->back();
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
        $units = Unit::all();
        $time_units = TimeUnit::all();
        $purchase_units = PurchaseUnit::all();
        $count_units = CountUnit::all();
        $categories = InventoryCategory::all();
        $items = '';
        if ($restaurant) {
            $items = $restaurant->inventory_items()->with('purchase_unit')->with('category')->get();
            
            // dd($items);
        }
        $item = InventoryItem::where('id',$id)->with('category')->with('purchase_unit')
        ->with('count_unit')->with('count_unit_size_unit')->with('remaining_shelf_life_unit')->get()->first();
        // $item = InventoryItem::find($id);
        // dd($item);
        return view('inventory.edit')->with('restaurant',$restaurant)
                                    ->with('edit_item',$item)
                                    ->with('items',$items)
                                    ->with('categories',$categories)
                                    ->with('units',$units)
                                    ->with('purchase_units',$purchase_units)
                                    ->with('count_units',$count_units)
                                    ->with('time_units',$time_units);
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
        if( InventoryItem::find($id)->update( $request->all() ) )
        {
            return redirect('/inventory');
        }
        else
        {
             return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(InventoryItem::find($id)->delete())
            {
                return response('Deleted.',200);
            }
            return response('error',400);   
    }
}
