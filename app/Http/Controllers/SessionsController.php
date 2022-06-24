<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        
        // Return back with error if login fails
        if (!auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'Log in attempt failed']);
        }
        
        session()->regenerate();

        return redirect('/')->with('success', 'Successfully Logged In');
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Log Out Successful!');
    }
}
