<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ItemRequest;
use App\Item;
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
            $items = $restaurant->with('items.sides')->with('items.categories')->get()->first()->items;
            $sides = Category::find(4)->restaurantItems($restaurant->id)->get();
            $disposables = Category::find(5)->restaurantItems($restaurant->id)->get();
        }
        $categories = Category::all();
        $meal_types = MealType::all();

        $item = Item::find($id)->with('sides')->with('categories')->with('meal_types')->
         with('disposables')->get()->first();
        $item_sides = [];
        $item_categories = [];
        $item_disposables = [];
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
        }
        return view('menu.edit')->with('edit_item',$item)
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
            if(Item::find($id)->delete())
            {
                return response('Deleted.',200);
            }
            return response('error',400);   
        }
        return response('error',400);
          
    }
}
