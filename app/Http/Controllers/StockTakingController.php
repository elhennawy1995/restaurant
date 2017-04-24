<?php

namespace App\Http\Controllers;

use App\InventoryItem;
use App\Item;
use App\ItemIngredient;
use App\Sale;
use App\User;
use Auth;
use Illuminate\Http\Request;

class StockTakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doSales()
    {  
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $inventory_items ='';
        if ($restaurant) 
        {
            $inventory_items = $restaurant->inventory_items()->get()->toArray();
            $start = "2017-01-01 00:00:00";
            $end = "2017-01-07 23:59:59";
            $result = Sale::select(\DB::raw('item_name ,count(item_name)'))->whereBetween('line_item_date',[$start,$end])->Where('restaurant_id',$restaurant->id)->groupBy('item_name')->get()->toArray();
            foreach ($result as $sold_item) 
            {
                $menu_item = Item::where('name',$sold_item['item_name'])->get()->toArray();
                if($menu_item)
                {
                    // dd($sold_item);
                    $inventory = ItemIngredient::where('menu_item_id',$menu_item[0]['id'])->get()->toArray();
                    $amount = array();
                    $available = array();
                    foreach ($inventory as $used ) 
                    {
                        $amount [$used['inventory_item_id']] = $sold_item['count(item_name)'] * $used['amount'];
                        foreach ($inventory_items as $inventory_item) 
                        {
                            if($used['inventory_item_id']==$inventory_item['id'])
                            $available[$used['inventory_item_id']] =
                            ($inventory_item ['number_of_cu_per_pu']
                            *  $inventory_item  ['pu_count'] - $amount[$used['inventory_item_id']] ) / $inventory_item ['number_of_cu_per_pu'] ;

                            // print_r($inventory_item); 
                        }
                    }
                    // dd($available);
                }        
            }
            $inventory_items = $restaurant->inventory_items()->get();
        }
        foreach ($available as $key => $value) 
        {
            if($value<0)
            {
                $v = InventoryItem::find($key);
                $v->pu_count = 0; 
                $v->save();
            }
            else
            {
                $v = InventoryItem::find($key);
                $v->pu_count = $value; 
                $v->save();
            }

        }
            
    }

    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $inventory_items ='';
        if ($restaurant) 
        {
            $inventory_items = $restaurant->inventory_items()->get();
        }
        return view('stocktaking.index')->with('restaurant',$restaurant)
                            ->with('items',$inventory_items);
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
