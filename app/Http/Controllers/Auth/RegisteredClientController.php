<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

// TODO: Check if the user is logged or not, by this way we can delete 2 functions
class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     */
    public function createByAdmin(): View
    {
        return view("auth.client-register");
    }

    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:" . User::class,
            ],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1
        ]);

        Client::create([
            "user_id" => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route("client.dashboard", absolute: false));
    }

    public function storeByAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:" . User::class,
            ],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1
        ]);

        Client::create([
            "user_id" => $user->id,
        ]);

        event(new Registered($user));

        return redirect(route("admin.users", absolute: false));
    }
}
