<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function index()
    {
        return view("dishes.index", [
            "dishes" => Dish::query()->latest()->get()
        ]);
    }

    public function create()
    {
        return view("dishes.create");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "picture" => "required|file",
            "price" => "required|numeric"
        ]);

        $picture = Storage::disk("public")->putFile($request->file("picture"));
        $dish = Dish::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "picture" => $picture,
            "price" => $data["price"]
        ]);

        return redirect()->route("dishes.index");
    }

    public function edit(Dish $dish)
    {
        return view("dishes.edit", [
            "dish" => $dish
        ]);
    }

    public function update(Request $request, Dish $dish)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric"
        ]);

        $dish->update($data);
        if ($request->hasFile("picture")) {
            Storage::disk("public")->delete($dish->picture);
            $dish->update([
                "picture" => Storage::disk("public")->putFile($request->file("picture"))
            ]);
        }

        return redirect()->route("dishes.index");
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route("dishes.index");
    }
}
