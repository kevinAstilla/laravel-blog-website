<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;


class CommentsController extends Controller
{
    public function store(Post $post)
    {

    	//validation
    	$this->validate(request(), ['body' => 'required|min:2']);

    	$post->addComment(request('body'));
    	//create a comment to a post
    	//this is the long method
    	// Comment::create([
    	// 	'body' => request('body'),
    	// 	'post_id' => $post->id
    	// ]);

    	return back();
    }
}
