<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()

    {

    	return view('registration.create');

    }

    public function store()

    {

    	//validate form

    	$this->validate(request(), [

    		'name' => 'required',

    		'email' => 'required|email',

    		'password' => 'required|confirmed'//to confirm passwords match

    	]);

    	//create and save user

    	$user = User::create(request(['name', 'email', 'password']));

    	//sign them in - not important class at the top

    	auth()->login($user);

    	//redirect to homepage

    	return redirect()->home();


    }
}
 