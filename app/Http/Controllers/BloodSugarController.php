<?php

namespace OE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use OE\Sugar;
use Validator;



class BloodSugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
        $sugars = $user->sugars()->get();
		return view('home')->withSugars($sugars);
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
    public function store(Request $request)
    {
		$user = Auth::user();
		 // define rules
		 $validator = Validator::make($request->all(), [
			 'value' => 'required',
			 'reading_time' => 'required|unique:sugars',
		 ]);
		 if ($validator->fails()) {
			 return back()->withErrors($validator);
		 }
        $sugar = new Sugar();
		$sugar->value = $request->value;
		$sugar->reading_time = $request->reading_time;
		$sugar->comment = $request->comment;
		$user->sugars()->save($sugar);
		if ($request->value < 70) {
			$alert_level = "alert-danger";
			$message = "That's a little low, be careful!";
		}
		else if ($request->value > 140) {
			$alert_level = "alert-warning";
			$message = "That's a little high, be careful!";
		}
		else {
			$alert_level = "alert-success";
			$message = "Nice blood sugar!";
		}
		session()->flash('status', $message);
		session()->flash('alert_level', $alert_level);

		return redirect()->route('patient.index');    }

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
    public function destroy($user_id, $sugar_id)
    {
		$user = Auth::user();
		$sugars = $user->sugars()->get();
        $sugar = Sugar::findOrFail($sugar_id)->delete();
		session()->flash('status', 'Blood sugar deleted successfully!');
		return redirect()->route('patient.index');
    }
}
