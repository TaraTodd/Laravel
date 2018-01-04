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

		return redirect('/blog')
			->with('success','Product created successfully');
	}


	public function destroy($id) //delete

	{

	    Post::find($id)->delete();
        return redirect('/blog')
            ->with('success','Product deleted successfully');

	}

	public function edit(Post $post)

    {
        return view('posts.edit', compact('post'));
    }


	public function update(Request $request, $id)//update ^post^

	{

	//validation

		$this ->validate(request(), [

			'title' => 'required',

			'body' => 'required'



		]);

    //update post
    
    $post = POST::find($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->save();
    
    return redirect('/blog')
    	->with('success','Product updated successfully');

	}



}
