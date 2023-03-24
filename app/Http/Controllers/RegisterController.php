<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
      return view('register.create');
    }

    public function store(Request $request)
    {
      $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:25'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'max:255'],
      ]);

    }

}
