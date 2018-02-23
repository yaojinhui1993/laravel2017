<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        // Validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required|confirmed',
        ]);

        // Add user the database
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        // Sign in the user
        auth()->login($user);

        // send email
        \Mail::to($user)->send(new Welcome($user));
        // redirect to home page

        return redirect()->home();
    }
}
