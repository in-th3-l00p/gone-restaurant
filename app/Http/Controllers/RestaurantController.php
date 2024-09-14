<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        return view("restaurants.index", [
            "restaurants" => Restaurant::query()->latest()->get()
        ]);
    }

    public function create()
    {
        return view("restaurants.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "picture" => "required|file",
            "stars" => "required|in:1,2,3,4,5"
        ]);

        $picture = Storage::disk("public")->putFile($request->file("picture"));
        $restaurant = Restaurant::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "picture" => $picture,
            "stars" => $data["stars"]
        ]);

        return redirect()->route("restaurants.index");
    }

    public function edit(Restaurant $restaurant)
    {
        return view("restaurants.edit", [
            "restaurant" => $restaurant
        ]);
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "stars" => "required|in:1,2,3,4,5"
        ]);

        $restaurant->update($data);
        if ($request->hasFile("picture")) {
            Storage::disk("public")->delete($restaurant->picture);
            $restaurant->update([
                "picture" => Storage::disk("public")->putFile($request->file("picture"))
            ]);
        }

        return redirect()->route("restaurants.index");
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route("restaurants.index");
    }
}
