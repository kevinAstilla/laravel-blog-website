<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
        
    }
    public function create()
    {
    	return view('sessions.create');
    	
    }

    public function store()
    {

        //attempt to authenticate
        //!auth()->attempt(request(['email', 'password'])) //original one
        // Auth::attempt(array(
        //     'email' => request(['email']),
        //     'password' => request(['password'])
        // ));
        //Auth::attempt(['email' => request(['email']), 'password' => request(['password']), 'active' => 1])
        if(!auth()->attempt(request(['email', 'password']))) {

            return back()->withErrors([    'message' => 'Please check your credentials and try again.']);
        }
        //Please check your credentials and try again.
        return redirect()->home();


    }


    public function destroy()
    {
    	auth()->logout();

    	return redirect()->home();
    }
}
