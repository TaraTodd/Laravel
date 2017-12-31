<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

		$this ->validate(request(),[

			'title' => 'required',

			'body' => 'required'



		]);

		//create a new post using the request data

		//save it to database


		auth()->user()->publish(

			new Post(request(['title', 'body']))


		);

		//and redirect maybe homepage

		return redirect('/blog');
	}


}
