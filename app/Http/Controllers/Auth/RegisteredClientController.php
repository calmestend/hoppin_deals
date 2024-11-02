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

class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        if (Auth::user() && Auth::user()->role_id === 2) {
            return view("auth.client-register");
        }
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validateRequest($request);

        $user = $this->createUser($request);

        if (Auth::user() && Auth::user()->role_id === 2) {
            return redirect()->route("admin.users");
        }
        Auth::login($user);
        return redirect()->route("client.dashboard");
    }

    private function validateRequest(Request $request): void
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
    }

    private function createUser(Request $request): User
    {
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => 1,
        ]);

        Client::create([
            "user_id" => $user->id
        ]);

        event(new Registered($user));

        return $user;
    }
}
