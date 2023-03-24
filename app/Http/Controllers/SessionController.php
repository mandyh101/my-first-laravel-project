<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //
    public function destroy(Request $request)
    {
      //logout the logged in user
      auth()->logout();

      return redirect('/')->with('success', 'Goodbye!');
    }
}
