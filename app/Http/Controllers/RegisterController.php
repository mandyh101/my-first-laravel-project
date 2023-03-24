<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
      return view('register.create');
    }

    public function store(Request $request)
    {
      $attributes = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:25'],
        'email' => ['required', 'email', 'max:255'],
        'password' => ['required', 'max:255'],
      ]);

      $attributes['password'] = bcrypt($attributes['password']);

      //create the user with validated attributes if validation passes
      User::create($attributes);

      return redirect('/');
    }

}
