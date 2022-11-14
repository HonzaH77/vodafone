<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class SessionController extends Controller
{
    /**
     * Funkce zajistí odhlášení uživatele.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy() : Application|RedirectResponse|Redirector
    {
        auth()->logout();
        return redirect('/');
    }

    /**
     * Funkce zajistí přihlášení uživatele.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function store() : Application|RedirectResponse|Redirector
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

    /**
     * Funkce zajišťuje změnu jazykového prostředí
     *
     * @param $locale
     * @return RedirectResponse
     */
    public function language($locale) : RedirectResponse
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
