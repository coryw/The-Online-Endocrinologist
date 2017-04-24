<?php

namespace OE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
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
		// Check to make sure user is a patient.
		$user = Auth::user();
		if ($user->type == 'patient')
			return view('patient.index')->withSugars($user->sugars()->get())->withUserId($user->id);
		else
			return back();
    }
}
