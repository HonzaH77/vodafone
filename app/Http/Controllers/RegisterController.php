<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /**
     * Funkce zobrazuje registrační formulář.
     *
     * @return Application|Factory|View
     */
    public function create() : Application|Factory|View
    {
        return view('registration.layout.index');
    }

    /**
     * Funkce zajistí vytvoření účtu pro nového uživatele.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() : Application|RedirectResponse|Redirector
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
