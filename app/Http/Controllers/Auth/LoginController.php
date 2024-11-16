<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function username()
    {
        // Check if the input is an email
        $loginType = filter_var(request('login'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$loginType => request('login')]);
        return $loginType;
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->with('lError', 'Username or Password is Incorrect');
    }
    /**
     * Attempt to log the user into the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $request->only($this->username(), 'password'),
            $request->filled('remember')
        );
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home')->with('lSuccess', 'Login successful!');
    }

}