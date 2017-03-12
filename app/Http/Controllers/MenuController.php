<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ItemRequest;
use App\InventoryItem;
use App\Item;
use App\ItemPhoto;
use App\MealType;
use App\User;
use Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $items = '';
        $sides = '';
        $disposables = '';
        if($restaurant)
        {
            // $items = $restaurant->with('items.sides')->with('items.categories')->get()->first()->items;
            $items = $restaurant->items()->with('sides')->With('categories')->get();
            // dd($items);
            $sides = Category::find(4)->restaurantItems($restaurant->id)->get();
            // dd($sides);
            $disposables = Category::find(5)->restaurantItems($restaurant->id)->get();
        }
        $categories = Category::all();
        $meal_types = MealType::all();
        return view('menu.index')->with('restaurant',$restaurant)
                                ->with('items',$items)
                                ->with('sides',$sides)
                                ->with('disposables',$disposables)
                                ->with('categories',$categories)
                                ->with('meal_types',$meal_types);
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
    public function store(ItemRequest $request)
    {
        $item = Item::create($request->all());
        $item_id = $item->id;
        if($item_id)
        {
            if($request->sides)
                foreach ( $request->sides as $side) 
                {
                    $item->sides()->attach($side);
                }
            if($request->disposables)
                foreach ( $request->disposables as $disposable) 
                {
                    $item->disposables()->attach($disposable);
                }
            if($request->categories)
                foreach ( $request->categories as $category) 
                {
                    $item->categories()->attach($category);
                }    
            if($request->meal_types)
                foreach ( $request->meal_types as $type) 
                {
                    $item->meal_types()->attach($type);
                } 
            if ($request->hasFile('photo')) 
            {
                if ($request->file('photo')->isValid())
                {
                    if($path = $request->photo->store('uploads/menu-photos','public') ) 
                    {
                        ItemPhoto::create(['path'=>$path,'menu_item_id'=>$item_id]);
                    }
                }
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
        if($restaurant->id)
        {
            // $items = $restaurant->with('items.sides')->with('items.categories')->get()->first()->items;
            $items = $restaurant->items()->with('sides')->With('categories')->with('photo')->get();
            $sides = Category::find(4)->restaurantItems($restaurant->id)->get();
            $disposables = Category::find(5)->restaurantItems($restaurant->id)->get();
        }
        $categories = Category::all();
        $meal_types = MealType::all();

        $item = Item::find($id)->with('sides')->with('categories')->with('meal_types')->
         with('disposables')->with('photo')->where('id',$id)->get()->first();
        // $item = Item::find($id)->sides()->categories()->meal_types()->
        //  disposables()->get();
        $item_sides = [];
        $item_categories = [];
        $item_disposables = [];
        $item_meal_types = [];
        foreach ($item->sides as $side) {
            $item_sides [] = $side->id;
        }
        foreach ($item->categories as $category) {
            $item_categories [] = $category->id;
        }
        foreach ($item->disposables as $disposable) {
            $item_disposables [] = $disposable->id;
        }
        foreach ($item->meal_types as $type) {
            $item_meal_types [] = $type->id;
        }//dd($item);
        return view('menu.edit')->with('restaurant',$restaurant)
                                ->with('edit_item',$item)
                                ->with('items',$items)
                                ->with('sides',$sides)
                                ->with('disposables',$disposables)
                                ->with('categories',$categories)
                                ->with('meal_types',$meal_types)
                                ->with('item_disposables',$item_disposables)
                                ->with('item_categories',$item_categories)
                                ->with('item_sides',$item_sides)
                                ->with('item_meal_types',$item_meal_types);
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
        
        // $item_id = $item->id;
        if(Item::find($id)->update($request->all()))
        {   
            $item = Item::find($id);
            $item->disposables()->detach();
            $item->sides()->detach();
            $item->categories()->detach();
            $item->meal_types()->detach();
            if($request->sides)
                foreach ( $request->sides as $side) 
                {
                    $item->sides()->attach($side);
                }
            if($request->disposables)
                foreach ( $request->disposables as $disposable) 
                {
                    $item->disposables()->attach($disposable);
                }
            if($request->categories)
                foreach ( $request->categories as $category) 
                {
                    $item->categories()->attach($category);
                }    
            if($request->meal_types)
                foreach ( $request->meal_types as $type) 
                {
                    $item->meal_types()->attach($type);
                }
            if ($request->hasFile('photo')) 
            {
                if ($request->file('photo')->isValid())
                {
                    if($path = $request->photo->store('uploads/menu-photos','public') )
                    {
                        ItemPhoto::create(['path'=>$path,'menu_item_id'=>$id]);
                    }
                }
            }     
        }
        return redirect('/menu');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        if($item = Item::find($id))
        {   
            $item->disposables()->detach();
            $item->sides()->detach();
            $item->categories()->detach();
            $item->meal_types()->detach();
            $item->photo()->delete();
            $item->ingredients()->delete();
            if(Item::find($id)->delete())
            {
                return response('Deleted.',200);
            }
            return response('error',400);   
        }
        return response('error',400);
          
    }
    public function available()
    {   
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        $items_copy = [];
        $percentage = [];
        if ($restaurant) 
        {
            $items = $restaurant->items()->with('ingredients')->with('meal_types')->with('photo')->get();
            $ingredients = $restaurant->ingredients()->with('inventory_item')->get()->toArray();
            $ingredients_sum = [];
            
            foreach ($ingredients as $ingredient) 
            {
                $ingredients_sum [$ingredient['inventory_item_id']] = 0;
                $inventory_item_sum [$ingredient['inventory_item_id']] = 0;
                $percentage [$ingredient['inventory_item_id']] = 0;
            }
            foreach ($ingredients as $ingredient) 
            {
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
            $unavailable_ingredients = [];
            foreach ($percentage as $key => $p) 
            {
                if($p['percentage']>70)
                    $unavailable_ingredients [] = $key;
            }

            $items = $items->toArray();
            // dd($items);
            
            foreach($items as $key=>$item)
            {   $items_copy [$key] = $item;
                foreach($item['ingredients'] as $ingredient)
                {
                    if( in_array($ingredient['inventory_item_id'], $unavailable_ingredients) )
                    {
                        $items_copy[$key]['unavailable'] = true;
                        // dd($item);
                    }
                }
            
            }

        }
        $result = array();
        foreach ($items_copy as $item) {
            foreach ($item['meal_types'] as $type) 
            {   //echo $type['name'];
                $result[$type['name']] []= $item;
            }
        }
        // dd($result);
        return view('menu.available')->with('restaurant',$restaurant)
                                    ->with('items',$items_copy)
                                    ->with('result',$result);
    }
        
}
