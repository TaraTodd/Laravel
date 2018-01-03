<?php

namespace App\Http\Controllers;


use App\Post;


class PostsController extends Controller


{
   //stop anyone viewing pages if they are not logged in
    public function __construct()
    {

    	$this->middleware('auth')->except(['index', 'show']);

    }

	public function index()

	{

		$posts = Post::latest()->get();


		return view('posts.index', compact('posts'));

	}

	public function show(Post $post)//wildcard

	{

		return view('posts.show', compact('post'));

	}

	public function create()

	{

		return view('posts.create');

	}

	public function store()

	{
		//validation

		$this ->validate(request(), [

			'title' => 'required',

			'body' => 'required'



		]);


		//create a new post using the request data

		//save it to database

		//other option
		//auth()->user()->publish(

			//new Post(request(['title', 'body']))

		//);


		Post::create([
			'title' => request('title'),

			'body' => request('body'),

			'user_id' => auth()->id()
		]);


		//and redirect maybe homepage

		return redirect('/blog');
	}


	public function destroy() //delete

	{

		return view('posts.index');

	}

	public function edit(Post $post)

    {
        return view('posts.edit', compact('post'));
    }

	public function update()//update ^post^

	{

		//validation

		$this ->validate(request(), [

			'title' => 'required',

			'body' => 'required'



		]);


		//create a new post using the request data

		//save it to database

		//other option
		//auth()->user()->publish(

			//new Post(request(['title', 'body']))

		//);


		Post::update([
			'title' => request('title'),

			'body' => request('body'),

			'user_id' => auth()->id()
		]);


		//and redirect maybe homepage

		return redirect('/blog');

	}



}
