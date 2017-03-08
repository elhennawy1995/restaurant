<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Junaidnasir\Larainvite\Facades\Invite;
use Auth;

class InvitationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ref_code)
    {
        $code = $ref_code;
        if( Invite::isValid($code))
        {
            $invitation = Invite::get($code); //retrieve invitation modal
            $invited_email = $invitation->email;
            $referral_user = $invitation->user;
            // dd($invitation);
           return view('auth.invitation-signup')->with('invitation',$invitation);
        } else {
            $status = Invite::status($code);
            echo "Sorry your invitation has expired or is invalid.";
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
    public function store(RegisterRequest $request)
    {
        $restaurant_id = User::find($request->referral)->restaurant()->get()->first()->id;
        $user_data = ['email'=>$request->email,'password'=>bcrypt($request->password)];
        if($user = User::create($user_data))
        {   
            Invite::consume($request->ref_code);
            $user_id = $user->id;
            if($restaurant_id && $user_id)
            {
                User::find($user_id)->restaurant()->attach($restaurant_id);
                if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
                {
                    return redirect('/');
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
