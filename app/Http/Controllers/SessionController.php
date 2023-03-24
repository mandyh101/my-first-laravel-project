<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

  /**
   * takes a user to the login from 
   */
  public function create()
  {
    return view('sessions.create') ;
  }

  /**
   * logs in a user based on provided credentials
   */
  public function store(Request $request)
  {
    //validate the request
    $attributes = $request()->validate([
      'username' => ['required', 'exists:users, username'],
      'password' => ['required']
    ]);

    //the ath attempt method will take the validated attributes and login a user if they have attributes that match
    if (auth()->attempt($attributes)){
      return redirect('/')->with('success', 'Welcome back!');
    }
    //redirect if auth fails
    return back()
      ->withInput() //includes the users input in the form input fields so they can see what has failed
      ->withErrors(['email' => 'Your provided credentials could not be verified']);
  }

  /**
   * logs out a user
   */
  public function destroy()
  {
    //logout the logged in user
    auth()->logout();

    return redirect('/')->with('success', 'Goodbye!');
  }
}
