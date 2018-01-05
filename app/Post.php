<?php

namespace App;
use Illuminate\Http\Request;


class Post extends Model

{

	//for comments - can remove   
	//public function comments()

	//{

		//return $this->hasMany(Comment::class);

	//}

	public function user() // $post->user

	{

		return $this->belongsTo(User::class);

	}

	//public function addComment($body) // $post->user

	//{

		//$this->comments()->create(compact('body','user_id'));

		//$user_id = auth()->id();
		//$this->comments()->create(compact('body', 'user_id'));

	//}

}
