<?php

use App\Http\Controllers\ApiDishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/dishes", [ApiDishController::class, "index"]);
Route::get("/dishes/{dish}", [ApiDishController::class, "show"]);
