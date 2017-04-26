<?php

namespace OE\Http\Controllers\Auth;

use Illuminate\Http\Request;
use OE\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
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

	public function showLoginForm() {
		return view('auth.doctor-login');
	}

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo() {
		$user  = Auth::user();
		// if ($user->type == "patient")
		// 	return route('home');
		// else {
		// 	return route('home');
		// }
		return route('home');
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

	public function login(Request $request) {
		// Validate form Database
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		// Attempt to log doctor in
		if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])) {
			//return redirect()->intended(route('doctor.index'));
			return redirect()->route('home');
		}
		else {
			return redirect()->back()->withInput($request->only('email', 'remember'));
		}
	}
}
