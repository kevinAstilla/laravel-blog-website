<?php

namespace App\Http\Controllers;

Use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    } 

    public function store(RegistrationForm $form)
    {
        // $this->validate(request(), [
        //        'name' => 'required', 
        //        'email' => 'required|email', 
        //        'password' => 'required|confirmed'
        //    ]);

        // $user = User::create([ 

        //     'name' => request('name'),
            
        //     'email' => request('email'),
        
        //     'password' => bcrypt(request('password'))
        
        // ]);
        // auth()->login($user);

        // \Mail::to($user)->send(new Welcome($user));

        $form->persist();

        session()->flash('message', 'thank you for signing up!');

    	//redirect to the home page
    	return redirect()->home();
    }
}
