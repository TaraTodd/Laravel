<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

	public function __construct() //only guests allowed to make it through that filter

    {

    	$this->middleware('guest', ['except' => 'destroy']);

    }

    public function create()

    {

    	return view('sessions.create');

    }

    public function store()

    {
    	//attempt to authenticate the user
    	//if so, sign them in

    	if (! auth()->attempt(request(['email', 'password']))) {

    		return back()->withErrors([

    			'message' => 'Please check your credentials and try again'

    		]);

    	}


    	//if not redirect back

    	return redirect()->home();



    	//Redirect to homepage

    }

    public function destroy()

    {

    	auth()->logout();

    	return redirect()->home();

    }
}