<?php

namespace App\Http\Controllers;

use App\Http\Resources\DishResource;
use App\Http\Resources\RestaurantResource;
use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ApiRestaurantController extends Controller
{
    public function index() {
        return RestaurantResource::collection(Restaurant::query()->latest()->get());
    }

    public function show(Restaurant $restaurant) {
        return new RestaurantResource($restaurant);
    }
}
