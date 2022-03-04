<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        if (Auth::user()->role_as == '1') {       //1 = Admin Login
            return redirect('dashboard')->with('timer', 'Welcome ' . Auth::user()->name);
        } elseif (Auth::user()->role_as == '2') {         //2 = retailer Login
            return redirect('retailer/dashboard')->with('timer', 'Welcome ' . Auth::user()->name);
        } elseif (Auth::user()->role_as == '3') {         //2 = courier Login
            return redirect('courier/dashboard')->with('timer', 'Welcome ' . Auth::user()->name);
        } elseif (Auth::user()->role_as == '4') {         //2 = delivery Login
            return redirect('delivery/dashboard')->with('timer', 'Welcome ' . Auth::user()->name);
        } elseif (Auth::user()->role_as == '0') {         // Normal or Default User Login
            return redirect('/')->with('timer', 'Welcome ' . Auth::user()->name);
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
