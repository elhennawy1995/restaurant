<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\User;
use Auth;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $suppliers ='';
        $items ='';
        if ($restaurant) {
            // $items = $restaurant->with('inventory_items')->get()->first()->inventory_items;
            // $suppliers = $restaurant->with('suppliers')->get()->first()->suppliers;
            $suppliers = $restaurant->suppliers()->get();
            $items = $restaurant->inventory_items()->get();


            // dd($items);
        }
        return view('suppliers.index')->with('restaurant',$restaurant)
                                    ->with('suppliers',$suppliers)
                                    ->with('items',$items);
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
        $supplier = Supplier::create($request->all());
        $supplier_id = $supplier->id;
        if($supplier_id)
        {
            if($request->supplier_items)
                foreach ( $request->supplier_items as $item) 
                {
                    $supplier->items()->attach($item);
                }
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
        if ($restaurant) {
            $items = $restaurant->inventory_items()->get();
            // $items = $restaurant->with('inventory_items')->get()->first()->inventory_items;
            $suppliers = $restaurant->suppliers()->get();
            // dd($items);
        }
        $supplier = Supplier::where('id',$id)->with('items')->get()->first();
        $supplier_items = [];
        foreach ($supplier->items as $item) {
            $supplier_items [] = $item->id;
        }
        return view('suppliers.edit')->with('restaurant',$restaurant)
                                    ->with('suppliers',$suppliers)
                                    ->with('edit_supplier',$supplier)
                                    ->with('supplier_items',$supplier_items)
                                    ->with('items',$items);
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
        $supplier = Supplier::find($id);
        if($supplier->update($request->all()))
        {
            $supplier->items()->detach();
            if($request->supplier_items)
                foreach ( $request->supplier_items as $item) 
                {
                    $supplier->items()->attach($item);
                }
        }
        return redirect('/suppliers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($supplier = Supplier::find($id))
        {
            if($supplier->items())
            {
                $supplier->items()->detach();
                $supplier->restriction_period()->detach();
                if($supplier->delete())
                    return response('Deleted.',200);
            }
        }
        return response('error',400);

    }
}
