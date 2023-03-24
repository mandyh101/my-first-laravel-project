<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

      /**
       * logs in a user
       */
      public function create()
      {
        return view('sessions.create') ;
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
