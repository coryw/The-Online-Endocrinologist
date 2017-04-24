<?php

namespace OE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		// Check to make sure user is a doctor.
		$user = Auth::user();
		if ($user->type == 'doctor')
			return view('doctor.index');
		else {
			return back();
		}
    }
}
