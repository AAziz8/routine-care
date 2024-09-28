<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;



    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function authenticated(Request $request, $user )
    {
        if (Auth::user()->role_id == '0'){
            return redirect('dashboard');
        }
        elseif (Auth::user()->role_id == '2'){
            return redirect('/');
        }
        else{
            return redirect('/');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
