<?php

use App\Http\Controllers\ApiDishController;
use App\Http\Controllers\ApiRestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/dishes", [ApiDishController::class, "index"]);
Route::get("/dishes/{dish}", [ApiDishController::class, "show"]);
Route::get("/restaurants", [ApiRestaurantController::class, "index"]);
Route::get("/restaurants/{restaurant}", [ApiRestaurantController::class, "show"]);
