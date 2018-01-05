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
Route::get('/blog', 'PostsController@index')->name('home');

Route::get('/blog/create', 'PostsController@create');

Route::post('/blogs', 'PostsController@store');

Route::get('/posts/{post}/edit', 'PostsController@edit');

Route::patch('/posts/{post}', 'PostsController@update');

Route::get('/posts/{post}', 'PostsController@show');

Route::delete('/posts/{post}','PostsController@destroy');


//Route::post('/posts/{post}/comments', 'CommentsController@store');//for comments

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@show');


Route::get('/', "SessionsController@create");

Route::post('/login', "SessionsController@store");


Route::get('/logout', "SessionsController@destroy");


//Route::get('/tasks', 'TasksController@index');//method @index

//Route::get('/tasks/{task}', 'TasksController@show');//method @index





//Route::get('/', function () {
    //$links = \App\Link::all();

    //return view('welcome', ['links' => $links]);
//});

//Route::get('/submit', function () {
   // return view('submit');
//});



//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

// With the form in place, we are ready to handle the POST data and validate data

//use Illuminate\Http\Request;

//Route::post('/submit', function (Request $request) {
   // $data = $request->validate([ //validate() method to validate the form data
        //'title' => 'required|max:255',
        ////'url' => 'required|url|max:255',
        //'description' => 'required|max:255',
   // ]);

    //$link = tap(new App\Link($data))->save();

    //return redirect('/');
//});