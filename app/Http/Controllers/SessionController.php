<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required']
        ]);

        if (auth()->attempt($attributes))
        {
            session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(['email' => 'Vaše zadané přihlašovací údaje nebylo možné ověřit']);
    }

    public function language($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
