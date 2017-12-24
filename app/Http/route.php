<?php

use App\Users

get('/',["uses" => "HomeController@index"]);

get('users', function() {

	return User::all();

)};