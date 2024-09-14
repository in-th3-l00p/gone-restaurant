@php use Illuminate\Support\Facades\Route; @endphp
<aside class="h-full bg-orange-700 flex flex-col">
    <h1 class="text-3xl font-semibold text-white mb-8 mx-auto p-8">
        Too Gone<br>To Go
    </h1>

    <nav class="w-full h-full flex flex-col justify-between">
        <a
            href="{{ route("dishes.index") }}"
            @class([
                "w-full px-8 py-2 text-lg text-center",
                Route::current()->getName() === "dishes.index" ?
                    "bg-white text-orange-700" :
                    "bg-transparent text-white"
            ])
        >
            Dishes
        </a>
        <a
            href="{{ route("dishes.create") }}"
            @class([
                "w-full px-8 py-2 text-lg text-center",
                Route::current()->getName() === "dishes.create" ?
                    "bg-white text-orange-700" :
                    "bg-transparent text-white"
            ])
        >
            Add a dish
        </a>
        <a
            href="{{ route("restaurants.index") }}"
            @class([
                "w-full px-8 py-2 text-lg text-center",
                Route::current()->getName() === "restaurants.index" ?
                    "bg-white text-orange-700" :
                    "bg-transparent text-white"
            ])
        >
            Restaurants
        </a>
        <a
            href="{{ route("restaurants.create") }}"
            @class([
                "w-full px-8 py-2 text-lg mb-auto text-center",
                Route::current()->getName() === "restaurants.create" ?
                    "bg-white text-orange-700" :
                    "bg-transparent text-white"
            ])
        >
            Add a restaurants
        </a>
        <a
            href="{{ route("logout") }}"
            class="w-full px-8 py-2 text-lg text-center bg-transparent text-white"
        >
            Logout
        </a>
    </nav>
</aside>
