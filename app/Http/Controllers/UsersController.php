<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewUserToRestaurantRequest;
use App\User;
use App\Mail\userInvitation;
use Illuminate\Http\Request;
use Junaidnasir\Larainvite\Facades\Invite;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(NewUserToRestaurantRequest $request)
    {
        // $user = User::create($request->all());
        // $restaurant_id = $request->get('restaurant_id');
        // $user_id = $user->id;
        // if($restaurant_id && $user_id)
        // {
        //     User::find($user_id)->restaurant()->attach($restaurant_id);
        //     return response('Added.',200);
        // }
        // return response('Error.',400);
        $user = Auth::user();
        // dd($request->all());
        $ref_code = Invite::invite($request->email, $user->id);
        $url = asset("/invitations/$ref_code");
        $invitation = new userInvitation($url);
        if(\Mail::to($request->email)->send($invitation));
            return response('Invited',200);
        return response('Error',400);
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
        if(User::find($id)->update($request->all()))
        {
            return response('Updated.',200);
        }
        return response('error',400);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        
        if(User::find($id))
        {
            User::find($id)->restaurant()->detach();
            User::find($id)->delete();
            return response('Deleted.',200);
        }
        return response('error',400);
    }
}
