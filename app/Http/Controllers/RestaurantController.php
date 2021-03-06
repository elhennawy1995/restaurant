<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\Http\Requests\BasicInfoRequest;
use App\Invitation;
use App\Restaurant;
use App\RestaurantCuisines;
use App\User;
use App\UserRestaurants;
use Auth;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $restaurant = User::find(Auth::user()->id)->restaurant()->get()->first();
        if($restaurant)
        {
            $restaurant_cuisines_object = Restaurant::find($restaurant->id)->cuisines()->get()->toArray();
            $restaurant_cuisines = [];
            foreach ($restaurant_cuisines_object as $rc) 
            {
                $restaurant_cuisines [] = $rc['id'];
            }
            $branches = Restaurant::find($restaurant->id)->branches()->get();
            $users = Restaurant::find($restaurant->id)->user()->get();
            $invited_users = Invitation::where('user_id',Auth::user()->id)->get();
        }
        else
        {
            $branches=[];
            $users=[];
            $restaurant_cuisines=[];
            $invited_users = [];
        }
        $cuisines = Cuisine::all();
        return view('restaurant.index')
                ->with('restaurant',$restaurant)
                ->with('branches',$branches)
                ->with('cuisines',$cuisines)
                ->with('users',$users)
                ->with('invited_users',$invited_users)
                ->with('restaurant_cuisines',$restaurant_cuisines);
        
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
    public function store(BasicInfoRequest $request)
    {
        $restaurant = Restaurant::create($request->all());
        $restaurant_id = $restaurant->id;
        if($restaurant_id)
        {
            User::find(Auth::user()->id)->restaurant()->attach($restaurant_id);
            $cuisines = $request->cuisines;
            foreach ( $cuisines as $cuisine) 
            {
                $restaurant->cuisines()->attach($cuisine);
            }       
        }
        return redirect('/restaurant');
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
        $restaurant = Restaurant::find($id)->update($request->all());
        $cuisines = $request->cuisines;
        Restaurant::find($id)->cuisines()->detach();
        foreach ( $cuisines as $cuisine) 
        {
            Restaurant::find($id)->cuisines()->attach($cuisine);
        }       
        return redirect('/restaurant');
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
