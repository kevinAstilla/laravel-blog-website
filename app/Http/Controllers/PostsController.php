<?php

namespace App\Http\Controllers;


use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{

	public function __construct()
	{

		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index()
	{
		//$posts = Post::all();
		//$posts = Post::latest()->get();
		//latest() = orderBy('created_at', 'desc')

		//$posts = $posts->all(); //uses the posts repository
		$posts = Post::latest()
			->filter(request(['month','year']))
			->get();


		$archives = Post::archives();
		// $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
		// ->groupBy('year', 'month')
		// ->orderByRaw('min(created_at) desc')
		// ->get()
		// ->toArray();


		return view('posts.index', compact('posts', 'archives'));
	}

	public function show(Post $post)
	{
		//theres the old way where $id is in the function
		//and then
		//$post = Post::fint($id);

		return view('posts.show', compact('post'));
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store()
	{
		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required'
		]);

		auth()->user()->publish(new Post(request(['title', 'body'])));


		// //Approach 1 in saving the reques
		// //create a new post using the request data
		// $post = new Post;

		// $post->title = request('title');
		// $post->body = request('body');
		// //save it to the database
		// $post->save();

		//Approach 2 in saving the request


		//approach 1 in making posts
		//Post::create(request(['title', 'body', 'user_id']));
		//approach 2
		// Post::create([
		// 	'title' => request('title'),
		// 	'body' => request('body'),
		// 	'user_id' => auth()->id()
		// 	]);

		session()->flash('message', 'your post has not been published');


		//redirect to the home page
		return redirect('/');
	}
    
    
}
