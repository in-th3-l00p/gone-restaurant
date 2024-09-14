<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Models\Dish;
use Illuminate\Http\Request;

class ApiDishController extends Controller
{
    public function index() {
        return DishResource::collection(Dish::query()->latest()->get());
    }

    public function show(Dish $dish) {
        return new DishResource($dish);
    }
}
