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

    //login based on credentials

    //redirect with a session message
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
