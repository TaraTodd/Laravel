<?php

namespace App;


class Post extends Model

{

	//for comments - can remove   
	public function comments()

	{

		return $this->hasMany(Comment::class);

	}

	public function user() // $post->user

	{

		return $this->belongsTo(User::class);

	}

	public function addComment() // $post->user

	{

		$this->comments()->create(compact('body','user_id'));

	}

}
