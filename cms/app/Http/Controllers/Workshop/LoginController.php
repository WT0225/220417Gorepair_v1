<?php

namespace App\Http\Controllers\Workshop;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo =  '/workshop/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:workshop')->except('logout');
    }
    
    public function showLoginForm()
    {
       return view('workshop.auth.login');
    }

   protected function guard()
   {
       return \Auth::guard('workshop');
   }

   public function logout(Request $request)
   {
       $this->guard('workshop')->logout();
       // $request->session()->invalidate(); これが全部のSessionを消してしまう
       return redirect('/');
    }
}
