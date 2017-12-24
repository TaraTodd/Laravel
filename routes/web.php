<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $links = \App\Link::all();

    return view('welcome', ['links' => $links]);
});

Route::get('/submit', function () {
    return view('submit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// With the form in place, we are ready to handle the POST data and validate data

use Illuminate\Http\Request;

Route::post('/submit', function (Request $request) {
    $data = $request->validate([ //validate() method to validate the form data
        'title' => 'required|max:255',
        'url' => 'required|url|max:255',
        'description' => 'required|max:255',
    ]);

    $link = tap(new App\Link($data))->save();

    return redirect('/');
});