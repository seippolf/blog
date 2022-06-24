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
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Successfully Logged In');
        }
        // Return back with error if login fails
        return back()
            ->withInput()
            ->withErrors(['password' => 'Log in attempt failed']);

    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Log Out Successful!');
    }
}
