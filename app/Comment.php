<?php

namespace App;


class Comment extends Model
{
	public function post()
	{
		return $this->belongsTo(Post::class);
	}
	public function user()//a comment can belong to a user syntax: $comment->user->name
	{
		return $this->belongsTo(User::class);
	}
}
