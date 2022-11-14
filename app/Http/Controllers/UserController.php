<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use function App\Helpers\userRepository;

class UserController extends Controller

{
    /**
     * Funkce zobrazuje seznam všech uživatelů.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $users = userRepository()->getAllUsers()->paginate(15);
        return view('user.layout.index', ['users' => $users]);
    }
}
