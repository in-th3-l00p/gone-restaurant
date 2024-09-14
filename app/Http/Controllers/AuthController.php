<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function form() {
        return view("login");
    }

    public function submit(Request $request) {
        $request->validate([
            "passphrase" => "required"
        ]);
        if ($request->passphrase !== "admin")
            return back()->withErrors([ "passphrase" => "Incorrect passphrase" ]);
        Auth::login(User::query()->first());
        return redirect()->route("dishes.index");
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("login");
    }
}
