<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/", function (Request $request) {
    if ($request->user())
        return redirect()->route("dishes.index");
    return redirect()->route("login");
});
Route::get("/login", [AuthController::class, "form"])->name("login");
Route::post("/login", [AuthController::class, "submit"])->name("login.submit");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::middleware("auth")
    ->resource("dishes", DishController::class)
    ->except([ "show" ]);
Route::middleware("auth")
    ->resource("restaurants", RestaurantController::class)
    ->except([ "show" ]);

