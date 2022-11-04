<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registration');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'username' => ['required', 'max:100', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3']
        ]);


        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/');
    }
}
