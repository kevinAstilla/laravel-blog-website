<?php



// App::bind('App\Billing\Stripe', function(){
// 	return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

//$stripe = App::make('App\Billing\Stripe');
//$stripe = resolve('App\Billing\Stripe');
//$stripe = app('App\Billing\Stripe');

//dd(resolve('App\Billing\Stripe'));

Route::get('/posts/create', 'PostsController@create');
Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/', 'PostsController@index')->name('home');


Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/tags/{tag}', 'TagsController@index');



Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('login');
Route::get('/logout', 'SessionsController@destroy');