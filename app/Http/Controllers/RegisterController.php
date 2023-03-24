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
        'username' => ['required', 'string', 'min:5' , 'max:25', 'unique:users,username'], //you can pass a third param to the unique which is a variable to ignore e.g the user id
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'min:8','max:255'],
      ]);

      //create the user with validated attributes if validation passes
      $user = User::create($attributes);

      //login the user after they've been created in the database
      auth()->login($user);

      return redirect('/')->with('success', 'Your account has been created!');
    }

}
