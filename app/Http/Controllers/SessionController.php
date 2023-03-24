<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

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
  public function store()
  {
      $attributes = request()->validate([
          'username' => 'required|string',
          'password' => 'required'
      ]);

      if (auth()->attempt($attributes)) {
          session()->regenerate();

          return redirect('/')->with('success', 'Welcome Back!');
      }

        //redirect if auth fails
      //   return back()
      //     ->withInput() //includes the users input in the form input fields so they can see what has failed
      //     ->withErrors(['email' => 'Your provided credentials could not be verified']);
      // }
      throw ValidationException::withMessages([
        'email' => 'Your provided credentials could not be verified'
      ]);
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
