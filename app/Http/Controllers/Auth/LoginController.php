<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function login()
    {   
        $remember = request('remember');
        $credentials =  request()->only(['email','password']);
        if($remember)
        {
           if(Auth::attempt($credentials,$remember))
           {
                return redirect('/');
           }
        }
        else
        {
           if(Auth::attempt($credentials))
           {
                return redirect('/');
           }

        }
        return redirect('login');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
        
}
